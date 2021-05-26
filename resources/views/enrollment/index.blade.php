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
            
            <form method="POST" action="{{ route('enroll_store') }} ">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <p class="text-green text-center"><strong  >Your data has been submitted successfully for validation.</strong></p>
                    </div>
                </div> <!--end card-body -->
               
            </form>
            </div>
          
        </div>
    </div>
        
</div>
@endsection