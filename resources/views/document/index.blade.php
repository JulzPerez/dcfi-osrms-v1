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

    @if($requirements===null)
    <div class="row">
        <div class="col-md-6">
            <p class="text-red"><strong> You cannot upload yet because you dont have student record! 
            <br> Please go to Profile and submit details!</strong></p>
        </div>
    </div>
    @else    
    <div class="row ">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">Upload Requirements </div>
                <form method="POST" action="{{route('upload.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label>Document Name</label>
                              <select class="form-control" name="doc_name" style="width: 100%;">
                                <option value="Report Card">Report Card</option> 
                                <option value="PSA Birth Certificate">PSA Birth Certificate</option>
                                <option value="Good Moral Certificate">Good Moral Certificate</option>
                                <option value="Certificate of Completion">Certificate of Completion</option>
                                <option value="ESC application Form">ESC application Form</option>
                                <option value="ESC Contract">ESC Contract</option>
                                <option value="ITR/ Certificate of Unemployment">ITR/ Certificate of Unemployment</option>
                               
                              </select>
                              @if ($errors->has('doc_name'))
                                <span class="text-danger">{{ $errors->first('doc_name') }}</span>
                              @endif 
                          </div>

                          <div class="form-group">
                              <label>Upload File</label>
                              <input type="file" name="file" class="form-control" >
                              @if ($errors->has('file'))
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                              @endif 
                          </div>
                                                                        
                        </div>
                        
                      </div>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                    
                  </form>
                
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">   
            <div class="card card-success">
                <div class="card-header">
                    Submitted Requirements
                </div>
            
                <div class="card-body">
                <table class="table table-bordered table-condensed">

                    <thead>
                        <tr>
                            <th style="width:30%"> File Name</th>
                            <th style="width:30%"> Date Uploaded</th>   
                            <!-- <th style="width:10%"> Action</th>   -->            
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($requirements) === 0)
                        <p>There are no current submissions<p>

                        @else
                            @foreach($requirements as $requirement)
                            <tr>
                                    <td>
                                        <a href="{{ route('upload.show', $requirement->attachment) }}" >
                                            {{$requirement->name}}
                                        </a>
                                    </td>
                                    <td class="text-olive">{{$requirement->created_at}} </td>
                                    <!-- <td>
                                        <form action="{{ route('upload.destroy', $requirement->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td> -->
                            </tr>
                            @endforeach

                        @endif
                        
                        
                    </tbody>                          
                </table>
                </div> <!--end card-body -->
               
            
            </div>
          
        </div>
    </div>
    @endif
        
</div>
@endsection