<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Student;

class GradesController extends Controller
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

            $SY = DB::table('school_year')
                    ->where('current',1)->first();
        
            if($student != null)
            {               
                $enrollment = DB::table('enrollment')
                    ->where('student_id', $student->id)
                    ->where('school_year_id',$SY->id)
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
                                    ->join('enrolled_subjects','subject_teacher.SubTeach_ID','=','enrolled_subjects.Subject_Teacher_ID')
                                    ->select('subject_teacher.*','subject.*', 'subject_group.*',
                                            'enrolled_subjects.1st_Grade_Rate as first_grading',
                                            'enrolled_subjects.2nd_Grade_Rate as second_grading',
                                            'enrolled_subjects.3rd_Grade_Rate as third_grading',
                                            'enrolled_subjects.4rth_Grade_Rate as fourth_grading',
                                            'enrolled_subjects.Final_Grade_Rate as final_grading')
                                    ->where('enrolled_subjects.Enrollment_ID', $enrollment->id)
                                    ->get();
                        
                        //dd($enrolledSubjects);
                        $academics = $enrolledSubjects->filter(function ($academics) {
                            return $academics->Name == 'Learning Areas';
                        });

                        $non_academics = $enrolledSubjects->filter(function ($non_academics) {
                            return $non_academics->Name == 'Non-Academic Activities';
                        });

                        $characters = $enrolledSubjects->filter(function ($characters) {
                            return $characters->Name == 'Character Building Activities';
                        });

                       /*  $SHS_academics = $enrolledSubjects->filter(function($SHS_academics){
                            return $SHS_academics->Name == 'Learning Areas' && $SHS_academics->Level_ID == '13' || $SHS_academics->Level_ID == '14';
                        }); */

                        //dd($SHS_academics);

                        return view('grades.index', compact('academics','non_academics','characters','SY'));
                    }
                    else{
                    
                        return view('grades.viewGrades',compact('SY'));
                    }
                    
                } 
                else{
                    return view('grades.viewGrades',compact('SY'));
                }

                      
            }
            else
            {
                return view('enrollment.noStudent','SY');
            }         

        }
        catch(\Illuminate\Database\QueryException $ex)
        { 
            dd($ex->getMessage()); 
        }
        
        
    }
}
