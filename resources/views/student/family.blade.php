@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row ">
      <div class="col-sm-12">
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <!-- <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul> -->
              <p>
              Please fill-in required information!
              </p>
            </div><br />
          @endif
            
        </div>
      </div>
    </div>
    
    <div class="row ">
        <div class="col-md-6">
           
            
                <form method="POST" action="{{ route('updateFamily',$id) }} " >
                @method('PATCH')
                @csrf
                   
                    <h5 style="color:blue;">Family Info</h5> 
                    <hr class="my-12"/>

                    <table class="table table-bordered table-condensed">
                        <tr><td colspan="2" style="background-color:grey;color:white">Father</td></tr>                    
                        <tr>                                
                            <td style="width: 30%; background-color:white">First Name</td>
                            <td>
                                @if(!empty($father))
                                <input name="father_fname" style="width:100%">{{$father->first_name}}</input>
                                @else
                                <input name="father_fname" style="width:100%"></input>
                                @endif
                            </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%; background-color:white">Middle Name</td>
                            <td>
                                @if(! empty($father))
                                    <input name="father_mname" style="width:100%"> {{$father->middle_name}}</input>
                                @else
                                <input name="father_mname" style="width:100%"></input>
                                @endif
                            </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%;background-color:white">Last Name</td>
                            <td>
                            @if(! empty($father))
                            <input name="father_lname" style="width:100%">{{$father->last_name}}</input>
                            @else
                                <input name="father_lname" style="width:100%"></input>
                            @endif
                            </td>                        
                        </tr>
                        <tr><td colspan="2" style="background-color:grey;color:white">Mother</td></tr>                    
                        <tr>                                
                            <td style="width: 30%; background-color:white">First Name</td>
                            <td>
                                @if(! empty($mother))
                                <input name="mother_fname" style="width:100%">{{$mother->first_name}}</input>
                                @else
                                <input name="mother_fname" style="width:100%"></input>
                                @endif
                                </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%">Middle Name</td>
                            <td>
                            @if(! empty($mother))
                            <input name="mother_mname" style="width:100%">{{$mother->middle_name}}</input>
                            @else
                                <input name="mother_mname" style="width:100%"></input>
                            @endif
                            </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%">Last Name</td>
                            <td>
                            @if(! empty($mother))
                            <input name="mother_lname" style="width:100%">{{$mother->last_name}}</input>
                            @else
                                <input name="mother_lname" style="width:100%"></input>
                            @endif

                            </td>                        
                        </tr>
                        <tr><td colspan="2" style="background-color:grey;color:white">Guardian</td></tr>                    
                        <tr>                                
                            <td style="width: 30%">First Name</td>
                            <td>
                        
                            @if(! empty($guardian))
                            <input name="guardian_fname" style="width:100%">{{$guardian->first_name}}</input>
                            @else
                                <input name="guardian_fname" style="width:100%"></input>
                            @endif
                            
                            </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%">Middle Name</td>
                            <td>
                            @if(! empty($guardian))
                            <input name="guardian_mname" style="width:100%">{{$guardian->middle_name}} </input>
                            @else
                                <input name="guardian_mname" style="width:100%"></input>
                            @endif
                       </td>                        
                        </tr>
                        <tr>                                
                            <td style="width: 30%">Last Name</td>
                            <td>
                            @if(! empty($guardian))
                            <input name="guardian_lname" style="width:100%"> {{$guardian->last_name}}</input>
                            @else
                                <input name="guardian_lname" style="width:100%"></input>
                            @endif
                            </td>                        
                        </tr>
                    </table>

                    <div class="btn-group float-right">
                        <button type="submit" class="btn btn-primary btn-flat mr-2">Save Changes</button>
                          <a href="/student">
                            <button type="button" class="btn btn-default btn-flat">
                            <i class="fas fa-arrow-left"></i>Back</button>
                          </a>
                       
                    </div>
                </form>
                <br>
                <br>
                
           
        </div>
    </div>    

</div>
@endsection

