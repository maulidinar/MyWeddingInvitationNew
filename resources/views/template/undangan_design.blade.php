<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Page Title -->
  <title> Wedding</title>

  <!-- Favicon and Touch Icons -->
  <script type="text/javascript" nonce="c47b150f3a0a4fa389da9eba168"
    src="http://local.adguard.org?ts=1664760963373&amp;type=content-script&amp;dmn=irsfoundation.com&amp;app=us.sitesucker.mac.sitesucker-pro&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0">
  </script>
  <script type="text/javascript" nonce="c47b150f3a0a4fa389da9eba168"
    src="http://local.adguard.org?ts=1664760963373&amp;name=AdGuard%20Extra&amp;type=user-script"></script>
  <link href="{{ asset('/template_wedding/images/favicon/favicon.png') }}" rel="shortcut icon" type="image/png">
  <link href="{{ asset('/template_wedding/images/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('/template_wedding/images/favicon/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
  <link href="{{ asset('/template_wedding/images/favicon/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
  <link href="{{ asset('/template_wedding/images/favicon/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

  <!-- Icon fonts -->
  <link href="{{ asset('/template_wedding/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/flaticon.css') }}" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('/template_wedding/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Plugins for this template -->
  <link href="{{ asset('/template_wedding/css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/owl.theme.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/slick-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('/template_wedding/css/magnific-popup.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('/template_wedding/css/style.css') }}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      window.onload = function() {
      var context = new AudioContext();
    }
    </script>

</head>

