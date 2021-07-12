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
        $student = Student::where('user_id',$userid)->first();
        

        if($student != null)
        {
            $SY = DB::table('school_year')->where('current',1)->first();
            $year = $SY->SY;

            $student_id = $student->id;
            $enrollment = DB::table('enrollment')
                ->where('student_id', $student_id)
                ->where('SY',$year)
                ->first();

            if($enrollment == null)
            {
                return redirect()->route('enroll_create');
            }
            else
            {

                return view('enrollment.index', compact('enrollment'));
            }
        }    
        else
        {
            $enrollment = null;
            return view('enrollment.index', compact('enrollment'));
        }        
        
    }

    public function enroll(Request $request)
    {

        $this->validate($request, [
            'SY' => 'required',
        ]);

        
        $department = DB::table('department')
                    ->select('department_name')
                    ->where('id', $request['dept_id'])->first();

                    

        $classSection_id = mt_rand(10000,50000);

        if($department->department_name == 'Senior High School')
        {            
            DB::table('class_section')->insert([
            'id' => $classSection_id,
            'level_id' => $request['level_id'],
            //'department_id' => $request['dept_id'],
            'strand_id' => $request['strand_id'],
            'school_year_id' => $request['school_year_id'],
            'semester' => $request['semester'],

            ]);  
        }
        else
        {
            DB::table('class_section')->insert([
                'id' => $classSection_id,
                'level_id' => $request['level_id'],
                //'department_id' => $request['dept_id'],
                'strand_id' => null,
                'school_year_id' => $request['school_year_id'],
                'semester' => $request['semester'],
    
                ]);
        }
        
        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id;

        Enrollment::create([
            'student_id' => $student_id,  
            'SY' => $request['SY'],
            'class_section_id' => $classSection_id
        ]);
        
        return redirect()->route('enroll_index');        
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
