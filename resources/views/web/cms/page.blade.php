<?php $url = "https://dealsdrive.app/";?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Deals Drive | {{ $page->title_en }}</title>
  <link rel="apple-touch-icon" sizes="57x57" href="<?=$url?>image/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?=$url?>image/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=$url?>image/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$url?>image/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=$url?>image/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?=$url?>image/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?=$url?>image/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=$url?>image/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=$url?>image/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?=$url?>image/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=$url?>image/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?=$url?>image/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=$url?>image/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?=$url?>image/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?=$url?>image/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Bootstrap , fonts & icons  -->
  <link rel="stylesheet" href="<?=$url?>css/bootstrap.css">
  <link rel="stylesheet" href="<?=$url?>fonts/icon-font/css/style.css">
  <link rel="stylesheet" href="<?=$url?>fonts/typography-font/typo.css">
  <link rel="stylesheet" href="<?=$url?>fonts/fontawesome-5/css/all.css">
  <!-- Plugin'stylesheets  -->
  <link rel="stylesheet" href="<?=$url?>plugins/aos/aos.min.css">
  <link rel="stylesheet" href="<?=$url?>plugins/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?=$url?>plugins/nice-select/nice-select.min.css">
  <link rel="stylesheet" href="<?=$url?>plugins/slick/slick.min.css">
  <!-- Vendor stylesheets  -->
  <!-- <link rel="stylesheet" href="plugins/theme-mode-switcher/switcher-panel.css"> -->
  <link rel="stylesheet" href="<?=$url?>css/main.css">
  <!-- Custom stylesheet -->
</head>

