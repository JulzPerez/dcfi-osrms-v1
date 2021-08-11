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
}