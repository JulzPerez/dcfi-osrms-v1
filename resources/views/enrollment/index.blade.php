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
    <h5> <strong class="text-blue"> Student Information </strong></h5>

    <div class="row ">
        <div class="col-md-6">
            <div class="card card-primary">
                
            </div>
        </div>
    </div>
        
</div>
@endsection