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
                <div class="card-header">Search Payments Form</div>
                <!-- <div class="card-tools">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">                               
                                <a href="{{route('getAllStudents')}}" class="btn btn-danger">List All Students</a>
                            </div> 
                        </div>  
                    </div>
                </div> -->
                <form  id="main_form"  action="{{route('getStudent')}}" method="GET">
               
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                            
                                <div class="form-group">
                                <label>Date Range:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="daterange">
                                   
                                </div>
                              
                                </div>
                            </div>
                            <div class="col-md-4">                                
                                 <!-- select -->
                                <div class="form-group">
                                    <label>Grade Level</label>
                                    <select class="form-control">
                                    <option>--Select Grade Level--</option>
                                    <option>Grade 1</option>
                                    <option>Grade 2</option>
                                    <option>Grade 3</option>
                                    <option>Grade 4</option>
                                    <option>Grade 5</option>
                                    <option>Grade 6</option>
                                    <option>Grade 7</option>
                                    <option>Grade 8</option>
                                    <option>Grade 9</option>
                                    <option>Grade 10</option>
                                    <option>Grade 11</option>
                                    <option>Grade 12</option>
                                    </select>
                                </div>                                
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control float-right">                                  
                             
                            </div>
                           
                        </div>                      
                      
                        
                        </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>ID No.</th>
                            <th>Name of Students</th>
                            <th>Grade Level</th>
                            <th>Date Uploaded</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        
                            <tr>
                            <td>Gecko</td>
                            <td>Seamonkey 1.1</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                            </tr>
                    
                            </tbody>
                           
                        </table>
                    </div>
                <!-- /.card-body -->                

                </form>
            </div>
            <!-- /.card -->
        </div>  
    
    </div>
        
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(function(){
            $("#searchBy").change(function(){

                var search = $(this).val();
                
                //console.log(search);

                if(search === 'ID')
                {
                    $("#searchBy_ID").prop('disabled', false);
                    $("#searchBy_lastname").prop('disabled', true);

                    $("#search_msg").text('Please enter ID number of the student.');
                    
                }
                else{
                    
                    $("#searchBy_ID").prop('disabled', true);
                    $("#searchBy_lastname").prop('disabled', false);

                    $("#search_msg").text('Please enter Last Name of the student.');
                }
            });
          });    

          $(function(){
                $("#main_form").on('submit', function(e)
                {

                    //var searchby = $('#searchBy').val();
                    
                    if( !$('#searchBy').val())
                    {
                        e.preventDefault();
                        alert('Please select search option!');
                    }
                    else
                    {
                        if($('#searchBy').val() === 'ID')
                        {
                            if(!$('#searchBy_ID').val())
                            {
                                e.preventDefault();
                                alert("Please enter student ID.")
                            }
                        }
                        else
                        {
                            if(!$('#searchBy_lastname').val())
                            {
                                e.preventDefault();
                                alert("Please enter student last name.")
                            }
                        }
                    }      
                });
        });
        

    </script>
@endsection
