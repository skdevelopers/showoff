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
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbar-collapse" aria-expanded="true"
                            aria-label="Toggle navigation"><span></span> <span></span></button>
                        <!-- Start search -->
                        <form class="search" action="#" method="get">
                            <div class="search__inner">
                                <input type="text" class="search__text" placeholder="Search (Ctrl+/)">
                                <svg data-sa-action="search-close" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-search search__helper"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                                <span class="search-shortcode">(Ctrl+/)</span>
                            </div>
                        </form>
                        <!-- End /. search -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle material-ripple" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="typcn typcn-weather-stormy top-menu-icon"></i>Home
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../{{('/')}}">Home (Main)</a></li>
                                    <li><a class="dropdown-item" href="../home-classic.html">Home (Classic)</a></li>
                                    <li><a class="dropdown-item" href="../home-rounded.html">Home (Rounded)</a></li>
                                    <li><a class="dropdown-item" href="../home-map.html">Home (Map)</a></li>
                                    <li><a class="dropdown-item" href="../home-grid.html">Home (Grid)</a></li>
                                    <li><a class="dropdown-item" href="../home-waves.html">Home (Waves)</a></li>
                                    <li><a class="dropdown-item" href="../home-car.html">Home (Car)&nbsp;<span
                                                class="badge text-bg-primary fw-semibold">New</span></a></li>
                                    <li><a class="dropdown-item" href="../home-restaurant.html">Home
                                            (Restaurant)&nbsp;<span
                                                class="badge text-bg-primary fw-semibold">New</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle material-ripple" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="typcn typcn-weather-stormy top-menu-icon"></i>Dashboard
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{('/dashboard')}}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{('booking')}}">Bookings</a></li>
                                    <li><a class="dropdown-item" href="{{('messages')}}">Message</a></li>
                                    <li><a class="dropdown-item" href="{{('wallet')}}">Wallet</a></li>
                                    <li><a class="dropdown-item" href="{{('profile')}}">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="{{('add-listing')}}">Add listing</a></li>
                                    <li><a class="dropdown-item" href="{{('my-listing')}}">My listing</a></li>
                                    <li><a class="dropdown-item" href="{{('booking')}}">Bookings</a></li>
                                    <li><a class="dropdown-item" href="{{('reviews')}}">Reviews</a></li>
                                    <li><a class="dropdown-item" href="{{('bookmark')}}">Bookmark</a></li>
                                    <li><a class="dropdown-item" href="{{('setting-app')}}">Settings</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Listing
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">List View</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-list-left.html">Left
                                                    Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-list-right.html">Right
                                                    Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Grid View 1</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-grid-1-left.html">Left
                                                    Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-grid-1-right.html">Right
                                                    Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Grid View 2</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-grid-2-left.html">Left
                                                    Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-grid-2-right.html">Right
                                                    Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Half Map + Sidebar</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-map.html">Half Map List</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../listings-map-car.html">Half Map List
                                                    (Car)&nbsp;<span
                                                        class="badge text-bg-primary fw-semibold">New</span></a></li>
                                            <li><a class="dropdown-item" href="../listings-map-grid-1.html">Half Map
                                                    Grid 1</a></li>
                                            <li><a class="dropdown-item" href="../listings-map-grid-2.html">Half Map
                                                    Grid 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Listing Details</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listing-details.html">Listing
                                                    Details 1</a></li>
                                            <li><a class="dropdown-item" href="../listing-details-2.html">Listing
                                                    Details 2</a></li>
                                            <li><a class="dropdown-item" href="../listing-details-car.html">Listing
                                                    Details Car&nbsp;<span
                                                        class="badge text-bg-primary fw-semibold">New</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../listings-map-grid-1.html"><i
                                        class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Explore</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Template
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">About</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../about.html">About us 1</a></li>
                                            <li><a class="dropdown-item" href="../about-2.html">About us 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Agent</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../agent.html">Agent</a></li>
                                            <li><a class="dropdown-item" href="../agent-details.html">Agent
                                                    Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="../blog.html" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../blog.html">Blog</a></li>
                                            <li><a class="dropdown-item" href="../blog-details.html">Blog Standard</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../blog-post-galary.html">Blog
                                                    Galary</a></li>
                                            <li><a class="dropdown-item" href="../blog-post-video.html">Blog Video</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../blog-post-audio.html">Blog Audio</a>
                                            </li>
                                            <li><a class="dropdown-item" href="../blog-archive.html">Blog Archive</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="../{{('add-listing')}}">Add Listing</a></li>
                                    <li><a class="dropdown-item" href="../contact.html">Contact</a></li>
                                    <li><a class="dropdown-item" href="../pricing.html">Pricing</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Authentication</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../{{('/sign-in')}}">Sign In</a></li>
                                            <li><a class="dropdown-item" href="../{{('/sign-up')}}">Sign Up</a></li>
                                            <li><a class="dropdown-item" href="../forgot-password.html">Forgot
                                                    Password</a></li>
                                            <li><a class="dropdown-item" href="../two-factor-auth.html">Two factor
                                                    authentication</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Specialty</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">Help Center</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../faq.html">Faq Page</a></li>
                                            <li><a class="dropdown-item" href="../terms-conditions.html">Terms &
                                                    Conditions</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="../style-guide.html">Style Guide</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-icon d-flex">
                        <ul class="navbar-nav flex-row align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="btnFullscreen">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link dark-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                        <path
                                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278M4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                    </svg>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link light-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                                        <path
                                            d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                    </svg>
                                </button>
                            </li>
                            <li class="nav-item dropdown user-menu user-menu-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div
                                        class="profile-element d-flex align-items-center flex-shrink-0 p-0 text-start">
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
                                        <a href="#" class="header-arrow"><i
                                                class="icon ion-md-arrow-back"></i></a>
                                    </div>
                                    <div class="user-header">
                                        <div class="img-user">
                                            <img src="{{asset('front/user/assets/dist/img/avatar/01.jpg')}}" alt="">
                                        </div><!-- img-user -->
                                        <h6>Naeem Khan</h6>
                                        <span>example@gmail.com</span>
                                    </div><!-- user-header -->
                                    <a href="{{('profile')}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path
                                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>
                                        Dashboard</a>
                                    <a href="{{('profile')}}" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                        Edit Profile</a>
                                    <a href="#" class="dropdown-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-shuffle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M0 3.5A.5.5 0 0 1 .5 3H1c2.202 0 3.827 1.24 4.874 2.418.49.552.865 1.102 1.126 1.532.26-.43.636-.98 1.126-1.532C9.173 4.24 10.798 3 13 3v1c-1.798 0-3.173 1.01-4.126 2.082A9.624 9.624 0 0 0 7.556 8a9.624 9.624 0 0 0 1.317 1.918C9.828 10.99 11.204 12 13 12v1c-2.202 0-3.827-1.24-4.874-2.418A10.595 10.595 0 0 1 7 9.05c-.26.43-.636.98-1.126 1.532C4.827 11.76 3.202 13 1 13H.5a.5.5 0 0 1 0-1H1c1.798 0 3.173-1.01 4.126-2.082A9.624 9.624 0 0 0 6.444 8a9.624 9.624 0 0 0-1.317-1.918C4.172 5.01 2.796 4 1 4H.5a.5.5 0 0 1-.5-.5" />
                                            <path
                                                d="M13 5.466V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192zm0 9v-3.932a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192z" />
                                        </svg>
                                        Service History</a>
                                    <a href="{{('setting-app')}}" class="dropdown-item">
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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars fs-18"></i>
                    </button>
                </nav>
                <!-- End /. navbar -->
                <div class="body-content">
                    <div class="decoration blur-2"></div>
                    <div class="decoration blur-3"></div>
                    <div class="container-xxl">
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Basic Informations</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Listing Title</label>
                                            <input type="text" class="form-control" required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Category</label>
                                            <select class="form-select">
                                                <option selected="">Category</option>
                                                <option value="1">Restaurant</option>
                                                <option value="2">Event</option>
                                                <option value="3">Adrenaline</option>
                                            </select>
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Tags</label>
                                            <input type="text" class="form-control" placeholder="+ Add tag"
                                                required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Location</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">City</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected="">Select City</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Address</label>
                                            <input type="email" class="form-control"
                                                placeholder="8706 Herrick Ave, Valley..." required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">State</label>
                                            <input type="number" class="form-control" placeholder="State"
                                                required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Zip-Code</label>
                                            <input type="number" class="form-control" placeholder="3870"
                                                required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Gallery</h6>
                            </div>
                            <div class="card-body">
                                <!-- start form group -->
                                <div class="">
                                    <label class="required fw-medium mb-2">Gallery</label>
                                    <input class="fileUp fileup-sm" type="file" name="files"
                                        accept=".jpg, .png, image/jpeg, image/png" multiple>
                                    <div class="form-text">Recommended to 350 x 350 px (png, jpg, jpeg).</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-sm-12">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Description</label>
                                            <textarea class="form-control" rows="7" placeholder="Please enter up to 4000 characters."></textarea>
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Phone</label>
                                            <input type="number" class="form-control" placeholder="(123) 456 - 789"
                                                required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Company website</label>
                                            <input type="text" class="form-control"
                                                placeholder="https://company.com" required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="required fw-medium mb-2">Email Address</label>
                                            <input type="email" class="form-control"
                                                placeholder="example@email.com" required="">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="fw-medium mb-2">Facebook Page<span
                                                    class="fs-13 ms-1 text-muted">(optional)</span></label>
                                            <input type="text" class="form-control"
                                                placeholder="https://facebook.com/">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="fw-medium mb-2">Twitter profile<span
                                                    class="fs-13 ms-1 text-muted">(optional)</span></label>
                                            <input type="text" class="form-control"
                                                placeholder="https://twitter.com/">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="fw-medium mb-2">Instagram profile<span
                                                    class="fs-13 ms-1 text-muted">(optional)</span></label>
                                            <input type="text" class="form-control"
                                                placeholder="https://instagram.com/">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- start form group -->
                                        <div class="">
                                            <label class="fw-medium mb-2">Linkedin page<span
                                                    class="fs-13 ms-1 text-muted">(optional)</span></label>
                                            <input type="text" class="form-control"
                                                placeholder="https://linkedin.com/">
                                        </div>
                                        <!-- end /. form group -->
                                    </div>
                                    <div class="col-sm-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fw-medium text-dark mb-3">Property amenities<span
                                                class="fs-13 ms-1 text-muted">(optional)</span></div>
                                        <div class="row gx-3 gy-2">
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultOne">
                                                    <label class="form-check-label" for="flexCheckDefaultOne">
                                                        Garden
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultTwo">
                                                    <label class="form-check-label" for="flexCheckDefaultTwo">
                                                        Security cameras
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultThree">
                                                    <label class="form-check-label" for="flexCheckDefaultThree">
                                                        Laundry
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultFour">
                                                    <label class="form-check-label" for="flexCheckDefaultFour">
                                                        Internet
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultFive">
                                                    <label class="form-check-label" for="flexCheckDefaultFive">
                                                        Pool
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultSix">
                                                    <label class="form-check-label" for="flexCheckDefaultSix">
                                                        Video surveillance
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultSeven">
                                                    <label class="form-check-label" for="flexCheckDefaultSeven">
                                                        Laundry room
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultEight">
                                                    <label class="form-check-label" for="flexCheckDefaultEight">
                                                        Jacuzzi
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- Start Form Check -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefaultNine">
                                                    <label class="form-check-label" for="flexCheckDefaultNine">
                                                        Security cameras
                                                    </label>
                                                </div>
                                                <!-- /. End Form Check -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Opening Hours</h6>
                            </div>
                            <div class="card-body">
                                <div class="accordion listing-accordion" id="accordionExample">
                                    <div class="accordion-item bg-transparent mb-3 rounded-4">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button bg-transparent shadow-none text-dark"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-calendar2-plus text-primary me-3"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                                                    <path
                                                        d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z" />
                                                </svg>
                                                <span class="fs-18 fw-medium">Add schedule plan</span><span
                                                    class="count fs-13 ms-1 text-muted">(optional)</span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-4">
                                                <div class="row g-4">
                                                    <div class="col-sm-3">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Date</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Time</label>
                                                            <input type="datetime-local" class="form-control">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Place</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Place">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Address</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="8706 Herrick Ave, Valley...">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <button type="button" class="btn btn-primary-soft"><i
                                                            class="fa fa-plus me-2"></i>Add another schedule
                                                        item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item bg-transparent mb-3 rounded-4">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button bg-transparent bg-white collapsed text-dark shadow-none"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-cup-hot text-primary me-3"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6H.5ZM13 12.5a2.01 2.01 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5ZM2.64 13.825 1.123 7h11.754l-1.517 6.825A1.5 1.5 0 0 1 9.896 15H4.104a1.5 1.5 0 0 1-1.464-1.175Z" />
                                                    <path
                                                        d="m4.4.8-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 3.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8Zm3 0-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 6.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8Zm3 0-.003.004-.014.019a4.077 4.077 0 0 0-.204.31 2.337 2.337 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.198 3.198 0 0 1-.202.388 5.385 5.385 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 9.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8Z" />
                                                </svg>
                                                <span class="fs-18 fw-medium">Add restaurant menu</span><span
                                                    class="count fs-13 ms-1 text-muted">(optional)</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-4">
                                                <div class="row g-4">
                                                    <div class="col-sm-4">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="text-medium mb-2">Title</label>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Description</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <!-- start form group -->
                                                        <div class="">
                                                            <label class="fw-medium mb-2">Meal Type</label>
                                                            <select class="form-select">
                                                                <option selected="">Select meal type</option>
                                                                <option value="1">Starter</option>
                                                                <option value="2">Soup</option>
                                                                <option value="3">Main Course</option>
                                                            </select>
                                                        </div>
                                                        <!-- end /. form group -->
                                                    </div>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <button type="button" class="btn btn-primary-soft"><i
                                                            class="fa fa-plus me-2"></i>Add another meal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item bg-transparent mb-3 rounded-4">
                                        <h2 class="accordion-header">
                                            <button
                                                class="accordion-button bg-transparent bg-white collapsed text-dark shadow-none"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-alarm text-primary me-3"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                                    <path
                                                        d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                                </svg>
                                                <span class="fs-18 fw-medium">Add opening hours</span><span
                                                    class="count fs-13 ms-1 text-muted">(optional)</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body p-4">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Monday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Tuesday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Wednesday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Thursday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Friday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Saturday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label fw-medium">Sunday</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Open">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control"
                                                            placeholder="Close">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header position-relative">
                                <h6 class="fs-17 fw-semi-bold mb-0">Add Pricing plan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="faqs" class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th class="fw-medium">Title</th>
                                                <th class="fw-medium">Description</th>
                                                <th class="fw-medium">Price</th>
                                                <th class="fw-medium">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control"></td>
                                                <td><input type="text" class="form-control" placeholder="USD">
                                                </td>
                                                <td class="mt-10"><button type="button" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button onclick="addItem();" class="btn btn-primary-soft"><i
                                            class="fa fa-plus me-2"></i>Add New</button>
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
        <!--/.wrapper-->

@endsection
