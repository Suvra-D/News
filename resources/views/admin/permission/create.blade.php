@extends('admin.layout.master')

@section('content')
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Permission Create Page</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <div class="card-title">
                                      <h3 class="text-center">Pay Invoice</h3>
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
<!--
                                  {{ Form::open(['url' => 'back/permission/create','method'=>'post']) }}
                                  -->
                                  {{ Form::open(['url' => 'back/permission/store','method'=>'post']) }}
<!--
                                      <div class="form-group text-center">
                                          <ul class="list-inline">
                                              <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                          </ul>
                                      </div>
-->
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
