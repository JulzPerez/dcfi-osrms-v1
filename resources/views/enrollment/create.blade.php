@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <!-- <div class="row ">
        <div class="col-sm-12">  
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
    </div> -->
    <br>
    

    <div class="row ">
        <div class="col-md-8">
            
            

            <div class="card card-primary">
                <div class="card-header">
                    Enrollment Details
                </div>
            
            <form method="POST" action="{{ route('enroll_store') }} ">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department</label>
                                
                                <select class="form-control " name="department" id="department" style="width: 100%;">
                                <option value=""> --- Select --- </option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"> {{$department->department_name}} </option>
                                    @endforeach 
                                </select>

                                <input  type="hidden" id="track_strand_flag" name="track_strand_flag" value="off">

                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grade Level</label>
                                
                                <select class="form-control " name="level" id="level"  style="width: 100%;" >                                          
                                </select>

                                @if ($errors->has('level'))
                                    <span class="text-danger">{{ $errors->first('level') }}</span>
                                @endif

                            </div>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group" id="displayTrack" style="display:none;">
                                <label>Track </label>
                                <select class="form-control " name="track" id="track"  style="width: 100%;">                                          
                                </select>

                                @if ($errors->has('track'))
                                    <span class="text-danger">{{ $errors->first('track') }}</span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group" id="displayStrand" style="display:none;">
                                <label>Strand </label>
                                <select class="form-control " name="strand" id="strand"  style="width: 100%;">                                          
                                </select>

                                @if ($errors->has('strand'))
                                    <span class="text-danger">{{ $errors->first('strand') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label>Category </label>
                                <select class="form-control " name="category" id="category" style="width: 100%;"> 
                                    <option value=""> -- Select here -- </option>   
                                    <option value="Old Student"> Old Student </option>    
                                    <option value="Transfer-in"> Transfer-in </option>  
                                    <option value="Balik-Aral"> Balik-Aral </option> 
                                    <option value="Repeater"> Repeater </option>                                    
                                </select>

                                @if ($errors->has('category'))
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label>Modality </label>
                                <select class="form-control " id="modality" name="modality"  style="width: 100%;"> 
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <!-- <select class="form-control " name="semester" id="semester"  style="width: 100%;">  
                                    <option value=""> -- Select here -- </option>   
                                    <option value="First Semester"> First Semester  </option>    
                                    <option value="Second Semester"> Second Semester </option>                    
                                </select> -->
                                <input  type="text" class="form-control"  name="school_year" value="{{session('semester)}}" disabled>
                                
                                
                                
                            </div>  
                        </div>
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label>School Year</label>
                                <input  type="text" class="form-control"  name="school_year" value="{{$SY}}" disabled>
                                

        
                            
                            </div>                        
                        </div>
                    </div>
                </div> <!--end card-body -->
                <div class="card-footer">
                      <button id="enroll" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
          
        </div>
    </div>
        
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#department").change(function(){

            var dept_id = $(this).val();

            $.ajax({
                url: "{{ route('getGradeLevel') }}?dept_id=" + dept_id,
                method: 'GET',
                success: function(data) {
                    $('#level').html(data.html);
                }
            });
           
            if(dept_id === '4')
            {
                document.getElementById("displayTrack").style.display = "block";

                $.ajax({
                url: "{{ route('getTrack') }}",
                method: 'GET',
                success: function(data) {
                    $('#track').html(data.html);
                }
                });

                $('#track_strand_flag').val('on');
            }
            else{
                document.getElementById("displayTrack").style.display = "none";
                document.getElementById("displayStrand").style.display = "none";
                $('#track_strand_flag').val('off');
            } 
                      
            $.ajax({
                url: "{{ route('getModality') }}",
                method: 'GET',
                success: function(data) {
                    $('#modality').html(data.html);
                }
            });
        });

        $("#track").change(function(){

            document.getElementById("displayStrand").style.display = "block";
            $.ajax({
                url: "{{ route('getStrand') }}?track_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#strand').html(data.html);                   
                }
            });
            
        });

        $('form').submit(function(e){

            if( !$('#department').val() ) { 
                e.preventDefault();
                alert("Please select department!");
            }

            else if( !$('#level').val() ) { 
                e.preventDefault();
                alert("Please select Grade Level!");
            }  

            else if( !$('#category').val() ) { 
                e.preventDefault();
                alert("Please select category!");
            }    

            else if( !$('#modality').val() ) { 
                e.preventDefault();
                alert("Please select modality!");
            }        
      
            else if( !$('#semester').val() ) { 
                e.preventDefault();
                alert("Please select semester!");
            }   

            else
            {
                if($('#track_strand_flag').val()==='on')
                {
                    if( !$('#track').val() ) { 
                        e.preventDefault();
                        alert("Please select Track!");
                    }

                    else if( !$('#strand').val() ) { 
                        e.preventDefault();
                        alert("Please select Strand!");
                    }  
                }                 
            }

        });
       
    </script>

   
@endsection