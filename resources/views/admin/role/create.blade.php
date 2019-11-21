@extends('admin.layout.master')

@section('content')

<script>
    jQuery(document).ready(function(){
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Nothing Found!",
            width: "100%"
        });
    });
</script>
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $rolepage_create }}</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">{{ $rolepage_create }}</h3>
                                  </div>
                                  <hr>

                                  @if(count($errors) > 0)
                                      <div class="alert alert-danger" role="alert">
                                          <ul>
                                              @foreach($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif

                                  {{ Form::open(['url' => 'back/role/store','method'=>'post']) }}

                                      <div class="form-group">
                                          {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('name', null, ['class'=>'form-control','id'=>'name']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('display_name', null, ['class'=>'form-control','id'=>'display_name']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('description', 'Description', ['class' => 'control-label mb-1']) }}

                                          {{ Form::textarea('description', null, ['class'=>'form-control','id'=>'description']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('permission', 'Permission', ['class' => 'control-label mb-1']) }}

                                          {{ Form::select('permission[]',$role_permission, null, ['class'=>'form-control myselect' ,'placeholder'=>'Select Permissions','multiple']) }}
                                      </div>

                                      <div>
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Submit</span>
                                              <span id="payment-button-sending" style="display:none;">Sendingâ€¦</span>
                                          </button>
                                      </div>
                                  {{ Form::close() }}
                                  <!--</form>-->
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->
                </div>
                </div>
@endsection

