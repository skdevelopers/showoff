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
        <form method="post" id="admin-form" action="{{ url('vendor/vendors') }}" enctype="multipart/form-data"
              data-parsley-validate="true">
            <input type="hidden" name="id" value="{{ $id }}">
            @csrf()

            <div class="card mb-2">
                <div class="card-body">
              
                    <div class="row">
                    
                        
                        
                       
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Business Name <span style="color:red;">*<span></span></span></label>
                                <input type="text" class="form-control" name="name" data-jqv-maxlength="50" value="{{empty($datamain->name) ? '': $datamain->name}}" required
                                       data-parsley-required-message="Enter Name">
                            </div>
                        </div>

                        


                        
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Email <span style="color:red;">*<span></span></span></label>
                                <input type="email" class="form-control" name="email" data-jqv-maxlength="50" value="{{empty($datamain->email) ? '': $datamain->email}}" required
                                       data-parsley-required-message="Enter Email" readOnly>

                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <label>Phone Number<b class="text-danger">*</b></label>
                            <div style="display: flex; gap: 10px; align-items: flex-start;">
                                <div>
                                    <select name="dial_code" class="form-control select2" required style="width: 90px; padding: 10px;"
                                            data-parsley-required-message="Select Dial Code">
                                        <option value="">Select</option>
                                        @foreach ($countries as $cnt)
                                            <option <?php if(!empty($datamain->dial_code)) { ?> {{$datamain->dial_code == $cnt->dial_code ? 'selected' : '' }} <?php } ?> value="{{ $cnt->dial_code }}">
                                                {{$cnt->dial_code}}</option>
                                        @endforeach;
                                    </select>
                                </div>
                                <div class="w-100">
                                    <input type="text" class="form-control w-100" name="phone" value="{{empty($datamain->phone) ? '': $datamain->phone}}" data-jqv-required="true"  data-parsley-required-message="Enter Phone number">
                                </div>
                            </div>
                        </div>


                        <!--<div class="col-sm-1 col-xs-12">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Dial Code<b class="text-danger">*</b></label>-->
                        <!--        <select name="dial_code" class="form-control select2" required-->
                        <!--                data-parsley-required-message="Select Dial Code">-->
                        <!--            <option value="">Select</option>-->
                        <!--            @foreach ($countries as $cnt)-->
                        <!--                <option <?php if(!empty($datamain->dial_code)) { ?> {{$datamain->dial_code == $cnt->dial_code ? 'selected' : '' }} <?php } ?> value="{{ $cnt->dial_code }}">-->
                        <!--                    {{$cnt->dial_code}}</option>-->
                        <!--            @endforeach;-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="col-sm-3 col-xs-12">-->
                        <!--    <div class="form-group">-->
                        <!--        <label>Phone Number <span style="color:red;">*<span></span></span></label>-->
                        <!--        <input type="text" class="form-control" name="phone" value="{{empty($datamain->phone) ? '': $datamain->phone}}" data-jqv-required="true" required-->
                        <!--               data-parsley-required-message="Enter Phone number">-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" data-jqv-maxlength="50" value="" data-parsley-minlength="8"
                                >

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input type="password" class="form-control" name="confirm_password" data-jqv-maxlength="50" value="" data-parsley-minlength="8"
                                       data-parsley-equalto="#password"
                                       data-parsley-required-message="Please re-enter your new password."
                                       data-parsley-required-if="#password">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Category <b class="text-danger">*</b></label>
                                <select class="form-control" name="main_category_id" required
                                            data-parsley-required-message="">
                                    <option value="">Select</option>
                                    @foreach ($categories as $cnt)
                                    <option @if($id) @if($datamain->main_category_id==$cnt->id) selected @endif
                                        @endif value="{{ $cnt->id }}">{{ $cnt->name }}</option>
                                    @endforeach;
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Country<b class="text-danger">*</b></label>
                                <select name="country_id" class="form-control select2" required
                                        data-parsley-required-message="Select Country" data-role="country-change" id="country" data-input-state="city-state-id">
                                    <option value="">Select</option>
                                    @foreach ($countries as $cnt)
                                        <option <?php if(!empty($datamain->country_id)) { ?> {{$datamain->country_id == $cnt->id ? 'selected' : '' }} <?php } ?> value="{{ $cnt->id }}">
                                            {{ $cnt->name }}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>
                        
                         <div class="col-lg-4 col-md-4 position-relative">
                                            <label class="fieldlabels">State/Emirate: *</label> 
                                            <select class="form-control" name="state_id"  required
                                            data-parsley-required-message="Select State" id="city-state-id" data-role="state-change"  data-input-city="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                                 @foreach ($states as $cnt)
                                        <option <?php if(!empty($datamain->state_id)) { ?> {{$datamain->state_id == $cnt->id ? 'selected' : '' }} <?php } ?> value="{{ $cnt->id }}">
                                            {{ $cnt->name }}</option>
                                    @endforeach;
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-6 position-relative">
                                            <label class="fieldlabels">City: *</label>
                                            <select class="form-control" name="city_id"  required
                                            data-parsley-required-message="Select City" id="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                                 @foreach ($cities as $cnt)
                                        <option <?php if(!empty($datamain->city_id)) { ?> {{$datamain->city_id == $cnt->id ? 'selected' : '' }} <?php } ?> value="{{ $cnt->id }}">
                                            {{ $cnt->name }}</option>
                                    @endforeach;
                                            </select>
                                        </div>
                       
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>About Me <span style="color:red;">*<span></span></span></label>
                                <textarea class="form-control" name="about_me" data-jqv-maxlength="50"  required
                                       data-parsley-required-message="Enter Description">{{empty($datamain->about_me) ? '': $datamain->about_me}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Trade License <span style="color:red;">*<span></span></span> (jpg, jpeg, png, pdf)<a> @if($id && $datamain->trade_license)<a href="{{$datamain->trade_license}}" target="_blank"><font color="blue">View Doc</font></a>@endif </label>
                                    <input type="file" class="form-control jqv-input" name="trade_license" data-role="file-image"  data-preview="trade_license-preview" value="" @if(empty($id)) required
                                           data-parsley-required-message="Trade License is required" @endif >
                                    
                                </div>
                                <!--<img id="trade_license-preview" class="img-thumbnail w-50" style="margin-left: 5px; height:50px; width:50px !important;" src="{{empty($datamain->trade_license) ? asset('uploads/company/17395e3aa87745c8b488cf2d722d824c.jpg'): $datamain->trade_license}}">-->
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Business Logo <span style="color:red;">*<span></span></span></label>
                                    <input type="file" class="form-control jqv-input" name="image" data-role="file-image" data-max-width="600" data-max-height="400" data-min-width="500" data-min-height="330" data-preview="image-preview" @if(empty($id)) required
                                           data-parsley-required-message="Image is required" @endif>
                                    <p class="text-muted">Max dim 600x400 (pix). Min dim 500x330 (pix).</p>
                                </div>
                                <img id="image-preview" class="img-thumbnail w-50" style="margin-left: 5px; height:50px; width:50px !important;     margin-top: -20px;" src="{{empty($datamain->user_image) ? asset('uploads/company/17395e3aa87745c8b488cf2d722d824c.jpg'): $datamain->user_image}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="col-lg-4 col-md-6 col-xs-12 other_docs mt-3" id="certificate_product_registration_div" >
                                <div class="form-group">
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
                            window.location.href = App.siteUrl('/vendor/my_profile');
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
