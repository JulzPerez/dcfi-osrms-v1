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
                    $provinces = DB::table('province')->get();

                    $ethnicities = DB::table('ethnicity')->get();
                    $mother_tongues = DB::table('mother_tongue')->get();
                    $modalities = DB::table('modality')->get(); 

                    return view('student.create', compact('provinces','ethnicities','mother_tongues','modalities'));  
                }
                else 
                {                
                    $student = DB::table('student')
                    ->where('user_id', '=', $userid)
                    ->first();  

                    $ethnicity_name = DB::table('ethnicity')->where('id',$student->ethnicity_id)->first()->name;
                    $modality_name = DB::table('modality')->where('id',$student->modality_id)->first()->name;
                    $mother_tongue_name = DB::table('mother_tongue')->where('id',$student->mother_tongue_id)->first()->name; 

                    //dd($ethnicity_name);
                    return view('student.index', compact('student','ethnicity_name','modality_name','mother_tongue_name'));
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
        //dd($request);
        $this->validate($request, [
            'first_name' => 'required|string|max:191',
            'middle_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'contact_no' => 'required|string',
            'sex' => 'required|string|max:191',
            'age' => 'required|numeric|max:191',
            'birthdate' => 'required',
            'birth_place' => 'required|string|max:191',
            'citizenship' => 'required|string|max:191',
            'no_siblings' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'birth_order' => 'required|string|max:191',
            //'purok' => 'required|string|max:191',
          
            //'city' => 'required|string|max:191',  
            //'municipality' => 'required|string|max:191', 
            //'province' => 'required|string|max:191',  

            //'father' => 'required|string',
            //'mother' => 'required|string',
          
            
            //'ethnicity' => 'required',
            //'modality' => 'required',
            //'mother_tongue' => 'required',
            
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
           
            //'municipality.required' => 'Required field', 
            //'province.required' => 'Required field',

            //'father.required' => 'Required Field',
            //'mother.required' => 'Required Field',

            //'ethnicity.required' => 'Required field',
            //'modality.required' => 'Required field',
            //'mother_tongue.required' => 'Required field',
            
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
            'age' => $request['age'],
            'birthday' => $request['birthdate'],
            'birthplace' => $request['birth_place'],
            'citizenship' => $request['citizenship'],
            'religion' => $request['religion'],
            'no_siblings' => $request['no_siblings'],
            'birth_order' => $request['birth_order'],
            'purok' => $request['purok'],
           
            'municipality_no' => $request['municipality'], 
            'city_no' => $request['city'],
            //'province' => $request['province'],

            //'father_fullname' => $request['father'],
            //'mother_fullname' => $request['mother'],
            //'father_occupation' => $request['father_occupation'],
            //'mother_occupation' => $request['mother_occupation'],

            'ethnicity_id' => $request['ethnicity'],
            'modality_id' => $request['modality'],
            'mother_tongue_id' => $request['mother_tongue'],
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

            /* $ethnicities = DB::table('ethnicity')->get();
            $mother_tongues = DB::table('mother_tongue')->get();
            $modalities = DB::table('modality')->get();
 */
            //dd($eth_id);

            //$stud = collect($student);       

            return view('student.edit', compact('student','ethnicities','mother_tongues','modalities'));
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
            //'municipality' => 'required|string|max:191', 
            //'province' => 'required|string|max:191',           
            
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
            
            //'municipality.required' => 'Required field', 
            //'province.required' => 'Required field',
            
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
        $stud->birthday = $request['birthdate'];
        $stud->birthplace = $request['birth_place'];
        $stud->citizenship = $request['citizenship'];
        $stud->no_siblings = $request['no_siblings'];
        $stud->religion = $request['religion'];
        $stud->birth_order = $request['birth_order']; 
        $stud->purok = $request['purok']; 
       
        //$stud->municipality = $request['municipality']; 
        //$stud->province = $request['province']; 

        //$stud->father_fullname = $request['father_fullname']; 
        //$stud->mother_fullname = $request['mother_fullname']; 
        //$stud->father_occupation = $request['father_occupation']; 
        //$stud->mother_occupation = $request['mother_occupation']; 
        
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

    public function getMunicipalityByProvince(Request $request)
    {
        $html = '';

        $html .= '<option value=""> --Select here--</option>';
        
        $municipalities = DB::table('municipality')->where('province_no',$request['province_no'])->get();
        
        //dd($places);

        foreach ($municipalities as $municipality) {
            $html .= '<option value="'.$municipality->number.'">'.$municipality->name.'</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function getCityByProvince(Request $request)
    {
        $html = '';

        $html .= '<option value=""> --Select here--</option>';
        
        $cities = DB::table('city')->where('province_no',$request['province_no'])->get();
        
        //dd($places);

        foreach ($cities as $city) {
            $html .= '<option value="'.$city->number.'">'.$city->name.'</option>';
        }

        return response()->json(['html' => $html]);
    }
}
