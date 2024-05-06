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
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"
                    aria-expanded="true" aria-label="Toggle navigation"><span></span> <span></span></button>
                <!-- Start search -->
                <form class="search" action="#" method="get">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search (Ctrl+/)">
                        <svg data-sa-action="search-close" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-search search__helper" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                        <span class="search-shortcode">(Ctrl+/)</span>
                    </div>
                </form>
                <!-- End /. search -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{('/')}}">
                            <i class="typcn typcn-weather-stormy top-menu-icon"></i>Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{('/about')}}">
                            <i class="typcn typcn-weather-stormy top-menu-icon"></i>About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{('/package')}}"><i
                                class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i
                                class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Contact Us</a>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="profile-element d-flex align-items-center flex-shrink-0 p-0 text-start">
                                <div class="avatar online">
                                    <img src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}" class="img-fluid rounded-circle"
                                        alt="">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                Dashboard</a>
                            <a href="edit-{{('profile')}}" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                                Edit Profile</a>
                            <a href="service-history.html" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-shuffle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                </svg>
                                Service History</a>
                            <a href="wishlist.html" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                </svg>
                                Wishlist</a>
                            <a href="../{{('/sign-in')}}" class="dropdown-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                                Sign Out</a>
                        </div>
                        <!--/.dropdown-menu -->
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-18"></i>
            </button>
        </nav>
        <!-- End /. navbar -->
        <div class="body-content">
            <div class="Feboration blur-2"></div>
            <div class="Feboration blur-3"></div>
            <div class="container-xxl">
                <!-- Start header banner -->

                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-8 d-flex">
                        <div
                            class="header-banner align-items-center d-flex justify-content-between mb-3 p-4 rounded-4 w-100">
                            <div class="header-banner-context">
                                <h3 class="align-items-center d-flex fs-5 gap-2 text-white mb-3">
                                    <img src="{{asset('front/user/assets/dist/img/SHOWOFF-UNLIMITED-WHITE.png')}}" alt=""
                                        width="35">
                                    Get Subscribe!
                                </h3>
                                <div class="content-text fs-14 opacity-75 text-white">It is a long established
                                    fact that a reader will be distracted by the readable content of a page when
                                    looking at its layout their default.</div>
                                <button class="content-button btn btn-light mt-3">Start free trial</button>
                            </div>
                            <img class="content-wrapper-img" src="{{asset('front/user/assets/dist/img/glass.png')}}" alt=""
                                width="180">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 d-flex">
                        <div style="background: #493a52;"
                            class="qr-header-banner header-banner align-items-center d-flex justify-content-between mb-3 p-2 rounded-4 w-100">
                            <img class="qr-wrapper-img" src="{{asset('front/user/assets/dist/img/9c1d35fa59da3240835207db61b9998a.svg')}}"
                                alt="" width="180">
                            <div class="action-are">
                                <p>Share Your QR</p>
                                <div>
                                    <a href="#" class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                            <path
                                                d="M5.5 15a3.51 3.51 0 0 0 2.36-.93l6.26 3.58a3.06 3.06 0 0 0-.12.85 3.53 3.53 0 1 0 1.14-2.57l-6.26-3.58a2.74 2.74 0 0 0 .12-.76l6.15-3.52A3.49 3.49 0 1 0 14 5.5a3.35 3.35 0 0 0 .12.85L8.43 9.6A3.5 3.5 0 1 0 5.5 15zm12 2a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm0-13A1.5 1.5 0 1 1 16 5.5 1.5 1.5 0 0 1 17.5 4zm-12 6A1.5 1.5 0 1 1 4 11.5 1.5 1.5 0 0 1 5.5 10z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="#" class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                            <path d="M19 9h-4V3H9v6H5l7 8zM4 19h16v2H4z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24"
                                            style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                            <path
                                                d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End /. header banner -->
                <div class="row g-3 mb-3">
                    <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 d-flex">
                                <div class="card flex-column flex-fill p-4 position-relative shadow w-100 widget-card">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fs-14 text-muted">Times Bookmarked</div>
                                            <h3 class="fw-semi-bold mb-0">2:45</h3>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('front/user/assets/dist/img/graph-v1.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    <div class="col-sm-6 col-md-6 col-lg-6  d-flex">
                        <div class="card flex-column flex-fill p-4 position-relative shadow w-100 widget-card">
                            <div class="d-flex">
                                <div class="flex-grow-1 ms-3">
                                    <div class="fs-14 text-muted">Points</div>
                                    <h3 class="fw-semi-bold mb-0">1000.00</h3>
                                </div>
                                <div class="flex-shrink-0">
                                    <img src="{{asset('front/user/assets/dist/img/degrees.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex">
                        <div class="card flex-column flex-fill p-4 position-relative shadow w-100 widget-card">
                            <div class="d-flex">
                                <div class="flex-grow-1 ms-3">
                                    <div class="fs-14 text-muted">Saved</div>
                                    <h3 class="fw-semi-bold mb-0">AED 100.00</h3>
                                </div>
                                <div class="flex-shrink-0">
                                    <img src="{{asset('front/user/assets/dist/img/sales-performance-v2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 d-flex">
                                <div class="card flex-column flex-fill p-4 position-relative shadow w-100 widget-card">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fs-14 text-muted">Time-Spent</div>
                                            <h3 class="fw-semi-bold mb-0">2:45</h3>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('front/user/assets/dist/img/graph-v1.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                </div>
                <!-- <div class="card mb-3 p-4 total-box">
                            <div class="g-4 gx-xxl-5 row">
                                <div class="col-sm-4 total-box-left">
                                    <div class="align-items-center d-flex justify-content-between mb-4">
                                        <h6 class="mb-0">Total Income</h6>
                                        <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h1 class="price">$<span class="counter">58,99</span><span class="fs-13 ms-1 text-muted">(USD)</span></h1>
                                    <p class="mb-0 fw-semibold fs-14">
                                        <span class="percentage-increase">20.9%</span>&nbsp;&nbsp; +18.4k this week
                                    </p>
                                </div>
                                <div class="col-sm-4 total-box-left">
                                    <div class="align-items-center d-flex justify-content-between mb-4">
                                        <h6 class="mb-0">Visitors</h6>
                                        <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h1 class="price counter">780,192</h1>
                                    <p class="mb-0 fw-semibold fs-14">
                                        <span class="percentage-increase">20%</span>&nbsp;&nbsp; +3.5k this week
                                    </p>
                                </div>
                                <div class="col-sm-4 total-box__right">
                                    <div class="align-items-center d-flex justify-content-between mb-4">
                                        <h6 class="mb-0">Total Orders</h6>
                                        <div class="align-items-center d-flex justify-content-center rounded text-primary arrow-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-down-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14 13.5a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1 0-1h4.793L2.146 2.854a.5.5 0 1 1 .708-.708L13 12.293V7.5a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <h1 class="price counter">7,96,542</h1>
                                    <p class="mb-0 fw-semibold fs-14">
                                        <span class="text-primary">9.01%</span>&nbsp;&nbsp; Febrease compared to last week
                                    </p>
                                </div>
                            </div>
                        </div> -->
                <!-- Start statistics -->
                <!-- <div class="card mb-3">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold my-1">Statistics</h6>
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div> -->
                <!-- End /. statistics -->
                <div class="card">
                    <div class="card-header position-relative">
                        <h6 class="fs-17 fw-semi-bold my-1">Recent Services</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless text-nowrap category-list">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Company</th>
                                        <th>Service Date</th>
                                        <th>Payment Type</th>
                                        <th>Price</th>
                                        <!-- <th class="text-end">View Booking</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>01</th>
                                        <td>
                                            <span class="avatar avatar-sm avatar-circle me-2">
                                                <img class="avatar-img" src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}"
                                                    alt="Image Description">
                                            </span>
                                            Ethan Blackwood
                                        </td>
                                        <td>18 Feb 2024</td>
                                        <td>Cash Pay</td>
                                        <td>
                                            <div class="align-items-center d-flex fw-medium gap-1 text-success fs-14">
                                                <!-- <i class="fa-circle fa-solid fs-10"></i> -->
                                                <span>AED 50.00</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>02</th>
                                        <td>
                                            <span class="avatar avatar-sm avatar-circle me-2">
                                                <img class="avatar-img" src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}"
                                                    alt="Image Description">
                                            </span>
                                            Ethan Blackwood
                                        </td>
                                        <td>18 Feb 2024</td>
                                        <td>Cash Pay</td>
                                        <td>
                                            <div class="align-items-center d-flex fw-medium gap-1 text-success fs-14">
                                                <!-- <i class="fa-circle fa-solid fs-10"></i> -->
                                                <span>AED 50.00</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>03</th>
                                        <td>
                                            <span class="avatar avatar-sm avatar-circle me-2">
                                                <img class="avatar-img" src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}"
                                                    alt="Image Description">
                                            </span>
                                            Ethan Blackwood
                                        </td>
                                        <td>18 Feb 2024</td>
                                        <td>Cash Pay</td>
                                        <td>
                                            <div class="align-items-center d-flex fw-medium gap-1 text-success fs-14">
                                                <!-- <i class="fa-circle fa-solid fs-10"></i> -->
                                                <span>AED 50.00</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>04</th>
                                        <td>
                                            <span class="avatar avatar-sm avatar-circle me-2">
                                                <img class="avatar-img" src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}"
                                                    alt="Image Description">
                                            </span>
                                            Ethan Blackwood
                                        </td>
                                        <td>18 Feb 2024</td>
                                        <td>Cash Pay</td>
                                        <td>
                                            <div class="align-items-center d-flex fw-medium gap-1 text-success fs-14">
                                                <!-- <i class="fa-circle fa-solid fs-10"></i> -->
                                                <span>AED 50.00</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>05</th>
                                        <td>
                                            <span class="avatar avatar-sm avatar-circle me-2">
                                                <img class="avatar-img" src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}"
                                                    alt="Image Description">
                                            </span>
                                            Ethan Blackwood
                                        </td>
                                        <td>18 Feb 2024</td>
                                        <td>Cash Pay</td>
                                        <td>
                                            <div class="align-items-center d-flex fw-medium gap-1 text-success fs-14">
                                                <!-- <i class="fa-circle fa-solid fs-10"></i> -->
                                                <span>AED 50.00</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

@endsection
