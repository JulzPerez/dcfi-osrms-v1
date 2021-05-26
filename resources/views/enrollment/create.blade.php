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
                                <select class="form-control select2bs4" name="dept_id"  style="width: 100%;">
                                    
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"> {{$department->department_name}} </option>
                                    @endforeach
                              </select>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Year Level</label>
                                <select class="form-control select2bs4" name="level_id" style="width: 100%;">
                                    
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}"> {{$level->level_name}} </option>
                                    @endforeach
                              </select>
                            </div>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Track</label>
                                <select class="form-control select2bs4" name="track_id"  style="width: 100%;">
                                    
                                    @foreach($tracks as $track)
                                        <option value="{{$track->id}}"> {{$track->track_name}} </option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Strand</label>
                                <select class="form-control select2bs4" name="strand_id" style="width: 100%;">
                                    
                                    @foreach($strands as $strand)
                                        <option value="{{$strand->id}}"> {{$strand->strand_name}} </option>
                                    @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control select2bs4" name="semester" id="selectDocument" style="width: 100%;">
                                   <option>1st</option>
                                   <option>2nd</option>                                    
                                </select>
                            </div>  
                        </div>
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label>School Year</label>
                                <input  type="text" class="form-control"  name="school_year" value="{{$SY->SY}}" disabled>
                                <input  type="hidden"   name="school_year_id" value="{{$SY->id}}" >
                            
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