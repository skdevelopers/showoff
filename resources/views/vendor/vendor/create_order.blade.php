@extends('vendor.template.layout')

@section('content')
    @if(!empty($datamain->vendordatils))
        @php
            $vendor     = $datamain->vendordatils;
            $bankdata   = $datamain->bankdetails;
        @endphp
    @endif
    <div class="mb-5">
        <!--<div class="card p-4">-->
        <form method="post" id="admin-form" action="{{ url('vendor/create_order_store') }}" enctype="multipart/form-data"
              data-parsley-validate="true">
            <input type="hidden" name="id" value="{{ $id }}">
            @csrf()

            <div class="card mb-2">
                <div class="card-body">
              
                    <div class="row">
                    
                        
                        
                       
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Voucher Code <span style="color:red;">*<span></span></span></label>
                                <input type="text" class="form-control" name="qr_code" data-jqv-maxlength="50" value="" required
                                       data-parsley-required-message="Enter Voucher Code">
                            </div>
                        </div>

                        


                        
            
            <div class="col-sm-4 col-xs-12 other_docs mt-3" id="certificate_product_registration_div" >
                                <div class="form-group">
                                <label></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

           

           


          





          



           




            </div>
        </form>
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
                            window.location.href = App.siteUrl('/vendor/coupon_usage');
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
