@extends('admin.template.layout')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('') }}admin_assets/plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset('') }}admin_assets/plugins/table/datatable/custom_dt_customer.css">
<style>
.btn-danger {
    color: #ffffff !important;
    background-color: #c62226;
    border-color: #fff;
    width: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 50px;
}

.btn-danger:hover,
.btn-danger:focus {
    color: #060606 !important;
    background-color: #c62226;
    box-shadow: none;
    border-color: #fff;
}

.btn.btn-button-7.pull-right {
    width: 50px;
    background-color: #fab213 !important;
    border: 0;
}
</style>
@stop
@section('content')

<div class="card mb-5">
    <div class="card-body">
        <div class="page-header">
            <div class="page-title">
                <h3 style="color: #000 !important">{{ $page_heading }}</h3>
            </div>
        </div>

        <div class="row mt-2">

            <div class="col-xl-12 col-lg-12 col-sm-12">
                @if (session('success'))
                <div class="alert alert-success alert-dismissable custom-success-box mb-4">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {{ session('success') }} </strong>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissable custom-danger-box mb-4">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {{ session('error') }} </strong>
                </div>
                @endif
                <div class="statbox">
                    <div class="">
                        <form method="post" id="admin-form" action="{{ route('admin.setting_store') }}"
                            enctype="multipart/form-data" data-parsley-validate="true">
                            @csrf()
                            <input type="hidden" name="id" value="{{ $page->id }}">
                            <div class="row" >
                                <div class="col-md-6 form-group" style="display:none;">
                                    <label>Admin commission (%)<b class="text-danger">*</b></label>
                                    <input type="text" name="admin_commission" class="form-control jqv-input"
                                        oninput="validateNumber(this);" data-jqv-required="true"
                                        value="{{ $page->admin_commission }}" placeholder="Admin commission in %"
                                        required data-parsley-required-message="Enter commission" data-parsley-type="number" min="0" max="100">
                                </div>
                                <div class="col-md-6 form-group" style="display:none;">
                                        <label>VAT (%)<b class="text-danger">*</b></label>
                                        <input type="text" name="tax_percentage" class="form-control jqv-input"
                                            oninput="validateNumber(this);" data-jqv-required="true"
                                            value="{{ $page->tax_percentage }}" placeholder="VAT (%)" required data-parsley-required-message="Enter VAT (%)" data-parsley-type="number" min="0" max="100">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Vendor validity period<b class="text-danger">*</b></label>
                                <input type="text" name="inactive_days" class="form-control jqv-input"
                                    oninput="validateNumber(this);" data-jqv-required="true"
                                    value="{{ $page->inactive_days }}" placeholder="Vendor validity period in days" required data-parsley-required-message="Enter Vendor validity period in days" data-parsley-type="number" min="0" >
                    </div>
                     

                   

                    <div class="form-group">
                        <button type="submit" class="mt-4 btn btn-primary">Save </button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script>
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
<script>
var map;
var marker = false;
var geocoder;

function initMap() {
    var latitude = 25.204819;
    var longitude = 55.270931;

    var myLatLng = {
        lat: latitude,
        lng: longitude
    };

    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14,
        mapTypeControl: false,
        mapTypeId: 'roadmap'
    });
    var iconBase = 'http://localhost/snabbkart/assets/web/images/map-pin.png';
    //var marker = false; ////Has the restaurant plotted their location marker?
    marker = new google.maps.Marker({
        draggable: true,
        position: myLatLng,
        map: map,
        icon: iconBase
    });

    geocoder = new google.maps.Geocoder();

    geocoder.geocode({
        'latLng': myLatLng
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                $('#location').val(results[0].formatted_address);
            }
        }
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({
            'latLng': marker.getPosition()
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#location').val(results[0].formatted_address);
                }
            }
        });
    });

    google.maps.event.addListener(map, 'click', function() {
        geocoder.geocode({
            'latLng': marker.getPosition()
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#location').val(results[0].formatted_address);
                }
            }
        });
    });

    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {
        //Get the location that the restaurant clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if (marker === false) {
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });

        } else {
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        var currentLocation = marker.getPosition();
        //Add lat and lng values to a field that we can save.
        document.getElementById('latitude').value = currentLocation.lat(); //latitude
        document.getElementById('longitude').value = currentLocation.lng(); //longitude


    });

    //Listen for drag events!
    google.maps.event.addListener(marker, 'dragend', function(event) {
        var currentLocation = marker.getPosition();
        //Add lat and lng values to a field that we can save.
        document.getElementById('latitude').value = currentLocation.lat(); //latitude
        document.getElementById('longitude').value = currentLocation.lng(); //longitude
    });

    // Create the search box and link it to the UI element.
    // var options = {
    //     types: ['(cities)']
    // };
    var options = {
        fields: ["formatted_address", "geometry", "name"],
        strictBounds: false,
        types: ["establishment"],
    };
    var input = document.getElementById('location');
    var searchBox = new google.maps.places.SearchBox(input, options);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the restaurant selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            //alert(place.geometry.location.lat());alert(place.geometry.location.lng());
            document.getElementById('latitude').value = place.geometry.location.lat(); //latitude
            document.getElementById('longitude').value = place.geometry.location.lng(); //longitude

            marker.setPosition({
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            });
            map.setCenter(marker.getPosition());

        });

        map.fitBounds(bounds);
    });
}

let bio_counter = $("#bios_counts").val();
$('[data-role="add-bios"]').click(function() {
    var html = '<div class="row col-md-12">\
            <div class="col-md-8 form-group">\
                <input type="text" name="bios[]" class="form-control" placeholder="Profile Bio" required>\
                </div>\
                <div class="col-md-3">\
                    <button type="button" class="btn btn-danger" data-role="remove-bios"><i class="flaticon-minus-2"></i></button>\
                </div></div>';
    $('#bios-holder').append(html);

});
$('body').on("click", '[data-role="remove-bios"]', function() {
    $(this).parent().parent().remove();
});
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyW33QtbRMkT_-tjb5Ff3_Y2-B-aq98u8&libraries=places&callback=initMap">
</script>

@endsection