@extends("admin.template.layout")

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop


@section('content')
    <div class="card mb-5">

        <div class="card-body">
            <form method="post" action="{{ url('/admin/banner/create') }}" id="admin-form" enctype="multipart/form-data" data-parsley-validate="true">
                @csrf
                <input type="hidden" name="id" value="{{$datamain->id??''}}">
                <div class="row  d-flex justify-content-between align-items-center">
                  
                    <div class="col-md-6 form-group select-category-form-group">
                        <label>Outlet</label>
                        <select class="form-control select2"
                            name="outlet_id" data-role="category-change" id="outlet_id" data-input-prd="prd-id">
                            <option value="">Select outlet</option>
                            @foreach($outlets as $key => $val)
                                <option catid="{{ $val->main_category_id }}"  value="{{$val->id}}" {{!empty($datamain->outlet_id) && $datamain->outlet_id == $val->id ? 'selected' : null;}}>{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group select-category-form-group">
                        <label>Category</label>
                        <select class="form-control select2"
                            name="category_id" data-role="category-change" id="category_ids" data-input-prd="prd-id">
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $val)
                                <option value="{{$val->id}}" {{!empty($datamain->category_id) && $datamain->category_id == $val->id ? 'selected' : null;}}>{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="col-md-6 form-group d-none">
                        <label>Banner Type</label>
                        <select name="type" class="form-control select2" id="prd-id">
                            <option value="1" {{!empty($datamain->type) && $datamain->type == 1 ? 'selected' : null;}}>Main banner</option>
                            <option value="2" {{!empty($datamain->type) && $datamain->type == 2 ? 'selected' : null;}}>Secondary banner</option>
                            <option value="3" {{!empty($datamain->type) && $datamain->type == 3 ? 'selected' : null;}}>Tertiary Banner</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Status</label>
                        <select name="active" class="form-control">
                            <option value="1" {{!empty($datamain->active) && $datamain->active == 1 ? 'selected' : null;}}>Active</option>
                            <option value="0" {{!empty($datamain) && $datamain->active == 0 ? 'selected' : null;}}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                       
                    </div>
                   

                    <div class="col-md-6 form-group">
                        <label>Upload Banner <b class="text-danger">*</b></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input jqv-input" name="banner"
                                data-role="file-image" data-preview="image-preview" {{!empty($datamain->id) ? '' : 'required';}}
                                data-parsley-required-message="image is required" name="upload_image" id="banner" data-parsley-imagedimensionsss="1920X1079" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg,webp"
                                data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        {{-- <small class="text-muted">
                            Upload Image With Dimension 1920X1079
                        </small> --}}
                    </div>
                   
                     <div class="col-md-6 form-group" >
                        <img id="image-preview" style="width:192px; height:108px;" class="img-responsive mb-1"  data-image="@if(!empty($datamain->banner_image)){{$datamain->banner_image}} @endif" src="@if(!empty($datamain->banner_image)){{$datamain->banner_image}}@else{{asset('/admin-assets/assets/img/placeholder.jpg')}} @endif">
                    </div>
                    
                   
                   
                   


                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script>
        App.initFormView();
        $(document).ready(function() {
            $('.select2').select2();
        });
        $('body').off('submit', '#admin-form');
        $('body').on('submit', '#admin-form', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = new FormData(this);
            $(".invalid-feedback").remove();

            App.loading(true);
            $form.find('button[type="submit"]')
                .text('Saving')
                .attr('disabled', true);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: $form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                timeout: 600000,
                success: function(res) {
                    App.loading(false);

                    if (res['status'] == 0) {
                        if (typeof res['errors'] !== 'undefined') {
                            var error_def = $.Deferred();
                            var error_index = 0;
                            jQuery.each(res['errors'], function(e_field, e_message) {
                                if (e_message != '') {
                                    $('[name="' + e_field + '"]').eq(0).addClass('is-invalid');
                                    $('<div class="invalid-feedback">' + e_message + '</div>')
                                        .insertAfter($('[name="' + e_field + '"]').eq(0));
                                    if (error_index == 0) {
                                        error_def.resolve();
                                    }
                                    error_index++;
                                }
                            });
                            error_def.done(function() {
                                var error = $form.find('.is-invalid').eq(0);
                                $('html, body').animate({
                                    scrollTop: (error.offset().top - 100),
                                }, 500);
                            });
                        } else {
                            var m = res['message'];
                            App.alert(m, 'Oops!');
                        }
                    } else {
                        App.alert(res['message']);
                        setTimeout(function() {
                            window.location.href = App.siteUrl('/admin/banners');
                        }, 1500);
                    }

                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                },
                error: function(e) {
                    App.loading(false);
                    $form.find('button[type="submit"]')
                        .text('Save')
                        .attr('disabled', false);
                    App.alert(e.responseText, 'Oops!');
                }
            });
        });

        $(document).on('change','#outlet_id',function(){
            var outlet_id = $(this).val();
            var catid =  $('option:selected', this).attr('catid');; 
            $("#category_ids").val(catid).change();
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{url("admin/get_video_by_outlet")}}',
                data: {
                    '_token':'{{csrf_token()}}',
                   'outlet_id' : outlet_id,
                   
                },               
                dataType: 'json',
                
                success: function(res) {
                     var html = "";
                    for (var i = 0; i < res['o_data'].length; i++) {
                        html += '<option value="' + res['o_data'][i]['id'] + '">' + res[
                            'o_data'][i]['video_title'] + '</option>';
                        
                    }  
                    $('#videos').html(html);
                }
            });
        });



    </script>
@stop
