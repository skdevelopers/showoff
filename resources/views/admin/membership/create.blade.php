@extends('admin.template.layout')
@section('header')
   
@stop
@section('content')
    <div class="card mb-5">
        <div class="card-body">
            <div class="col-xs-12">
                <form method="post" id="admin-form" action="{{ url('admin/save_membership') }}" enctype="multipart/form-data"
                    data-parsley-validate="true">
                    <input type="hidden" name="id" id="cid" value="{{ $id }}">
                    @csrf()
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Memebership Name<b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control" required
                                data-parsley-required-message="Enter brand name" value="{{ $name }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description<b class="text-danger">*</b></label>
                            <textarea name="description" class="form-control" required
                                data-parsley-required-message="Enter description">{{ $datamain->description??'' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Type<b class="text-danger">*</b></label>
                                <select name="type" class="form-control" required>
                                    <option value="">Select</option>
                                    <option {{!empty($datamain) && $datamain->type == 1 ? 'selected' : null;}} value="1">Annually</option>
                                    <option {{!empty($datamain) && $datamain->type == 2 ? 'selected' : null;}} value="2">Monthly</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Amount<b class="text-danger">*</b></label>
                            <input type="text" name="amount" class="form-control" required
                                data-parsley-required-message="Enter Amount" oninput="validateNumber(this);" value="{{ $datamain->amount??'' }}">
                        </div>
                    </div>
                    
                   
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="active" class="form-control">
                                    <option <?= $active == 1 ? 'selected' : '' ?> value="1">Active</option>
                                    <option <?= $active == 0 ? 'selected' : '' ?> value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logo</label><br>
                                <img id="image-preview" style="width:50px; height:50px;" class="img-responsive"
                                    @if ($image) src="{{ asset($image) }}" @endif>
                                <br><br>
                                <input type="file" name="image" class="form-control" data-role="file-image" data-preview="image-preview" data-parsley-trigger="change"
                                    data-parsley-fileextension="jpg,png,gif,jpeg,webp"
                                    data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" data-parsley-imagedimensions="100x100">
                                <span class="text-info">Upload image with dimension 100x100</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group b_img_div d-none">
                                <label>Banner Image</label><br>
                                <img id="image-preview-b" style="width:300px; height:93px;" class="img-responsive"
                                    @if ($banner_image) src="{{ $banner_image }}" @endif>

                                <br><br>
                                <input type="file" name="banner_image" class="form-control" onclick="this.value=null;" data-role="file-image" data-preview="image-preview-b" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg" data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB">
                            </div>
                        </div>
                        
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        App.initFormView();
        // $(document).ready(function() {
        //     if (!$("#cid").val()) {
        //         $(".b_img_div").removeClass("d-none");
        //     }
        // });
        // $(".parent_cat").change(function() {
        //     if (!$(this).val()) {
        //         $(".b_img_div").removeClass("d-none");
        //     } else {
        //         $(".b_img_div").addClass("d-none");
        //     }
        // });
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

            var parent_tree = $('option:selected', "#parent_id").attr('data-tree');
            formData.append("parent_tree", parent_tree);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: $form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                dataType: 'json',
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
                            var m = res['message'] ||
                            'Unable to save category. Please try again later.';
                            App.alert(m, 'Oops!');
                        }
                    } else {
                        App.alert(res['message'], 'Success!');
                                setTimeout(function(){
                                    window.location.href = App.siteUrl('/admin/membership');
                                },1500);
                       
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
        var validNumber = new RegExp(/^\d*\.?\d*$/);
var lastValid = 0;
function validateNumber(elem) {
  if (validNumber.test(elem.value)) {
    lastValid = elem.value;
  } else {
    elem.value = lastValid;
  }
}
    </script>
@stop
