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
    
    @if($enrollment===null)
    <div class="row">
        <div class="col-md-6">
            <p class="text-red"><strong> You cannot enroll yet because you dont have student record! 
            <br> Please go to Profile and submit details!</strong></p>
        </div>
    </div>
    @else
    <div class="row ">
        <div class="col-md-6">   
            <div class="card card-primary">
                <div class="card-header">
                    Enrollment Details
                </div>
            
                <div class="card-body">
                    <div class="row">
                        <p class="text-green text-center"><strong >Your data has been submitted successfully for validation.</strong></p>
                    </div>
                </div> <!--end card-body -->
               
            </div>
          
        </div>
        <div class="col-md-6">   
            <div class="card card-primary">
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
    @endif
        
</div>
@endsection