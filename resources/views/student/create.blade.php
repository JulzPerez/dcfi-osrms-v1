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

       <!-- /.row -->
       <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Vertical Tabs Examples
            </h3>
          </div>
          <div class="card-body">
            
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Home</a>
                  <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Profile</a>
                  <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Messages</a>
                  <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Settings</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur. 
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      <div class="row ">
        <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-personal" data-toggle="pill" href="#custom-tabs-one-personal" role="tab" aria-controls="custom-tabs-one-personal" aria-selected="true">Personal Background</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-education" data-toggle="pill" href="#custom-tabs-one-education" role="tab" aria-controls="custom-tabs-one-education" aria-selected="false">Family Background</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Educational Background</a>
                  </li>
                 <!--  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                  </li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-personal" role="tabpanel" aria-labelledby="custom-tabs-one-home-personal">
                    <div class="col-md-12">
                
                      
                          <form method="POST" action="{{route('student.store')}}">
                          @csrf
                                 
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>LRN </label>
                                      <input  type="text" class="form-control"  name="lrn" value="{{ old('lrn') }}" id="lrn" data-inputmask='"mask": "999999999999"' data-mask >
                                      
                                        
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
                                      <label>Age <strong class="text-red">*</strong></label>
                                      <input  type="text" class="form-control" name="age" value="{{ old('age') }}" data-inputmask='"mask": "99"' data-mask>
                                      
                                        @if ($errors->has('age'))
                                          <span class="text-danger">{{ $errors->first('age') }}</span>
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
                                        <input  type="text" class="form-control"  name="contact_no" value="{{ old('contact_no') }}" data-inputmask='"mask": "99999999999"' data-mask>
                                        
                                        @if ($errors->has('contact_no'))
                                          <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                                        @endif

                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label>No. of siblings <strong class="text-red">*</strong></label>
                                        <input  type="text" class="form-control"  name="no_siblings" value="{{ old('no_siblings') }}" data-inputmask='"mask": "99"' data-mask>
                                        
                                        @if ($errors->has('no_siblings'))
                                          <span class="text-danger">{{ $errors->first('no_siblings') }}</span>
                                        @endif

                                    </div>
                                  </div>
                                  
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Birth Order <strong class="text-red">*</strong></label>
                                      <input  type="text" class="form-control"  name="birth_order" value="{{ old('birth_order') }}" data-inputmask='"mask": "99"' data-mask>
                                      
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
                                        <option value=""> --Select here -- </option>

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
                                          <option value=""> --Select here -- </option>
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
                                          <option value=""> --Select here -- </option>    
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
                                                  
                              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Data</button>
                              </div>
                          </form>
                      
                    </div> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                  </div>
                  <!-- <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div> -->
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
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