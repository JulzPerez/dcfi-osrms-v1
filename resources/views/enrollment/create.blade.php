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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department</label>
                                <input  type="text" class="form-control"  name="" value="{{ $dept_name}}" disabled>
                            
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Grade Level</label>
                                <input  type="text" class="form-control"  name="" value="{{ $level_name}}" disabled>
                            </div>                        
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Track <span class="text-red">*For Senior High School Only</span></label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Strand <span class="text-red">*For Senior High School Only</span></label>
                                
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                
                            </div>  
                        </div>
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label>School Year</label>
                                <input  type="text" class="form-control"  name="school_year" value="{{$SY->SY}}" disabled>
                                <input  type="hidden"  name="school_year_id" value="{{$SY->id}}" >
                                <input  type="hidden"  name="SY" value="{{$SY->SY}}" >
                            
                            </div>                        
                        </div>
                    </div>
                </div> <!--end card-body -->
                <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Enroll</button>
                </div>
            </form>
            </div>
          
        </div>
    </div>
        
</div>
@endsection