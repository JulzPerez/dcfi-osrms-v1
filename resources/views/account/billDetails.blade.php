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
                <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-ruble-sign"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"><h5><strong>Total Amount</strong></h4></span>
                            <span class="info-box-number"><h4><strong class="text-red">Php. {{number_format($total_amount,2)}}</strong></span>
                        </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            
                
                    
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:20%">#</th>
                                    <th style="width:40%">Fee Name</th>
                                    <th style="width:200%">Amount</th>            
                                </tr>
                            </thead>
                        
                                <tbody style="line-height: 0.75">
                                    
                                    @php ($count=0)
                                    @foreach($billDetails as $billDetail)
                                    <tr>
                                        <td>{{++$count}}</td>
                                        <td>{{$billDetail->fee_name}}</td>            
                                        <td>{{$billDetail->amount}}</td>
                                    </tr>                            
                                    @endforeach
                                </tbody>
                        
                        </table>
                  
                    
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