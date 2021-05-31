@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row ">
      <div class="col-sm-12">
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <!-- <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul> -->
              <p>
              Please fill-in required information!
              </p>
            </div><br />
          @endif
            
        </div>
      </div>
    </div>
    
      <div class="row ">
        <div class="col-md-12">
            <div class="card">
            
                <form method="POST" action="{{route('student.store')}}">
                @csrf
                    <div class="card-body">
                    <h5 style="color:blue;">Student Info</h5> 
                      <hr class="my-12"/>
                      
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>LRN </label>
                            <input  type="text" class="form-control"  name="lrn" value="{{ old('lrn') }}">
                              
                              @error('lrn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror                            
                          </div>
                        </div>
                      </div>

                      <div class="row">                      
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>First Name <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"> 

                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif                          

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Middle Name <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                          
                            @if ($errors->has('middle_name'))
                                <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                            @endif 

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Last Name <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="last_name" value="{{ old('last_name') }}">
                            
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Suffix/Extension Name</label>
                            <input  type="text" class="form-control"  name="name_extension" value="{{ old('name_extension') }}">
                            
                            @if ($errors->has('name_extension'))
                                <span class="text-danger">{{ $errors->first('name_extension') }}</span>
                            @endif 
                            
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="col-form-label">Sex <strong class="text-red">*</strong></label>
                              <select class="form-control" name="sex" value="{{ old('sex') }}" data-placeholder="Select from options below" style="width: 100%;">
                                <option>Male</option>
                                <option>Female</option>                             
                                
                              </select>
                              
                              @if ($errors->has('sex'))
                                <span class="text-danger">{{ $errors->first('sex') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">                  
                          <div class="form-group">
                              <label>Date of Birth <strong class="text-red">*</strong></label>                             
                              <input type="date" class="date form-control" name="birthdate" value="{{ old('birthdate') }}">
                            
                              @if ($errors->has('birthdate'))
                                <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                              @endif                            
                          </div>  
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Place of Birth <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}">
                            
                              @if ($errors->has('birth_place'))
                                <span class="text-danger">{{ $errors->first('birth_place') }}</span>
                              @endif                              
                          </div>
                        </div> 

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Citizenship <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control" name="citizenship" value="{{ old('citizenship') }}">
                            
                              @if ($errors->has('citizenship'))
                                <span class="text-danger">{{ $errors->first('citizenship') }}</span>
                              @endif
                            
                          </div>
                        </div> 
                      </div>  
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Contact Number <strong class="text-red">*</strong></label>
                              <input  type="text" class="form-control"  name="contact_no" value="{{ old('contact_no') }}">
                              
                              @if ($errors->has('contact_no'))
                                <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                              @endif

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Number of siblings <strong class="text-red">*</strong></label>
                              <input  type="text" class="form-control"  name="no_siblings" value="{{ old('no_siblings') }}">
                              
                              @if ($errors->has('no_siblings'))
                                <span class="text-danger">{{ $errors->first('no_siblings') }}</span>
                              @endif

                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Birth Order <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="birth_order" value="{{ old('birth_order') }}">
                            
                              @if ($errors->has('birth_order'))
                                <span class="text-danger">{{ $errors->first('birth_order') }}</span>
                              @endif
                            
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Religion <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="religion" value="{{ old('religion') }}">
                              
                              @if ($errors->has('religion'))
                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                              @endif                            
                          </div>
                        </div>
                        
                      </div>  
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Purok/Street </label>
                              <input  type="text" class="form-control"  name="purok" value="{{ old('purok') }}">
                              
                              @if ($errors->has('purok'))
                                <span class="text-danger">{{ $errors->first('purok') }}</span>
                              @endif 

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Municipality/City <strong class="text-red">*</strong></label>
                              <input  type="text" class="form-control"  name="municipality" value="{{ old('municipality') }}">
                              
                              @if ($errors->has('municipality'))
                                <span class="text-danger">{{ $errors->first('municipality') }}</span>
                              @endif 

                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Province <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="province" value="{{ old('province') }}">
                            
                              @if ($errors->has('province'))
                                <span class="text-danger">{{ $errors->first('province') }}</span>
                              @endif 
                            
                          </div>
                        </div>    
                      </div>  
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Father <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="father" value="{{ old('father') }}">
                            
                              @if ($errors->has('father'))
                                <span class="text-danger">{{ $errors->first('father') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Occupation of Father <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="father_occupation" value="{{ old('father_occupation') }}">
                            
                              @if ($errors->has('father_occupation'))
                                <span class="text-danger">{{ $errors->first('father_occupation') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Mother <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="mother" value="{{ old('mother') }}">
                            
                              @if ($errors->has('mother'))
                                <span class="text-danger">{{ $errors->first('mother') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Occupation of Mother <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="mother_occupation" value="{{ old('mother_occupation') }}">
                            
                              @if ($errors->has('mother_occupation'))
                                <span class="text-danger">{{ $errors->first('mother_occupation') }}</span>
                              @endif 
                            
                          </div>
                        </div>                        
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Ethnicity <strong class="text-red">*</strong></label>
                              <select class="form-control " name="ethnicity"  style="width: 100%;">
                                    
                                    @foreach($ethnicities as $ethnicity)
                                        <option value="{{$ethnicity->id}}"> {{$ethnicity->name}} </option>
                                    @endforeach
                              </select>

                              @if ($errors->has('ethnicity'))
                                <span class="text-danger">{{ $errors->first('ethnicity') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label> Mother Tounge <strong class="text-red">*</strong></label>
                              <select class="form-control " name="mother_tounge"  style="width: 100%;">
                                    
                                    @foreach($mother_tounges as $mother_tounge)
                                        <option value="{{$mother_tounge->id}}"> {{$mother_tounge->name}} </option>
                                    @endforeach
                              </select>

                              @if ($errors->has('mother_tounge'))
                                <span class="text-danger">{{ $errors->first('mother_tounge') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Modality <strong class="text-red">*</strong></label>
                              <select class="form-control " name="modality"  style="width: 100%;">
                                    
                                    @foreach($modalities as $modality)
                                        <option value="{{$modality->id}}"> {{$modality->name}} </option>
                                    @endforeach
                              </select>

                              @if ($errors->has('modality'))
                                <span class="text-danger">{{ $errors->first('modality') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                                               
                      </div>
                                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
                
            </div>
            <!-- /.card -->
          </div>
      </div>    

</div>
@endsection