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
            
        <h5 class="float-right">School Year:<strong> {{ $SY->SY }} </strong>, Semester: <strong>{{$SY->semester}}</strong></h3>
        </div>
    </div>

    @if($academics[0]->Locking === null)
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
                                        <th style="width:10%"> 1st Quarter</th>   
                                        <th style="width:10%"> 2nd Quarter</th>
                                        
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
                                        
                                            <td>{{$academic->final_grading}}</td>
                                        
                                            
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
                                        <th style="width:10%"> 1st Quarter </th>   
                                        <th style="width:10%"> 2nd Quarter</th>
                                        
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
                                            
                                            <td>{{$character->final_grading}}</td>
                                        
                                            
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