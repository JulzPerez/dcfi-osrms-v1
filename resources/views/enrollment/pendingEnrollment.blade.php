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

    
            <div class="row ">
                <div class="col-md-6">   
                    <div class="card card-danger">
                        <div class="card-header">
                            Enrollment Details
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <p class="text-green text-center"><strong >Enrollment is in progress.</strong></p>
                            </div>
                        </div> <!--end card-body -->
                    
                    </div>
                
                </div>
                <div class="col-md-6">   
                    <div class="card card-danger">
                        <div class="card-header">
                            Enrollment Status
                        </div>
                    
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    
                                    <tr>
                                        <td class="text-muted">Student ID</td>
                                        <td class="text-olive">{{$enrollment->student_id}} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-muted">Enrollment Status</td>
                                        <td class="text-olive">{{$enrollment->status}} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Written Exam Rating </td>
                                        <td class="text-olive"> {{$enrollment->written_online_rating}} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-muted">Oral Exam Rating</td>
                                        <td class="text-olive">{{$enrollment->oral_or_interview_rating}}  </td>
                                    </tr>
                                </tbody>                          
                            </table>
                        </div> <!--end card-body -->               
                    
                    </div>
                
                </div>
            </div>  

</div>
@endsection