@extends('Front.user.layouts.master')
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
                                <a class="nav-link dropdown-toggle material-ripple" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="typcn typcn-weather-stormy top-menu-icon"></i>Home
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../{{('/')}}">Home (Main)</a></li>
                                    <li><a class="dropdown-item" href="../home-classic.html">Home (Classic)</a></li>
                                    <li><a class="dropdown-item" href="../home-rounded.html">Home (Rounded)</a></li>
                                    <li><a class="dropdown-item" href="../home-map.html">Home (Map)</a></li>
                                    <li><a class="dropdown-item" href="../home-grid.html">Home (Grid)</a></li>
                                    <li><a class="dropdown-item" href="../home-waves.html">Home (Waves)</a></li>
                                    <li><a class="dropdown-item" href="../home-car.html">Home (Car)&nbsp;<span class="badge text-bg-primary fw-semibold">New</span></a></li>
                                    <li><a class="dropdown-item" href="../home-restaurant.html">Home (Restaurant)&nbsp;<span class="badge text-bg-primary fw-semibold">New</span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle material-ripple" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Listing
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">List View</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-list-left.html">Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-list-right.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Grid View 1</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-grid-1-left.html">Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-grid-1-right.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Grid View 2</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-grid-2-left.html">Left Sidebar</a></li>
                                            <li><a class="dropdown-item" href="../listings-grid-2-right.html">Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Half Map + Sidebar</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listings-map.html">Half Map List</a></li>
                                            <li><a class="dropdown-item" href="../listings-map-car.html">Half Map List (Car)&nbsp;<span class="badge text-bg-primary fw-semibold">New</span></a></li>
                                            <li><a class="dropdown-item" href="../listings-map-grid-1.html">Half Map Grid 1</a></li>
                                            <li><a class="dropdown-item" href="../listings-map-grid-2.html">Half Map Grid 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listing Details</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../listing-details.html">Listing Details 1</a></li>
                                            <li><a class="dropdown-item" href="../listing-details-2.html">Listing Details 2</a></li>
                                            <li><a class="dropdown-item" href="../listing-details-car.html">Listing Details Car&nbsp;<span class="badge text-bg-primary fw-semibold">New</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../listings-map-grid-1.html"><i class="typcn typcn-point-of-interest-outline top-menu-icon"></i>Explore</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    Template
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../about.html">About us 1</a></li>
                                            <li><a class="dropdown-item" href="../about-2.html">About us 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Agent</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../agent.html">Agent</a></li>
                                            <li><a class="dropdown-item" href="../agent-details.html">Agent Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="../blog.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../blog.html">Blog</a></li>
                                            <li><a class="dropdown-item" href="../blog-details.html">Blog Standard</a></li>
                                            <li><a class="dropdown-item" href="../blog-post-galary.html">Blog Galary</a></li>
                                            <li><a class="dropdown-item" href="../blog-post-video.html">Blog Video</a></li>
                                            <li><a class="dropdown-item" href="../blog-post-audio.html">Blog Audio</a></li>
                                            <li><a class="dropdown-item" href="../blog-archive.html">Blog Archive</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="../{{('add-listing')}}">Add Listing</a></li>
                                    <li><a class="dropdown-item" href="../contact.html">Contact</a></li>
                                    <li><a class="dropdown-item" href="../pricing.html">Pricing</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Authentication</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../{{('/sign-in')}}">Sign In</a></li>
                                            <li><a class="dropdown-item" href="../{{('/sign-up')}}">Sign Up</a></li>
                                            <li><a class="dropdown-item" href="../forgot-password.html">Forgot Password</a></li>
                                            <li><a class="dropdown-item" href="../two-factor-auth.html">Two factor authentication</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Specialty</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Help Center</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="../faq.html">Faq Page</a></li>
                                            <li><a class="dropdown-item" href="../terms-conditions.html">Terms & Conditions</a></li>
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
                            </li>
                            <li class="nav-item">
                                <button class="nav-link light-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                    </svg>
                                </button>
                            </li>
                            <li class="nav-item dropdown user-menu user-menu-custom">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-element d-flex align-items-center flex-shrink-0 p-0 text-start">
                                        <div class="avatar online">
                                            <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" class="img-fluid rounded-circle" alt="">
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
                                            <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="">
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
                        <div class="chat-container m-0 overflow-hidden position-relative rounded-4 row">
                            <div class="chat-list__sidebar p-0">
                                <div class="chat-list__search position-relative">
                                    <form class="form-inline position-relative">
                                        <input type="search" class="form-control" placeholder="People Groups and Messages">
                                        <button type="button" class="btn btn-link loop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                        </button>
                                    </form>
                                    <button class="btn create" data-bs-toggle="modal" data-bs-target="#startnewchat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                        </svg>
                                    </button>
                                </div><!--/.chat list search-->
                                <ul class="chat-list__sidebar-tabs nav nav-tabs border-0" id="sidebarTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">
                                            <div class="position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                                </svg>
                                                <div class="counts">5</div>
                                            </div><span class="d-block fs-11 fw-semibold text-truncate">Chats</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="phone-tab" data-bs-toggle="tab" href="#phone" role="tab" aria-controls="phone" aria-selected="true">
                                            <div class="position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                                </svg>
                                            </div><span class="d-block fs-11 fw-semibold text-truncate">Online users</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contacts-tab" data-bs-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">
                                            <div class="position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                                                </svg>
                                            </div><span class="d-block fs-11 fw-semibold text-truncate">Contacts</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="notifications-tab" data-bs-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
                                            <div class="position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                                </svg>
                                                <div class="counts">3</div>
                                            </div><span class="d-block fs-11 fw-semibold text-truncate">Notifications</span>
                                        </a>
                                    </li>
                                </ul><!--/.chat list sidebar tabs-->
                                <div class="tab-content" id="sidebarTabContent">
                                    <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                                        <div class="chat-list__in position-relative">
                                            <h2>Recent Chat</h2>
                                            <div class="nav chat-list" role="tablist">
                                                <a class="item-list item-list__chat d-flex align-items-start unseen active" id="list-item1-tab" data-bs-toggle="tab" href="#list-item1" role="tab" aria-controls="list-item1" aria-selected="true">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                        <div class="new bg-yellow"><span>9</span> </div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Kaminski</h5>
                                                        <span>Sat</span>
                                                        <p>A new feature has been updated to your...</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__chat d-flex align-items-start unseen" id="list-item2-tab" data-bs-toggle="tab" href="#list-item2" role="tab" aria-controls="list-item2" aria-selected="true">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/02.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                        <div class="new bg-pink"><span>+10</span></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Edwin Martins</h5>
                                                        <span>10:05PM</span>
                                                        <p>How can i improve my chances of getting a deposit?</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__chat d-flex align-items-start seen" id="list-item3-tab" data-bs-toggle="tab" href="#list-item3" role="tab" aria-controls="list-item3" aria-selected="true">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Gabriel North</h5>
                                                        <span>Tus</span>
                                                        <p>Hey Chris, could i ask you to help me out with variation...</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start seen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/04.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Ethan Blackwood</h5>
                                                        <span>1/22/2019</span>
                                                        <p>By injected humour, or randomised words which...</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start seen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/02.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                        <div class="new bg-pink"><span>10</span></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Steele</h5>
                                                        <span>1/18/2019</span>
                                                        <p>No more running out of the office at 4pm on Fridays!</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start seen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Marcus Knight</h5>
                                                        <span>1/09/2019</span>
                                                        <p>All your favourite books at your reach! We are now mobile.</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start unseen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/02.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                        <div class="new bg-gray"><span>?</span></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Kaminski</h5>
                                                        <span>Feb 10</span>
                                                        <p>Hi Keith, I'd like to add you as a contact.</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start seen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Pranoti Deshpande</h5>
                                                        <span>Feb 9</span>
                                                        <p>Dear Deborah, your Thai massage is today at 5pm.</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__chat d-flex align-items-start unseen">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/04.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                        <div class="new bg-green"><span>+10</span></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Edwin Martins</h5>
                                                        <span>Thu</span>
                                                        <p>Unfortunately your session today has been cancelled!</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone-tab">
                                        <div class="chat-list__in position-relative">
                                            <h2>Online Users</h2>
                                            <div class="online-visitor">
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">visitor.75327</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">Pawel</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">Visitor.13150</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">visitor.65652</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">visitor.75327</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">visitor.95343</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">Visitor.13150</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                                <a href="#" class="visitor-history" data-bs-toggle="popover" data-trigger="hover" data-placement="right" title="User Info" data-content="<div class='chat-user__info chat-user__info-popover user-info d-flex align-items-center'><div class='avatar'><img src='assets/dist/img/avatar/avatar-5.html' alt='avatar'><div class='status online'></div></div><div class='info-text'><table class='table m-0'><tbody><tr><td class='user-info-first'>Name</td><td class='text-muted'>Edwin Martins</td></tr><tr><td class='user-info-first'>ID</td><td class='text-muted'>123</td></tr><tr><td class='user-info-first'>E-mail</td><td class='text-muted'>example@email.com</td></tr><tr><td class='user-info-first'>URL</td><td class='text-muted'><a href='#' class='text-muted'>https://easital.com/</a></td></tr></tbody></table></div></div>">
                                                    <div><span class="visitor-id">visitor.65652</span><span class="source-link">https://easital.com/</span></div>
                                                </a><!--/.visitor history-->
                                            </div><!--/.online visitor-->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                        <div class="chat-list__in position-relative">
                                            <h2>Contacts</h2>
                                            <div class="nav contact-list">
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Ethan Blackwood</h5>
                                                        <p>Dhaka, Bangladesh</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/02.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                        <div class="new bg-pink"><span>+10</span></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Shafiqul Hasan</h5>
                                                        <p>Douala, Cameroon</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Gabriel North</h5>
                                                        <p>Abuja, Nigeria</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/04.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Ethan Blackwood</h5>
                                                        <p>Kampala, Uganda</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/05.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Steele</h5>
                                                        <p>London, United Kingdom</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/06.jpg')}}" alt="avatar">
                                                        <div class="status ofline"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Marcus Knight</h5>
                                                        <p>Berlin, Germany</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/07.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Kaminski</h5>
                                                        <p>Douala, Cameroon</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Pranoti Deshpande</h5>
                                                        <p>Honolulu, Hawaii</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/02.jpg')}}" alt="avatar">
                                                        <div class="status"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Edwin Martins</h5>
                                                        <p>Nairobi, Kenya</p>
                                                    </div>
                                                    <div class="person-add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                        </svg>
                                                    </div>
                                                </a><!--/.chat list item-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                        <div class="chat-list__in position-relative">
                                            <h2>Notifications</h2>
                                            <div class="nav notification-list">
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/04.jpg')}}" alt="avatar">
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Ethan Blackwood have just sent you a new message.</h5>
                                                        <p>Thursday at 6:59PM</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/05.jpg')}}" alt="avatar">
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Alexander Kaminski has a birthday today. Wish her all the best.</h5>
                                                        <p>Friday at 5:34PM</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/06.jpg')}}" alt="avatar">
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Gabriel North has a birthday today. Wish him all the best.</h5>
                                                        <p>Sunday at 3:34PM</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                                <a href="#" class="item-list item-list__contact d-flex align-items-center">
                                                    <div class="avatar">
                                                        <img src="{{asset('Front/user/assets/dist/img/avatar/07.jpg')}}" alt="avatar">
                                                        <div class="status online"></div>
                                                    </div>
                                                    <div class="info-text">
                                                        <h5>Ethan Blackwood have just sent you a new message.</h5>
                                                        <p>Monday at 8:34PM</p>
                                                    </div>
                                                </a><!--/.chat list item-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.chat list sidebar-->
                            <div class="tab-content chat-panel p-0">
                                <div class="tab-pane fade" id="list-item-empty" role="tabpanel">
                                    <div class="message-content app-empty-page empty">
                                        <div class="no-messages">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-quote" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z" />
                                            </svg>
                                            <p>Seems people are shy to start the chat. Break the ice send the first message.</p>
                                        </div>
                                    </div><!--App empty page-->
                                </div>
                                <div class="tab-pane show active" id="list-item1" role="tabpanel" aria-labelledby="list-item1-tab">
                                    <div class="chat-header d-flex align-items-center">
                                        <button type="button" class="btn chat-sidebar-collapse d-block d-xl-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                                            </svg>
                                        </button>
                                        <!--chat list sidebar collapse button-->
                                        <!--<a href="#" class="position-relative">
                                            <img src="{{asset('Front/user/assets/dist/img/avatar.png" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                            <div class="status online"></div>
                                        </a>-->
                                        <div class="meta-info data">
                                            <h5><a href="#">Alexander Kaminski</a></h5>
                                            <span>Last seen 12hour ago</span>
                                        </div>
                                        <button class="btn d-md-block d-none" title="Start a voice call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Start a video call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Conversation information">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none search-btn" title="Search in conversation">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-block d-lg-none chat-settings-collapse" title="Settings">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn me-0" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                    Voice Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                                    </svg>
                                                    Video Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                    Clear History
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                                        <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                                    </svg>
                                                    Block Contact
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                    Delete Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="messenger-dialog row m-0">
                                        <div class="messenger-dialog__area p-0">
                                            <div class="conversation-search">
                                                <div class="d-flex">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="search__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                        <button class="btn btn-outline-secondary close-search" type="button" id="button-addon2">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.conversation search -->
                                            <div class="align-items-center d-flex empty justify-content-center message-content overflow-y-auto p-0 position-relative">
                                                <div class="no-messages">
                                                    <img src="{{asset('Front/user/assets/dist/img/message')}}" alt="" height="150" class="mb-3">
                                                    <p class="mb-0">This chat is empty.<br> Be the first one to start it.</p>
                                                </div>
                                            </div>
                                            <!--/.tab content-->
                                            <div class="chat-area-bottom d-flex align-items-center">
                                                <form class="position-relative w-100">
                                                    <button type="submit" class="align-items-center btn d-flex start-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                                                        </svg>
                                                    </button>
                                                    <textarea class="form-control" placeholder="Type a message here..." rows="1"></textarea>
                                                    <button type="submit" class="align-items-center btn d-flex end-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <label>
                                                    <input type="file">
                                                    <span class="align-items-center attach btn btn-primary d-flex justify-content-center ms-3 p-0 rounded-circle text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                                                        </svg>
                                                    </span>
                                                </label>
                                            </div><!--/.chat area bottom-->
                                        </div>
                                        <div class="chat-list__sidebar--right">
                                            <div class="chat-user__info d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                    <div class="status online"></div>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="m-0">Alexander Kaminski</h5>
                                                    <p class="writing">Alexander typing a message</p>
                                                </div>
                                            </div>
                                            <div class="chatting_indicate card-body">
                                                <h5>Conversation With Auto bot or manual</h5>
                                                <p>Everyone in this conversation will see this.</p>
                                                <div class="d-flex align-items-center">
                                                    <label class="toggler toggler--is-active" id="autobot">Auto bot</label>
                                                    <div class="toggle">
                                                        <input type="checkbox" id="switcher" class="check">
                                                        <b class="toggle-switch"></b>
                                                    </div>
                                                    <label class="toggler" id="manual">Manual</label>
                                                </div>
                                            </div>
                                            <div id="accordion" class="accordion">
                                                <div class="">
                                                    <div class="accordion-header" id="headingThree">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                                                </svg>
                                                                User Details
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <div class="user-info">
                                                                <div class="table-responsive">
                                                                    <table class="table border">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="user-info-first">Name</td>
                                                                                <td>Alexander Kaminski</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">ID</td>
                                                                                <td>123</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">E-mail</td>
                                                                                <td>example@email.com</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">URL</td>
                                                                                <td><a href="#">https://easital.com/</a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">Browser</td>
                                                                                <td>Chrome</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingOne">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                                </svg>
                                                                Edit name
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <h5>Edit Nickname for Alexander Kaminski</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3">
                                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Alexander Kaminski">
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Save</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingTwo">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
                                                                    <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                                                    <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7" />
                                                                </svg>
                                                                Change color
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <h5>Pick a color for this conversation</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="radio-list change-bg-color">
                                                                <input type="radio" name="color" id="red">
                                                                <label for="red" data-color="red"><span class="red"></span></label>

                                                                <input type="radio" name="color" id="green" checked>
                                                                <label for="green" data-color="green"><span class="green"></span></label>

                                                                <input type="radio" name="color" id="yellow">
                                                                <label for="yellow" data-color="yellow"><span class="yellow"></span></label>

                                                                <input type="radio" name="color" id="olive">
                                                                <label for="olive" data-color="olive"><span class="olive"></span></label>

                                                                <input type="radio" name="color" id="orange">
                                                                <label for="orange" data-color="orange"><span class="orange"></span></label>

                                                                <input type="radio" name="color" id="teal">
                                                                <label for="teal" data-color="teal"><span class="teal"></span></label>

                                                                <input type="radio" name="color" id="blue">
                                                                <label for="blue" data-color="blue"><span class="blue"></span></label>

                                                                <input type="radio" name="color" id="violet">
                                                                <label for="violet" data-color="violet"><span class="violet"></span></label>

                                                                <input type="radio" name="color" id="purple">
                                                                <label for="purple" data-color="purple"><span class="purple"></span></label>

                                                                <input type="radio" name="color" id="pink">
                                                                <label for="pink" data-color="pink"><span class="pink"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingFour">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                                                </svg>
                                                                Notifications
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                        <div class="card-body">
                                                            <h5>Conversation Notifications</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3 mb-4">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch1">
                                                                    <label for="switch1">Receive notifications for new messages</label>
                                                                </span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch2">
                                                                    <label for="switch2">Receive notifications for reactions</label>
                                                                </span>
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Done</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/.chat list sidebar right-->
                                    </div>
                                </div>
                                <div class="tab-pane" id="list-item2" role="tabpanel" aria-labelledby="list-item2-tab">
                                    <div class="chat-header d-flex align-items-center">
                                        <button type="button" class="btn chat-sidebar-collapse d-block d-xl-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"></path>
                                            </svg>
                                        </button>
                                        <div class="meta-info data">
                                            <h5><a href="#">Edwin Martins</a></h5>
                                            <span>Last seen 12hour ago</span>
                                        </div>
                                        <button class="btn d-md-block d-none" title="Start a voice call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Start a video call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Conversation information">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none search-btn" title="Search in conversation">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-block d-lg-none chat-settings-collapse" title="Settings">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn me-0" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                    Voice Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                                    </svg>
                                                    Video Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                    Clear History
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                                        <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                                    </svg>
                                                    Block Contact
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                    Delete Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="messenger-dialog row m-0">
                                        <div class="messenger-dialog__area p-0">
                                            <div class="conversation-search">
                                                <div class="d-flex">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="search__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon4">
                                                        <button class="btn btn-outline-secondary close-search" type="button" id="button-addon4">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.conversation search -->
                                            <div class="message-content message-content-scroll bg-text-green">
                                                <div class="position-relative">
                                                    <div class="date">
                                                        <hr><span>Yesterday</span>
                                                        <hr>
                                                    </div>
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">09:46 AM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p>It is a long established fact that a reader will be.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span class="time-ago">11:32 AM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p> By the readable content of a page when looking at its?</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">02:56 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span class="time-ago">10:21 PM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p>Roger that boss!</p>
                                                                </div>
                                                            </div>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">11:07 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p> Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="date">
                                                        <hr><span>Today</span>
                                                        <hr>
                                                    </div><!--/.date-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span>11:07 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <div class="align-items-center attachment d-flex gap-2">
                                                                        <button class="align-items-center attach btn btn-primary d-flex justify-content-center p-0">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                                                                <path d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                                                                <path d="M16 11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.51c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198zM3.655 4.26 1.592 8.043C1.724 8.014 1.86 8 2 8h12c.14 0 .276.014.408.042L12.345 4.26a.5.5 0 0 0-.439-.26H4.094a.5.5 0 0 0-.44.26zM1 10v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                                                                            </svg>
                                                                        </button>
                                                                        <div class="file">
                                                                            <h5><a href="#">Documentations.pdf</a></h5>
                                                                            <span>21kb Document</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                                                </svg>
                                                                10:21 PM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <div class="text-group">
                                                                <div class="text typing">
                                                                    <div class="wave">
                                                                        <span class="dot"></span>
                                                                        <span class="dot"></span>
                                                                        <span class="dot"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                </div>
                                            </div>
                                            <div class="chat-area-bottom d-flex align-items-center">
                                                <form class="position-relative w-100">
                                                    <button type="submit" class="align-items-center btn d-flex start-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                                                        </svg>
                                                    </button>
                                                    <textarea class="form-control" placeholder="Type a message here..." rows="1"></textarea>
                                                    <button type="submit" class="align-items-center btn d-flex end-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <label>
                                                    <input type="file">
                                                    <span class="align-items-center attach btn btn-primary d-flex justify-content-center ms-3 p-0 rounded-circle text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                                                        </svg>
                                                    </span>
                                                </label>
                                            </div><!--/.chat area bottom-->
                                        </div>
                                        <div class="chat-list__sidebar--right">
                                            <div class="chat-user__info d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('Front/user/assets/dist/img/avatar/01.jpg')}}" alt="avatar">
                                                    <div class="status online"></div>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="m-0">Edwin Martins</h5>
                                                    <p class="writing">Mozammel typing a message</p>
                                                </div>
                                            </div>
                                            <div class="chatting_indicate card-body">
                                                <h5>Conversation With Auto bot or manual</h5>
                                                <p>Everyone in this conversation will see this.</p>
                                                <div class="d-flex align-items-center">
                                                    <label class="toggler toggler--is-active" id="autobot2">Auto bot</label>
                                                    <div class="toggle">
                                                        <input type="checkbox" id="switcher2" class="check">
                                                        <b class="toggle-switch"></b>
                                                    </div>
                                                    <label class="toggler" id="manual2">Manual</label>
                                                </div>
                                            </div>
                                            <div id="accordion2" class="accordion">
                                                <div class="">
                                                    <div class="accordion-header" id="headingThree2">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                                                </svg>
                                                                User Details
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree2" class="collapse" aria-labelledby="headingThree2" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            <div class="user-info">
                                                                <div class="table-responsive">
                                                                    <table class="table border">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="user-info-first">Name</td>
                                                                                <td>Alexander Kaminski</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">ID</td>
                                                                                <td>123</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">E-mail</td>
                                                                                <td>example@email.com</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">URL</td>
                                                                                <td><a href="#">https://easital.com/</a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">Browser</td>
                                                                                <td>Chrome</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingOne2">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                                </svg>
                                                                Edit name
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            <h5>Edit Nickname for Alexander Kaminski</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3">
                                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Alexander Kaminski">
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Save</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingTwo2">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
                                                                    <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                                                    <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7" />
                                                                </svg>
                                                                Change color
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo2" class="collapse show" aria-labelledby="headingTwo2" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            <h5>Pick a color for this conversation</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="radio-list change-bg-color">
                                                                <input type="radio" name="color" id="red2">
                                                                <label for="red2" data-color="red"><span class="red"></span></label>

                                                                <input type="radio" name="color" id="green2" checked>
                                                                <label for="green2" data-color="green"><span class="green"></span></label>

                                                                <input type="radio" name="color" id="yellow2">
                                                                <label for="yellow2" data-color="yellow"><span class="yellow"></span></label>

                                                                <input type="radio" name="color" id="olive2">
                                                                <label for="olive2" data-color="olive"><span class="olive"></span></label>

                                                                <input type="radio" name="color" id="orange2">
                                                                <label for="orange2" data-color="orange"><span class="orange"></span></label>

                                                                <input type="radio" name="color" id="teal2">
                                                                <label for="teal2" data-color="teal"><span class="teal"></span></label>

                                                                <input type="radio" name="color" id="blue2">
                                                                <label for="blue2" data-color="blue"><span class="blue"></span></label>

                                                                <input type="radio" name="color" id="violet2">
                                                                <label for="violet2" data-color="violet"><span class="violet"></span></label>

                                                                <input type="radio" name="color" id="purple2">
                                                                <label for="purple2" data-color="purple"><span class="purple"></span></label>

                                                                <input type="radio" name="color" id="pink2">
                                                                <label for="pink2" data-color="pink"><span class="pink"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingFour2">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                                                </svg>
                                                                Notifications
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseFour2" class="collapse" aria-labelledby="headingFour2" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            <h5>Conversation Notifications</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3 mb-4">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch3">
                                                                    <label for="switch3">Receive notifications for new messages</label>
                                                                </span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch4">
                                                                    <label for="switch4">Receive notifications for reactions</label>
                                                                </span>
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Done</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/.chat list sidebar right-->
                                    </div>
                                </div>
                                <div class="tab-pane" id="list-item3" role="tabpanel" aria-labelledby="list-item3-tab">
                                    <div class="chat-header d-flex align-items-center">
                                        <button type="button" class="btn chat-sidebar-collapse d-block d-xl-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"></path>
                                            </svg>
                                        </button>
                                        <div class="meta-info data mr-auto">
                                            <h5><a href="#">Gabriel North</a></h5>
                                            <span>Last seen 12hour ago</span>
                                        </div>
                                        <button class="btn d-md-block d-none" title="Start a voice call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Start a video call">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none" title="Conversation information">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-md-block d-none search-btn" title="Search in conversation">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                        </button>
                                        <button class="btn d-block d-lg-none chat-settings-collapse" title="Settings">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z" />
                                            </svg>
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn me-0" data-bs-toggle="dropdown" aria-haspopup="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                    Voice Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z" />
                                                    </svg>
                                                    Video Call
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg>
                                                    Clear History
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                                        <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                                                    </svg>
                                                    Block Contact
                                                </button>
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg>
                                                    Delete Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="messenger-dialog row m-0">
                                        <div class="messenger-dialog__area p-0">
                                            <div class="conversation-search">
                                                <div class="d-flex">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="btn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="search__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon5">
                                                        <button class="btn btn-outline-secondary close-search" type="button" id="button-addon5">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.conversation search -->
                                            <div class="message-content message-content-scroll bg-text-green">
                                                <div class="position-relative">
                                                    <div class="date">
                                                        <hr><span>Yesterday</span>
                                                        <hr>
                                                    </div>
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">09:46 AM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p>It is a long established fact that a reader will be.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span class="time-ago">11:32 AM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p> By the readable content of a page when looking at its?</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">02:56 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span class="time-ago">10:21 PM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p>Roger that boss!</p>
                                                                </div>
                                                            </div>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span class="time-ago">11:07 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <p> Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="date">
                                                        <hr><span>Today</span>
                                                        <hr>
                                                    </div><!--/.date-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <span>11:07 PM</span>
                                                            <div class="text-group">
                                                                <div class="text">
                                                                    <div class="align-items-center attachment d-flex gap-2">
                                                                        <button class="align-items-center attach btn btn-primary d-flex justify-content-center p-0">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-hdd" viewBox="0 0 16 16">
                                                                                <path d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1M3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                                                                <path d="M16 11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.51c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198zM3.655 4.26 1.592 8.043C1.724 8.014 1.86 8 2 8h12c.14 0 .276.014.408.042L12.345 4.26a.5.5 0 0 0-.439-.26H4.094a.5.5 0 0 0-.44.26zM1 10v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
                                                                            </svg>
                                                                        </button>
                                                                        <div class="file">
                                                                            <h5><a href="#">Documentations.pdf</a></h5>
                                                                            <span>21kb Document</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message me">
                                                        <div class="text-main">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                                                    <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                                                </svg>
                                                                10:21 PM</span>
                                                            <div class="text-group me">
                                                                <div class="text me">
                                                                    <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                    <div class="message">
                                                        <img class="avatar" src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" data-bs-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Keith">
                                                        <div class="text-main">
                                                            <div class="text-group">
                                                                <div class="text typing">
                                                                    <div class="wave">
                                                                        <span class="dot"></span>
                                                                        <span class="dot"></span>
                                                                        <span class="dot"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--/.message-->
                                                </div>
                                            </div>
                                            <!--/.tab content-->
                                            <div class="chat-area-bottom d-flex align-items-center">
                                                <form class="position-relative w-100">
                                                    <button type="submit" class="align-items-center btn d-flex start-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                            <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                                                        </svg>
                                                    </button>
                                                    <textarea class="form-control" placeholder="Type a message here..." rows="1"></textarea>
                                                    <button type="submit" class="align-items-center btn d-flex end-0 justify-content-center p-0 position-absolute send top-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <label>
                                                    <input type="file">
                                                    <span class="align-items-center attach btn btn-primary d-flex justify-content-center ms-3 p-0 rounded-circle text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                                            <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                                                        </svg>
                                                    </span>
                                                </label>
                                            </div><!--/.chat area bottom-->
                                        </div>
                                        <div class="chat-list__sidebar--right">
                                            <div class="chat-user__info d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{asset('Front/user/assets/dist/img/avatar/03.jpg')}}" alt="avatar">
                                                    <div class="status online"></div>
                                                </div>
                                                <div class="info-text">
                                                    <h5 class="m-0">Gabriel North</h5>
                                                    <p class="writing">Tuhin typing a message</p>
                                                </div>
                                            </div>
                                            <div class="chatting_indicate card-body">
                                                <h5>Conversation With Auto bot or manual</h5>
                                                <p>Everyone in this conversation will see this.</p>
                                                <div class="d-flex align-items-center">
                                                    <label class="toggler toggler--is-active" id="autobot3">Auto bot</label>
                                                    <div class="toggle">
                                                        <input type="checkbox" id="switcher3" class="check">
                                                        <b class="toggle-switch"></b>
                                                    </div>
                                                    <label class="toggler" id="manual3">Manual</label>
                                                </div>
                                            </div>
                                            <div id="accordion3" class="accordion">
                                                <div class="">
                                                    <div class="accordion-header" id="headingThree3">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                                                </svg>
                                                                User Details
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3" data-parent="#accordion3">
                                                        <div class="card-body">
                                                            <div class="user-info">
                                                                <div class="table-responsive">
                                                                    <table class="table border">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="user-info-first">Name</td>
                                                                                <td>Alexander Kaminski</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">ID</td>
                                                                                <td>123</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">E-mail</td>
                                                                                <td>example@email.com</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">URL</td>
                                                                                <td><a href="#">https://easital.com/</a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="user-info-first">Browser</td>
                                                                                <td>Chrome</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingOne3">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                                </svg>
                                                                Edit name
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne3" class="collapse" aria-labelledby="headingOne3" data-parent="#accordion3">
                                                        <div class="card-body">
                                                            <h5>Edit Nickname for Alexander Kaminski</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3">
                                                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Alexander Kaminski">
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Save</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingTwo3">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="" data-bs-toggle="collapse" data-bs-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
                                                                    <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                                                    <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8m-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7" />
                                                                </svg>
                                                                Change color
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo3" class="collapse show" aria-labelledby="headingTwo3" data-parent="#accordion3">
                                                        <div class="card-body">
                                                            <h5>Pick a color for this conversation</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="radio-list change-bg-color">
                                                                <input type="radio" name="color" id="red3">
                                                                <label for="red3" data-color="red"><span class="red"></span></label>

                                                                <input type="radio" name="color" id="green3" checked>
                                                                <label for="green3" data-color="green"><span class="green"></span></label>

                                                                <input type="radio" name="color" id="yellow3">
                                                                <label for="yellow3" data-color="yellow"><span class="yellow"></span></label>

                                                                <input type="radio" name="color" id="olive3">
                                                                <label for="olive3" data-color="olive"><span class="olive"></span></label>

                                                                <input type="radio" name="color" id="orange3">
                                                                <label for="orange3" data-color="orange"><span class="orange"></span></label>

                                                                <input type="radio" name="color" id="teal3">
                                                                <label for="teal3" data-color="teal"><span class="teal"></span></label>

                                                                <input type="radio" name="color" id="blue3">
                                                                <label for="blue3" data-color="blue"><span class="blue"></span></label>

                                                                <input type="radio" name="color" id="violet3">
                                                                <label for="violet3" data-color="violet"><span class="violet"></span></label>

                                                                <input type="radio" name="color" id="purple3">
                                                                <label for="purple3" data-color="purple"><span class="purple"></span></label>

                                                                <input type="radio" name="color" id="pink3">
                                                                <label for="pink3" data-color="pink"><span class="pink"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="accordion-header" id="headingFour3">
                                                        <h5 class="card-header__title mb-0">
                                                            <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour3" aria-expanded="false" aria-controls="collapseFour3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                                                </svg>
                                                                Notifications
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseFour3" class="collapse" aria-labelledby="headingFour3" data-parent="#accordion3">
                                                        <div class="card-body">
                                                            <h5>Conversation Notifications</h5>
                                                            <p>Everyone in this conversation will see this.</p>
                                                            <div class="mb-3 mb-4">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch5">
                                                                    <label for="switch5">Receive notifications for new messages</label>
                                                                </span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <span class="switch switch-sm">
                                                                    <input type="checkbox" class="switch" id="switch6">
                                                                    <label for="switch6">Receive notifications for reactions</label>
                                                                </span>
                                                            </div>
                                                            <div class="action-btn text-end">
                                                                <a href="#">Done</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/.chat list sidebar right-->
                                    </div>
                                </div>
                            </div>
                            <div class="chat-overlay"></div>
                        </div><!--/.chat container-->
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
