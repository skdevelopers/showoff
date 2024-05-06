@extends('front_end.template.layout')
@section('header')
<style>
    .list {
    max-height: 300px;
    overflow-y: scroll !important;
    }
    .parsley-errors-list{
        position: absolute;
        bottom: 0
    }
    input[type=checkbox] {
  position: relative;
	border: 2px solid #000;
	border-radius: 2px;
	background: none;
	cursor: pointer;
	line-height: 0;
	margin: 0 .6em 0 0;
	outline: 0;
	padding: 0 !important;
	vertical-align: text-top;
	height: 30px !important;
	width: 30px !important;
	-webkit-appearance: none !important;
  opacity: .5;
}

input[type=checkbox]:hover {
  opacity: 1;
}

input[type=checkbox]:checked {
  background-color: #000 !important;
  opacity: 1;
}

input[type=checkbox]:before {
  content: '';
  position: absolute;
  right: 50%;
  top: 50%;
  width: 7px;
  height: 10px;
  border: 0px solid #fff;
  border-width: 0 2px 2px 0;
  margin: -1px -1px 0 -1px;
  transform: rotate(45deg) translate(-50%, -50%);
  z-index: 2;
}

.form-check-error .parsley-errors-list{
    position: relative;
}
</style>
@stop

@section('content')
    <div class="inner-about-us-area" style="background: url('{{ asset('') }}admin-assets/assets/img/bg-1920x1080.jpg'); background-size: cover; background-position: center bottom; background-repeat: no-repeat;">

        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="800">
                <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mt-3 mb-2">
                    <div class="card px-0">
                        
                        <form id="msform" class="reg_form" data-parsley-validate="true" action="{{ url('save_vendor') }}" enctype="multipart/form-data" method="post">
                            <!-- progressbar -->
                            <!-- <ul id="progressbar">
                                <li class="active" id="contact"><strong>Business Information</strong></li>
                               
                            </ul> -->
                            <h2 id="heading" class="mb-4">Provider Registration</h2>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            @csrf()
                            <fieldset class="fld_set">
                                <div class="form-card" >
                                    <div class="row">
                                        <!-- <div class="col-7">
                                            <h2 class="fs-title">Business Information:</h2>
                                        </div>
                                       -->
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Business Name: *</label>
                                            <input type="text" name="name" placeholder="Business Name" required
                                            data-parsley-required-message="Enter Business Name" autocomplete="off" 
                                            />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Email: *</label>
                                            <input type="email" name="email" placeholder="Email" required
                                            data-parsley-required-message="Enter Email" autocomplete="off" 
                                             data-parsley-trigger="change" data-parsley-remote="{{ url('checkAvailability') }}"
                                              data-parsley-remote-options='{ "type": "POST","data": { "field": "email","exclude" : "","_token":"<?=csrf_token()?>" } }' data-parsley-remote-message="Email already exists"/>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Phone Number: *</label>
                                            <div class="row">
                                                <div class="col-md-6 position-relative">
                                                    <select class="form-control" name="dial_code" id="" required
                                                        data-parsley-required-message="Select" >
                                                        <option value="">Select</option>
                                                        @foreach ($countries as $cnt)
                                                            <option value="{{ $cnt->dial_code }}">
                                                                +{{$cnt->dial_code}}</option>
                                                        @endforeach;
                                                    </select>
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <input type="text" name="phone" placeholder="Phone Number" required data-parsley-required-message="Enter phone number" data-parsley-type="digits" data-parsley-minlength="5"  data-parsley-maxlength="12" data-parsley-trigger="keyup"  data-parsley-remote="{{ url('checkAvailability') }}" data-parsley-remote-options='{ "type": "POST","data": { "field": "phone","exclude" : "","_token":"<?=csrf_token()?>" } }' data-parsley-remote-message="Phone Number already exists"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Category: *</label>
                                            <select class="form-control" name="main_category_id" id="" required
                                                        data-parsley-required-message="Select category" >
                                                        <option value="">Select</option>
                                                        @foreach ($categories as $cnt)
                                                            <option value="{{ $cnt->id }}">
                                                                {{$cnt->name}}</option>
                                                        @endforeach;
                                                    </select>
                                        </div>        
                                            
                                        <div class="col-12 position-relative">
                                            <label class="fieldlabels">Description: *</label>
                                            <textarea  id="about_me" name="about_me" rows="4" placeholder="Enter description" 
                                            data-parsley-minlength="8" autocomplete="off"  required
                                            data-parsley-required-message="Enter description"></textarea>
                                        </div>
                                        
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Password: *</label>
                                            <input type="password"id="password" name="password" placeholder="Password " data-parsley-minlength="8" autocomplete="off"  required
                                            data-parsley-required-message="Enter Password" />
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Confirm Password: *</label>
                                            <input type="password" name="confirm_password" placeholder="Confirm Password " data-parsley-minlength="8"
                                            data-parsley-equalto="#password" autocomplete="off" required data-parsley-required-message="Please Confirm Password" />
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-6 position-relative">
                                            <label class="fieldlabels">Country: *</label>
                                            <select class="form-control" name="country_id" id="country_id" required
                                            data-parsley-required-message="Select Country" data-role="country-change"  data-input-state="city-state-id" data-parsley-group="tb1">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $cnt)
                                                    <option value="{{ $cnt->id }}">
                                                        {{ $cnt->name }}</option>
                                                @endforeach;
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-6 position-relative">
                                            <label class="fieldlabels">State/Emirate: *</label> 
                                            <select class="form-control" name="state_id"  required
                                            data-parsley-required-message="Select State" id="city-state-id" data-role="state-change"  data-input-city="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-6 position-relative">
                                            <label class="fieldlabels">City: *</label>
                                            <select class="form-control" name="city_id"  required
                                            data-parsley-required-message="Select City" id="city_id" data-parsley-group="tb1">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Business Logo: * <span class="text-muted">Allowed Dim 600x400(px)</span></label>
                                            <input type="file" name="image" placeholder="" 
                                            data-parsley-imagedimensionsss="600x400" required data-parsley-trigger="change" 
                                            data-parsley-required-message="Business Logo is required"  data-parsley-fileextension="jpg,png,gif,jpeg"
                                            data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg are supported" />
                                            
                                        </div>
                                        <div class="col-md-6 position-relative">
                                            <label class="fieldlabels">Trade License: * <span class="text-muted">(jpg, jpeg, png, pdf)</span></label>
                                            <input type="file" name="trade_license" placeholder="" required
                                            data-parsley-required-message="Trade license is required" ata-parsley-imagedimensionsss="200x200" data-parsley-trigger="change" data-parsley-fileextension="jpg,png,gif,jpeg,pdf"
                                            data-parsley-fileextension-message="Only files with type jpg,png,gif,jpeg,pdf are supported" />
                                           
                                        </div>
                                        <div class="form-group col-md-12 form-check-error">
                                            <label class="control-label">Enter the location or Drag the marker<b
                                                    class="text-danger">*</b></label>
                                            <input type="text" name="txt_location" id="txt_location" class="form-control autocomplete"
                                                placeholder="Location" required data-parsley-required-message="Enter Location" >
                                            <input type="hidden" id="location" name="location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div id="map_canvas" style="height: 200px;width:100%;"></div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 mt-3 form-check-error">
                                            <div class="form-check m-0 p-0 d-flex gap-2 align-items-center">
                                              <input class="form-check-input" type="checkbox" required value="" id="flexCheckChecked" style="margin: 0; padding: 0 !important;">
                                              <label class="form-check-label" for="flexCheckChecked">
                                                I agree with <a href="https://dealsdrive.app/public/page/6" target="_blank">Service Providers Agreement</a>
                                              </label>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <!-- <label class="fieldlabels">Confirm Password: *</label>
                                  <input type="password" name="cpwd" placeholder="Confirm Password" /> -->
                                </div> <input type="button" name="next" class="next action-button btnNextTab" value="Save" data-grp="tb1" />
                            </fieldset>
                            
                            
                         
                          
                        </form>
                        
                        <div class="d-none mb-5" id="s-message">
                                <!--<div class="alert alert-info">-->
                                <!--    <p>Thank you for your registration! Your account is under process, once verified you will notified via mail</p>-->
                                <!--</div>-->
                                <div class="success_mg" style="margin: auto; max-width: 450px; border: 1px solid #eee; border-radius: 10px; padding: 40px 20px;">
                                    <h3>Check Your Email</h3>
                                    <p>We've sent an email to your registered email address with a link to activate your account.</p>
                                    <div style="max-width: 200px; box-shadow: 0 0 20px 4px #feee0059; border-radius: 50rem;" class="mx-auto mb-5 mt-3">
                                        <img src="{{ asset('') }}front_end/image/envelope.gif" style="filter: saturate(0) invert(0); max-width: 200px;" class="img-fluid ">
                                    </div>
                                    <p class="mb-0">Didn't get an email ? Check your spam folder!</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop

