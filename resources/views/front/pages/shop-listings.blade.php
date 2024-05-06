@extends('front.layouts.master')
@section('title', __('unlimited'))
@section('content')
    <div class="container">
    <div class="border-0 card header rounded-0 sticky-top">
        <!-- start header search bar  -->
        <div class="border-bottom border-top p-3 p-xl-0 search-bar">
            <div class="row g-3 g-xl-0">
                <!-- search bar title -->
                <div class="col-12 d-xl-none">
                    <div class="collapse show" id="CollapseText">
                        <h2 class="fw-semibold text-center search-bar-title mb-0">Find what<br> you <span
                                    class="font-caveat text-primary">want</span></h2>
                    </div>
                </div>
                <div class="col-md-8 col-lg-5 col-xl-6">
                    <div class="search-select-input has-icon has-icon-y position-relative">
                        <!-- input -->
                        <input class="form-control" type="text" placeholder="What are you looking for?">
                        <!-- icon -->
                        <svg class="form-icon-start position-absolute top-50 bi bi-pin-map-fill"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                            <path fill-rule="evenodd"
                                  d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                        </svg>
                        <!-- icon -->
                        <svg class="form-icon-end position-absolute top-50 bi bi-crosshair"
                             xmlns="http://www.w3.org/2000/svg"
                             width="20" height="20" fill="#9b9b9b" viewBox="0 0 16 16">
                            <path d="M8.5.5a.5.5 0 0 0-1 0v.518A7.001 7.001 0 0 0 1.018 7.5H.5a.5.5 0 0 0 0 1h.518A7.001 7.001 0 0 0 7.5 14.982v.518a.5.5 0 0 0 1 0v-.518A7.001 7.001 0 0 0 14.982 8.5h.518a.5.5 0 0 0 0-1h-.518A7.001 7.001 0 0 0 8.5 1.018V.5Zm-6.48 7A6.001 6.001 0 0 1 7.5 2.02v.48a.5.5 0 0 0 1 0v-.48a6.001 6.001 0 0 1 5.48 5.48h-.48a.5.5 0 0 0 0 1h.48a6.002 6.002 0 0 1-5.48 5.48v-.48a.5.5 0 0 0-1 0v.48A6.001 6.001 0 0 1 2.02 8.5h.48a.5.5 0 0 0 0-1h-.48ZM8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        </svg>
                        <!-- select -->
                        <select class="input-select position-absolute top-50">
                            <option value="0.5" selected>0.5 km</option>
                            <option value="1">1 km</option>
                            <option value="2">5 km</option>
                            <option value="3">10 km</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-3 d-none d-lg-block">
                    <!-- Start Search Select -->
                    <div class="search-select has-icon position-relative">
                        <select class="select2 form-select" aria-label="Default select example">
                            <option selected>Select Location</option>
                            <option value="1">Dubai</option>
                            <option value="2">Abu Dhabi</option>
                            <option value="3">Sharjah</option>
                        </select>
                        <svg class="form-icon-start position-absolute top-50 search-icon z-1 bi bi-geo-alt"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <!-- /.End Search Select -->
                </div>
                <div class="col-md-2 col-lg-2 col-xl-3 d-none d-lg-block">
                    <!-- Start Search Select -->
                    <div class="search-select has-icon position-relative">
                        <select class="select2 form-select" aria-label="Default select example">
                            <option selected>All Categories</option>
                            <option value="1">Car Wash</option>
                            <option value="2">Saloon</option>
                        </select>
                        <!-- <i class="fa-solid fa-sack-dollar fs-18 search-icon"></i> -->
                        <svg class="form-icon-start position-absolute top-50 search-icon z-1 bi bi-app-indicator"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 16 16">
                            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        </svg>
                    </div>
                    <!-- /.End Search Select -->
                </div>
                <div class="col-lg-3 col-md-4 col-mg-3 d-xl-none gap-3 gap-md-2 hstack justify-content-center">
                    <a href="#"
                       class="sidebarCollapse align-items-center d-flex justify-content-center filters-text fw-semibold gap-2">
                        <i class="fa-solid fa-arrow-up-short-wide fs-18"></i>
                        <span>All filters</span>
                    </a>
                    <div class="h-75 mt-auto vr d-md-none"></div>
                    <a href="#" id="mapCollapse"
                       class="align-items-center d-flex justify-content-center filters-text fw-semibold gap-2">
                        <i class="fa-solid fa-map-location-dot fs-18"></i>
                        <span>Map</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end /. header search bar  -->
        </div>
    </div>
    <!-- end /. header -->
    <div class="py-3 py-xl-5 bg-gradient">
        <div class="container">
            <div class="row">
                <aside class="col-xl-3 filters-col content pe-lg-4 pe-xl-5 shadow-end">
                    <!-- start sidebar filters -->
                    <div class="js-sidebar-filters-mobile">
                        <!-- filter header -->
                        <div class="border-bottom d-flex justify-content-between align-items-center p-3 sidebar-filters-header d-xl-none">
                            <div class="align-items-center btn-icon d-flex filter-close justify-content-center rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg>
                            </div>
                            <span class="fs-3 fw-semibold">Filters</span>
                            <span class="text-primary fw-medium">Clear</span>
                        </div>
                        <!-- end /. filter header -->
                        <div class="sidebar-filters-body p-3 p-xl-0">
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Price Filter</h4>
                                    <p class="mb-0 small">Select min and max price range</p>
                                </div>
                                <!-- Start Range Slider -->
                                <div class="js-range-slider"></div>
                                <!-- End Range Slider -->
                            </div>
                            <!-- Categories Filter -->
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-2">Categories</h4>
                                    <p class="mb-0 small">Select category</p>
                                </div>
                                @foreach($categories as $category)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="{{ $category }}"
                                               id="category_{{ $category }}">
                                        <label class="form-check-label"
                                               for="category_{{ $category }}">{{ ucfirst($category) }}</label>
                                        <!-- You can display count here if needed -->
                                    </div>
                                @endforeach
                            </div>

                            <!-- Order By Filter -->
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Order by</h4>
                                    <p class="mb-0 small">Select sorting option</p>
                                </div>
                                <select class="form-select" id="sortBy" name="sort_by">
                                    <option value="1">Latest</option>
                                    <option value="2">Nearby</option>
                                    <option value="3">Top rated</option>
                                    <option value="4">Random</option>
                                    <option value="5">A-Z</option>
                                </select>
                            </div>

                            <!-- Apply and Clear Filters Buttons -->
                            <button type="button" class="btn btn-primary w-100" onclick="applyFilters()">Apply filters
                            </button>
                            <a href="{{ route('shop.listings') }}"
                               class="align-items-center d-flex fw-medium gap-2 justify-content-center mt-2 small text-center">Clear
                                filters</a>
                        </div>
                    </div>
                    <!-- end /. sidebar filters -->
                </aside>
                <div class="col-xl-9 ps-lg-4 ps-xl-5 sidebar">
                    <!-- start toolbox  -->
                    <div class="d-flex flex-wrap align-items-center mb-3 gap-2">
                        <div class="col fs-18 text-nowrap">All <span
                                    class="fw-bold text-dark">{{ $outlets->count() }}</span> listing found
                        </div>
                        <!-- start button group -->
                        <div class="border-0 card d-inline-flex flex-row flex-wrap gap-1 p-1 rounded-3 shadow-sm">
                            <a href="#" class="btn btn-light btn-sm px-2 py-1"><i
                                        class="fa-solid fa-border-all"></i></a>
                            <a href="#" class="btn btn-light btn-sm px-2 py-1"><i class="fa-solid fa-list"></i></a>
                        </div>
                        <!-- end /. button group -->
                    </div>
                    <!-- end /. toolbox  -->
                    <!-- Loop through each outlet/provider -->
                    @foreach($outlets as $outlet)
                        <!-- start card list -->
                        <div class="card border-0 shadow-sm overflow-hidden rounded-4 mb-4 card-hover card-hover-bg">
                            <div class="card-body p-0">
                                <div class="g-0 row">
                                    <div class="col-lg-5 col-md-5 col-xl-4 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{ asset($outlet->user_image) }}" alt="{{ $outlet->name }}"
                                                 class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                            @if($outlet->is_featured)
                                                <div class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                                                    <i class="fa-solid fa-star me-1"></i>Featured
                                                </div>
                                            @endif
                                            @if($outlet->discount_code)
                                                <div class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">{{ $outlet->discount_code }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-xl-8 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <!-- start card title -->
                                            <a href="{{ route('listing.details', ['id' => $outlet->id]) }}" class="stretched-link">
                                            <h4 class="fs-18 fw-semibold mb-0">{{ $outlet->business_name }}</h4>
                                            </a>
                                            <h4 class="fs-12 fw-semibold mb-0">{{ $outlet->name }}</h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-3 fs-15">{{ $outlet->about_me }}</p>
                                            <!-- end /. card description -->
                                            <ul>
                                                @foreach($outlet->services as $service)
                                                    <li>{{ $service->name }} - {{ $service->price }}</li>
                                                @endforeach
                                            </ul>
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 mt-auto z-1">
                                                <a href="tel:{{ $outlet->phone }}"
                                                   class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                         fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                                    </svg>
                                                    <span>{{ $outlet->phone }}</span>
                                                </a>
                                                <!-- Add more contact links as needed -->
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                    @endforeach

                    <!-- start pagination -->
                    <nav class="justify-content-center mt-5 pagination align-items-center">
                        <a class="prev page-numbers" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                            </svg>
                            previous
                        </a>
                        <span class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="next page-numbers" href="#">
                            next
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                 class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </a>
                    </nav>
                    <!-- end /. pagination -->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link href="{{asset('front/assets/plugins/aos/aos.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/OwlCarousel2/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/OwlCarousel2/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/fancy_fileupload.css')}}"
          rel="stylesheet">
    <link href="{{asset('front/assets/plugins/ion.rangeSlider/ion.rangeSlider.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css')}}"
          rel="stylesheet">
