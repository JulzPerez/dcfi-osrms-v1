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
    
    <div class="row">
        <div class="col-md-12">   
            <!--< div class="form-group">   -->       
                <h5 class="float-right">School Year:<strong> {{ $SY->SY }} </strong></h5>
        
            
                    <select class="select2" data-placeholder="Select a State">
                    <!-- <option></option> -->
                    <option>2nd Semester</option>
                    <!-- <option>2nd</option> -->
            
                    </select>
            <!-- </div> -->
        </div>
        
    </div>

    @if($academics[0]->Locking === 0 AND $gradeLockIndicator === 0)
        <div class="row">
            <div class="container">
                <p style="color:red"> Viewing of grades is not yet allowed. </p>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="float-left"> Grades: Learning Areas</h5>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:15%"> Code</th>   
                                        <th style="width:30%"> Description</th> 
                                       
                                        <th style="width:10%"> 3rd Grading</th>   
                                        <th style="width:10%"> 4th Grading</th>
                                        
                                        <th style="width:10%"> Final</th>
                                                    
                                    </tr>
                                </thead>
                                <?php $count = 0; ?>
                                    <tbody style="line-height: 0.75">
                                    
                                        @foreach($academics as $academic)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{ucwords($academic->Code)}}</td>
                                            <td>{{ucwords($academic->Description)}}</td>
                                            <td>{{$academic->first_grading}}</td>
                                            <td>{{$academic->second_grading}}</td>
                                            
                                        
                                            <td>{{$academic->fourth_grading}}</td>
                                        
                                            
                                        </tr>                            
                                        @endforeach
                                    </tbody>
                            
                            </table>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="float-left"> Grades: Character Building Activities</h5>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:15%"> Code</th>   
                                        <th style="width:30%"> Description</th> 
                                        <th style="width:10%"> 1st Grading </th>   
                                        <th style="width:10%"> 2nd Grading</th>
                                        <th style="width:10%"> 3rd Grading </th>   
                                        <th style="width:10%"> 4th Grading</th>
                                        
                                        <th style="width:10%"> Final</th>
                                                    
                                    </tr>
                                </thead>
                                <?php $count = 0; ?>
                                    <tbody style="line-height: 0.75">
                                    
                                        @foreach($characters as $character)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{ucwords($character->Code)}}</td>
                                            <td>{{ucwords($character->Description)}}</td>
                                            <td>{{$character->first_grading}}</td>
                                            <td>{{$character->second_grading}}</td>
                                            <td>{{$character->third_grading}}</td>
                                            <td>{{$character->fourth_grading}}</td>
                                            
                                            <td>{{$character->fourth_grading}}</td>
                                        
                                            
                                        </tr>                            
                                        @endforeach
                                    </tbody>
                            
                            </table>
                    </div>
                </div>
            </div>
        </div>

    @endif


        
</div>
@endsection

@push('scripts')
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

           </script>

   
@endpush