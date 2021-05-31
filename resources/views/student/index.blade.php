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
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary">
              <div class="card-body box-profile">
                <div class="text-center">
                    <a href="#">
                        <img class="profile-user-img img-fluid img-circle"
                            src="images/profile.png"
                            alt="User profile picture">
                    </a>
                </div>

                <h3 class="profile-username text-center">{{ucfirst($student->first_name).' '.ucfirst($student->last_name)}}</h3>

                <p class="text-muted text-center">{{ $student->student_type}}</p>

                <hr>
                <a href="{{ route('student.edit', $student->id) }}">
                    <button  type="button" class="btn btn-primary ">Edit Info</button>
                </a>
               
                <a href="#">
                    <button  type="button" class="btn btn-primary ">Change Picture</button>
                </a>
                
                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->            
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h5> Student Information </h5>
                </div>
              
              <div class="card-body">
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
                            <td class="text-olive">{{ ucfirst($student->religion)}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Citizenship</td>
                            <td class="text-olive">{{ ucfirst($student->citizenship)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Date of Birth</td>
                            <td class="text-olive"> {{ ucfirst($student->birthdate)}}</td>
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
                            <td class="text-muted">Purok</td>
                            <td class="text-olive"> {{ ucfirst($student->purok)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Municipality</td>
                            <td class="text-olive"> {{ ucfirst($student->municipality)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Province</td>
                            <td class="text-olive"> {{ ucfirst($student->province)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Father</td>
                            <td class="text-olive"> {{ ucfirst($student->father_fullname)}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Father Occupation</td>
                            <td class="text-olive"> {{ ucfirst($student->father_occupation)}}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Mother</td>
                            <td class="text-olive"> {{ ucfirst($student->mother_fullname)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Mother Occupation</td>
                            <td class="text-olive"> {{ ucfirst($student->mother_occupation)}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Modality</td>
                            <td class="text-olive"> {{ $modality_name}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Ethnicity</td>
                            <td class="text-olive"> {{ $ethnicity_name}}</td>
                        </tr>

                        <tr>
                            <td class="text-muted">Mother Tounge</td>
                            <td class="text-olive"> {{ $mother_tounge_name}}</td>
                        </tr>
                        
                    </tbody>                          
                </table>
                
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
         <!-- /.col -->
    </div>
</div>
@endsection