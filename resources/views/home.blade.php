@extends('layouts.master')

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card">

                <div class="card-body"> -->
                    <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> Enrollment Guide!</h5>
                    <ol>
                        <li>You must fill-in required information in profile. You cannot enroll unless you do so.</li>
                        <li>When profile has been submitted and recorded, you click on Enrollment link or button to enroll.</li>
                        <li>Fill in necessary information for enrollment.</li>
                        <li>Once successful submission, data will be recorded and now subject for validation. </li>
                        <li>Requirements needed can be uploaded in the Upload Requirements link. This will be used by the registrar in validating enrollment.
                        <li>Registrar will validate record and once validated, you can now pay for the enrollment fee as can be seen in Enrollment tracking link or button. 
                            <!-- <ol>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                            <li>Vestibulum laoreet porttitor sem</li>
                            <li>Ac tristique libero volutpat at</li>
                            </ol> -->
                        </li>
                        <li>Once payment is made, student must upload payment in the Upload Payment link  </li>
                        <li>Payment will be verified by the registrar. Status of verification can be seen in account tracking.</li>
                        <li>You can then finally see enrollment record once all steps above are completed.</li>
                    </ol>
                    </div>
                <!-- </div>

            </div> -->
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            
            <div class="card">
              
              <div class="card-body">
                
                <a class="btn btn-app" href="/student">
                <i class="nav-icon fas fa-user-circle"></i> Profile
                </a>
                <a class="btn btn-app" href="{{route('enroll_index')}}">
                <i class="nav-icon fas fa-book-reader"></i> Enrollment
                </a>
                <a class="btn btn-app" href="/upload">
                <i class="nav-icon fas fa-upload"></i> Upload Requirements
                </a>
                
                <a class="btn btn-app" href="{{ route('users.index') }}">
                 
                  <i class="nav-icon fas fa-users" href="/payment"></i> Upload Proof of Payment
                </a>
                <a class="btn btn-app">
                  <i class="fas fa-funnel-dollar"></i> Account Tracking
                </a>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
