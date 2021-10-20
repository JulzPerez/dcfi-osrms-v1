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

   
    
        <div class="row ">
            <div class="col-md-6">   
                <div class="card card-danger">
                   
                
                    <div class="card-body">
                        <div class="row">
                            <p class="text-green text-center"><strong >You have no account record this Academic Year.</strong></p>
                        </div>
                    </div> <!--end card-body -->
                    
                
                </div>
            
            </div>
            
        </div>
        
</div>
@endsection