<body id="home">

  <!-- start page-wrapper -->
  <div class="page-wrapper">

    <!-- start preloader -->
    <div class="preloader">
      <div class="inner">
        <span class="icon"><i class="fi flaticon-two"></i></span>
      </div>
    </div>
    <!-- end preloader -->


    <!-- strat music-box -->
    <div class="music-box" style="height: 35px !important;">
      {{-- <button class="music-box-toggle-btn">
        <i class="fa fa-music"></i>
      </button> --}}
      <audio controls autoplay>
        <source src="{{ asset('uploads/audio/wedding.mp3') }}">
      </audio>

      {{-- <div class="music-holder">
        <iframe
          src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/102137206&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
      </div> --}}
    </div>
    <!-- end music box -->
    

    <!-- start of hero -->
    <section class="hero">
      <div class="hero-slider hero-slider-s1">
        <div class="slide-item">
          <img src="{{ asset('uploads/template/'.$data->frame_image) }}" alt class="slider-bg">
        </div>

        <div class="slide-item">
          <img src="{{ asset('/template_wedding/images/slider/slide-2.jpg') }}" alt class="slider-bg">
        </div>
      </div>
      <div class="wedding-announcement">
        <div class="couple-name-merried-text">
          <h2 class="wow slideInUp" data-wow-duration="1s">{{ $data->nama_wanita }} &amp; {{ $data->nama_pria }}</h2>
          <div class="married-text wow fadeIn" data-wow-delay="1s">
            <h4 class="">
              <span class=" wow fadeInUp" data-wow-delay="1.05s">W</span>
              <span class=" wow fadeInUp" data-wow-delay="1.10s">e</span>
              <span class=" wow fadeInUp" data-wow-delay="1.15s">'</span>
              <span class=" wow fadeInUp" data-wow-delay="1.20s">r</span>
              <span class=" wow fadeInUp" data-wow-delay="1.25s">e</span>
              <span>&nbsp;</span>
              <span class=" wow fadeInUp" data-wow-delay="1.30s">g</span>
              <span class=" wow fadeInUp" data-wow-delay="1.35s">e</span>
              <span class=" wow fadeInUp" data-wow-delay="1.40s">t</span>
              <span class=" wow fadeInUp" data-wow-delay="1.45s">t</span>
              <span class=" wow fadeInUp" data-wow-delay="1.50s">i</span>
              <span class=" wow fadeInUp" data-wow-delay="1.55s">n</span>
              <span class=" wow fadeInUp" data-wow-delay="1.60s">g</span>
              <span>&nbsp;</span>
              <span class=" wow fadeInUp" data-wow-delay="1.65s">m</span>
              <span class=" wow fadeInUp" data-wow-delay="1.70s">a</span>
              <span class=" wow fadeInUp" data-wow-delay="1.75s">r</span>
              <span class=" wow fadeInUp" data-wow-delay="1.80s">r</span>
              <span class=" wow fadeInUp" data-wow-delay="1.85s">i</span>
              <span class=" wow fadeInUp" data-wow-delay="1.90s">e</span>
              <span class=" wow fadeInUp" data-wow-delay="1.95s">d</span>

            </h4>
          </div>
          <!-- <i class="fa fa-heart"></i> -->
        </div>

        <div class="save-the-date" style="background-color: {{ $data->color }}">
          <h4>Save the date</h4>
          <span class="date">{{ $data->tanggal }}</span>
        </div>
      </div>
    </section>
    <!-- end of hero slider -->

    <!-- Start header -->
    <header id="header" class="site-header header-style-1">
      <nav class="navigation navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="open-btn">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="couple-logo">
              <h1><a style="color: {{ $data->color }}" href="#home">{{ substr($data->nama_wanita,0,1) }} <i class="fi flaticon-shape-1"></i> {{ substr($data->nama_pria,0,1) }}</a></h1>
            </div>
          </div>
          <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
            <button class="close-navbar"><i class="fa fa-close"></i></button>
            <ul class="nav navbar-nav">
              <li><a href="#home">Home</a></li>
              <li><a href="#couple">Couple</a></li>
              {{-- <li><a href="#story">Story</a></li> --}}
              <li><a href="#events">Events</a></li>
              {{-- <li><a href="#people">People</a></li> --}}
              {{-- <li><a href="#gallery">Gallery</a></li> --}}
              {{-- <li><a href="#rsvp">RSVP</a></li> --}}
              {{-- <li class="menu-item-has-children">
                <a href="javascript:void(0);">Blog</a>
                <ul class="sub-menu">
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="blog-details.html">Blog Details</a></li>
                  <li class="menu-item-has-children">
                    <a href="#Level3">Thidr level</a>
                    <ul class="sub-menu">
                      <li><a href="#">Level3</a></li>
                      <li><a href="#">Level3</a></li>
                      <li><a href="#">Level3</a></li>
                    </ul>
                  </li>
                </ul>
              </li> --}}
            </ul>
          </div><!-- end of nav-collapse -->
        </div><!-- end of container -->
      </nav>
    </header>
    <!-- end of header -->


    <!-- start wedding-couple-section -->
    <section class="wedding-couple-section section-padding" id="couple">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <div class="gb groom">
              <div class="img-holder wow fadeInLeftSlow">
                <img src="{{ asset('uploads/mempelai/'.$data->foto_pria) }}" alt>
              </div>
              <div class="details">
                <div class="details-inner">
                  <h3>{{ $data->nama_pria }}</h3>
                  <p>{{ $data->ig_pria }}</p>
                  <span class="signature">Mempelai Pria</span>
                  <ul class="social-links">
                    <li><a style="background: {{ $data->color }}" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a style="background: {{ $data->color }}" href="#"><i class="fa fa-instagram"></i></a></li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="gb bride">
              <div class="details">
                <div class="details-inner">
                  <h3>{{ $data->nama_wanita }}</h3>
                  <p>{{ $data->ig_wanita }}</p>
                  <span class="signature">Mempelai Wanita</span>
                  <ul class="social-links">
                    <li><a style="background: {{ $data->color }}" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a style="background: {{ $data->color }}" href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="img-holder wow fadeInRightSlow">
                <img src="{{ asset('uploads/mempelai/'.$data->foto_wanita) }}" alt>
              </div>
            </div>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section>
    <!-- end wedding-couple-section -->


    <!-- start count-down-section -->
    {{-- <section class="count-down-section section-padding parallax" data-bg-image="{{ asset('/template_wedding/images/countdown-bg.jpg') }}" data-speed="7">
      <div class="container">
        <div class="row">
          <div class="col col-md-4">
            <h2><span>Simpan tanggal nya.....</span> Resepsi</h2>
          </div>
          <div class="col col-md-7 col-md-offset-1">
            <div class="count-down-clock">
              <div id="clock">

              </div>
            </div>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> --}}
    <!-- end count-down-section -->


    <!-- start story-section -->
    {{-- <section class="story-section section-padding" id="story">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <div class="section-title">
              <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
              <h2>Our love story</h2>
            </div>
          </div>
        </div> <!-- end section-title -->

        <div class="row">
          <div class="col col-xs-12">
            <div class="story-timeline">
              <div class="row">
                <div class="col col-md-6">
                  <div class="story-text right-align-text">
                    <h3>First meet</h3>
                    <span class="date">Jan 12 2017</span>
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                      which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which
                      was created for the bliss of souls like mine. I am so happy, my dear friend, </p>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="img-holder">
                    <img src="{{ asset('/template_wedding/images/story/img-1.jpg') }}" alt class="img img-responsive">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-6">
                  <div class="img-holder right-align-text story-slider">
                    <img src="{{ asset('/template_wedding/images/story/img-2.jpg') }}" alt class="img img-responsive">
                    <img src="{{ asset('/template_wedding/images/story/img-3.jpg') }}" alt class="img img-responsive">
                  </div>
                </div>
                <div class="col col-md-6 text-holder">
                  <span class="heart">
                    <i class="fa fa-heart"></i>
                  </span>
                  <div class="story-text">
                    <h3>First date</h3>
                    <span class="date">Feb 14 2017</span>
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                      which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which
                      was created for the bliss of souls like mine. I am so happy, my dear friend, </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-6 text-holder right-heart">
                  <span class="heart">
                    <i class="fa fa-heart"></i>
                  </span>
                  <div class="story-text right-align-text">
                    <h3>Proposal</h3>
                    <span class="date">Apr 14 2017</span>
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                      which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which
                      was created for the bliss of souls like mine. I am so happy, my dear friend, </p>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="img-holder right-align-text story-slider">
                    <img src="{{ asset('/template_wedding/images/story/img-7.jpg') }}" alt class="img img-responsive">
                    <img src="{{ asset('/template_wedding/images/story/img-5.jpg') }}" alt class="img img-responsive">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-md-6">
                  <div class="img-holder video-holder">
                    <img src="{{ asset('/template_wedding/images/story/img-8.jpg') }}" alt class="img img-responsive">
                    <a href="https://www.youtube.com/embed/XSGBVzeBUbk?autoplay=1" data-type="iframe"
                      class="video-play-btn">
                      <i class="fa fa-play"></i>
                    </a>
                  </div>
                </div>
                <div class="col col-md-6 text-holder">
                  <span class="heart">
                    <i class="fa fa-heart"></i>
                  </span>
                  <div class="story-text">
                    <h3>Enagagement</h3>
                    <span class="date">Jul 14 2017</span>
                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                      which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which
                      was created for the bliss of souls like mine. I am so happy, my dear friend, </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> --}}
    <!-- end story-section -->


    <!-- start cta -->
    <section class="cta section-padding parallax" data-bg-image="images/cta-bg.jpg" data-speed="7">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <h2><span>We are going to...</span> Celebrate Our Love</h2>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section>
    <!-- end cta -->



    <!-- start events-section -->
    <section class="events-section section-padding" id="events">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <div class="section-title">
              <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
              <h2 style="background-color: {{ $data->color }};opacity: 0.6;">Wedding events</h2>
            </div>
          </div>
        </div> <!-- end section-title -->

        <div class="row">
          <div class="col col-lg-10 col-lg-offset-1">
            <div class="event">
              <div class="img-holder">
                <img src="images/events/img-2.jpg" alt class="img img-responsive">
              </div>
              <div class="details">
                <h3>ALAMAT</h3>
                <ul>
                  <li><i class="fa fa-map-marker"></i> {{ $data->alamat }}.</li>
                  <li><i class="fa fa-clock-o"></i> {{ $data->tanggal }}, 9AM - 5PM</li>
                </ul>
                <p>Kehadiran Bapak/Ibu saudara/i merupakan sebuah kehormatan bagi kami </p>
                <a 
                  href="https://www.google.com/maps/search/?api=1&query={{ $data->lat }}%2C{{$data->long}}" target="blank">Lihat Lokasi </a>
                {{-- <a class="see-location-btn popup-gmaps"
                  href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.0160484383277!2d144.99053291585201!3d-37.81309307975254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642ef89a7e023%3A0xb1353055e38c1ab8!2sNew+York+Tomato+Cafe!5e0!3m2!1sbn!2sbd!4v1503743893919">
                  Lihat Lokasi <i class="fa fa-angle-right"></i> --}}
                </a>
              </div>
            </div>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section>
    <!-- end events-section -->

    <!-- start gallery-section -->
    {{-- <section class="gallery-section section-padding" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <div class="section-title">
              <div class="vertical-line"><span><i class="fi flaticon-two"></i></span></div>
              <h2 style="background-color: {{ $data->color }};opacity: 0.6;">Our gallery</h2>
            </div>
          </div>
        </div> <!-- end section-title -->

        <div class="row">
          <div class="col col-xs-12 sortable-gallery">
            <div class="gallery-filters">
              <ul>
                <li><a data-filter="*" href="#" class="current">All</a></li>
                <li><a data-filter=".wedding" href="#">Wedding</a></li>
                <li><a data-filter=".ceremony" href="#">Ceremony</a></li>
                <li><a data-filter=".party" href="#">Party</a></li>
              </ul>
            </div>

            <div class="gallery-container gallery-fancybox masonry-gallery">
              <div class="grid wedding">
                <a href="images/gallery/img-1.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-1.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid wedding ceremony">
                <a href="images/gallery/img-2.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-2.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid ceremony eudcation">
                <a href="images/gallery/img-3.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-3.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid wedding party">
                <a href="images/gallery/img-4.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-4.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid ceremony">
                <a href="images/gallery/img-5.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-5.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid party">
                <a href="images/gallery/img-6.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-6.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid wedding">
                <a href="images/gallery/img-7.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-7.jpg" alt class="img img-responsive">
                </a>
              </div>
              <div class="grid ceremony">
                <!--  <a href="images/gallery/img-8.jpg" class="fancybox" data-fancybox-group="gall-1">
                                    <img src="images/gallery/img-8.jpg" alt class="img img-responsive">
                                </a> -->
                <a href="https://www.youtube.com/embed/XSGBVzeBUbk?autoplay=1" data-type="iframe"
                  class="video-play-btn">
                  <img src="images/gallery/img-8.jpg" alt class="img img-responsive">
                  <i class="fa fa-play"></i>
                </a>

              </div>
              <div class="grid ceremony">
                <a href="images/gallery/img-9.jpg" class="fancybox" data-fancybox-group="gall-1">
                  <img src="images/gallery/img-9.jpg" alt class="img img-responsive">
                </a>
              </div>
            </div>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> --}}
    <!-- end gallery-section -->



    <!-- start footer -->
    <footer class="site-footer" style="background: url('{{ asset('uploads/template/'.$data->frame_image) }}') center center/cover no-repeat local;">
      <div class="back-to-top">
        <a href="#" class="back-to-top-btn"><span><i class="fi flaticon-cupid"></i></span></a>
      </div>
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <h2>Forever and Always Our Love</h2>
            <span></span>
          </div>
        </div> <!-- end row -->
      </div> <!-- end container -->
    </footer>
    <!-- end footer -->

  </div>
  <!-- end of page-wrapper -->



  <!-- All JavaScript files
    ================================================== -->
  <script src="{{ asset('/template_wedding/js/jquery.min.js') }}"></script>
  <script src="{{ asset('/template_wedding/js/bootstrap.min.js') }}"></script>

  <!-- Plugins for this template -->
  <script src="{{ asset('/template_wedding/js/jquery-plugin-collection.js') }}"></script>

  <!-- Custom script for this template -->
  <script src="{{ asset('/template_wedding/js/script.js') }}"></script>
</body>

</html>