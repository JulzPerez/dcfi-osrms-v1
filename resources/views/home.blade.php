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
                    <ol start="1">
                        <li>Complete the STUDENT PROFILE by filling in all necessary information, and submit.</li>
                        <li>Then, click the ENROLLMENT facility button, fill in the required information, and enroll.</li>
                        <li>Upload all needed documents through the UPLOAD REQUIREMENTS facility button for validation. </li>
                        <li>Documents submitted will be checked and validated by the Registrar. </li>
                        <li>Once documents are validated, you may now process the PAYMENT. </li>
                        <li>Once payment is successfully made, upload the proof of your payment through the UPLOAD PROOF OF PAYMENT facility button.</li> 
                        <li>The Business and Finance Office (BFO) will then verify your payment.</li>
                        <li>Once payment is made, student must upload payment in the Upload Payment link  </li>
                        <li>Status of verification can be seen at the ACCOUNT TRACKING button.</li>
                        <li>Lastly, the enrollment record shall be viewed after all steps are successful.</li>
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
