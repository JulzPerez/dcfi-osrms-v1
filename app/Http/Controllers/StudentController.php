<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $userid = \Auth::user()->id;
            
            if(\Gate::allows('isProspectiveStudent') || \Gate::allows('isStudent'))
            {

                if (DB::table('student')->where('user_id', $userid )->doesntExist() ) 
                {
                    return view('student.create');  
                }
                else 
                {                
                    $student = DB::table('student')
                    ->where('user_id', '=', $userid)
                    ->first();  

                    return view('student.index', compact('student'));
                }
                  
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'first_name' => 'required|string|max:191',
            'middle_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'contact_no' => 'required|string',
            'sex' => 'required|string|max:191',
            'birthdate' => 'required',
            'birth_place' => 'required|string|max:191',
            'citizenship' => 'required|string|max:191',
            'no_siblings' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'birth_order' => 'required|string|max:191',
            //'purok' => 'required|string|max:191',
          
            'municipality' => 'required|string|max:191',  
            'province' => 'required|string|max:191',         
            
        ], 
            [
            'first_name.required' => 'Required field',
            'middle_name.required' => 'Required field',
            'last_name.required' => 'Required field',
            'contact_no.required' => 'Required field',
            'sex.required' => 'Required field',
            'birthdate.required' => 'Required field',
            'birth_place.required' => 'Required field',
            'citizenship.required' => 'Required field',
            'no_siblings.required' => 'Required field',
            'religion.required' => 'Required field',
            'birth_order.required' => 'Required field',
            //'purok.required' => 'Required field',
           
            'municipality.required' => 'Required field', 
            'province.required' => 'Required field',
            
            ]
        );

        $userid = \Auth::user()->id; 
        $studentID = date('Y').'-'.mt_rand(100000,500000);
    
        Student::create([
            'id' => $studentID,
            'user_id' => $userid, 
            'LRN' => $request['lrn'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'name_extension' => $request['name_extension'],
            'contact_no' => $request['contact_no'],
            'sex' => $request['sex'],
            'birthdate' => $request['birthdate'],
            'birthplace' => $request['birth_place'],
            'citizenship' => $request['citizenship'],
            'religion' => $request['religion'],
            'no_siblings' => $request['no_siblings'],
            'birth_order' => $request['birth_order'],
            'purok' => $request['purok'],
           
            'municipality' => $request['municipality'], 
            'province' => $request['province'],
        ]);

        return redirect('/student')->with('success', 'Record saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Gate::allows('isProspectiveStudent') || \Gate::allows('isStudent') )
        {
            $student = Student::find($id);

            $stud = collect($student);       

            return view('student.edit', compact('student'));
        } 
       
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
        $this->validate($request, [
            'first_name' => 'required|string|max:191',
            'middle_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
           
            'contact_no' => 'required|string',
            'sex' => 'required|string|max:191',
            'birthdate' => 'required',
            'birth_place' => 'required|string|max:191',
            'citizenship' => 'required|string|max:191',
            'no_siblings' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'birth_order' => 'required|string|max:191',
            //'purok.required' => 'Required field',
            'municipality' => 'required|string|max:191', 
            'province' => 'required|string|max:191',           
            
        ], 
            [
            'first_name.required' => 'Required field',
            'middle_name.required' => 'Required field',
            'last_name.required' => 'Required field',
          
            'contact_no.required' => 'Required field',
            'sex.required' => 'Required field',
            'birthdate.required' => 'Required field',
            'birth_place.required' => 'Required field',
            'citizenship.required' => 'Required field',
            'no_siblings.required' => 'Required field',
            'religion.required' => 'Required field',
            'birth_order.required' => 'Required field',
            //'purok.required' => 'Required field',
            
            'municipality.required' => 'Required field', 
            'province.required' => 'Required field',
            
            ]
        );

        $stud = Student::find($id);
        $stud->lrn = $request['lrn'];
        $stud->first_name = $request['first_name'];
        $stud->middle_name = $request['middle_name'];
        $stud->last_name = $request['last_name'];
        $stud->name_extension = $request['name_extension'];
        $stud->contact_no = $request['contact_no'];
        $stud->sex = $request['sex'];
        $stud->birthdate = $request['birthdate'];
        $stud->birthplace = $request['birth_place'];
        $stud->citizenship = $request['citizenship'];
        $stud->no_siblings = $request['no_siblings'];
        $stud->religion = $request['religion'];
        $stud->birth_order = $request['birth_order']; 
        $stud->purok = $request['purok']; 
       
        $stud->municipality = $request['municipality']; 
        $stud->province = $request['province']; 
        
        $stud->save();

        return redirect('/student')->with('success', 'Record updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
