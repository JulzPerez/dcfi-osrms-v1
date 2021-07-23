<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrollment;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

    public function index()
    {
        //$userid = \Auth::user()->id;
        //$student = Student::where('user_id',$userid)->first();
        $userid = session('user_id');
        
        
        if(session('student_id') != null)
        {
            $student_exist = true;
            
            $SY = DB::table('school_year')->where('current',1)->first();
            $SY_id = $SY->id;

            //$student_id = $student->id;
            $enrollment = DB::table('enrollment')
                ->where('student_id', session('student_id'))
                ->where('school_year_id',$SY_id)
                ->first();            
        }
        else
        {
            $enrollment = null;
            $student_exist = false;            
        }

        return view('enrollment.index', compact('student_exist','enrollment'));              
        
    }

    public function enroll(Request $request)
    {
 
        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id; 

        $enrollment_id = DB::table('enrollment')->insertGetId([
            'student_id' => $student_id,  
            'school_year_id' => $request['school_year_id'],
            'level_id' => $request['level'],
            'strand_id' => $request['strand'],
            'category' => $request['category'],
            'modality_id' => $request['modality'],
            'semester' => $request['semester'],            
        ]);
        //session $enrollment_id

        return redirect('/enrollment')->with('success', 'Record saved successfully!');     
    }

    public function create_enrollForm()
    {
        /* $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id; */


        if(session('student_id') == null)
        {
            $no_student_record = true;
            return view('enrollment.create', compact('no_student_record'));  
        }
        else
        {
            $SY = session('school_year_name');   
    
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

    public function getModality(Request $request)
    {
        $html = '';
        $html .= '<option value=""> --Select here-- </option>';
        
        $modalities = DB::table('modality')->get();
        
        if($modalities !=null)
        {
            foreach ($modalities as $modality) {
                $html .= '<option value="'.$modality->id.'">'.$modality->name.'</option>';
            }
        }                

        return response()->json(['html' => $html]);
    }
}
