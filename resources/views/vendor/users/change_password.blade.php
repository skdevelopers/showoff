@extends("vendor.template.layout")

@section("content")
<div class="card mb-5">
    <div class="card-body">
            <form method="post" id="admin-form" action="{{url('vendor/change_password')}}" enctype="multipart/form-data">
                @csrf()
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="cur_pswd" class="form-control jqv-input" data-jqv-required="true">
                        </div>

                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_pswd" class="form-control jqv-input" data-jqv-required="true">
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Change</button>
                        </div>
                    </div>
                </div>
            </form>
        <div class="col-xs-12 col-sm-6">
        
        </div>
    </div>
</div>
@stop

@section("script")
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
                        if (typeof res['errors'] !== 'undefined' &&  res['errors'].length) {
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
                            window.location.href = App.siteUrl('/vendor');
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


    </script>

@stop