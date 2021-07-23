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

    
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h6>Accounts </h6>
                </div>
                <div class="card-body">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10%">Payment ID</th>
                                        <th style="width:30%">Amount</th>
                                        <th style="width:30%">Method of Payment</th>
                                        <th style="width:30%">Balance</th>
                                        
                                                   
                                    </tr>
                                </thead>
                            
                                <tbody style="line-height: 0.75">
                                    @foreach($billPayments as $billPayment) 
                                    <tr>
                                        <td>{{$billPayment->id}}</td>
                                        
                                        <td> {{$billPayment->amount}}</td>      
                                        
                                        <td>{{$billPayment->method_payment}}</td>
                                    
                                        
                                    
                                    </tr>                         
                                    @endforeach 
                                </tbody>
                            
                            </table>
                    
                <div>
                    
            </div>
        </div> 
    <div>
                
</div>
@endsection


