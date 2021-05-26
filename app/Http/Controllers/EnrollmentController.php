<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrollment;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function index()
    {
        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id;
        $SY = DB::table('school_year')->where('current',1)->first();
        $year = $SY->SY;

        $enrollment = DB::table('enrollment')
            ->where('student_id', $student_id)
            ->where('SY',$year)
            ->first();

        //dd($enrolled);

        if($enrollment == null)
        {
            return redirect()->route('enroll_create');
        }
        else
        {

            return view('enrollment.index', compact('enrollment'));
        }
        
    }

    public function enroll(Request $request)
    {

        $this->validate($request, [
            'SY' => 'required',
        ]);

        DB::table('class_section')->insert([
            'level_id' => $request['level_id'],
            'department_id' => $request['dept_id'],
            'strand_id' => $request['strand_id'],
            'school_year_id' => $request['school_year_id'],
            'semester' => $request['semester'],

        ]);

        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id;

        /* DB::table('enrollment')->insert([
            'student_id' => $student_id,  
            'SY' => $request['school_year']     
        ]); */
        //dd($request['SY']);
        Enrollment::create([
            'student_id' => $student_id,  
            'SY' => $request['SY']
        ]);
        
        return view('enrollment.index')->with('success', 'Record saved successfully!');        
    }

    public function create_enrollForm()
    {
        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id;

        if($student_id == null)
        {
            $no_student_record = true;
            return view('enrollment.create', compact('no_student_record'));  
        }
        else
        {
                $SY = DB::table('school_year')->where('current',1)->first();
            /* if(DB::table('enrollment')->where('student_id', $student_id )->exist())
            { */
                $departments = DB::table('department')->get();               
                $levels = DB::table('level')->get();
                $tracks = DB::table('track')->get();
                $strands = DB::table('strand')->get();

                return view('enrollment.create', compact('departments', 'levels', 'tracks', 'strands', 'SY'));
           /*  }
            else
            {
                $no_enroll_record = true;
                return view('enrollment.create', 'no_enroll_record');
            } */

        }        
             
    }
}
