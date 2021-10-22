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
        
        @if($accounts === null)
        <br>
        <div class="callout callout-danger">
            <h5 class="text-red">Info: No billing record for the student this school year {{$SY->SY}}.</h5>
        </div>     
        @else
        <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h5> Billing  for Academic Year {{$SY->SY}}</h5>
                    </div>  
                    <div class="card-body">
                   
                        <div class="callout callout-danger">
                            
                            <table class="table  table-bordered">
                                <tbody>  
                                    <tr>
                                        <td class="text-muted" width="30%"><h6>Bill Name</h6></td>
                                        <td class="text-olive"> {{$accounts->name}} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted" width="30%">Account Status</td>
                                        <td class="text-olive"> {{$accounts->status}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted" width="30%">Outstanding Balance</td>
                                        <td class="text-olive"> {{number_format($outstanding_balance,2)}}</td>
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
                                            <a href="{{ route('account.billDetails',$accounts->bill_id) }}">
                                                   <strong class="text-blue"> View Bill Fees </strong>
                                            </a> | 
                                            <a href="{{ route('account.payments', $accounts->bill_id) }}" >
                                            <strong class="text-blue"> View Payments </strong>
                                            </a>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> 
                        
                 
                    </div>
                </div>


            
       
        </div>
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-info"></i> BANK ACCOUNT</h5>
                    <ol start="1">
                      
                        <br>
                        <p>Bank Name: BPI <br>
                        Account Name: DANSALAN COLLEGE FOUNDATION INC <br>
                        Account Number: 9351-0048-59 </p>
                        <br>
                        <p>Bank Name: LANDBANK <br>
                        Account Name: DANSALAN COLLEGE <br>
                        Account Number: 0321-2010-40</p>
                        
                    </ol>
            </div>
        </div>
        @endif
    </div>
                
</div>
@endsection


