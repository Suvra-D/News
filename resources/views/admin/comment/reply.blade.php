@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="{{ asset('public/admin/assets/css/lib/chosen/chosen.min.css') }}">
<script src="{{ asset('public/admin/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, Nothing Found!",
            width: "100%"
        });


        jQuery('textarea.my-editor').ckeditor({
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
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

                                  {{ Form::open(['url' => 'back/comment/reply','method'=>'post']) }}

                                      <div class="form-group">
                                          {{ Form::label('comment', 'Comment', ['class' => 'control-label mb-1']) }}

                                          {{ Form::textarea('comment', null, ['class'=>'form-control','id'=>'comment']) }}
                                      </div>
                                          {{ Form::hidden('post_id',$id) }}

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


