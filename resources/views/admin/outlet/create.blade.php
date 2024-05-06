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
    /* Custom Fancy Radio Buttons */
    .form-check-input {
        display: none; /* Hide default radio input */
    }

    .form-check-label {
        cursor: pointer;
        padding-left: 30px;
        position: relative;
    }

    .form-check-label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        border: 2px solid #007bff;
        border-radius: 50%;
        transition: border-color 0.3s ease;
    }

    .form-check-input:checked + .form-check-label:before {
        background-color: #007bff;
        border-color: #007bff;
    }
    </style>
    <form method="post" id="admin-form" action="{{ url('admin/outlet') }}" enctype="multipart/form-data"
        data-parsley-validate="true">
        <input type="hidden" name="id" value="{{ $id }}">
        @csrf()
        <div class="">
            <div class="card mb-2">
                <div class="card-body">
                    <!-- Provider Type Selection -->
                    <div class="mb-3">
                        <label class="mr-2">Select Provider Type:</label>

                        <!-- Saloon Option -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="business_type" id="saloonOption" value="saloon" required
                                    {{ (!empty($datamain) && $datamain->business_type == 'saloon') ? 'checked' : '' }}>
                            <label class="form-check-label" for="saloonOption">Saloon</label>
                        </div>

                        <!-- Car Wash Option -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="business_type" id="carWashOption" value="car wash" required
                                    {{ (!empty($datamain) && $datamain->business_type == 'car wash') ? 'checked' : '' }}>
                            <label class="form-check-label" for="carWashOption">Car Wash</label>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Business Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" data-jqv-maxlength="100" name="business_name"
                                    value="{{empty($datamain->business_name) ? '': $datamain->business_name}}" required
                                    data-parsley-required-message="Enter Business Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Full Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" data-jqv-maxlength="100" name="name"
                                       value="{{empty($datamain->name) ? '': $datamain->name}}" required
                                       data-parsley-required-message="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Email <b class="text-danger">*</b></label>
                                <input type="email" class="form-control" name="email" data-jqv-maxlength="50"
                                    value="{{empty($datamain->email) ? '': $datamain->email}}" required
                                    data-parsley-required-message="Enter Email" autocomplete="off" autocomplete="new-password" >

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
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
                                        data-parsley-minlength="8" data-parsley-maxlength="12"
                                        data-parsley-trigger="keyup" min="0" data-parsley-min-message="Invalid number">
                                </div>
                                <span id="mob_err"></span>
                            </div>
                        </div>

                         <div class="col-lg-6 col-md-6 col-xs-12">
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

                         <div class="col-lg-6 col-md-4 position-relative">
                                            <label class="fieldlabels">State/Emirate: <b class="text-danger">*</b></label>
                                            <select class="form-control" name="state_id"  required
                                            data-parsley-required-message="Select State" id="city-state-id" data-role="state-change"  data-input-city="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                                 @foreach ($states as $cnt)
                                        <option <?php if(!empty($datamain->state_id)) { ?> {{$datamain->state_id == $cnt->id ? 'selected' : '' }} <?php } ?> value="{{ $cnt->id }}">
                                            {{ $cnt->name }}</option>
                                    @endforeach;
                                            </select>
                                        </div>

                                        <div class="col-lg-6 col-md-6 position-relative">
                                            <label class="fieldlabels">City: <b class="text-danger">*</b></label>
                                            <select class="form-control" name="city_id"  required
                                            data-parsley-required-message="Select City" id="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                                 @foreach ($cities as $cnt)
                                        <option <?php if(!empty($datamain->city_id)) { ?> {{$datamain->city_id == $cnt->id ? 'selected' : '' }} <?php } ?> value="{{ $cnt->id }}">
                                            {{ $cnt->name }}</option>
                                    @endforeach;
                                            </select>
                                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>About <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" name="about_me" data-jqv-maxlength="50"
                                    value="{{empty($datamain->about_me) ? '': $datamain->about_me}}" required
                                    data-parsley-required-message="Enter Description" autocomplete="off"  >

                            </div>
                        </div>
                         <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Password @if(empty($id))<b class="text-danger">*</b>@endif</label>
                                <input type="password" class="form-control" name="password" data-jqv-maxlength="50"
                                    value=""
                                    data-parsley-required-message="Enter Password" autocomplete="off" autocomplete="new-password" >

                            </div>
                        </div>
                         <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Confirm Password @if(empty($id))<b class="text-danger">*</b>@endif</label>
                                <input type="password" class="form-control" name="confirm_password" data-jqv-maxlength="50"
                                    value=""
                                    data-parsley-required-message="Enter Confirm Password" autocomplete="off" autocomplete="new-password" >

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Upload Profile Picture (gif,jpg,png,jpeg) @if(empty($id))<span
                                            style="color:red;">*<span></span></span>@endif</label>
                                    <input type="file" class="form-control jqv-input" name="logo" data-role="file-image"
                                        data-preview="logo-preview" value="" @if(empty($id)) required
                                        data-parsley-required-message="image is required" @endif
                                        data-parsley-imagedimensionssss="200x200" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg"
                                        data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*">
                                    {{-- <p class="text-muted mt-2">Allowed Dim 200x200(px)</p> --}}
                                </div>
                                <img id="logo-preview" class="img-thumbnail w-50"
                                    style="margin-left: 5px; height:75px; width:75px !important;"
                                     src="@if($id && $datamain->user_image){{$datamain->user_image}}@else{{ asset('admin-assets/assets/img/placeholder.jpg') }}@endif" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Gallery Images (gif, jpg, png, jpeg)</label>
                                    <input type="file" class="form-control jqv-input" name="gallery_images[]" multiple
                                           accept="image/gif, image/jpeg, image/png, image/jpg" required
                                           data-parsley-required-message="At least one image is required"
                                           data-parsley-fileextension="jpg,png,gif,jpeg"
                                           data-parsley-fileextension-message="Only files with type jpg, png, gif, jpeg are supported"
                                           data-parsley-max-file-size="5120"
                                           data-parsley-max-file-size-message="Max file size should be 5MB">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Website</label>
                                <input type="url" class="form-control" name="website"
                                    value="{{empty($datamain->website) ? '': $datamain->website}}"
                                    data-parsley-required-message="Enter Website" autocomplete="off" >

                            </div>
                        </div>
                         <div class="form-group col-md-12">
                        <label class="control-label">Enter the location or Drag the marker<b
                                class="text-danger">*</b></label>
                        <input type="text" name="txt_location" id="txt_location" class="form-control autocomplete"
                            placeholder="Location" required data-parsley-required-message="Enter Location" @if($id)
                            value="{{$datamain->location}}" @endif>
                        <input type="hidden" id="location" name="location">
                    </div>
                    <div class="form-group col-md-12">
                        <div id="map_canvas" style="height: 200px;width:100%;"></div>
                    </div>

                        <div class="col-md-12">
                            <h4>Operating Hours</h4>
                            <div class="row">
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ $day }}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" name="{{ strtolower($day) }}_open"
                                                       placeholder="Opening Time" required
                                                       value="{{ optional($operatingHours[ucfirst(strtolower($day))])->open_time }}">
                                                <input type="text" class="form-control timepicker" name="{{ strtolower($day) }}_close"
                                                       placeholder="Closing Time" required
                                                       value="{{ optional($operatingHours[ucfirst(strtolower($day))])->close_time }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card mb-2">

                <div class="row ">
                    <div class="col-sm-4 col-xs-12 other_docs m-3" id="certificate_product_registration_div">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop

