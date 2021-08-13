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

    
    <div class="row mt-3">
        
        @if($accounts->isEmpty())
        <br>
        <div class="callout callout-danger">
            <h5 class="text-red">Info: No billing record for the student this school year {{session('school_year_name')}}.</h5>
        </div>     
        @else
        <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h5> Billing  for Academic Year {{session('school_year_name')}}</h5>
                    </div>  
                    <div class="card-body">
                    @foreach($accounts as $account)
                        <div class="callout callout-danger">
                            
                            <table class="table  table-bordered">
                                <tbody>  
                                    <tr>
                                        <td class="text-muted" width="30%"><h6>Bill Name</h6></td>
                                        <td class="text-olive"> {{$account->name}} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted" width="30%">Account Status</td>
                                        <td class="text-olive"> {{$account->status}}</td>
                                    </tr>

                                   <!--  <tr>
                                        <td class="text-muted" width="30%">Total Bill Amount</td>
                                        <td class="text-olive">  </td>
                                    </tr>

                                    <tr>
                                        <td class="text-muted" width="30%">Total Payment Amount</td>
                                        <td class="text-olive"> </td>
                                    </tr> -->
                                    
                                    <tr>
                                        <td class="text-muted" width="30%"></td>
                                        <td class="text-olive">
                                            <a href="{{ route('account.billDetails',$account->bill_id) }}">
                                                   <strong class="text-blue"> View Bill Fees </strong>
                                            </a> / 
                                            <a href="{{ route('account.payments', $account->bill_id) }}" >
                                            <strong class="text-blue"> View Payments </strong>
                                            </a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> 
                        
                    @endforeach
                    </div>
                </div>


            
        @endif
        </div>
    </div>
                
</div>
@endsection