@section('script')
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDurEhuJXLFod-4_2widZUQRJF2DMYXGeI&v=weekly&libraries=places">
</script>
<script>
     var currentLat = 25.204819 ;
var currentLong = 55.270931;
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
    $('.btnNextTab').on('click',function(){
        $('#msform').submit();
    })
    $('body').off('submit', '#msform');
        $('body').on('submit', '#msform', function(e) {
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
                        // $(".fld_set").addClass('d-none');
                        $("#msform").addClass('d-none');
                        $('#s-message').removeClass("d-none");
                        $(".sh_msg").trigger('click');
                        App.loading(false);
                         //App.alert(res['message']);
                         setTimeout(function() {
                             //window.location.reload();
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
        
           $('body').off('change', '[data-role="country-change"]');
            $('body').on('change', '[data-role="country-change"]', function() {
                var $t = $(this);
                var $dialcode = $('#'+ $t.data('input-dial-code'));
                var $state = $('#'+ $t.data('input-state'));

                if ( $dialcode.length > 0 ) {
                    var code = $t.find('option:selected').data('phone-code');
                    console.log(code)
                    if ( code == '' ) {
                        $dialcode.val('');
                    } else {
                        $dialcode.val(code);
                    }
                }

                if ( $state.length > 0 ) {

                    var id   = $t.val();
                    var html = '<option value="">Select</option>';
                    $state.html(html);
                    $state.trigger('change');

                    if ( id != '' ) {
                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{url('common/states/get_by_country')}}",
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },
                            timeout: 600000,
                            dataType: 'json',
                            success: function(res) {
                                for (var i=0; i < res['states'].length; i++) {
                                    html += '<option value="'+ res['states'][i]['id'] +'">'+ res['states'][i]['name'] +'</option>';
                                    if ( i == res['states'].length-1 ) {
                                        $state.html(html);
                                    // $('.selectpicker').selectpicker('refresh')
                                    }
                                }
                            }
                        });
                    }
                }
            });
            $('body').off('change', '[data-role="state-change"]');
            $('body').on('change', '[data-role="state-change"]', function() {
                var $t = $(this);
                var $city = $('#'+ $t.data('input-city'));
                


                    var id   = $t.val();
                    var html = '<option value="">Select</option>';

                    $city.html(html);
                    if ( id != '' ) {
                        $.ajax({
                            type: "POST",
                            enctype: 'multipart/form-data',
                            url: "{{url('common/cities/get_by_state')}}",
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },
                            timeout: 600000,
                            dataType: 'json',
                            success: function(res) {
                                for (var i=0; i < res['cities'].length; i++) {
                                html += '<option value="'+ res['cities'][i]['id'] +'">'+ res['cities'][i]['name'] +'</option>';
                                if ( i == res['cities'].length-1 ) {
                                    $city.html(html);
                                // $('.selectpicker').selectpicker('refresh')
                                }
                            }
                            }
                        });
                    }

            });

        // $('#country_id').on('change',function(){
        //     var country = $(this).val(); 
        //     var html = "";
        //     $.ajax({
        //         type: "POST",
        //         enctype: 'multipart/form-data',
        //         url: "{{ url('cities/get_by_country') }}",
        //         data: {
        //             "id": country,
        //             "_token": "{{ csrf_token() }}"
        //         },
        //         timeout: 600000,
        //         dataType: 'json',
        //         success: function(res) {
        //             for (var i = 0; i < res['cities'].length; i++) {
        //                 html += '<option value="' + res['cities'][i]['id'] + '">' + res[
        //                     'cities'][i]['name'] + '</option>';
                        
        //             } 
        //             $('#city_id').html(html)
        //         }
        //     });
        // })
</script>
@stop