@section('script')
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDurEhuJXLFod-4_2widZUQRJF2DMYXGeI&v=weekly&libraries=places">
</script>
<script>
    var currentLat = <?php echo (isset($datamain) && $datamain->latitude) ? $datamain->latitude : 25.204819 ?>;
var currentLong = <?php echo (isset($datamain) && $datamain->longitude) ? $datamain->longitude : 55.270931 ?>;
$("#location").val(currentLat + "," + currentLong);

currentlocation = {
    "lat": currentLat,
    "lng": currentLong,
};
initMap();
initAutocomplete();

function initMap() {
    map2 = new google.maps.Map(document.getElementById('map_canvas'), {
        center: {
            lat: currentlocation.lat,
            lng: currentlocation.lng
        },
        zoom: 14,
        gestureHandling: 'greedy',
        mapTypeControl: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM
        },
    });

    geocoder = new google.maps.Geocoder();

    // geocoder2 = new google.maps.Geocoder;
    usermarker = new google.maps.Marker({
        position: {
            lat: currentlocation.lat,
            lng: currentlocation.lng
        },
        map: map2,
        draggable: true,

        animation: google.maps.Animation.BOUNCE
    });


    //map click
    google.maps.event.addListener(map2, 'click', function(event) {
        updatepostition(event.latLng, "movemarker");
        //drag end event
        usermarker.addListener('dragend', function(event) {
            // alert();
            updatepostition(event.latLng, "movemarker");

        });
    });

    //drag end event
    usermarker.addListener('dragend', function(event) {
        // alert();
        updatepostition(event.latLng);

    });
}
updatepostition = function(position, movemarker) {
    geocodePosition(position);
    usermarker.setPosition(position);
    map2.panTo(position);
    map2.setZoom(15);
    let createLatLong = position.lat() + "," + position.lng();
    console.log("Address Lat/long=" + createLatLong);
    $("#location").val(createLatLong);
}

function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            usermarker.formatted_address = responses[0].formatted_address;
        } else {
            usermarker.formatted_address = 'Cannot determine address at this location.';
        }
        $('#txt_location').val(usermarker.formatted_address);
    });
}

function initAutocomplete() {
    // Create the search box and link it to the UI element.
    var input2 = document.getElementById('txt_location');
    var searchBox2 = new google.maps.places.SearchBox(input2);

    map2.addListener('bounds_changed', function() {
        searchBox2.setBounds(map2.getBounds());
    });

    searchBox2.addListener('places_changed', function() {
        var places2 = searchBox2.getPlaces();

        if (places2.length == 0) {
            return;
        }
        $('#txt_location').val(input2.value)

        var bounds2 = new google.maps.LatLngBounds();
        places2.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            updatepostition(place.geometry.location);

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds2.union(place.geometry.viewport);
            } else {
                bounds2.extend(place.geometry.location);
            }
        });
        map2.fitBounds(bounds2);
    });
}
updatepostition = function(position, movemarker) {
    console.log(position);
    geocodePosition(position);
    usermarker.setPosition(position);
    map2.panTo(position);
    map2.setZoom(15);
    let createLatLong = position.lat() + "," + position.lng();
    // console.log("Address Lat/long="+createLatLong);
    $("#location").val(createLatLong);
}

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
                    window.location.href = App.siteUrl('/admin/outlet');
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
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.timepicker', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i', // 24-hour format
            time_24hr: true
        });
    });
</script>

@stop