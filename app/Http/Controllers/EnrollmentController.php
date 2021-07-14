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

        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id; 

        Enrollment::create([
            'student_id' => $student_id,  
            'SY' => $request['SY'],
            //'class_section_id' => $classSection_id
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

                $student_background = DB::table('educational_background_student')
                                ->where('Student_ID',$student_id)
                                ->get();
        
                $max_level = $student_background->max('Level_ID');
       
                $promoted_level = $max_level+1;

                $level_name = DB::table('level')
                        ->where('id', $promoted_level)
                        ->first()->level_name;        

                $dept_id = DB::table('level')
                        ->where('id',$promoted_level)
                        ->first()->department_id;

                $dept_name = DB::table('department')
                        ->select('department_name')
                        ->where('id', $dept_id)->first()->department_name;

                return view('enrollment.create', compact('dept_name', 'level_name','SY'));         

        }        
             
    }
}
