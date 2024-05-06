@extends('admin.template.layout')
@section('header')
   
@stop
@section('content')
    <div class="card mb-5">
        <div class="card-body">
            <div class="">
                <form method="post" id="admin-form" action="{{ url('admin/save_activity_type') }}" enctype="multipart/form-data"
                    data-parsley-validate="true">
                    <input type="hidden" name="id" id="cid" value="{{ $id }}">
                    @csrf()
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Account Type<b class="text-danger">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend w-100">
                                        <select class="form-control " name="account_id" required
                                                data-parsley-required-message="">
                                            <option value="">Select Account Type</option>
                                            @foreach ($accounts as $account)
                                                <option @if($id) @if($account_id==$account->id) selected
                                                        @endif @endif value="{{ $account->id }}"> {{ $account->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </div>
                                </div>
                                <span id="mob_err"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Name<b class="text-danger">*</b></label>
                                <input type="text" name="name" class="form-control" required
                                    data-parsley-required-message="Enter Activity Type Name" value="{{ $name }}">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label> Description</label>
                                <input type="text" name="description" class="form-control"
                                    data-parsley-required-message="Enter Activity Type Description" value="{{ $description }}">
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
        </div>
    </div>
@stop
@section('script')
    <script>
        App.initFormView();
       
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
                                    window.location.href = App.siteUrl('/admin/activity_type');
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
    </script>
@stop