<body data-theme-mode-panel-active data-theme="light">
  <div class="site-wrapper overflow-hidden ">
    <!-- Header Area -->
    <header
      class="site-header site-header--menu-right menu-block-5 dynamic-sticky-bg mt-3 mt-lg-0 site-header--absolute site-header--sticky">
      <div class="container">
        <nav class="navbar site-navbar">
          <!-- Brand Logo-->
          <div class="brand-logo">
            <a href="<?=$url?>">
              <!-- light version logo (logo must be black)-->
              <img src="<?=$url?>image/new-logo.png" alt="" class="light-version-logo">
              <!-- Dark version logo (logo must be White)-->
              <img src="<?=$url?>image/new-logo.png" alt="" class="dark-version-logo">
            </a>
          </div>
          <div class="menu-block-wrapper  ms-4">
            <div class="menu-overlay"></div>
            <nav class="menu-block" id="append-menu-header">
              <div class="mobile-menu-head">
                <div class="go-back">
                  <i class="fa fa-angle-left"></i>
                </div>
                <div class="current-menu-title"></div>
                <div class="mobile-menu-close">&times;</div>
              </div>
              <ul class="site-menu-main">
                <li class="nav-item">
                  <a href="<?=$url?>" class="nav-link-item">Home</i>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=$url?>#app-features" class="nav-link-item">Features</i>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=$url?>#about-Deals Drive" class="nav-link-item">About Us</i>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="<?=$url?>#categories" class="nav-link-item">Categories </a>
                </li>
                <li class="nav-item">
                  <a href="<?=$url?>#app-screenshots" class="nav-link-item">App Screenshots</i>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=$url?>contact.html" class="nav-link-item">Contact Us </a>
              </li>

              </ul>
            </nav>
          </div>
          <div class="header-btn ">
            <a class="btn btn btn-niagara btn--medium-4 h-45 rounded-50 text-white shadow--niagara-3 ms-auto ms-lg-4 d-sm-flex bg-dark" style="background: #000; border-color: #000; box-shadow: none; min-width: auto; height: auto !important; line-height: normal; padding: 12px 18px;" href="https://dealsdrive.app/public/outlet">
              Vendor Login
            </a>
          </div> 
          <!-- <div class="header-btn ">
            <a class="btn btn btn-niagara btn--medium-4 h-45 rounded-50 text-white shadow--niagara-3 ms-auto ms-lg-4 d-none d-sm-flex" href="#">
              Register
            </a>
          </div> -->
          <!-- mobile menu trigger -->
          <div class="mobile-menu-trigger">
            <span></span>
          </div>
          <!--/.Mobile Menu Hamburger Ends-->
        </nav>
      </div>
    </header>
    <!-- navbar- -->
    <!--/ .Header Area -->

    <!-- Content One Area -->
    <!-- <div class="content-section content-section--l8-2 bg-default-5 border-bottom boder-default-color"> -->
    <div class="terms-area bg-default-7 mt-5" id="about-Deals Drive">
      <div class="container pb-5">
        <div class="row align-items-center justify-content-center">
          <!-- about-us Content -->
          <div class="col-xxl-10 col-lg-12 col-md-12 col-xs-12 order-2 orde-lg-1">
               
            <div class="about-us-right mt-5 mt-lg-0 pt-5 pt-lg-0">
              <div class="section-title section-title--l8 mt-5 mt-lg-0">
                <h1>{{ $page->title_en }}</h1>
                <p><pre><?php echo $page->desc_en; ?></pre></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!--/ .Content One Area -->
      <!-- CTA Area -->
      <div class="cta-area cta-area--l8 bg-default">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-11">
              <div class="section-title section-title--l4 text-center">
                <h2 class="section-title__heading mb-4" data-aos="fade-up" data-aos-duration="500" data-aos-once="true">
                  App Is Available For Free On Google Play & App Store</h2>
                <p class="section-title__description" data-aos="fade-up" data-aos-duration="500" data-aos-delay="300"
                  data-aos-once="true">We’ll help you achieve your marketing & business goals</p>
                <div class="button-group">
                  <a class="text-white rounded-50 with-icon-2" target="_blank" href="#" data-aos="fade-up"
                    data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                    <img src="image/app-store.png" class="img-fluid" alt="">
                  </a>
                  <a class="text-white rounded-50 with-icon-2" target="_blank" href="#" data-aos="fade-up"
                    data-aos-delay="700" data-aos-duration="500" data-aos-once="true">
                    <img src="image/google-play.png" class="img-fluid" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ .CTA Area -->
      <!-- Footer Area -->
      <footer class="footer-section footer-inner-2 position-relative bg-default pt-6">
        <div class="container">
          <div class="footer-top border-bottom border-default-color-3 pb-5">
            <div class="row align-items-center justify-content-center">
              <div class="col-6 col-xxs-4 col-lg-2 col-md-5 col-xs-4">
                <div class="footer-brand-block footer-brand-block--l4 mb-md-0">
                  <!-- Brand Logo-->
                  <div class="brand-logo mb-0 text-center text-md-start mx-auto mx-md-0">
                    <a href="<?=$url?>">
                      <!-- light version logo (logo must be black)-->
                      <img src="<?=$url?>image/new-logo.png" alt="" class="light-version-logo">
                      <!-- Dark version logo (logo must be White)-->
                      <img src="<?=$url?>image/new-logo.png" alt="" class="dark-version-logo">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 col-md-12">
                <ul class="footer-social-share footer-social-share--rounded text-center footer-link-wrap">
                  <!--<li>-->
                  <!--  <a href="<?=$url?>public/page/2">Terms and Conditions</a>-->
                  <!--</li>-->
                  <!--<li>-->
                  <!--  <a href="<?=$url?>public/page/3">Privacy Policy</a>-->
                  <!--</li>-->
                  <li>
                                        <a href="<?=$url?>public/page/6">Service Providers Agreement</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/12">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/7">End User License Agreement</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/8">Rules Of Use</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/9">Terms Of Reservation</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/10">Terms Of Use For Merchants</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/11">Terms Of Use For Users</a>
                                    </li>
                                    <li>
                                        <a href="<?=$url?>public/page/13">Terms Of Sale</a>
                                    </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-12">
                <div class="footer-menu text-center text-md-end">
                  <ul class="footer-social-share footer-social-share--rounded">
                    <li>
                      <a href="#">
                        <i class="fab fa-facebook-square"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fab fa-linkedin"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="copyright-block copyright-block--l3">
            <div class="row  text-center align-items-center">
              <div class="col-12">
                <p class="copyright-text--l3 ">© 2024 Deals Drive, All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!--/ .Footer Area -->
    </div>

    <div class="scroll-top">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
          style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
      </svg>
    </div>
    <!-- Plugin's Scripts --> 
    <script src="<?=$url?>plugins/jquery/jquery.min.js"></script>
    <script src="<?=$url?>plugins/jquery/jquery-migrate.min.js"></script>
    <script src="<?=$url?>js/bootstrap.bundle.js"></script>
    <script src="<?=$url?>plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?=$url?>plugins/nice-select/jquery.nice-select.min.js"></script>
    <script src="<?=$url?>plugins/aos/aos.min.js"></script>
    <script src="<?=$url?>plugins/counter-up/jquery.counterup.min.js"></script>
    <script src="<?=$url?>plugins/counter-up/waypoints.min.js"></script>
    <script src="<?=$url?>plugins/slick/slick.min.js"></script>
    <!-- <script src="plugins/skill-bar/skill.bars.jquery.js"></script> -->
    <script src="<?=$url?>plugins/isotope/isotope.pkgd.min.js"></script>
    <!-- Activation Script -->
    <script src="<?=$url?>js/menu.js"></script>
    <script src="<?=$url?>js/custom.js"></script>
</body>


<script>

  var progressPath = document.querySelector('.scroll-top path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.scroll-top').addClass('show');
    } else {
      jQuery('.scroll-top').removeClass('show');
    }
  });
  jQuery('.scroll-top').on('click', function (event) {
    event.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, duration);
    return false;
  });

  jQuery(function ($) {
    $('a[href*="#"]:not([href="#"])').click(function () {
      var target = $(this.hash);
      $('html,body').stop().animate({
        scrollTop: target.offset().top - 60
      }, 'linear');
    });
    if (location.hash) {
      var id = $(location.hash);
    }
    $(window).on('load', function () {
      if (location.hash) {
        $('html,body').animate({ scrollTop: id.offset().top - 120 }, 'linear')
      };
    });
  });



</script>

</html>
