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
            
                <form method="POST" action="{{ route('student.update',$student->id) }} " id="edit_form">
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

                            <span class="text-danger error-text first_name_error"></span>                        

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Middle Name</label>
                            <input  type="text" class="form-control" name="middle_name" value="{{ $student->middle_name }}">
                          
                            <span class="text-danger error-text middle_name_error"></span>

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input  type="text" class="form-control"  name="last_name" value="{{ $student->last_name }}">
                            
                            <span class="text-danger error-text last_name_error"></span>                           
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Suffix/Extension Name</label>
                            <input  type="text" class="form-control"  name="name_extension" value="{{ $student->name_extension }}">
                            
                            <span class="text-danger error-text name_extension_error"></span>
                            
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
                              
                              <span class="text-danger error-text sex_error"></span> 
                            
                          </div>
                        </div>
                        <div class="col-md-3">                  
                          <div class="form-group">
                              <label>Date of Birth</label>                             
                              <input type="date" class="date form-control" name="birthdate" value="{{ $student->birthday }}">
                            
                              <span class="text-danger error-text birthdate_error"></span>                           
                          </div>  
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Place of Birth</label>
                            <input  type="text" class="form-control" name="birth_place" value="{{ $student->birthplace }}">
                            
                            <span class="text-danger error-text birth_place_error"></span>                           
                          </div>
                        </div> 

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Citizenship</label>
                            <input  type="text" class="form-control" name="citizenship" value="{{ $student->citizenship }}">
                            
                            <span class="text-danger error-text citizenship_error"></span>
                            
                          </div>
                        </div> 
                      </div>  
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Contact Number</label>
                              <input  type="text" class="form-control"  name="contact_no" value="{{ $student->contact_no }}">
                              
                              <span class="text-danger error-text contact_no_error"></span>

                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>Number of siblings</label>
                              <input  type="text" class="form-control"  name="no_siblings" value="{{ $student->no_siblings }}">
                              
                              <span class="text-danger error-text no_siblings_error"></span>

                          </div>
                        </div>
                        
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Birth Order</label>
                            <input  type="text" class="form-control"  name="birth_order" value="{{ $student->birth_order }}">
                            
                            <span class="text-danger error-text birth_order_error"></span>
                            
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Religion</label>
                            <input  type="text" class="form-control"  name="religion" value="{{ $student->religion }}">
                              
                            <span class="text-danger error-text religion_error"></span>                           
                          </div>
                        </div>
                        
                      </div>       

                      
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary btn-flat mr-2">Save Changes</button>
                          <a href="/student">
                            <button type="button" class="btn btn-default btn-flat">
                            <i class="fas fa-arrow-left"></i>Back</button>
                          </a>
                       
                      </div>
                     
                    
                    </div>
                    
                </form>
                
            </div>
            <!-- /.card -->
          </div>
      </div>    

</div>
@endsection

@push('scripts')
    <script type="text/javascript">
      
        $(function(){
          $("#edit_form").on('submit', function(e){
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
                          $('#edit_form')[0].reset();
                          alert(data.msg);
                          window.location.href = "/student";
                      }
                  }
              });
          });
        });

        $(function(){
            $("#province").change(function(){
                $.ajax({
                    url: "{{ route('getLocality') }}?province_no=" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        $('#city').html(data.html);
                    }
                });
            });
          });
    
      

    </script>
@endpush