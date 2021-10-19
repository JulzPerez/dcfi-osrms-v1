@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('login') }}" class="form-horizontal">
              @csrf
                <div class="card-body">
                  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            
    
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        @if (Route::has('register'))
                            <p>
                               To register online, please   
                                <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                            <br>
                                If already registered on-site, 
                                @if (Route::has('SRMSAccountOnline'))
                                    <a class="btn btn-link" href="{{ route('SRMSAccountOnline') }}">
                                        {{('Activate SRMS Online') }}
                                    </a>
                                @endif
                            </p>
                        @endif
                    </div>   
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">{{ __('Sign in') }}</button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Reset Password') }}
                    </a>
                @endif                
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@section('content1')
<div class="flex-container">
    <div class="row">
        <div class="col-md-9">
            
        </div>
        <div class="col-md-3">
           
        </div>
    </div>
   
</div>
@endsection