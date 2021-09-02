<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetStudentRequirementsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Gate::allows('isRegistrar') )
        {
            return view('downloadStudentRequirements.searchForm');
        }
    }

    public function getStudentList(Request $request)
    {      
        //dd($request['searchBy_lastname']);
        if(\Gate::allows('isRegistrar') )
        {
            if($request['searchBy'] == 'ID')
            {
                $result = DB::table('student')
                    ->where('id',$request['searchBy_ID'])
                    ->get();
            }
            else 
            {
                $result = DB::table('student')
                    ->where('last_name',$request['searchBy_lastname'])
                    ->get();
            }
        //dd($result);
            return view('downloadStudentRequirements.viewSearchResult', compact('result'));

        }
    }

    public function getStudentRequirements($id)
    {
        if(\Gate::allows('isRegistrar') )
        {
            $requirements = DB::table('upload_requirements')
                        ->where('student_id',$id)
                        ->get();
        //dd($requirements);
            return view('downloadStudentRequirements.viewStudentRequirements', compact('requirements'));
        }
        
    }

    public function downloadDocument($id)
    {
        $file = storage_path('app/public/student_requirements/' . $id);
    
        if(!file_exists($file))
        {
            return response()->json(['msg'=>"File does not exist"]);
        }
        else
        {
            return response()->download($file);
        }
        
    }

    public function getAllStudentList()
    {
        if(\Gate::allows('isRegistrar') )
        {
            /* $result = DB::table('upload_requirements')
                        ->join('student', 'upload_requirements.student_id','=','student.id')
                        ->get();  */    
                $result = DB::table('student')->orderBy('last_name')->get(); 
        
            return view('downloadStudentRequirements.viewSearchResult', compact('result'));

        }
    }
}
