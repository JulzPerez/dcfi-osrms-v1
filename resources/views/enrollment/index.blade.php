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
                            <td class="text-olive"> {{$enrollment->writtenOrOnlineExamRating}} </td>
                        </tr>
                        
                        <tr>
                            <td class="text-muted">Oral Exam Rating</td>
                            <td class="text-olive">{{$enrollment->oralExamOrInterviewRating}}  </td>
                        </tr>
                    </tbody>                          
                </table>
                </div> <!--end card-body -->
               
            
            </div>
          
        </div>
    </div>
    
        
</div>
@endsection