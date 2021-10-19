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
            <h5 class="float-right">School Year:<strong> {{session('school_year_name')}} </strong>, Semester: <strong>{{session('semester')}}</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <h3> Learning Areas/Class Schedule </h3>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr colspan="3"></td>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:15%"> Code</th>   
                                    <th style="width:50%"> Description</th> 
                                    <th style="width:10%"> Days</th>   
                                    <th style="width:20%"> Time</th>
                                                
                                </tr>
                            </thead>
                            <?php $count = 0; ?>
                                <tbody style="line-height: 0.75">
                                    @foreach($enrolledSubjects as $enrolledSubject)
                                    <tr>
                                        <td>{{++$count}}</td>
                                        <td>{{ucwords($enrolledSubject->Code)}}</td>
                                        <td>{{ucwords($enrolledSubject->Description)}}</td>
                                        <td>{{ucwords($enrolledSubject->Shorthand)}}</td>   
                                        @if($enrolledSubject->Shorthand != 'TBA')
                                        <td>{{$enrolledSubject->Time_from}}-{{$enrolledSubject->Time_To}}</td> 
                                        @else
                                        <td></td>
                                        @endif 
                                        
                                    </tr>                            
                                    @endforeach
                                </tbody>
                        
                        </table>
                </div>
            </div>
        </div>
    </div>

   


        
</div>
@endsection