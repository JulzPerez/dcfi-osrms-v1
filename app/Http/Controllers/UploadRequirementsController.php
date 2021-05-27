<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\UploadRequirements;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class UploadRequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = \Auth::user()->id;
        $student = Student::where('user_id', $userid)->first();

        if($student != null)
        {
            $student_id = $student->id;
            $requirements = DB::table('upload_requirements')
                            ->where('student_id', '=', $student_id)
                            ->get(); 

            //dd($requirements);

            return view('document.index', compact('requirements'));
        }
        else
        {
            $requirements = null;
            return view('document.index', compact('requirements'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'doc_name' => 'required',
            'file' => 'required|file|mimes:zip,pdf,jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt',
        ]);

        $userid = \Auth::user()->id;

        $student = DB::table('student')
                        ->where('user_id', $userid)
                        ->first();
        $student_id = $student->id;
        
            $file = $request->file('file');

            if($file != null)
            {
                $filename = $student_id.'_'.time().'_'.$file->getClientOriginalName();          
                 // Save the file
                $path = $file->storeAs('student_requirements', $filename);
                //dd($path);
            }           
        
        UploadRequirements::create([
            'student_id' => $student_id,
            'name' => $request['doc_name'],
            'attachment' => $filename
        ]); 

        return redirect('/upload')->with('success', 'File uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Storage::get('student_requirements/'.$id);
        return response()->download(storage_path('app/public/student_requirements/' . $id));	
        //$file = Storage::get('student_requirements/'.$id);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* $doc = UploadRequirements::find($id);
        $doc->delete();

        return redirect('/users')->with('success', 'User deleted successfully!'); */
    }
}
