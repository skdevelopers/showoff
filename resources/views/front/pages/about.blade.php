@extends('front.layouts.master')
@section('title', __('unlimited'))
@section('content')

    <!-- start page header -->
    <section class="dark-overlay hero mx-3 overflow-hidden position-relative py-4 py-lg-5 rounded-4 text-white">
        <img class="bg-image" src="{{asset('front/assets/images/header/01.jpg')}}" alt="Image">
        <div class="container overlay-content py-5">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <!-- start section header -->
                    <div class="section-header text-center" data-aos="fade-down">
                        <!-- start description -->
                        <div class="bg-primary d-inline-block fs-14 mb-3 px-4 py-2 rounded-5 sub-title">7+ YEARS EXPERIENCED IN FIELD</div>
                        <!-- end /. section header sub title -->
                        <!-- start section header -->
                        <h2 class="display-4 fw-semibold mb-3 section-header__title text-capitalize">ListOn was founded in 2023 by Alexander with a <span class="font-caveat text-white">vision to your original</span> vision or inspiration.</h2>
                        <!-- end /. section header title -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
        </div>
    </section>
    <!-- end /. page header -->
    <!-- start achievements section -->
    <div class="container">
        <div class="achievements-wrapper ms-auto me-auto">
            <div class="bg-center js-bg-image bg-cover bg-light counter-content_about position-relative rounded-4" data-image-src="{{asset('front/assets/images/pattern.svg')}}">
                <div class="g-4 justify-content-center row">
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="display-5 fw-semibold numscroller text-primary"><span class="counter">3,000 </span>+</div>
                        <h5 class="fs-18 mb-0 mt-3">Job posted</h5>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="display-5 fw-semibold numscroller text-primary"><span class="counter">2,500 </span>+</div>
                        <h5 class="fs-18 mb-0 mt-3">Successful hires</h5>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="display-5 fw-semibold numscroller text-primary"><span class="counter">10</span>M +</div>
                        <h5 class="fs-18 mb-0 mt-3">Monthly visits</h5>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-center">
                        <div class="display-5 fw-semibold numscroller text-primary"><span class="counter">593 </span>+</div>
                        <h5 class="fs-18 mb-0 mt-3">Verified companies</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end /. achievements section -->
    <!-- start about section -->
    <div class="py-5">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">About us</div>
                        <!-- end /. subtitle -->
                        <!-- start title -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Explore over 2.5 million people travel around the world.</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="column-text-box left">
                        <p><span class="float-start important-text mb-2 me-2 position-relative text-primary fs-50"><strong>M</strong></span>any desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        <p> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                        <blockquote class="about-blockquote display-6 font-caveat fst-italic my-3"> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</blockquote>
                        <p>We hope you enjoy it using it as much as we did building it. Cheers!</p>
                        <img src="{{asset('front/assets/images/png-img/signature.png')}}" alt="" class="signature mt-4">
                    </div>
                </div>
                <div class="col-md-6 ps-xxl-5">
                    <!-- start about image masonry -->
                    <div class="ps-xl-4 position-relative">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="about-image-wrap mb-3 rounded-4">
                                    <img src="{{asset('front/assets/images/about/01.jpg')}}" alt="" class="h-100 w-100 object-fit-cover about-image-one rounded-3">
                                </div>
                                <div class="about-image-wrap rounded-4">
                                    <img src="{{asset('front/assets/images/about/02.jpg')}}" alt="" class="h-100 w-100 object-fit-cover about-image-two rounded-3">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="about-image-wrap mb-3 rounded-4">
                                    <img src="{{asset('front/assets/images/about/03.jpg')}}" alt="" class="h-100 w-100 object-fit-cover about-image-three rounded-3">
                                </div>
                                <div class="about-image-wrap rounded-4">
                                    <img src="{{asset('front/assets/images/about/04.jpg')}}" alt="" class="h-100 w-100 object-fit-cover about-image-four rounded-3">
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('front/assets/images/png-img/about-shape-1.png')}}" alt="About Shape" class="banner-shape-one position-absolute">
                        <img src="{{asset('front/assets/images/png-img/about-shape-2.png')}}" alt="About Shape" class="banner-shape-two position-absolute">
                    </div>
                    <!-- end /. about image masonry -->
                </div>
            </div>
        </div>
    </div>
    <!-- end /. about section -->
    <!-- start awards section -->
    <div class="bg-dark mb-3 mx-3 py-5 rounded-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Awards</div>
                        <!-- end /. subtitle -->
                        <!-- start section header -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize text-white">Our Awards</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16 text-white">Find a job you love. <span class="text-primary fw-semibold">Set your career interests.</span></div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="row justify-content-center g-4 g-xxl-5">
                <div class="col-6 col-md-3">
                    <img src="{{asset('front/assets/images/png-img/award-01.png')}}" alt="" class="img-fluid px-xl-4">
                    <div class="mt-3 pt-3 text-center">
                        <h5 class="text-primary">World Architecture Festival</h5>
                        <div class="text-white">Jun 23, 2023</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <img src="{{asset('front/assets/images/png-img/award-02.png')}}" alt="" class="img-fluid px-xl-4">
                    <div class="mt-3 pt-3 text-center">
                        <h5 class="text-primary">Venice Biennale of Architecture</h5>
                        <div class="text-white">Jun 23, 2023</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <img src="{{asset('front/assets/images/png-img/award-03.png')}}" alt="" class="img-fluid px-xl-4">
                    <div class="mt-3 pt-3 text-center">
                        <h5 class="text-primary">Tamayouz Excellence Award for Architecture</h5>
                        <div class="text-white">Jun 23, 2023</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <img src="{{asset('front/assets/images/png-img/award-04.png')}}" alt="" class="img-fluid px-xl-4">
                    <div class="mt-3 pt-3 text-center">
                        <h5 class="text-primary">RIBA President's Medals</h5>
                        <div class="text-white">Jun 23, 2023</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end /. awards section -->
    <!-- start about video section -->
    <div class="about-video position-relative mx-3 rounded-4 overflow-hidden">
        <!-- Image Parallax -->
        <img src="{{asset('front/assets/images/about/bg-01.jpg')}}" alt="" class="about-img js-image-parallax">
        <a class="align-items-center bg-blur d-flex justify-content-center popup-youtube position-absolute rounded-circle start-50 text-white top-50 translate-middle video-icon z-1" href="https://www.youtube.com/watch?v=0O2aH4XLbto">
            <i class="fas fa-play"></i>
        </a>
    </div>
    <!-- end /. about video section -->
    <!-- start team section -->
    <div class="py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-6">
                    <!-- start section header -->
                    <div class="section-header mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Our Team</div>
                        <!-- end /. subtitle -->
                        <!-- start title -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Meet Our Team</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16">A team of experienced and dedicated professionals who are passionate about helping our clients find their dream properties. From our agents to our support staff, everyone on our team is committed to providing personalized service, expert guidance, and exceptional results.</div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="row justify-content-center g-4 gx-xxl-5">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container">
                                <img src="{{asset('front/assets/images/avatar/01.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Ethan Blackwood</h4>
                            <div>Co-founder</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member mt-4">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/02.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Edwin Martins</h4>
                            <div>Product Manager</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/03.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Alexander Kaminski</h4>
                            <div>Software Developer</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member mt-4">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/04.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Pranoti Deshpande</h4>
                            <div>DevOps</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/05.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Alexander Steele</h4>
                            <div>Data analysis</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member mt-4">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/06.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Marcus Knight</h4>
                            <div>Security Engineer</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/07.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Alexander Kaminski</h4>
                            <div>Support Engineer</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Start Card -->
                    <div class="team-member mt-4">
                        <div class="member-header overflow-hidden position-relative rounded-4">
                            <div class="d-block overflow-hidden position-relative team-avatar-container bg-gradient">
                                <img src="{{asset('front/assets/images/avatar/02.jpg')}}" class="img-fluid w-100" alt="">
                            </div>
                            <ul class="align-items-center d-flex fs-21 gap-2 justify-content-center list-unstyled mb-0 member-social position-absolute">
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="align-items-center d-flex fs-14 justify-content-center rounded-circle text-white"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Avatar Info -->
                        <div class="member-info mt-3 text-center">
                            <h4 class="mb-2 member-name text-truncate">Gabriel North</h4>
                            <div>Security Engineer</div>
                        </div>
                        <!-- /.End Avatar Info -->
                    </div>
                    <!-- /.End Card -->
                </div>
            </div>
        </div>
    </div>
    <!-- end /. team section -->
    <!-- start customers section -->
    <div class="py-5 bg-light">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Our Customers</div>
                        <!-- end /. subtitle -->
                        <!-- start title -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Trusted By Thousands News Of Companies</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="row align-items-center justify-content-center g-2 g-sm-3 g-md-4">
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/01.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/02.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/03.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/04.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/05.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                    <div class="border-0 card card-hover d-block header-cat-box px-3 py-3 rounded-4 text-center">
                        <img src="{{asset('front/assets/images/brand-logo/06.png')}}" alt="" height="60" class="company-logo img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end /. customers section -->

@endsection
@push('styles')

    <!-- Main About css -->
    <link href="{{asset('front/assets/css/plugins/aos/aos.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/OwlCarousel2/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/OwlCarousel2/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/jquery-fancyfileuploader/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/ion.rangeSlider/ion.rangeSlider.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
@endpush
