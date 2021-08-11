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
        
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"> Search Result </div>
                         
                <div class="card-body" >
                    @if($requirements->isEmpty())
                            <p> <strong class="text-red">No file was uploaded by this student! </strong> </p>
                            
                    @else
                    <table class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>    
                                <th style="width:25%">Document Name</th>
                                <th style="width:50%">Attachment</th>
                                <th style="width:20%">Date Uploaded</th>    
                            </tr>
                        </thead>

                            <tbody style="line-height: 0.75" id="search_result">
                                @php ($count=0)
                                @foreach($requirements as $requirement)
                                <tr>
                                    <td>{{++$count}}.</td>
                                    <td> {{$requirement->name}}</td> 
                                    <td> 
                                        <a href="{{ route('downloadDocument', $requirement->attachment) }}" >
                                            {{$requirement->attachment}}
                                        </a>
                                    </td>   
                                    <td> {{$requirement->created_at}}</td>
                                </tr>                            
                                @endforeach
                                            
                            </tbody>
                    </table>
                    @endif

                </div>
                <div class="card-footer">
                    <a href="{{route('getAllStudentList')}}">
                        <button type="button" class="btn btn-primary">Back to List</button>
                    </a>                    
                </div>               
                
            </div>
            <!-- /.card -->
        </div>  
    </div>

        
</div>
@endsection

