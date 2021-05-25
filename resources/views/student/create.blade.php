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
                            <label>First Name</label>
                            <input  type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"> 

                            @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                          

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Middle Name</label>
                            <input  type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                          
                            @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror 

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input  type="text" class="form-control"  name="last_name" value="{{ old('last_name') }}">
                            
                            @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror 
                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Suffix/Extension Name</label>
                            <input  type="text" class="form-control"  name="name_extension" value="{{ old('name_extension') }}">
                            
                            @error('name_extension')
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
                              <label class="col-form-label">Sex</label>
                              <select class="form-control select2bs4" name="sex" value="{{ old('sex') }}" data-placeholder="Select from options below" style="width: 100%;">
                                <option>Male</option>
                                <option>Female</option>                             
                                
                              </select>
                              
                              @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror 
                            
                          </div>
                        </div>
                        <div class="col-md-3">                  
                          <div class="form-group">
                              <label>Date of Birth</label>                             
                              <input type="date" class="date form-control" name="birthdate" value="{{ old('birthdate') }}">
                            
                              @error('birthdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror                            
                          </div>  
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Place of Birth</label>
                            <input  type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}">
                            
                              @error('birth_place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror                             
                          </div>
                        </div> 

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Citizenship</label>
                            <input  type="text" class="form-control" name="citizenship" value="{{ old('citizenship') }}">
                            
                              @error('citizenship')
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
                              <label>Number of siblings</label>
                              <input  type="text" class="form-control"  name="no_siblings" value="{{ old('no_siblings') }}">
                              
                              @error('no_siblings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Religion</label>
                            <input  type="text" class="form-control"  name="religion" value="{{ old('religion') }}">
                              
                              @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror                            
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Birth Order</label>
                            <input  type="text" class="form-control"  name="birth_order" value="{{ old('birth_order') }}">
                            
                              @error('birth_order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            
                          </div>
                        </div>
                        
                      </div> 
                    
                      <div class="row">
                 
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Name of Father</label>
                            <input  type="text" class="form-control" name="father_fullname" value="{{ old('father_fullname') }}">
                            
                              @error('father_fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror 
                            
                          </div>
                        </div>  
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Name of Mother</label>
                            <input  type="text" class="form-control" name="mother_fullname" value="{{ old('mother_fullname') }}">
                            
                              @error('mother_fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror 
                            
                          </div>
                        </div>   
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Home Address</label>
                            <input  type="text" class="form-control"  name="home_address" value="{{ old('home_address') }}">
                            
                              @error('home_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            
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