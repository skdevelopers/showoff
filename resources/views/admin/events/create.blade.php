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
    <form method="post" id="admin-form" action="{{ url('admin/events') }}" enctype="multipart/form-data"
        data-parsley-validate="true">
        <input type="hidden" name="id" value="{{ $id }}">
        @csrf()
        <div class="">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Event Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" data-jqv-maxlength="100" name="name"
                                    value="{{empty($datamain->name) ? '': $datamain->name}}" required
                                    data-parsley-required-message="Enter Full Name">
                            </div>
                        </div>
                       
                        
                       
                       
                                        
                                       
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Description <b class="text-danger">*</b></label>
                                <textarea class="form-control" name="description"
                                    required
                                    data-parsley-required-message="Enter Description" autocomplete="off"  >{{empty($datamain->knowmore) ? '': $datamain->knowmore}}</textarea>

                            </div>
                        </div>
                        
                       
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group d-flex align-items-center">
                                <div>
                                    <label>Image (gif,jpg,png,jpeg) @if(empty($id))<span
                                            style="color:red;">*<span></span></span>@endif</label>
                                    <input type="file" class="form-control jqv-input" name="image" data-role="file-image"
                                        data-preview="logo-preview" value="" @if(empty($id)) required
                                        data-parsley-required-message="image is required" @endif
                                        data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg,webp"
                                        data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg,webp are supported" data-parsley-max-file-size="5120" data-parsley-max-file-size-message="Max file size should be 5MB" accept="image/*">
                                    {{-- <p class="text-muted mt-2">Allowed Dim 200x200(px)</p> --}}
                                </div>
                                <img id="logo-preview" class="img-thumbnail w-50"
                                    style="margin-left: 5px; height:75px; width:75px !important;"
                                     src="@if($id && $datamain->image){{$datamain->image}}@else{{ asset('admin-assets/assets/img/placeholder.jpg') }}@endif" >
                            </div>
                        </div>
                       
                     
                         <div class="form-group col-md-12">
                        <label class="control-label">Enter the location or Drag the marker<b
                                class="text-danger">*</b></label>
                        <input type="text" name="txt_location" id="txt_location" class="form-control autocomplete"
                            placeholder="Location" data-parsley-required-message="Enter Location" @if($id)
                            value="{{$datamain->location}}" @endif>
                        <input type="hidden" id="location" name="location">
                    </div>
                    <div class="form-group col-md-12">
                        <div id="map_canvas" style="height: 200px;width:100%;"></div>
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
                    window.location.href = App.siteUrl('/admin/events');
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
</script>

@stop