@endpush

@push('script')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDurEhuJXLFod-4_2widZUQRJF2DMYXGeI&v=weekly&libraries=places">
    </script>
    <!-- Optional JavaScript -->
    <script src="{{asset('front/assets/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/aos/aos.min.js')}}"></script>
    <!-- SlickNav js file -->
    <script src="{{asset('front/assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('front/assets/plugins/macy/macy.js')}}"></script>
    <script src="{{asset('front/assets/plugins/simple-parallax/simpleParallax.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/OwlCarousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/theia-sticky-sidebar/ResizeSensor.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fileupload.js')}}"></script>
    <script src="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('front/assets/plugins/ion.rangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/plugins/select2/select2.min.js')}}"></script>
    <!-- Custom script for this template -->
    <script src="{{asset('front/assets/js/script.js')}}"></script>
    <!-- JavaScript for Filter Handling -->

    <script>
        // Apply filters function
        function applyFilters() {
            console.log("Applying filters...");

            const selectedCategories = [];
            const checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

            checkboxes.forEach(function(checkbox) {
                selectedCategories.push(checkbox.value);
            });

            const sortBy = document.getElementById('sortBy').value;
            let url = "{{ route('shop.listings') }}";
            const params = {};

            if (selectedCategories.length > 0) {
                params.category = selectedCategories.join(','); // Join categories into a comma-separated string
            }

            if (sortBy) {
                params.sort_by = sortBy;
            }

            // Get price range from Ion.RangeSlider
            const priceRangeSlider = $(".js-range-slider").data("ionRangeSlider");
            if (priceRangeSlider) {
                const minPrice = priceRangeSlider.result.from;
                const maxPrice = priceRangeSlider.result.to;
                params.minPrice = minPrice;
                params.maxPrice = maxPrice;
            }

            // Construct URL with query parameters
            let queryString = Object.keys(params)
                .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(params[key]))
                .join('&');

            if (queryString.length > 0) {
                url += '?' + queryString;
            }

            // Redirect to the updated URL with filters
            window.location.href = url;
        }
        document.addEventListener('DOMContentLoaded', function () {
            const searchBarInput = document.querySelector('.search-select-input input');
            const distanceSelect = document.querySelector('.search-select-input select');
            const locationSelect = document.querySelector('.search-select:nth-child(2) select');
            const categorySelect = document.querySelector('.search-select:nth-child(3) select');

            // Example: Add event listener for search input
            searchBarInput.addEventListener('input', function (event) {
                const searchText = event.target.value.trim();
                // Implement search functionality based on 'searchText'
            });

            // Example: Fetch and process selected distance, location, and category
            distanceSelect.addEventListener('change', function (event) {
                const selectedDistance = event.target.value;
                // Implement logic based on selected distance
            });

            locationSelect.addEventListener('change', function (event) {
                const selectedLocation = event.target.value;
                // Implement logic based on selected location
            });

            categorySelect.addEventListener('change', function (event) {
                const selectedCategory = event.target.value;
                // Implement logic based on selected category
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const searchBarInput = document.querySelector('.search-select-input input');
            const distanceSelect = document.querySelector('.search-select:nth-child(2) select');
            const locationSelect = document.querySelector('.search-select:nth-child(3) select');
            const categorySelect = document.querySelector('.search-select:nth-child(4) select');

            // Example: Add event listener for search input
            searchBarInput.addEventListener('input', function (event) {
                const searchText = event.target.value.trim();
                // Implement search functionality based on 'searchText'
            });

            // Example: Fetch and process selected distance, location, and category
            distanceSelect.addEventListener('change', function (event) {
                const selectedDistance = event.target.value;
                // Implement logic based on selected distance
            });

            locationSelect.addEventListener('change', function (event) {
                const selectedLocation = event.target.value;
                // Implement logic based on selected location
            });

            categorySelect.addEventListener('change', function (event) {
                const selectedCategory = event.target.value;
                // Implement logic based on selected category
            });
        });
        // Search Shop listing  code below

        // Function to calculate distance between two points using Haversine formula
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius of the Earth in kilometers
            const dLat = deg2rad(lat2 - lat1);
            const dLon = deg2rad(lon2 - lon1);
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c; // Distance in kilometers
            return distance;
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180);
        }

        // Event listener for form submission or filter change
        document.querySelector('.search-bar').addEventListener('submit', function (event) {
            event.preventDefault();

            const searchText = document.querySelector('.search-bar input').value;
            const locationSelect = document.querySelector('.search-select-input select');
            const selectedLocation = locationSelect.options[locationSelect.selectedIndex].text;

            // Get user's current location
            navigator.geolocation.getCurrentPosition(function (position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                // Perform AJAX request to fetch shop listings with search filters
                // Example: fetchShopListings(searchText, selectedLocation, userLat, userLng);
            });
        });

        // Function to fetch shop listings based on filters and user location
        function fetchShopListings(searchText, location, userLat, userLng) {
            // Make an AJAX request to retrieve shop listings and distances
            // Example: Use the retrieved data to display and sort shop listings by distance
            // Example AJAX request using fetch API or XMLHttpRequest
            fetch('/api/shop-listings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    searchText: searchText,
                    location: location,
                    userLat: userLat,
                    userLng: userLng,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    // Process the fetched data and update shop listings accordingly
                    const shopListings = data.shopListings;

                    // Calculate distances and sort shop listings by distance
                    shopListings.forEach(shop => {
                        shop.distance = calculateDistance(userLat, userLng, shop.latitude, shop.longitude); // Store calculated distance in shop object
                    });

                    // Sort shop listings by distance (nearest first)
                    shopListings.sort((a, b) => a.distance - b.distance);

                    // Update the UI to display the sorted shop listings
                    // Example: renderShopListings(shopListings);
                })
                .catch(error => {
                    console.error('Error fetching shop listings:', error);
                });
        }

    </script>
@endpush