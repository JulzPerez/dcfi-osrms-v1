@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row ">
      <div class="col-sm-12">
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
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
                            <label>Age <strong class="text-red">*</strong></label>
                            <input  type="number" class="form-control" name="age" value="{{ old('age') }}">
                            
                              @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                              @endif
                            
                          </div>
                        </div>
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

                        
                      </div>  
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>Contact Number <strong class="text-red">*</strong></label>
                              <input  type="text" class="form-control"  name="contact_no" value="{{ old('contact_no') }}">
                              
                              @if ($errors->has('contact_no'))
                                <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                              @endif

                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                              <label>No. of siblings <strong class="text-red">*</strong></label>
                              <input  type="text" class="form-control"  name="no_siblings" value="{{ old('no_siblings') }}">
                              
                              @if ($errors->has('no_siblings'))
                                <span class="text-danger">{{ $errors->first('no_siblings') }}</span>
                              @endif

                          </div>
                        </div>
                        
                        <div class="col-md-2">
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
                              <select class="form-control " name="religion"   style="width: 100%;">
                                  <option value="">--- Please select ---</option>

                                      @foreach($religions as $religion)
                                          <option value="{{$religion->ID}}"> {{$religion->Name}} </option>
                                      @endforeach 
                              </select>

                              @if ($errors->has('religion'))
                                <span class="text-danger">{{ $errors->first('religion') }}</span>
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

                      <hr class="border1">
                      <h5 style="color:red">Address</h5>
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
                            <label>Province <strong class="text-red">*</strong></label>
                              <select class="form-control " name="province" id="province" style="width: 100%;">
                              <option value="">--- Please select ---</option> 
                                    @foreach($provinces as $province)
                                        <option value="{{$province->number}}"> {{$province->name}} </option>
                                    @endforeach 
                              </select>

                              @if ($errors->has('province'))
                                <span class="text-danger">{{ $errors->first('province') }}</span>
                              @endif 
                            
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                              <label>City </label>
                              
                              <select class="form-control " name="city" id="city"  style="width: 100%;">             
                      
                              </select>
                              
                              @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                              @endif 

                          </div>
                        </div>  
                        
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Municipality</label>
                              
                              <select class="form-control " name="municipality" id="municipality"  style="width: 100%;">
                                          
                              </select>
                              
                              @if ($errors->has('municipality'))
                                <span class="text-danger">{{ $errors->first('municipality') }}</span>
                              @endif 

                          </div>
                        </div>                       
                            
                      </div> 
                      
                      <hr class="border1">

                      
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
                              <select class="form-control " name="mother_tongue"  style="width: 100%;">
                                    
                                    @foreach($mother_tongues as $mother_tongue)
                                        <option value="{{$mother_tongue->id}}"> {{$mother_tongue->name}} </option>
                                    @endforeach 
                              </select>

                              @if ($errors->has('mother_tongue'))
                                <span class="text-danger">{{ $errors->first('mother_tongue') }}</span>
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

@section('scripts')
    <script type="text/javascript">
        $("#province").change(function(){
            $.ajax({
                url: "{{ route('getMunicipality') }}?province_no=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#municipality').html(data.html);
                }
            });
        });
    
        $("#province").change(function(){
            $.ajax({
                url: "{{ route('getCity') }}?province_no=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#city').html(data.html);
                }
            });
        });
    </script>

    
@endsection