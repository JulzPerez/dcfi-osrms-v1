@extends('layouts.master')

@section('main_content')
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <!-- <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul> -->
              <p>
              Please fill-in required information!
              </p>
            </div><br />
          @endif
            
        </div>
      </div>
    </div>

        <div class="row no-gutters m-0 p-0">
          <div class="col-md-12">
            <!-- <div class="card "> -->
              <!-- <div class="card-header">
                <h3 class="card-title">Collapsible Accordion</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- <div class="card-body"> -->
                <div id="accordion"> 
                  <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          Personal Background
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in show mb-0">
                      <div class="card-body">
                          @include('student.partials.personal-background')
                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Save Data</button>
                      </div>
                    </div>
                  </div>
                  <div class="card card-danger">
                    <div class="card-header">
                      <h4 class="card-title mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          Educational Background
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card card-success">
                    <div class="card-header">
                      <h4 class="card-title mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Family Background
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse ">
                      <div class="card-body ">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                        3
                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum
                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                        nulla
                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                        beer
                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                        labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div>
              <!--</div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
         
        </div>
        <!-- /.row -->      
        
      </div>    

</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("#province").change(function(){
            $.ajax({
                url: "{{ route('getMunicipality') }}?province_no=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#municipality').html(data.html);
                }
            });
        });
    
        $("#province").change(function(){
            $.ajax({
                url: "{{ route('getCity') }}?province_no=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#city').html(data.html);
                }
            });
        });

        
    </script>

    
@endsection

