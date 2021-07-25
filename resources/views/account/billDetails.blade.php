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

    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h5> Bill Details</h5>
            </div>  
            <div class="card-body">
            
                    <div class="callout callout-danger">
                    
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:20%">Bill ID</th>
                                    <th style="width:40%">Fee Name</th>
                                    <th style="width:200%">Amount</th>            
                                </tr>
                            </thead>
                        
                                <tbody style="line-height: 0.75">
                                    @foreach($billDetails as $billDetail)
                                    <tr>
                                        <td>{{$billDetail->bill_id}}</td>
                                        <td>{{$billDetail->fee_name}}</td>            
                                        <td>{{$billDetail->amount}}</td>
                                    </tr>                            
                                    @endforeach
                                </tbody>
                        
                        </table>
                  
                    </div>
            </div> 
            <div class="card-footer">
                <a href="/account">
                    <button class="btn btn-primary btn-sm float-right" type="button">Back</button>
                </a>
            </div>
                
        
            
        </div>
    </div>


        

</div>
@endsection