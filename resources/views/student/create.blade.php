@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row">
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

    <div class="row">
      <div class="col-md-12">        
        <div id="accordion"> 
          <div class="card card-danger">
            <div class="card-header">
              <h4 class="card-title mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Personal Background
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in show">
              
                <form  id="main_form"  action="{{route('student.store')}}" method="POST">
                <!-- method="POST" action="" -->
                @csrf
                  <div class="card-body ">
                  
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>LRN </label>
                          <input  type="text" class="form-control"  name="lrn" id="lrn" data-inputmask='"mask": "999999999999"' data-mask >
                          
                            
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
                          <input  type="text" class="form-control" name="first_name" > 
                          <span class="text-danger error-text first_name_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Middle Name <strong class="text-red">*</strong></label>
                          <input  type="text" class="form-control" name="middle_name" >
                        
                          <span class="text-danger error-text middle_name_error"></span>

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Last Name <strong class="text-red">*</strong></label>
                          <input  type="text" class="form-control"  name="last_name" >
                          
                          <span class="text-danger error-text last_name_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Suffix/Extension Name</label>
                          <input  type="text" class="form-control"  name="name_extension" >
                          
                          <span class="text-danger error-text name_extension_error"></span>
                          
                        </div>
                      </div>
                    </div>

                    <div class="row">                  
                      <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">Sex <strong class="text-red">*</strong></label>
                            <select class="form-control" name="sex" data-placeholder="Select from options below" style="width: 100%;">
                            <option value="">--Select here --</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>                             
                              
                            </select>
                            
                            <span class="text-danger error-text sex_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">                  
                        <div class="form-group">
                            <label>Date of Birth <strong class="text-red">*</strong></label>                             
                            <input type="date" class="date form-control" name="birthdate">
                          
                            <span class="text-danger error-text birthdate_error"></span>                          
                        </div>  
                      </div>
                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label>Age <strong class="text-red">*</strong></label>
                          <input  type="number" class="form-control" name="age" >
                          
                          <span class="text-danger error-text age_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Place of Birth <strong class="text-red">*</strong></label>
                          <input  type="text" class="form-control" name="birth_place" >
                          
                          <span class="text-danger error-text birth_place_error"></span> 

                        </div>
                      </div>                                     
                    </div> 

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact Number <strong class="text-red">*</strong></label>
                            <input  type="number" class="form-control"  name="contact_no">
                            
                            <span class="text-danger error-text contact_no_error"></span>

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>No. of siblings <strong class="text-red">*</strong></label>
                            <input  type="number" class="form-control"  name="no_siblings" >
                            
                            <span class="text-danger error-text no_siblings_error"></span>

                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Birth Order <strong class="text-red">*</strong></label>
                          <input  type="number" class="form-control"  name="birth_order" >
                          
                          <span class="text-danger error-text birth_order_error"></span>
                          
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Religion <strong class="text-red">*</strong></label>
                            <select class="form-control " name="religion" id="religion"  style="width: 100%;">
                                <option value="">--- Please select ---</option>

                                    @foreach($religions as $religion)
                                        <option value="{{$religion->ID}}"> {{$religion->Name}} </option>
                                    @endforeach 
                            </select>
                            <span class="text-danger error-text religion_error"></span> 

                            <input type="hidden" name="religion_name" id="religion_name" value="">

                        </div>
                      </div>                                   
                      
                    </div>  

                    <div class="row">
                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label>Citizenship <strong class="text-red">*</strong></label>
                          <input  type="text" class="form-control" name="citizenship" >
                          
                          <span class="text-danger error-text citizenship_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Ethnicity <strong class="text-red">*</strong></label>
                            <select class="form-control " name="ethnicity"  style="width: 100%;">
                            <option value=""> --Select here -- </option>

                                @foreach($ethnicities as $ethnicity)
                                      <option value="{{$ethnicity->id}}"> {{$ethnicity->name}} </option>
                                @endforeach
                            </select>

                            <span class="text-danger error-text ethnicity_error"></span>
                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label> Mother Tounge <strong class="text-red">*</strong></label>
                            <select class="form-control " name="mother_tongue"  style="width: 100%;">
                              <option value=""> --Select here -- </option>
                                  @foreach($mother_tongues as $mother_tongue)
                                      <option value="{{$mother_tongue->id}}"> {{$mother_tongue->name}} </option>
                                  @endforeach 
                            </select>

                            <span class="text-danger error-text mother_tongue_error"></span>
                          
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <div class="form-group">
                            <label>Modality <strong class="text-red">*</strong></label>
                            <select class="form-control " name="modality"  style="width: 100%;">
                              <option value=""> --Select here -- </option>    
                               {{-- 
                                 @foreach($modalities as $modality)
                                      <option value="{{$modality->id}}"> {{$modality->name}} </option>
                                  @endforeach   
                                --}}
                            </select>

                            @if ($errors->has('modality'))
                              <span class="text-danger">{{ $errors->first('modality') }}</span>
                            @endif 
                          
                        </div>
                      </div>  -->                                                      
                    </div> 

                    <hr class="">
                    <h5 style="color:red">Address</h5>

                    <div class="row">                                  
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Purok/Street/Barangay </label>
                            <input  type="text" class="form-control"  name="purok" >
                            
                            <span class="text-danger error-text purok_error"></span>

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

                            <span class="text-danger error-text province_error"></span>
                          
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                            <label>City/Municipality </label>
                            
                            <select class="form-control " name="city" id="locality"  style="width: 100%;">             
                    
                            </select>
                            
                            <span class="text-danger error-text city_error"></span>

                        </div>
                      </div>  
                      
                    </div> 
                  </div>

                  <div class="row">                                  
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Father's Fullname</label>
                            <input  type="text" class="form-control"  name="father" >
                            
                            <span class="text-danger error-text father_error"></span>

                        </div>
                      </div> 
                        
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Mother's Fullname <strong class="text-red">*</strong></label>
                          <input  type="text" class="form-control"  name="mother" >

                          <span class="text-danger error-text mother_error"></span>
                          
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Guardian's Fullname </label>                            
                            <input  type="text" class="form-control"  name="guardian" >
                            
                            <span class="text-danger error-text guardian_error"></span>

                        </div>
                      </div>  
                      
                    </div> 
                  </div>

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Data</button>
                  </div>
                    
                </form>
            </div>
          </div>

        </div>

      </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

      
        $(function(){
          $("#main_form").on('submit', function(e){
              e.preventDefault();

              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

              $.ajax({
                  url:$(this).attr('action'),
                  method:$(this).attr('method'),
                  data:new FormData(this),
                  processData:false,
                  dataType:'json',
                  contentType:false,
                  beforeSend:function(){
                      $(document).find('span.error-text').text('');
                  },
                  success:function(data){
                      if(data.status == 0){
                          $.each(data.error, function(prefix, val){
                              $('span.'+prefix+'_error').text(val[0]);
                          });
                      }else{
                          $('#main_form')[0].reset();
                          alert(data.msg);
                          window.location.href = "/student";
                      }
                  }
              });
          });
        });

        $("#province").change(function(){
            $.ajax({
                url: "{{ route('getLocality') }}?province_no=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#locality').html(data.html);
                }
            });
        });
    
      

    </script>
@endsection

