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

    @if(!$student_exist)
    <div class="row">
        
        <div class="card card-primary">
            <div class="card-header">
                Student Record
            </div>
        
            <div class="card-body">
                <div class="alert alert-info">
                  <h5><i class="icon fas fa-ban"></i> Hi! You have no existing record. Please click on create button to submit record in the database.</h5>

                </div>
                
            </div> <!--end card-body -->
            <div class="card-footer">
                <a href="{{ route('student.create') }}">
                    <button type="button" class="btn btn-outline-primary btn-block">
                    <i class="fas fa-pencil-alt"></i> Create
                    </button>
                </a>
                       
            </div>        
        </div>
    </div>
    @else 
    <!-- ./row -->
    <div class="row">
          <div class="col-md-12">
            <div class="card card-danger card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Personal Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-family-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Family Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-contact-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Contact Info / Address</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Educational Background</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <tr>
                                <td class="text-muted" width="30%">ID No.</td>
                                <td class="text-olive"> {{ ucfirst($student->id)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">LRN</td>
                                <td class="text-olive"> {{ ucfirst($student->LRN)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">First Name</td>
                                <td class="text-olive"> {{ucfirst($student->first_name)}} </td>
                            </tr>

                            <tr>
                                <td class="text-muted">Middle Name</td>
                                <td class="text-olive"> {{ucfirst($student->middle_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Last Name</td>
                                <td class="text-olive"> {{ucfirst($student->last_name)}}</td>
                            </tr>

                            <tr>
                                <td class="text-muted">Suffix/Name Extension</td>
                                <td class="text-olive">{{ ucfirst($student->name_extension)}}</td>
                            </tr>

                            <tr>
                                <td class="text-muted">Sex</td>
                                <td class="text-olive">{{ ucfirst($student->sex)}}</td>
                            </tr>

                            <tr>
                                <td class="text-muted">Contact Number</td>
                                <td class="text-olive">{{ ucfirst($student->contact_no)}}</td>
                            </tr>
                            
                            <tr>
                                <td class="text-muted">Religion</td>
                                <td class="text-olive">{{ ucwords($religion_name)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Citizenship</td>
                                <td class="text-olive">{{ ucfirst($student->citizenship)}}</td>
                            </tr>

                            <tr>
                                <td class="text-muted">Date of Birth</td>
                                <td class="text-olive"> {{ ucfirst($student->birthday)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Place of Birth</td>
                                <td class="text-olive"> {{ ucfirst($student->birthplace)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">No. of Siblings</td>
                                <td class="text-olive"> {{ ucfirst($student->no_siblings)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Birth Order</td>
                                <td class="text-olive"> {{ ucfirst($student->birth_order)}}</td>
                            </tr>

                            
                            <tr>
                                <td class="text-muted">Ethnicity</td>
                                <td class="text-olive">{{ucwords($ethnicity_name)}} </td>
                            </tr>

                            <tr>
                                <td class="text-muted">Mother Tounge</td>
                                <td class="text-olive"> {{ ucwords($mother_tongue_name) }}</td>
                            </tr>
                            
                        </tbody>                          
                    </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  
                    @if($father === null)
                        <p>There is no record for Fathers' Information</p>
                    @else

                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <br>
                            <tr>
                                <h5 class="text-red">Father's Info</h5>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">First Name</td>
                                <td class="text-olive"> {{ucfirst($father->first_name)}}  </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Middle Name</td>
                                <td class="text-olive"> {{ucfirst($father->middle_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Last Name</td>
                                <td class="text-olive"> {{ucfirst($father->last_name)}} </td>
                            </tr>
                            <tr class="text-muted" width="30%">
                                <td class="text-muted"> Name extension</td>
                                <td class="text-olive">{{ucfirst($father->name_extension)}}</td>
                            </tr>
                            <tr class="text-muted" width="30%">
                                <td class="text-muted"> Occupation</td>
                                <td class="text-olive">{{ucfirst($father->occupation)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Contact No.</td>
                                <td class="text-olive">{{$father->contact_no}} </td>
                            </tr>
                            
                                                        
                            
                        </tbody>                          
                    </table>
                    @endif

                    @if($mother === null)
                        <p>There is no record for Mother's Information</p>
                    @else
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <br>
                             <tr>
                                <h5 class="text-red">Mother's Info</h5>                               
                                
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">First Name</td>
                                <td class="text-olive"> {{ucfirst($mother->first_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Middle Name</td>
                                <td class="text-olive"> {{ucfirst($mother->middle_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Last Name</td>
                                <td class="text-olive"> {{ucfirst($mother->last_name)}} </td>
                            </tr>
                            
                            <tr class="text-muted" width="30%">
                                <td class="text-muted"> Occupation</td>
                                <td class="text-olive">{{ucfirst($mother->occupation)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Contact No.</td>
                                <td class="text-olive"> {{$mother->contact_no}} </td>
                            </tr>                            
                            
                        </tbody>                          
                    </table>
                   @endif

                   @if($guardian === null)
                        <p>There is no record for Guardian's Information</p>
                    @else
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <br>
                             <tr>
                                <h5 class="text-red">Guardian's Info</h5>                               
                                
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">First Name</td>
                                <td class="text-olive"> {{ucfirst($guardian->first_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Middle Name</td>
                                <td class="text-olive"> {{ucfirst($guardian->middle_name)}} </td>
                            </tr>
                            <tr>
                                <td class="text-muted" width="30%">Last Name</td>
                                <td class="text-olive"> {{ucfirst($guardian->last_name)}} </td>
                            </tr>

                            <tr class="text-muted" width="30%">
                                <td class="text-muted"> Name extension</td>
                                <td class="text-olive">{{ucfirst($guardian->name_extension)}}</td>
                            </tr>
                            
                            <tr class="text-muted" width="30%">
                                <td class="text-muted"> Occupation</td>
                                <td class="text-olive">{{ucfirst($guardian->occupation)}}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Contact No.</td>
                                <td class="text-olive"> {{$guardian->contact_no}} </td>
                            </tr>                            
                            
                        </tbody>                          
                    </table>
                   @endif


                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            

                            <tr>
                                <td class="text-muted" width="30%">Street/Purok/Barangay</td>
                                <td class="text-olive"> {{ ucfirst($student->purok)}}</td>
                            </tr>

                            <tr>
                                <td class="text-muted">City/Municipality</td>
                                @if($city_name != null)
                                    <td class="text-olive"> {{$city_name}} </td>
                                @else
                                    <td class="text-olive"> No record </td>
                                @endif

                            </tr>

                            <tr>
                                <td class="text-muted">Province</td>
                                <td class="text-olive"> {{$province_name}}</td>
                            </tr>

                            
                        </tbody>                          
                    </table>

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
    
        

    @endif
</div>
@endsection