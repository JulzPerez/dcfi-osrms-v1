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

   
    <div class="row mt-3">
        <div class="col-md-6">
            <p class="text-red"><strong> You need to create student profile before you can enroll! 
                <p>
                    <a href="/student">Create Profile. </a>
                </p>
            
        </div>
    </div>
 ]
  
        
</div>
@endsection