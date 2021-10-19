<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            if(\Gate::allows('isProspectiveStudent') || \Gate::allows('isStudent'))
            {
                $userid = \Auth::user()->id; 
                $student = DB::table('student')                
                            ->where('user_id', $userid )
                            ->first();

                    if ( $student == null ) 
                    {

                        $student_exist = false;

                        return view('student.index', compact('student_exist'));  
                    }
                    else 
                    {             

                        //$ethnicity_name = 
                        
                        $ethnicity = DB::table('ethnicity')->where('id',$student->ethnicity_id)->first();

                        if($ethnicity != null)
                        {
                            $ethnicity_name = $ethnicity->name;
                        }
                        else{
                            $ethnicity_name = null;
                        }
                        
                        
                        $mother_tongue_name = DB::table('mother_tongue')->where('id',$student->mother_tongue_id)->first()->name; 


                         
                        $religion = DB::table('religion')->where('id',$student->religion)->first();

                        if($religion != null)
                        {
                            $religion_name = $religion->Name;
                        }
                        else{
                            $religion_name = null;
                        }

                        $father = DB::table('parent')
                                        ->join('guardian','parent.id','=','guardian.father_id')
                                        ->select('parent.*')
                                        ->where('guardian.id',$student->guardian_id)
                                        ->first();

                        $mother = DB::table('parent')
                                        ->join('guardian','parent.id','=','guardian.mother_id')
                                        ->select('parent.*')
                                        ->where('guardian.id',$student->guardian_id)
                                        ->first();   
                        
                        $guardian = DB::table('parent')
                                        ->join('guardian','parent.id','=','guardian.guardian_id')
                                        ->select('parent.*')
                                        ->where('guardian.id',$student->guardian_id)
                                        ->first(); 
                        //dd($mother);

                        $city = DB::table('city')
                                        ->join('province','city.province_no','=','province.number')
                                        ->select('city.*','province.*','city.name as city_name')
                                        ->where('city.number',$student->city_no)
                                        ->first();
                            
                            //dd($city);

                            if($city != null)
                            {
                                $city_name = $city->city_name;
                                $province_name = $city->name;
                            } 
                            else{
                                $city_name = null;
                            }                       
                        

                        $student_exist = true; 

                        return view('student.index', compact('student_exist','student','ethnicity_name', 'mother_tongue_name','religion_name','father','mother','guardian','city_name', 'province_name')) ;
                   
                            
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
            $provinces = DB::table('province')->get();

            $ethnicities = DB::table('ethnicity')->get();
            $mother_tongues = DB::table('mother_tongue')->get();
            $religions = DB::table('religion')->get();             

            return view('student.create', compact('provinces','ethnicities', 'mother_tongues','religions' )); 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(session('religion_name'));
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:191',
            'middle_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
           
            'contact_no' => 'required|string',
            'sex' => 'required|string|max:191',
            'age' => 'required|numeric',
            'birthdate' => 'required',
            'birth_place' => 'required|string|max:191',
            'citizenship' => 'required|string|max:191',
            'no_siblings' => 'required|numeric|max:191',
            'religion' => 'required|string|max:191',
            'birth_order' => 'required|numeric|max:191',
            'purok' => 'required',
            'province' => 'required|string|max:191', 
            'ethnicity' => 'required',
            //'modality.required' => 'Required field',
            'mother_tongue' => 'required',

            'father_first' => 'required',
            'father_middle' => 'required',
            'father_last' => 'required',
            'father_occupation' => 'required',
            'father_contact' => 'required',
            
            
            'mother_first' => 'required',
            'mother_middle' => 'required',
            'mother_last' => 'required',
            'mother_occupation' => 'required',
            'mother_contact' => 'required',

            'guardian_first' => 'required',
            'guardian_middle' => 'required',
            'guardian_last' => 'required',
            'guardian_occupation' => 'required',
            'guardian_contact' => 'required',


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
        'purok.required' => 'Required field',
       
        'province.required' => 'Required field',

        'father_first.required' => 'Required field',
        'father_middle.required' => 'Required field',
        'father_last.required' => 'Required field',
        'father_occupation.required' => 'Required field',
        'father_contact.required' => 'Required field',
        
        
        'mother_first.required' => 'Required field',
        'mother_middle.required' => 'Required field',
        'mother_last.required' => 'Required field',
        'mother_occupation.required' => 'Required field',
        'mother_contact.required' => 'Required field',

        'guardian_first.required' => 'Required field',
        'guardian_middle.required' => 'Required field',
        'guardian_last.required' => 'Required field',
        'guardian_occupation.required' => 'Required field',
        'guardian_contact.required' => 'Required field',

        'ethnicity.required' => 'Required field',
        //'modality.required' => 'Required field',
        'mother_tongue.required' => 'Required field',
        
        ]
    );

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else{

            $userid = \Auth::user()->id;
            $studentID = date('Y').'-'.mt_rand(100000 ,599999);
            
            try
            {
                $query = DB::table('student')->insert([
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
                    //'municipality_no' => $request['municipality'],
                    'city_no' => $request['city'],
    
                    'ethnicity_id' => $request['ethnicity'],
                    'mother_tongue_id' => $request['mother_tongue'],
                            
                ]);

                $father_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['father_first'],
                        'middle_name' => $request['father_middle'],
                        'last_name' => $request['father_last'],
                        'name_extension' => $request['father_extension'],
                        'occupation' => $request['father_occupation'],
                        'contact_no' => $request['father_contact'],
                    
                    ]
                );

                $mother_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['mother_first'],
                        'middle_name' => $request['mother_middle'],
                        'last_name' => $request['mother_last'],
                        'name_extension' => $request['mother_extension'],
                        'occupation' => $request['mother_occupation'],
                        'contact_no' => $request['mother_contact'],                        
                    ]
                );

                $guardian_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['guardian_first'],
                        'middle_name' => $request['guardian_middle'],
                        'last_name' => $request['guardian_last'],
                        'name_extension' => $request['guardian_extension'],
                        'occupation' => $request['guardian_occupation'],
                        'contact_no' => $request['guardian_contact'],
                    
                    ]
                );

                $guardianID = DB::table('guardian')->insertGetId(
                    [
                        'mother_id' => $mother_id,
                        'father_id' => $father_id,
                        'guardian_id' => $guardian_id,                                              
                    ]
                );
                
                $affected = DB::table('student')
                    ->where('id', $studentID)
                    ->update(['guardian_id' => $guardianID]);

            }
            catch(\Illuminate\Database\QueryException $ex)
            { 
                dd($ex->getMessage()); 
            }
            catch(\PDOException $exception)
            {
                dd($exception->getMessage());
            }

            if( $query ){
                session(['student_id' => $studentID]);
                return response()->json(['status'=>1, 'msg'=>'The record has been successfully added!']);
            }
            else{
                return response()->json(['status'=>0, 'msg'=>'Something went wrong!']);
            }
        }       
            
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
            try{
                $student = Student::find($id);

                $ethnicities = DB::table('ethnicity')->get();
                $mother_tongues = DB::table('mother_tongue')->get();
                $modalities = DB::table('modality')->get();   
                $provinces = DB::table('province')->get();
                $religions = DB::table('religion')->get();   
            }
            catch(\PDOException $exception)
            {
                dd($exception->getMessage());
            }

            return view('student.edit', compact('student','ethnicities','mother_tongues','modalities','provinces', 'religions'));
            
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

        $validator = Validator::make($request->all(),[
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


        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else{

            try
            {
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
                
                $stud->save();

            }
            catch(\PDOException $exception)
            {
                dd($exception->getMessage());
            }

            if( $stud ){
                return response()->json(['status'=>1, 'msg'=>'The record has been successfully updated!']);
            }
            else{
                return response()->json(['status'=>0, 'msg'=>'Something went wrong!']);
            }
        }

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

    public function getLocalityByProvince(Request $request)
    {
        $html = '';

        $html .= '<option value=""> --Select here--</option>';

        $localities = DB::table('city')->where('province_no',$request['province_no'])->get();

        if(!$localities->isEmpty())
        {
            foreach ($localities as $locality) 
            {
                $html .= '<option value="'.$locality->number.'">'.$locality->name.'</option>';
            }
        }
        else{
            $html .= '<option value="">No existing list of places. </option>';
        }
       
               

        return response()->json(['html' => $html]);
    }

    public function getCityByProvince(Request $request)
    {
        $html = '';

        $html .= '<option value=""> --Select here--</option>';
        
        $cities = DB::table('city')->where('province_no',$request['province_no'])->get();
       
        foreach ($cities as $city) {
            $html .= '<option value="'.$city->number.'">'.$city->name.'</option>';
        }

        return response()->json(['html' => $html]);
    }

    public function searchIDForm()
    {
        return view('student.searchIDForm');
    }

    public function getFamilyInfo($id)
    {
    
        try{
            $father = DB::table('student')
                            ->join('guardian', 'student.guardian_id', '=', 'guardian.id')
                            ->join('parent', 'guardian.father_id', '=', 'parent.id')
                            ->where('student.id',$id)
                            ->first();

            $mother = DB::table('student')
                            ->join('guardian', 'student.guardian_id', '=', 'guardian.id')
                            ->join('parent', 'guardian.mother_id', '=', 'parent.id')
                            ->where('student.id',$id)
                            ->first();

            $guardian = DB::table('student')
                            ->join('guardian', 'student.guardian_id', '=', 'guardian.id')
                            ->join('parent', 'guardian.guardian_id', '=', 'parent.id')
                            ->where('student.id',$id)
                            ->first();

        }
        catch(\PDOException $exception)
            {
                dd($exception->getMessage());
            }

        return view('student.family', compact('father', 'mother', 'guardian','id'));
        
       
    }

    public function updateFamilyInfo($id)
    {

    }

    public function addGuardian(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:191',
            'middle_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'occupation' => 'required|string|max:191',
            'contact_no' => 'required|string',  
        ], 
        [
            'first_name.required' => 'Required field',
            'middle_name.required' => 'Required field',
            'last_name.required' => 'Required field',
            'occupation.required' => 'Required field',
            'contact_no.required' => 'Required field',
        ]
    );

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
        else{

          
            try
            {
                $query = DB::table('student')->insert([
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
                    //'municipality_no' => $request['municipality'],
                    'city_no' => $request['city'],
    
                    'ethnicity_id' => $request['ethnicity'],
                    'mother_tongue_id' => $request['mother_tongue'],
                            
                ]);

                $father_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['father_first'],
                        'middle_name' => $request['father_middle'],
                        'last_name' => $request['father_last'],
                        'name_extension' => $request['father_extension'],
                        'occupation' => $request['father_occupation'],
                        'contact_no' => $request['father_contact'],
                    
                    ]
                );

                $mother_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['mother_first'],
                        'middle_name' => $request['mother_middle'],
                        'last_name' => $request['mother_last'],
                        'name_extension' => $request['mother_extension'],
                        'occupation' => $request['mother_occupation'],
                        'contact_no' => $request['mother_contact'],                        
                    ]
                );

                $guardian_id = DB::table('parent')->insertGetId(
                    [
                        'first_name' => $request['guardian_first'],
                        'middle_name' => $request['guardian_middle'],
                        'last_name' => $request['guardian_last'],
                        'name_extension' => $request['guardian_extension'],
                        'occupation' => $request['guardian_occupation'],
                        'contact_no' => $request['guardian_contact'],
                    
                    ]
                );

                $guardianID = DB::table('guardian')->insertGetId(
                    [
                        'mother_id' => $mother_id,
                        'father_id' => $father_id,
                        'guardian_id' => $guardian_id,                                              
                    ]
                );
                
                $affected = DB::table('student')
                    ->where('id', $studentID)
                    ->update(['guardian_id' => $guardianID]);

            }
            catch(\Illuminate\Database\QueryException $ex)
            { 
                dd($ex->getMessage()); 
            }
            catch(\PDOException $exception)
            {
                dd($exception->getMessage());
            }

            if( $query ){
                session(['student_id' => $studentID]);
                return response()->json(['status'=>1, 'msg'=>'The record has been successfully added!']);
            }
            else{
                return response()->json(['status'=>0, 'msg'=>'Something went wrong!']);
            }
        }       
    }


}
