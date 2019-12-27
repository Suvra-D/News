@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{ asset('public/admin/assets/css/lib/chosen/chosen.min.css') }}">
<script src="{{ asset('public/admin/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    jQuery(document).ready(function() {
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
                            <strong class="card-title">{{ $page_name }}</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">{{ $page_name }}</h3>
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

                                  {{ Form::open(['url' => 'back/author/store','method'=>'post']) }}

                                      <div class="form-group">
                                          {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('name', null, ['class'=>'form-control','id'=>'name']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('email', 'Email', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('email', null, ['class'=>'form-control','id'=>'email']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('password', 'Password', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('password', null, ['class'=>'form-control','id'=>'password']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('roles', 'Roles', ['class' => 'control-label mb-1']) }}

                                          {{ Form::select('roles[]', $roles, null, ['class'=>'form-control myselect','placeholder'=>'Select Role','multiple']) }}
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

