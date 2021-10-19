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
                            <p class="text-green text-center"><strong >You have no enrollment record this Academic Year {{session('school_year_name')}}.</strong></p>
                        </div>
                    </div> <!--end card-body -->
                    <div class="card-footer">
                        <a href="{{ route('enroll_create') }}">
                            <button type="button" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-pencil-alt"></i> Enroll
                            </button>
                        </a>                      
                    </div>
                
                </div>
            
            </div>
            
        </div>
        
</div>
@endsection