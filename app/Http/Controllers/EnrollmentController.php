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
    
    public function index()
    {
        //$userid = session('user_id');
        try{

            $userid = \Auth::user()->id;
            $student = Student::where('user_id',$userid)->first();    
            
            
            if($student != null)
            {
                
                
                $enrollment = DB::table('enrollment')
                    ->where('student_id', $student->id)
                    ->where('school_year_id',session('school_year_id'))
                    ->first(); 
                
                if($enrollment != null)
                {
                    $enrollmentStatus = $enrollment->status;
                    $classSectionID = $enrollment->class_section_id;

                    if($enrollmentStatus == 'admitted')
                    {
                        $enrolledSubjects = DB::table('subject_teacher')
                                    ->join('subject','subject_teacher.Subject_ID','=','subject.Code')
                                    ->join('subject_group', 'subject.Subject_Group_ID','=','subject_group.ID')
                                    ->join('schedule','subject_teacher.Schedule_ID','=','schedule.ID')
                                    ->select('subject_teacher.*','subject.*', 'subject_group.*','schedule.*')
                                    ->where('subject_teacher.Class_Section_ID',$classSectionID)
                                    ->where('subject_group.Name','Learning Areas')
                                    ->get();
                        
                        

                        $student_exist=true;

                        //dd($enrolledSubjects);

                        return view('enrollment.enrolledSubjects', compact('enrolledSubjects'));
                    }
                    else{
                    
                        return view('enrollment.pendingEnrollment', compact('enrollment'));
                    }
                    
                } 
                      
            }
            else
            {
              
               
                return view('enrollment.noStudent');
            }         

        }
        catch(\Illuminate\Database\QueryException $ex)
        { 
            dd($ex->getMessage()); 
        }
        
        
    }

    public function enroll(Request $request)
    {
 
        $userid = \Auth::user()->id;
        $student_id = Student::where('user_id', $userid)->first()->id; 

        $enrollment = DB::table('enrollment')->insert([
            'student_id' => $student_id,  
            'school_year_id' => session('school_year_id'),
            'level_id' => $request['level'],
            'strand_id' => $request['strand'],
            'category' => $request['category'],
            'modality_id' => $request['modality'],
            'semester' => $request['semester'],            
        ]);

        //dd($enrollment);
        //session $enrollment_id

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
