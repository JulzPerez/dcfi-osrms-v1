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
    <br>

    
    <div class="row ">
        
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"> Search Result </div>
                         
                <div class="card-body" >
                    @if(empty($payments))
                            <p> <strong class="text-red">No proof of payment was uploaded by this student! </strong> </p>
                            
                    @else
                    <table class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th style="width:5%">#</th>    
                                <th style="width:55%">File Name</th>
                                <th style="width:20%">Payment Purpose</th>
                                <th style="width:20%">Date Uploaded</th>    
                            </tr>
                        </thead>

                            <tbody style="line-height: 0.75" id="search_result">
                                @php ($count=0)
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{++$count}}.</td>
                                    <td> 
                                        <a href="{{ route('downloadFile', $payment->proof) }}" >
                                            {{$payment->proof}}
                                        </a>
                                    </td>   
                                    <td> {{$payment->payment_for}}</td> 
                                    <td> {{$payment->created_at}}</td>
                                </tr>                            
                                @endforeach
                                            
                            </tbody>
                    </table>
                    @endif

                </div>
                <div class="card-footer">
                    <a href="{{route('searchForm')}}">
                        <button type="button" class="btn btn-primary">Back</button>
                    </a>                    
                </div>               
                
            </div>
            <!-- /.card -->
        </div>  
    </div>

        
</div>
@endsection

