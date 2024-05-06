
<header class="main-header">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo Start -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('front/assets/images/SHOWOFF-UNLIMITED-BLACK.png')}}" alt="Logo">
                </a>
                <!-- Logo End -->

                <!-- Main Menu start -->
                <div class="collapse navbar-collapse main-menu">
                    <ul class="navbar-nav mr-auto" id="menu">
                        <li class="nav-item"><a class="nav-link" href="{{('/')}}">Home</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{('/about')}}">About us</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Listing</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Property</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="{{('/plans')}}">Plans</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
                        <li class="nav-item highlighted-menu"><a class="nav-link" href="{{ url('sign-in') }}">Sign
                                In</a></li>
                    </ul>
                </div>
                <!-- Main Menu End -->

                <div class="navbar-toggle"></div>
            </div>
        </nav>

        <div class="responsive-menu"></div>
    </div>
</header>
<!-- Header End -->

<!-- end /. header -->