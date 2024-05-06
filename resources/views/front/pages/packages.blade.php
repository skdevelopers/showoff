@extends('front.layouts.master')
@section('title', __('unlimited'))
@section('content')


    <div class="py-5 bg-gradient rounded-4 mx-3 mt-3">
        <div class="container py-4">
            <div class="text-center mb-5 position-relative">
                <ul class="nav nav-tabs nav-tabs_two d-inline-flex border-bottom-0 bg-white p-2 rounded-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-medium active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly-tab-pane" type="button" role="tab" aria-controls="monthly-tab-pane" aria-selected="true">Monthly Plan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-medium" id="annual-tab" data-bs-toggle="tab" data-bs-target="#annual-tab-pane" type="button" role="tab" aria-controls="annual-tab-pane" aria-selected="false">Annual Plan</button>
                    </li>
                </ul>
                <div class="d-none d-md-inline-block ms-4 position-absolute top-0 save-text">
                    <div class="text-success fs-sm fw-bold mb-sm-1">Save Upto 23%</div>
                    <svg class="text-success ms-n4 d-none d-sm-block" width="52" height="38" viewBox="0 0 52 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M50.5002 1C50.3336 5.33333 48.5 13 44.0002 20.5C39.5005 28 29.0002 32.5 28.5002 23C28.0002 13.5 39.5002 7 36.5002 14.5C33.5002 22 18.5 35.5 4 30" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"></path>
                        <path d="M3.83039 29.8565C6.35946 29.7566 8.93618 29.122 11.2178 28.1747L11.2178 28.1748L11.2196 28.1739C11.5476 28.0299 11.7182 27.6503 11.5867 27.3359C11.448 26.9871 11.0624 26.8028 10.7213 26.9517C7.91141 28.0931 4.64686 28.7829 1.62704 28.4553L1.62706 28.4551L1.62094 28.4549C1.27015 28.4384 0.944127 28.6914 0.902297 29.0451L0.902167 29.045L0.901827 29.0501C0.896722 29.1266 0.902407 29.2007 0.917743 29.2707C0.94057 29.4967 1.07932 29.7124 1.30195 29.8067C4.07984 31.0931 5.87728 34.0754 7.0096 36.882L7.00959 36.882L7.01015 36.8833C7.13957 37.1912 7.5283 37.3687 7.86577 37.2206L7.86579 37.2205C8.19919 37.0741 8.36065 36.6916 8.22031 36.3385L8.22006 36.3379C7.2736 34.0027 5.84935 31.53 3.83039 29.8565Z" fill="currentColor" stroke="currentColor" stroke-width="0.2"></path>
                    </svg>
                </div>
            </div>
            <!-- start tab content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="monthly-tab-pane" role="tabpanel" aria-labelledby="monthly-tab" tabindex="0">
                    <!-- start pricing table -->
                    <div class="table-responsive">
                        <table class="table table-hover pricing-table table-responsive-md">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="fs-4 fw-semibold h6 mb-0 mb-2">Plan & Features</div>
                                        <p class="mb-0 fw-normal">Hidden in the middle generators<br> tend repeat predefin.</p>
                                    </th>
                                    <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Silver</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">AED </span>
                                            <span class="display-4 fw-semibold">49</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-outline-primary text-nowrap">Get Silver</a>
                                    </th>
                                    <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Gold</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">AED </span>
                                            <span class="display-4 fw-semibold">69</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-primary text-nowrap">Get Gold</a>
                                    </th>
                                    <!-- <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Ultimate</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">$</span>
                                            <span class="display-4 fw-semibold">89</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-outline-primary text-nowrap">Get Ultimate</a>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Days</span>
                                    </th>
                                    <td>
                                        <span>90</span>
                                    </td>
                                    <td>
                                        <span>180</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Services</span>
                                    </th>
                                    <td>
                                        <span>10</span>
                                    </td>
                                    <td>
                                        <span>25</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 3</span>
                                    </th>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 4</span>
                                    </th>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <!-- <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 5</span>
                                    </th>
                                    <td></td>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <!-- <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 6</span>
                                    </th>
                                    <td></td>
                                    <!-- <td></td> -->
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end /. pricing table -->
                </div>
                <div class="tab-pane fade" id="annual-tab-pane" role="tabpanel" aria-labelledby="annual-tab" tabindex="0">
                    <!-- start pricing table -->
                    <div class="table-responsive">
                        <table class="table table-hover pricing-table table-responsive-md">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="fs-4 fw-semibold h6 mb-0 mb-2">Plan & Features</div>
                                        <p class="mb-0 fw-normal">Hidden in the middle generators<br> tend repeat predefin.</p>
                                    </th>
                                    <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Silver</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">AED </span>
                                            <span class="display-4 fw-semibold">149</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-outline-primary text-nowrap">Get Silver</a>
                                    </th>
                                    <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Gold</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">AED </span>
                                            <span class="display-4 fw-semibold">269</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-primary text-nowrap">Get Gold</a>
                                    </th>
                                    <!-- <th scope="col">
                                        <span class="font-caveat fs-3 text-primary">Ultimate</span>
                                        <div class="d-flex pt-md-3">
                                            <span class="h3">$</span>
                                            <span class="display-4 fw-semibold">89</span>
                                        </div>
                                        <span class="text-small fw-normal text-nowrap">Per user, billed monthly</span>
                                        <a href="#" class="btn d-block mt-4 btn-outline-primary text-nowrap">Get Ultimate</a>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 1</span>
                                    </th>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 2</span>
                                    </th>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 3</span>
                                    </th>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <td>
                                        <span>Value</span>
                                    </td>
                                    <!-- <td>
                                        <span>Unlimited</span>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 4</span>
                                    </th>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <!-- <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 5</span>
                                    </th>
                                    <td></td>
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                    <!-- <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td> -->
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span class="d-block fw-semibold h6 mb-0 text-nowrap">Feature 6</span>
                                    </th>
                                    <td></td>
                                    <!-- <td></td> -->
                                    <td>
                                        <i class="fa-circle-check fa-solid fs-4 text-success"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end /. pricing table -->
                </div>
            </div>
            <!-- end /. tab content -->
            <div class="text-center">Interested in a custom plan? <a href="#" class="text-primary fw-medium">Get in touch</a></div>
        </div>
    </div>
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