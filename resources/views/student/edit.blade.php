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
            
                <form method="POST" action="{{ route('student.update',$student->id) }} ">
                @method('PATCH')
                @csrf
                    <div class="card-body">
                      <h5 style="color:blue;">Student Information</h5> 
                      <hr class="my-12"/>

                      <div class="row">
                        <div class="col-md-3">
                              <div class="form-group">
                                <label>ID Number</label>
                                <input  type="text" class="form-control" name="id_no" value="{{ $student->id}}" disabled>
                      
                              </div>                            
                        </div>
                        <div class="col-md-3">
                              <div class="form-group">
                                <label>LRN</label>
                                <input  type="text" class="form-control" name="lrn" value="{{ $student->lrn}}" >
                      
                              </div>                            
                        </div>
                      </div>
                      <div class="row">                      
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>First Name</label>
                            <input  type="text" class="form-control" name="first_name" value="{{ $student->first_name }}"> 

                              @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                              @endif                         

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Middle Name</label>
                            <input  type="text" class="form-control" name="middle_name" value="{{ $student->middle_name }}">
                          
                              @if ($errors->has('middle_name'))
                                <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                              @endif

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input  type="text" class="form-control"  name="last_name" value="{{ $student->last_name }}">
                            
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                              @endif                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Suffix/Extension Name</label>
                            <input  type="text" class="form-control"  name="name_extension" value="{{ $student->name_extension }}">
                            
                            @if ($errors->has('name_extension'))
                                <span class="text-danger">{{ $errors->first('name_extension') }}</span>
                              @endif
                            
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label class="col-form-label">Sex</label>
                              <select class="form-control" name="sex" value="{{ $student->sex }}" data-placeholder="Select from options below" style="width: 100%;">
                                <option {{ ($student->sex) == 'Male' ? 'selected' : '' }}  value="Male">Male</option>
                                <option {{ ($student->sex) == 'Female' ? 'selected' : '' }}  value="Female">Female</option>                                 
                              </select>
                              
                              @if ($errors->has('sex'))
                                <span class="text-danger">{{ $errors->first('sex') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">                  
                          <div class="form-group">
                              <label>Date of Birth</label>                             
                              <input type="date" class="date form-control" name="birthdate" value="{{ $student->birthdate }}">
                            
                              @if ($errors->has('birthdate'))
                                <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                              @endif                            
                          </div>  
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Place of Birth</label>
                            <input  type="text" class="form-control" name="birth_place" value="{{ $student->birthplace }}">
                            
                              @if ($errors->has('birth_place'))
                                <span class="text-danger">{{ $errors->first('birth_place') }}</span>
                              @endif                             
                          </div>
                        </div> 

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Citizenship</label>
                            <input  type="text" class="form-control" name="citizenship" value="{{ $student->citizenship }}">
                            
                              @if ($errors->has('citizenship'))
                                <span class="text-danger">{{ $errors->first('citizenship') }}</span>
                              @endif  
                            
                          </div>
                        </div> 
                      </div>  
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Contact Number</label>
                              <input  type="text" class="form-control"  name="contact_no" value="{{ $student->contact_no }}">
                              
                              @if ($errors->has('contact_no'))
                                <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                              @endif

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Number of siblings</label>
                              <input  type="text" class="form-control"  name="no_siblings" value="{{ $student->no_siblings }}">
                              
                              @if ($errors->has('no_siblings'))
                                <span class="text-danger">{{ $errors->first('no_siblings') }}</span>
                              @endif

                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Birth Order</label>
                            <input  type="text" class="form-control"  name="birth_order" value="{{ $student->birth_order }}">
                            
                              @if ($errors->has('birth_order'))
                                <span class="text-danger">{{ $errors->first('birth_order') }}</span>
                              @endif
                            
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Religion</label>
                            <input  type="text" class="form-control"  name="religion" value="{{ $student->religion }}">
                              
                            @if ($errors->has('religion'))
                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                              @endif                            
                          </div>
                        </div>
                        
                      </div> 
        
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Purok/Street</label>
                              <input  type="text" class="form-control"  name="purok" value="{{$student->purok}}">
                              
                              @if ($errors->has('purok'))
                                <span class="text-danger">{{ $errors->first('purok') }}</span>
                              @endif

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Municipality/City <strong class="text-red">*</strong></label>
                              <input  type="text" id="municipality" class="form-control"  name="municipality" value="{{$student->municipality}}">
                              
                              @if ($errors->has('municipality'))
                                <span class="text-danger">{{ $errors->first('municipality') }}</span>
                              @endif

                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Province <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="province" value="{{$student->province}}">
                            
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
                            <input  type="text" class="form-control"  name="father" value="{{ $student->father_fullname }}">
                            
                              @if ($errors->has('father'))
                                <span class="text-danger">{{ $errors->first('father') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Occupation of Father <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="father_occupation" value="{{ $student->father_occupation }}">
                            
                              @if ($errors->has('father_occupation'))
                                <span class="text-danger">{{ $errors->first('father_occupation') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Mother <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="mother" value="{{ $student->mother_fullname }}">
                            
                              @if ($errors->has('mother'))
                                <span class="text-danger">{{ $errors->first('mother') }}</span>
                              @endif 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Occupation of Mother <strong class="text-red">*</strong></label>
                            <input  type="text" class="form-control"  name="mother_occupation" value="{{ $student->mother_occupation }}">
                            
                              @if ($errors->has('mother_occupation'))
                                <span class="text-danger">{{ $errors->first('mother_occupation') }}</span>
                              @endif 
                            
                          </div>
                        </div>                        
                      </div>

                                   
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                      <a href="/student">
                        <button type="button" class="btn btn-primary float-right">Cancel</button>
                      </a>
                    
                    </div>
                    
                </form>
                
            </div>
            <!-- /.card -->
          </div>
      </div>    

</div>
@endsection