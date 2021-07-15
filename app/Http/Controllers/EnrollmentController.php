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
  
                $departments = DB::table('department')
                        ->get();

                return view('enrollment.create', compact('departments','SY'));         

        }        
             
    }

    public function getGradeLevel(Request $request)
    {
        $html = '';
        $html .= '<option value=""> --Select here--</option>';

        $levels = DB::table('level')->where('department_id',$request['dept_id'])->get();
        
        foreach ($levels as $level) {
            $html .= '<option value="'.$level->id.'">'.$level->level_name.'</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function getTrack(Request $request)
    {
        $html = '';
        $html .= '<option value=""> --Select here-- </option>';
        
        $tracks = DB::table('track')->get();
        
        if($tracks !=null)
        {
            foreach ($tracks as $track) {
                $html .= '<option value="'.$track->id.'">'.$track->track_name.'</option>';
            }
        }   
             

        return response()->json(['html' => $html]);
    }

    public function getStrand(Request $request)
    {
        $html = '';
        $html .= '<option value=""> --Select here-- </option>';
        
        $strands = DB::table('strand')->where('track_id',$request['track_id'])->get();
        
        if($strands !=null)
        {
            foreach ($strands as $strand) {
                $html .= '<option value="'.$strand->id.'">'.$strand->strand_name.'</option>';
            }
        }                

        return response()->json(['html' => $html]);
    }
}
