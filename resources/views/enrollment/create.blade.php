@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-12">  
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div>
            @endif
        </div>
    </div>
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
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grade Level</label>
                                
                                <select class="form-control " name="level" id="level"  style="width: 100%;" >                                          
                                </select>

                            </div>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="form-group" id="displayTrack" style="display:none;">
                                <label>Track </label>
                                <select class="form-control " name="track" id="track"  style="width: 100%;">                                          
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="form-group" id="displayStrand" style="display:none;">
                                <label>Strand </label>
                                <select class="form-control " name="strand" id="strand"  style="width: 100%;">                                          
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label>Category </label>
                                <select class="form-control " name="category"  style="width: 100%;"> 
                                    <option value=""> -- Select here -- </option>   
                                    <option value="1"> Old Student </option>    
                                    <option value="2"> Transfer-in </option>  
                                    <option value="3"> Balik-Aral </option> 
                                    <option value="4"> Repeater </option>                                    
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group" >
                                <label>Modality </label>
                                <select class="form-control " name="category"  style="width: 100%;"> 
                                    <option value=""> -- Select here -- </option>   
                                    <option value="1"> Online (Synchronous & Asynchronous) </option>    
                                    <option value="2"> Modular (Printed activities/Soft Copy)</option>  
                                    <option value="3"> Hybrid (Online discussion, modular printed activities
                                     </option> 
                                                               
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control " name="semester" id="strand"  style="width: 100%;">  
                                    <option value=""> -- Select here -- </option>   
                                    <option value="1"> 1st </option>    
                                    <option value="2"> 2nd </option>                    
                                </select>
                                
                            </div>  
                        </div>
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label>School Year</label>
                                <input  type="text" class="form-control"  name="school_year" value="{{$SY->SY}}" disabled>
                                <input  type="hidden"  name="school_year_id" value="{{$SY->id}}" >
                                <input  type="hidden"  name="SY" value="{{$SY->SY}}" >
                            
                            </div>                        
                        </div>
                    </div>
                </div> <!--end card-body -->
                <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Enroll</button>
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
            }
            else{
                document.getElementById("displayTrack").style.display = "none";
                document.getElementById("displayStrand").style.display = "none";
            }           

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

    </script>

   
@endsection