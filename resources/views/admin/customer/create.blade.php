@extends('admin.template.layout')

@section('content')
@if(!empty($datamain->vendordatils))
@php
// $vendor = $datamain->vendordatils;
$bankdata = $datamain->bankdetails;
@endphp
@endif
<div class="mb-5">
    <style>
    #parsley-id-15,
    #parsley-id-23 {
        bottom: auto;
    }

    #parsley-id-33 {
        bottom: -10px
    }

    .parsley-errors-list>.parsley-pattern {
        margin-top: 10px;
    }
    </style>
    <form method="post" id="admin-form" action="{{ url('admin/customers') }}" enctype="multipart/form-data"
        data-parsley-validate="true">
        <input type="hidden" name="id" value="{{ $id }}">
        @csrf()
        <div class="">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Full Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" data-jqv-maxlength="100" name="name"
                                    value="{{empty($datamain->name) ? '': $datamain->name}}" required
                                    data-parsley-required-message="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12" style="display:none;">
                            <div class="form-group">
                                <label>Username <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" data-jqv-maxlength="100" name="user_name"
                                    value="{{empty($datamain->user_name) ? '': $datamain->user_name}}"
                                    data-parsley-required-message="Enter Username">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Email <b class="text-danger">*</b></label>
                                <input type="email" class="form-control" name="email" data-jqv-maxlength="50"
                                    value="{{empty($datamain->email) ? '': $datamain->email}}" required
                                    data-parsley-required-message="Enter Email" autocomplete="off" autocomplete="new-password" >

                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Mobile <b class="text-danger">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control" name="dial_code" required
                                            data-parsley-required-message="">
                                            <option value="">code</option>
                                            @foreach ($countries as $cnt)
                                            <option @if($id) @if($datamain->dial_code==$cnt->dial_code) selected @endif
                                                @endif value="{{ $cnt->dial_code }}">+{{ $cnt->dial_code }}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <input type="number" class="form-control" name="phone"
                                        value="{{empty($datamain->phone) ? '': $datamain->phone}}"
                                        data-jqv-required="true" required
                                        data-parsley-required-message="Enter Phone number" data-parsley-type="digits"
                                        data-parsley-minlength="5" data-parsley-maxlength="12"
                                        data-parsley-trigger="keyup" min="0" data-parsley-min-message="Invalid number">
                                </div>
                                <span id="mob_err"></span>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12" style="display:none;">
                            <div class="form-group">
                                <label>DOB <b class="text-danger">*</b></label>
                                <input type="text" class="form-control flatpickr-inputdob"  data-date-format="yyyy-mm-dd"  data-jqv-maxlength="100" name="dob"
                                    value="{{empty($datamain->dob) ? '': $datamain->dob}}" 
                                    data-parsley-required-message="Enter DOB">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Age <b class="text-danger">*</b></label>
                                <input type="text" class="form-control"  name="age"
                                    value="{{empty($datamain->age) ? '': $datamain->age}}" required oninput="validateNumber(this);"
                                    data-parsley-required-message="Enter Age">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Country <b class="text-danger">*</b></label>
                                <select class="form-control" name="country_id" required
                                            data-parsley-required-message="" id="country_id" >
                                    <option value="">Select</option>
                                    @foreach ($countries as $cnt)
                                    <option @if($id) @if($datamain->country_id==$cnt->id) selected @endif
                                        @endif value="{{ $cnt->id }}">{{ $cnt->name }}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>City <b class="text-danger">*</b></label>
                               <select class="form-control" name="city_id" required
                                            data-parsley-required-message="" id="city_id">
                                    <option value="">Select</option>
                                    @foreach ($cities as $cnt)
                                    <option @if($id) @if($datamain->city_id==$cnt->id) selected @endif
                                        @endif value="{{ $cnt->id }}">{{ $cnt->name }}</option>
                                    @endforeach;
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Gender <b class="text-danger">*</b></label>
                                <select name="gender" class="form-control">
                                    <option
                                        @if (!empty($datamain->gender)) {{ $datamain->gender == 1 ? 'selected' : null }} @endif
                                        value="1">Male</option>
                                    <option
                                        @if (isset($datamain->gender)) {{ $datamain->gender == 2 ? 'selected' : null }} @endif
                                        value="2">Female</option>
                                    <option
                                        @if (isset($datamain->gender)) {{ $datamain->gender == 3 ? 'selected' : null }} @endif
                                        value="3">Other</option>
                                </select>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Password @if(empty($id))<b class="text-danger">*</b>@endif</label>
                                <div class="input-group mb-3">
                                    <input type="password" @if(!$id) required data-parsley-required-message="Enter password" @endif class="form-control" id="password" name="password"
                                        data-jqv-maxlength="50" value="" data-parsley-minlength="8"
                                        data-parsley-errors-container="#p1_err" autocomplete="new-password">
                                    <div class="input-group-append" style="cursor: pointer">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <span id="p1_err"></span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Confirm Password @if(empty($id))<b class="text-danger">*</b>@endif</label>
                                <div class="input-group mb-1">
                                    <input type="password" class="form-control" @if(!$id) required data-parsley-required-message="Enter Confirm password" @endif name="confirm_password"
                                        data-jqv-maxlength="50" value="" data-parsley-minlength="8"
                                        data-parsley-equalto="#password" autocomplete="off"
                                        data-parsley-required-message="Please re-enter your new password."
                                        data-parsley-required-if="#password" id="password2"
                                        data-parsley-errors-container="#p2_err" autocomplete="new-password">
                                    <div class="input-group-append" style="cursor: pointer">
                                        <span class="input-group-text" onclick="password_show_hide2();">
                                            <i class="fas fa-eye" id="show_eye2"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                                        </span>
                                    </div>
                                </div>
                                <span id="p2_err"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    

            <div class="card mb-2">
                <div class="row card-body">
                    <div class="col-sm-8 col-xs-12">
                        <div class="form-group d-flex align-items-center">
                            <div>
                                <label>Upload Profile Picture (gif,jpg,png,jpeg) @if(empty($id))<span
                                        style="color:red;">*<span></span></span>@endif</label>
                                <input type="file" class="form-control jqv-input" name="logo" data-role="file-image"
                                    data-preview="logo-preview" value="" @if(empty($id)) required
                                    data-parsley-required-message="image is required" @endif
                                    data-parsley-imagedimensionssss="200x200" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg"
                                    data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*">
                               
                            </div>
                            <img id="logo-preview" class="img-thumbnail w-50"
                                style="margin-left: 5px; height:75px; width:75px !important;"
                                src="@if(isset($datamain) && $datamain->user_image){{$datamain->user_image}}@else{{ asset('admin-assets/assets/img/placeholder.jpg') }}@endif">
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-sm-4 col-xs-12 other_docs m-3" id="certificate_product_registration_div">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
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
    $(".invalid-feedback").remove();
    var $form = $(this);
    var formData = new FormData(this);

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
                    window.location.href = App.siteUrl('/admin/customers');
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

function password_show_hide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}

function password_show_hide2() {
    var x2 = document.getElementById("password2");
    var show_eye2 = document.getElementById("show_eye2");
    var hide_eye2 = document.getElementById("hide_eye2");
    hide_eye2.classList.remove("d-none");
    if (x2.type === "password") {
        x2.type = "text";
        show_eye2.style.display = "none";
        hide_eye2.style.display = "block";
    } else {
        x2.type = "password";
        show_eye2.style.display = "block";
        hide_eye2.style.display = "none";
    }
}
$(".flatpickr-inputdob").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
            maxDate: "{{date('Y-m-d')}}",
            
        });
$('#country_id').on('change',function(){
    var country = $(this).val(); 
    var html = "";
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "{{ url('admin/cities/get_by_country') }}",
        data: {
            "id": country,
            "_token": "{{ csrf_token() }}"
        },
        timeout: 600000,
        dataType: 'json',
        success: function(res) {
            for (var i = 0; i < res['cities'].length; i++) {
                html += '<option value="' + res['cities'][i]['id'] + '">' + res[
                    'cities'][i]['name'] + '</option>';
                
            } 
            $('#city_id').html(html)
        }
    });
})

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