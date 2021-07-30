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
                <div class="card-header">Search Form</div>
            <form  id="main_form"  action="{{route('getStudent')}}" method="GET">
            
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Search By</label>
                                
                                <select class="form-control " name="searchBy" id="searchBy" style="width: 100%;">
                                    <option value=""> -- Select search option -- </option>
                                    <option value="ID"> ID </option>
                                    <option value="last_name"> Last Name </option>
                                </select>

                                <span class="text-danger error-text searchBy_error"></span>

                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="search_msg" class="text-red"></label>
                            </div> 
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID Number</label>
                                <input class="form-control" type="text" id="searchBy_ID" name="searchBy_ID" disabled>

                                <span class="text-danger error-text searchBy_ID_error"></span>
                            </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" id="searchBy_lastname" name="searchBy_lastname" disabled >
        
                                    <span class="text-danger error-text searchBy_lastname_error"></span>
                                </div> 
                            </div>
                        </div>
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div> 
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
