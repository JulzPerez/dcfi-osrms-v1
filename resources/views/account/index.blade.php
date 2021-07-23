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
        <div class="col-md-12">
            <div class="card card-primary card-outline">
            <div class="card-header">
                
            
                <form class="form-inline ml-3 float-right">
                    <div class="input-group input-group-sm ">
                        <input class="form-control form-control-navbar " type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>
                    </div>
                </form>
            </div>
                
                <div class="card-body"  >
                    <!--   <p>Document List</p> -->
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
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->status}}</td>
                                   
                                    <td>
                                        <a href="{{ route('account.billDetails',$account->bill_id)}}" class="btn btn-primary btn-block">View Details
                                        <!-- <i class="fas fa-edit"></i> -->
                                        </a>
                                    </td>
                                   
                                </tr>                            
                                @endforeach
                            </tbody>
                    
                    </table>
                  
                </div>
            </div>
              <!-- /.card-body -->
              
            <!-- /.card -->
        </div>
    </div> 

</div>
@endsection