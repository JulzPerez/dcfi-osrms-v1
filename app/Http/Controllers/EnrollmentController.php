<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrollment;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

    public function index()
    {
        $userid = \Auth::user()->id;
        $student = Student::where('user_id',$userid)->first();
        
        if($student != null)
        {
            $student_exist = true;

            $SY = DB::table('school_year')->where('current',1)->first();
            $year = $SY->SY;

            $student_id = $student->id;
            $enrollment = DB::table('enrollment')
                ->where('student_id', $student_id)
                ->where('SY',$year)
                ->first();            
        }
        else
        {
            $student_exist = false;            
        }

        return view('enrollment.index', compact('student_exist','enrollment'));              
        
    }

    public function enroll(Request $request)
    {
        //dd($request);
/* 
        $checkSHS = $request['track_strand_flag'];
        if($checkSHS == "on")
        {
            $this->validate($request, [
                'track' => 'required',
                'strand' => 'required',
                'SY' => 'required',
                'level' => 'required',
                'modality' => 'required',
                'category' => 'required',
                'semester' => 'required',
            ]);
        } 
         else{
             $this->validate($request, [                
                'school_year' => 'required',
                'level' => 'required',
                'modality' => 'required',
                'category' => 'required',
                'semester' => 'required', 
            ]); 
        }   */      
      

        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id; 

        DB::table('enrollment')->insert([
            'student_id' => $student_id,  
            'SY' => $request['SY'],
            'level_id' => $request['level'],
            'strand_id' => $request['strand'],
            'category' => $request['category'],
            'modality_id' => $request['modality'],
            'semester' => $request['semester'],
            
        ]);

        return redirect('/enrollment')->with('success', 'Record saved successfully!');     
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
