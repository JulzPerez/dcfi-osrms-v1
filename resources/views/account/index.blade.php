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
                    <h5>Accounts </h5>
                </div>
                <div class="card-body">
                    @if($accounts == null)
                        <p> No bill record for this account yet.</p>
                    @else
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%">Bill ID</th>
                                        <th style="width:20%">Bill Name</th>
                                        <th style="width:30%">Status</th>
                                        
                                        <th style="width:10%" colspan = 2>Action</th>                 
                                    </tr>
                                </thead>
                            
                                    <tbody style="line-height: 0.75">
                                        @foreach($accounts as $account) 
                                        <tr>
                                            <td>{{$account->bill_id}}</td>
                                            
                                            <td>
                                                <a href="{{ route('account.billDetails',$account->bill_id) }}">
                                                    {{$account->name}}
                                                </a>   
                                            </td>      
                                            
                                            <td>{{$account->status}}</td>
                                        
                                            <td>
                                                <a href="{{ route('account.payments', $account->bill_id) }}" class="btn btn-primary btn-block">
                                                    View Payments
                                                </a>
                                            </td>
                                        
                                        </tr>                         
                                        @endforeach 
                                    </tbody>
                            
                            </table>
                    @endif
                <div>
                <div class="card-footer">

                </div>

                    
            </div>
        </div> 
    <div>
                
</div>
@endsection

@section('scripts')
    <script type="text/javascript">

        $("#custom-tabs-one-bill").click(function(){
            $.ajax({
                url: "",
                method: 'GET',
                success: function(data) {
                    $('#payments').html(data.html);
                }
            });
        });
    
       
    </script>
@endsection
