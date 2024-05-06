@extends('front.user.layouts.master')
@section('title', __('unlimited'))
@section('contents')

        <!-- Page Content  -->
        <div class="content-wrapper">
            <div class="main-content">
                <!-- Star navbar -->
                <nav class="navbar-custom-menu navbar navbar-expand-xl m-0 navbar-transfarent">
                    <div class="sidebar-toggle">
                        <div class="sidebar-toggle-icon" id="sidebarCollapse">
                            sidebar toggle<span></span>
                        </div>
                    </div>
                    <!--/.sidebar toggle icon-->
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Toggler -->
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-expanded="true" aria-label="Toggle navigation"><span></span> <span></span></button>
                        <!-- Start search -->
                        <form class="search" action="#" method="get">
                            <div class="search__inner">
                                <input type="text" class="search__text" placeholder="Search (Ctrl+/)">
                                <svg data-sa-action="search-close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search search__helper" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                                <span class="search-shortcode">(Ctrl+/)</span>
                            </div>
                        </form>
                        <!-- End /. search -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="../{{('/')}}" >
                                    <i class="typcn typcn-weather-stormy top-menu-icon"></i>Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="../about.html">
                                    <i class="typcn typcn-weather-stormy top-menu-icon"></i>About Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../package.html"><i class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Plans</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-icon d-flex">
                        <ul class="navbar-nav flex-row align-items-center">
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" id="btnFullscreen">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link dark-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278M4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                    </svg>
                                </button>
                            </li> -->
                            <!-- <li class="nav-item">
                                <button class="nav-link light-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                    </svg>
                                </button>
                            </li> -->
                            <li class="nav-item dropdown user-menu user-menu-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-element d-flex align-items-center flex-shrink-0 p-0 text-start">
                                        <div class="avatar online">
                                            <img src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <div class="profile-text">
                                            <h6 class="m-0 fw-medium fs-14">Naeem Khan</h6>
                                            <span>example@gmail.com</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-header d-sm-none">
                                        <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                    </div>
                                    <div class="user-header">
                                        <div class="img-user">
                                            <img src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}" alt="">
                                        </div><!-- img-user -->
                                        <h6>Naeem Khan</h6>
                                        <span>example@gmail.com</span>
                                    </div><!-- user-header -->
                                    <a href="{{('/dashboard')}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                        Dashboard</a>
                                    <a href="edit-{{('profile')}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                        Edit Profile</a>
                                    <a href="service-history.html" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shuffle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5" />
                                            <path d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                        </svg>
                                        Service History</a>
                                    <a href="wishlist.html" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>
                                       Wishlist</a>
                                    <a href="../{{('/sign-in')}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg>
                                        Sign Out</a>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars fs-18"></i>
                    </button>
                </nav>
                <!-- End /. navbar -->
                <div class="body-content">
                    <div class="decoration blur-2"></div>
                    <div class="decoration blur-3"></div>
                    <div class="container-xxl">
                        <div class="align-items-end row g-4 mb-4" data-aos="fade-down">
                            <div class="col">
                                <!-- start section header -->
                                <div class="section-header">
                                    <!-- start subtitle -->
                                    <div class="font-caveat fs-4 fw-bold fw-medium section-header__subtitle text-capitalize text-center text-primary text-xl-start">Bookmarked</div>
                                    <!-- end /. subtitle -->
                                    <!-- start title -->
                                    <h2 class="fw-semibold mb-0 section-header__title text-capitalize text-center text-xl-start h3">Bookmarked Listings</h2>
                                    <!-- end /. title -->
                                    <!-- start description -->
                                    <div class="sub-title fs-16 text-center text-xl-start">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                                    <!-- end /. description -->
                                </div>
                                <!-- end /. section header -->
                            </div>
                            <div class="col-12 col-xl-auto">
                                <!-- start button -->
                                <a href="listings-map-grid-1.html" class="align-items-center d-flex fs-14 fw-bold gap-2 justify-content-center justify-content-xl-end l-spacing-1 text-primary text-uppercase">
                                    See All
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"></path>
                                    </svg>
                                </a>
                                <!-- end /. button -->
                            </div>
                        </div>
                        <!-- start card list -->
                        <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg mb-3">
                            <a href="../listing-details.html" class="stretched-link"></a>
                            <div class="card-body p-0">
                                <div class="g-0 h-100 row">
                                    <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{asset('front/user/assets/dist/img/01.jpg')}}" alt="" class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                                <a href="#" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                                <!-- start ratings -->
                                                <i class="fa-solid fa-star"></i>
                                                <!-- end /. ratings -->
                                                <!-- start rating counter text -->
                                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                                                <!-- end /. rating counter text -->
                                            </div>
                                            <!-- start card title -->
                                            <h4 class="fs-18 fw-semibold mb-0">
                                                <span>Green Mart Apartment</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                                </svg>
                                            </h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-1 fs-14 text-muted">904, Sobha Ivory II, AL ASAYEL ST, Business Bay, Dubai, UAE.</p>
                                            <!-- end /. card description -->
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                                                <a href="tel:+4733378901" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                    <span>+1 754-399-1127</span>
                                                </a>
                                                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                                    </svg>
                                                    <span>Directions</span>
                                                </a>
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                        <!-- start card list -->
                        <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg mb-3">
                            <a href="../listing-details.html" class="stretched-link"></a>
                            <div class="card-body p-0">
                                <div class="g-0 h-100 row">
                                    <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{asset('front/user/assets/dist/img/02.jpg')}}" alt="" class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                                <a href="#" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                                <!-- start ratings -->
                                                <i class="fa-solid fa-star"></i>
                                                <!-- end /. ratings -->
                                                <!-- start rating counter text -->
                                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                                                <!-- end /. rating counter text -->
                                            </div>
                                            <!-- start card title -->
                                            <h4 class="fs-18 fw-semibold mb-0">
                                                Chuijhal Hotel And Restaurant
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                                </svg>
                                            </h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-1 fs-14 text-muted">1115 Broadway, 16 Madison Square West 12th Floor, New York, NY 100101115 Broadway, USA.</p>
                                            <!-- end /. card description -->
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                                                <a href="tel:+4733378901" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                    <span>+1 754-399-1127</span>
                                                </a>
                                                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                                    </svg>
                                                    <span>Directions</span>
                                                </a>
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                        <!-- start card list -->
                        <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg mb-3">
                            <a href="../listing-details.html" class="stretched-link"></a>
                            <div class="card-body p-0">
                                <div class="g-0 h-100 row">
                                    <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{asset('front/user/assets/dist/img/03.jpg')}}" alt="" class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                                <a href="#" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                                <!-- start ratings -->
                                                <i class="fa-solid fa-star"></i>
                                                <!-- end /. ratings -->
                                                <!-- start rating counter text -->
                                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                                                <!-- end /. rating counter text -->
                                            </div>
                                            <!-- start card title -->
                                            <h4 class="fs-18 fw-semibold mb-0">
                                                The Barber's Lounge
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                                </svg>
                                            </h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-1 fs-14 text-muted">13/P Mymensingh Ln, Dhaka 1000,Bangladesh</p>
                                            <!-- end /. card description -->
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                                                <a href="tel:+4733378901" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                    <span>+1 754-399-1127</span>
                                                </a>
                                                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                                    </svg>
                                                    <span>Directions</span>
                                                </a>
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                        <!-- start card list -->
                        <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg mb-3">
                            <a href="../listing-details.html" class="stretched-link"></a>
                            <div class="card-body p-0">
                                <div class="g-0 h-100 row">
                                    <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{asset('front/user/assets/dist/img/04.jpg')}}" alt="" class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                                <a href="#" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                                <!-- start ratings -->
                                                <i class="fa-solid fa-star"></i>
                                                <!-- end /. ratings -->
                                                <!-- start rating counter text -->
                                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                                                <!-- end /. rating counter text -->
                                            </div>
                                            <!-- start card title -->
                                            <h4 class="fs-18 fw-semibold mb-0">
                                                Gaming Expo Spectacle
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                                </svg>
                                            </h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-1 fs-14 text-muted">13/P Mymensingh Ln, Dhaka 1000,Bangladesh</p>
                                            <!-- end /. card description -->
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                                                <a href="tel:+4733378901" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                    <span>+1 754-399-1127</span>
                                                </a>
                                                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                                    </svg>
                                                    <span>Directions</span>
                                                </a>
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                        <!-- start card list -->
                        <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg">
                            <a href="../listing-details.html" class="stretched-link"></a>
                            <div class="card-body p-0">
                                <div class="g-0 h-100 row">
                                    <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                                        <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                            <!-- start image -->
                                            <img src="{{asset('front/user/assets/dist/img/05.jpg')}}" alt="" class="h-100 w-100 object-fit-cover">
                                            <!-- end /. image -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                                        <div class="d-flex flex-column h-100">
                                            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                                <a href="#" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                                <!-- start ratings -->
                                                <i class="fa-solid fa-star"></i>
                                                <!-- end /. ratings -->
                                                <!-- start rating counter text -->
                                                <span class="fw-medium text-primary"><span class="fs-6 fw-semibold me-1">(4.5)</span>2,391 reviews</span>
                                                <!-- end /. rating counter text -->
                                            </div>
                                            <!-- start card title -->
                                            <h4 class="fs-18 fw-semibold mb-0">
                                                Burnowl Tours & Travels
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                                </svg>
                                            </h4>
                                            <!-- end /. card title -->
                                            <!-- start card description -->
                                            <p class="mt-1 fs-14 text-muted">13/P Mymensingh Ln, Dhaka 1000,Bangladesh</p>
                                            <!-- end /. card description -->
                                            <!-- start contact content -->
                                            <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                                                <a href="tel:+4733378901" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                                    </svg>
                                                    <span>+1 754-399-1127</span>
                                                </a>
                                                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                                    </svg>
                                                    <span>Directions</span>
                                                </a>
                                            </div>
                                            <!-- end contact content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /. card list -->
                        <nav class="justify-content-center mt-4 pagination align-items-center">
                            <a class="prev page-numbers" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                                </svg>
                                previous
                            </a>
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#">
                                next
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                </svg>
                            </a>
                        </nav>
                    </div>
                </div>
                <!--/.body content-->
            </div>
            <!--/.main content-->
            <footer class="footer-content">
                <div class="align-items-center d-flex footer-text gap-3 justify-content-between">
                    <div class="copy">© 2024 ShowOff - All Rights Reserved</div>

                </div>
            </footer>
            <!--/.footer content-->
            <div class="overlay"></div>
        </div>
        <!--/.wrapper-->

@endsection
