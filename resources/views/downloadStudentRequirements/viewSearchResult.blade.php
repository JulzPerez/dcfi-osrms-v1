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
                <div class="card-header"> Search Result </div>
                         
                <div class="card-body" >
                    @if(empty($result))
                            <p> <strong class="text-red">No record found! </strong> </p>
                            
                    @else
                    <table class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>    
                                <th style="width:65%">Student Name</th>
                                <th style="width:30%">Action</th>    
                            </tr>
                        </thead>

                            <tbody style="line-height: 0.75" id="search_result">
                                @php ($count=0)
                                @foreach($result as $rs)
                                <tr>
                                    <td>{{++$count}}.</td>
                                    <td> <strong class="text-blue">{{$rs->last_name}}, {{$rs->first_name}} {{$rs->middle_name}}<strong></td>   
                                    <td>
                                        <a href="{{ route('getStudentRequirements',$rs->id) }}">
                                            View
                                        </a>                                         
                                    </td>
                                </tr>                            
                                @endforeach
                                            
                            </tbody>
                    </table>
                    @endif

                </div>
                <div class="card-footer">
                    <a href="{{route('searchFormRequirements')}}">
                        <button type="button" class="btn btn-primary">Back to Search Form</button>
                    </a>                    
                </div>               
                
            </div>
            <!-- /.card -->
        </div>  
    </div>

        
</div>
@endsection

