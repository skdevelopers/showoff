@extends('front.layouts.master')
@section('title', __('unlimited'))
@section('content')

    <!-- end /. navbar -->
    <!-- start gallery -->
    <div class="container">
        <div class="rounded-4 overflow-hidden">
            <div class="row gx-2 zoom-gallery">
                <div class="col-md-8">
                    <a class="d-block position-relative" href="{{asset('front/assets/images/listing-details/gallery/454840.jpg')}}">
                        <img class="img-fluid w-100" src="{{asset('front/assets/images/listing-details/gallery/454840.jpg')}}" alt="Image Description">
                        <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                            <span class="align-items-center btn btn-light btn-sm d-flex d-md-none fw-semibold gap-2">
                                <i class="fa-solid fa-expand"></i>
                                <span> View photos</span>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 d-none d-md-inline-block">
                    <a class="d-block mb-2" href="{{asset('front/assets/images/listing-details/gallery/545405.jpg')}}">
                        <img class="img-fluid w-100" src="{{asset('front/assets/images/listing-details/gallery/545405.jpg')}}" alt="Image Description">
                    </a>
                    <a class="d-block position-relative" href="{{asset('front/assets/images/listing-details/gallery/541259.jpg')}}">
                        <img class="img-fluid w-100" src="{{asset('front/assets/images/listing-details/gallery/541259.jpg')}}" alt="Image Description">
                        <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                            <span class="align-items-center btn btn-light btn-sm d-md-inline-flex d-none fw-semibold gap-2">
                                <i class="fa-solid fa-expand"></i>
                                <span> View photos</span>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-end mt-2">
            <span class="small text-dark fw-semibold">Published:</span>
            <span class="small ms-1 text-muted">November 21, 2023</span>
        </div> -->
    </div>
    <!-- end /. gallery -->

    <!-- start details header -->
    <div class="py-4">
        <div class="container">
            <div class="justify-content-between row align-items-center g-4">
                <div class="col-lg col-xxl-8">
                    <h1 class="h2 page-header-title fw-semibold">Dubai CarWsh LLC</h1>
                    <ul class="list-inline list-separator d-flex align-items-center mb-2">
                        <li class="list-inline-item">
                            <a class="fw-medium" href="#">Dubai CarWash<i class="fa-solid fa-arrow-up-right-from-square fs-14 ms-2"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <div class="d-flex align-items-center gap-2 ms-auto">
                                <div class="d-flex align-items-center text-primary rating-stars">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon half"></i>
                                    <i class="fa-star-icon none"></i>
                                </div>
                                <!-- start counter text -->
                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span><small>2,391 reviews</small></span>
                                <!-- end /. counter text -->
                            </div>
                        </li>
                    </ul>
                    <ul class="fs-14 fw-medium list-inline list-separator mb-0 text-muted">
                        <li class="list-inline-item">Posted 7 hours ago</li>
                        <li class="list-inline-item">1123 Fictional St, Dubai</li>
                        <li class="list-inline-item">Full time</li>
                    </ul>
                </div>
                <div class="col-lg-auto">
                    <!-- start checkbox bookmark -->
                    <div class="form-check form-check-bookmark mb-2 mb-sm-0">
                        <input class="form-check-input" type="checkbox" value="" id="jobBookmarkCheck">
                        <label class="form-check-label" for="jobBookmarkCheck">
                            <span class="form-check-bookmark-default">
                                <i class="fa-regular fa-heart me-1"></i> Save this listing
                            </span>
                            <span class="form-check-bookmark-active">
                                <i class="fa-solid fa-heart me-1"></i> Saved
                            </span>
                        </label>
                    </div>
                    <!-- end /. checkbox bookmark -->
                    <div class="small mt-1">46 people bookmarked this place</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end /. details header -->
    <!-- start listing details -->
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 content">
                    <!-- start pricing section -->
                    <div class="mb-4 our-service-sec">
                        <h4 class="fw-semibold fs-3 mb-4">Our Services</h4>
                        <div class="row">
                            @foreach ($listing->services as $service)
                                <div class="col-sm-6">
                                    <div class="mb-3 menu pb-2">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="d-flex">
                                                    <img src="{{ asset($service->user_image) }}" alt="{{ $service->name }}" class="serv-icon">
                                                    <div class="detail">
                                                        <h4 class="fs-17 mb-0 menu-title">{{ $service->name }}</h4>
                                                        <div class="fs-14 menu-detail text-muted">{{ $service->description }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 menu-price-detail text-end">
                                                <h4 class="fs-17 mb-0 menu-price"><span class="currency-lab">AED</span> {{ $service->price }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end /. pricing section -->
                    <!-- Other sections... -->
                </div>
                <div class="col-lg-4 ps-xxl-5 sidebar">
                    <!-- start opening hours -->
                    <div class="border mb-4 p-4 rounded-4">
                        <div class="align-items-center d-flex justify-content-between mb-4">
                            <h4 class="w-semibold mb-0">Opening <span class="font-caveat text-primary">Hours</span></h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                            </svg>
                        </div>
                        <!-- Render operating hours dynamically -->
                        @foreach ($operatingHours as $day => $hours)
                            <div class="align-items-center d-flex justify-content-between mb-3">
                                <span class="fw-semibold">{{ ucfirst($day) }}</span>
                                <span class="fs-14">{{ $hours['open_time'] }} - {{ $hours['close_time'] }}</span>
                            </div>
                        @endforeach
                    </div>
                    <!-- end /. opening hours -->

                    <!-- start enquiry form section -->
                    <div class="border p-4 rounded-4">
                        <h4 class="fw-semibold mb-4">Enquiry<span class="font-caveat text-primary">online</span></h4>
                        <form class="row g-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required fw-medium mb-2">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name" required="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required fw-medium mb-2">Email Address</label>
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required fw-medium mb-2">Comment</label>
                                    <textarea class="form-control" rows="7" placeholder="Tell us what we can help you with!"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary w-100"> Submit </button>
                            </div>
                        </form>
                    </div>
                    <!-- end /. enquiry form section -->
                </div>
            </div>
        </div>
    </div>
    <!-- end /. listing details -->

    <!-- start listings carousel -->
    <div class="py-5 position-relative overflow-hidden">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Similar Listings</div>
                        <!-- end /. subtitle -->
                        <!-- start title -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Similar Listings you may like</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="listings-carousel owl-carousel owl-theme owl-nav-bottom">
                <!-- start listing card -->
                <div class="card rounded-3 w-100 flex-fill overflow-hidden">
                    <!-- start card link -->
                    <a href="{{url('/listing-details')}}" class="stretched-link"></a>
                    <!-- end /. card link -->
                    <!-- start card image wrap -->
                    <div class="card-img-wrap card-image-hover overflow-hidden">
                        <img src="{{asset('front/assets/images/place/01.jpg')}}" alt="" class="img-fluid">
                        <div class="bg-primary card-badge d-inline-block text-white position-absolute">10% OFF</div>
                        <div class="bg-primary card-badge d-inline-block text-white position-absolute">AED 100 off AED 399: eblwc</div>
                        <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                            <a href="#" class="btn-icon shadow-sm d-flex align-items-center justify-content-center text-primary bg-light rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                                </svg>
                            </a>
                            <a href="#" class="btn-icon shadow-sm d-flex align-items-center justify-content-center text-primary bg-light rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- end /. card image wrap -->
                    <div class="d-flex flex-column h-100 position-relative p-4">
                        <div class="align-items-center bg-primary cat-icon d-flex justify-content-center position-absolute rounded-circle text-white"><i class="fa-solid fa-shop"></i></div>
                        <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start">
                            <!-- start ratings -->
                            <i class="fa-solid fa-star"></i>
                            <!-- end /. ratings -->
                            <!-- start ratings counter text -->
                            <span class="fw-medium text-primary"><span class="fs-5 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                            <!-- end /. ratings counter text -->
                        </div>
                        <!-- start card title -->
                        <h4 class="fs-5 fw-semibold mb-0">Green Mart Apartment</h4>
                        <!-- end /. card title -->
                    </div>
                </div>
                <!-- end /. listing card -->

            </div>
        </div>
    </div>
    <!-- end /. listings carousel -->
    <!-- Footer Section Start -->

@endsection

@push('styles')
    <link href="{{asset('front/assets/plugins/aos/aos.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/OwlCarousel2/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/OwlCarousel2/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/ion.rangeSlider/ion.rangeSlider.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css')}}" rel="stylesheet">
@endpush

@push('script')
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
@endpush
