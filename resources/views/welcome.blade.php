<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/revolution-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/logo_site.png" type="image/x-icon">
    <link rel="icon" href="images/logo_site.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="js/fontawesome.js"></script>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>


<body>
<div class="page-wrapper">

    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->

    <!-- main header area -->
    <header class="main-header">
        <div class="container">
            <div class="header-upper">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="top-left">
                            <div class="text">Bem vindo a {{ env('APP_NAME') }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="top-right clearfix">
                            <div class="text" >
                                <a href="{{ route('login') }}" id="text-login">Login</a>
                                <br>
                            </div>
                            <ul class="social-link">
                                @if($data->facebook != "")
                                    <li><a href="{{ $data->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($data->instagram != "")
                                    <li><a href="{{ $data->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="outer-area">
            <div class="container">
                <div class="logo">
                    <a href="javascript:">
                        <img src="images/logo_site.png" style="width: 70px;" class="logo_site" alt="">
                        <img src="images/logomarca.png" style="width: 250px;" class="logomarca" alt="">
                    </a>
                </div>
                <div class="single-info-box">
                    @if($data->opening_hours != "")
                        <div class="single-info">
                            <div class="icon-box"><i class="flaticon-clock-1"></i></div>
                            <div class="title">Horário de Atendimento</div>
                            <div class="text">{{ $data->opening_hours }}</div>
                        </div>
                    @endif
                    @if($data->email != "")
                        <div class="single-info">
                            <div class="icon-box"><i class="flaticon-envelope"></i></div>
                            <div class="title">Email</div>
                            <div class="text"><a href="mailto:{{ $data->email }}" style="color:#b48484;">{{ $data->email }}</a></div>
                        </div>
                    @endif
                    @if($data->whatsapp != "")
                        <div class="single-info">
                            <div class="icon-box"><i class='fa flaticon-technology'></i></div>
                            <div class="title">WhatsApp</div>
                            <div class="text-phone">
                                <a href="https://wa.me/{{ $data->wa }}/">{{ $data->whatsapp }}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{--<div class="header-lower">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="menu-bar">
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="index.html">Home</a>
                                        </li>
                                        <li class="dropdown"><a href="#">Services</a>
                                            <ul>
                                                <li><a href="our-service.html">Our Service</a></li>
                                                <li><a href="service-detail.html">Service Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Page</a>
                                            <ul>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="team.html">Our Team</a></li>
                                                <li><a href="error-page.html">Error Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Store</a>
                                            <ul>
                                                <li><a href="shop-page.html">Shop Page</a></li>
                                                <li><a href="single-product.html">Single Prodct</a></li>
                                                <li><a href="shoping-cart.html">Shoping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="blog.html">News</a>
                                            <ul>
                                                <li><a href="our-blog.html">Our Blog</a></li>
                                                <li><a href="blog-single.html">Single Post</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="more-option">
                            <div class="seach-toggle"><i class="fa fa-search"></i></div>
                            <div class="search-box">
                                <form method="post" action="index.html">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="Search Here" required>
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="menu-bar">
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="index.html">Home</a>
                                        </li>
                                        <li class="dropdown"><a href="#">Services</a>
                                            <ul>
                                                <li><a href="our-service.html">Our Service</a></li>
                                                <li><a href="service-detail.html">Service Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Page</a>
                                            <ul>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="team.html">Our Team</a></li>
                                                <li><a href="error-page.html">Error Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Store</a>
                                            <ul>
                                                <li><a href="shop-page.html">Shop Page</a></li>
                                                <li><a href="single-product.html">Single Prodct</a></li>
                                                <li><a href="shoping-cart.html">Shoping Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="blog.html">News</a>
                                            <ul>
                                                <li><a href="our-blog.html">Our Blog</a></li>
                                                <li><a href="blog-single.html">Single Post</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="more-option">
                            <div class="seach-toggle"><i class="fa fa-search"></i></div>
                            <div class="search-box">
                                <form method="post" action="index.html">
                                    <div class="form-group">
                                        <input type="search" name="search" placeholder="Search Here" required>
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </header>
    <!--End Sticky Header-->
    <!-- main header area end -->

    <!--Main Slider-->
    <section class="main-banner banner">
        <div class="rev_slider_wrapper">
            <div id="main_slider" class="rev_slider" data-version="5.0">

                <ul>
                    @foreach($banners as $b)
                        <li data-index='rs-{{ $b->id }}' class="slide_show" data-transition='slidingoverlayright' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Boxes' data-description=''>
                            <img src="{{ $b->picture }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                            <div class="main_heading tp-caption tp-resizeme"
                                 data-x="left" data-hoffset="0"
                                 data-y="center" data-voffset="-140"
                                 data-whitespace="nowrap"
                                 data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="y:[100%];s:1000;s:1000;"
                                 data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                 data-start="2000"
                                 data-splitin="none"
                                 data-splitout="none">
                                <div class="banner-title"><h2>{{ $b->subtitle }}</h2></div>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                 data-x="left" data-hoffset="0"
                                 data-y="center" data-voffset="-80"
                                 data-transform_idle="o:1;"
                                 data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 data-start="2300">
                                <div class="banner-title"><h1>{{ $b->title }}</h1></div>
                            </div>
                            <div class="tp-caption tp-resizeme"
                                 data-x="left" data-hoffset="0"
                                 data-y="center" data-voffset="10"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 data-start="2600">
                                <div class="text"><?php echo html_entity_decode($b->text, ENT_QUOTES, 'UTF-8'); ?></div>
                            </div>
<!--                            <div class="tp-caption tp-resizeme"
                                 data-x="left" data-hoffset="0"
                                 data-y="center" data-voffset="100"
                                 data-transform_idle="o:1;"
                                 data-transform_in="y:[300%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-responsive_offset="on"
                                 data-start="2600">
                                <a class="btn-style-one" href="#">Purchase Now</a>
                            </div>-->
                        </li>
                    @endforeach

{{--
                    <li data-index='rs-357' class="slide_show slide_2" data-transition='slidingoverlaytop' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Slots vertical' data-description=''>

                        <img src="images/slider-2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <div class="main_heading tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-140"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="y:[100%];s:1000;s:1000;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="2000"
                             data-splitin="none"
                             data-splitout="none">
                            <div class="banner-title"><h2>Want to Repair</h2></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="-80"
                             data-transform_idle="o:1;"
                             data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2300">
                            <div class="banner-title"><h1>Laptop & Computer</h1></div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="10"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2600">
                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br /> tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam<br /> quis nostrud exercitation.</div>
                        </div>
                        <div class="tp-caption tp-resizeme"
                             data-x="left" data-hoffset="0"
                             data-y="center" data-voffset="100"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[300%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2600">
                            <a class="btn-style-one" href="#">Purchase Now</a>
                        </div>
                    </li>
--}}

                </ul>
            </div>
        </div>
    </section>
    <!--Main Slider End-->

    @if($video->active)
        <!-- about section -->
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="about-content">
                            <div class="text">{{ $video->subtitle }}</div>
                            <div class="title">{{ $video->title }}</div>
                            <?php echo html_entity_decode($video->text, ENT_QUOTES, 'UTF-8'); ?>
                            <div class="about-btn">
                                <a href="#" class="btn-style-one">Entre em Contato</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="video-section">
                            <div class="fluid-image"><img src="{{ $video->thumbnail }}" alt="">
                                <a class="html5lightbox" title="Assurance Video Gallery" href="{{ $video->url }}"><span class="fa fa-play" aria-hidden="true"></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end -->
    @endif

    <!-- service section -->
    <section class="service-section text-center">
        <div class="container">
            <div class="service-title">
                <div class="section-title">Our Services</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box">
                                <img src="images/1.jpg" alt="">
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <div class="img-content">
                                <p>Lorem ipsum dolor sit amet, consecte
                                    tur adipisicing elit, sed do eiusmtempor inciddunt ut labore.</p>
                                <a href="service-detail.html" class="img-btn">Read More</a>
                            </div>
                        </div>
                        <div class="img-title"><a href="service-detail.html">Smart Phone Repair</a></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box">
                                <img src="images/2.jpg" alt="">
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <div class="img-content">
                                <p>Lorem ipsum dolor sit amet, consecte
                                    tur adipisicing elit, sed do eiusmtempor inciddunt ut labore.</p>
                                <a href="service-detail.html" class="img-btn">Read More</a>
                            </div>
                        </div>
                        <div class="img-title"><a href="service-detail.html">Tablet & ipad Repair</a></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box">
                                <img src="images/3.jpg" alt="">
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <div class="img-content">
                                <p>Lorem ipsum dolor sit amet, consecte
                                    tur adipisicing elit, sed do eiusmtempor inciddunt ut labore.</p>
                                <a href="service-detail.html" class="img-btn">Read More</a>
                            </div>
                        </div>
                        <div class="img-title"><a href="service-detail.html">Mac & PC Repair</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- catagory section -->
    <section class="catagory-section">
        <div class="container">
            <div class="catagory-title text-center">
                <div class="section-title">Our Categories</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-smartphone-call"></i></div>
                        <div class="catagory-content">
                            <h3>Phone Repair</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-desktop-monitor"></i></div>
                        <div class="catagory-content">
                            <h3>desktop Repair</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-computer-tablet"></i></div>
                        <div class="catagory-content">
                            <h3>Tablet Repair</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-gamepad-console"></i></div>
                        <div class="catagory-content">
                            <h3>Consol Repair</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-music-headphones"></i></div>
                        <div class="catagory-content">
                            <h3>Phone Accessory</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item hvr-float-shadow">
                        <div class="icon-box"><i class="flaticon-open-laptop-computer"></i></div>
                        <div class="catagory-content">
                            <h3>Laptop Repair</h3>
                            <p>Lorem ipsum dolor sit amet cons
                                tur adipisicing elit, sed do eiusmtempor incid.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- catagory section end -->

    <!-- fact counter section -->
    <section class="fact-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-one">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="25">0</span><h1>+</h1></div>
                            <div class="text">Years Experience</div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-two">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="1250">0</span><h1>+</h1></div>
                            <div class="text">Happy Coustomers</div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-three">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="150">0</span><h1>+</h1></div>
                            <div class="text">Expert Technicians</div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-four">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="3550">0</span><h1>+</h1></div>
                            <div class="text">Total Works Done</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact counter section end -->

    <!-- choose section -->
    <section class="choose-section">
        <div class="container">
            <div class="choose-title text-center">
                <div class="section-title">Why Choose Us?</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 text-right">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-smartphone-call"></i></div>
                        <h4>Low Cost</h4>
                        <p>There are many variations of passa
                            Lorem Ipsum available but the ma
                            jority have suffered</p>
                    </div>
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-smartphone-call"></i></div>
                        <h4>Best Materials</h4>
                        <p>There are many variations of passa
                            Lorem Ipsum available but the ma
                            jority have suffered</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="img-box">
                        <figure><img src="images/iphone-1.png" alt=""></figure>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="choose-right">
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-smartphone-call"></i></div>
                            <h4>Best Profetionals</h4>
                            <p>There are many variations of passa
                                Lorem Ipsum available but the ma
                                jority have suffered</p>
                        </div>
                        <div class="single-item">
                            <div class="icon-box"><i class="flaticon-smartphone-call"></i></div>
                            <h4>Low Cost</h4>
                            <p>There are many variations of passa
                                Lorem Ipsum available but the ma
                                jority have suffered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose section end -->

    <!-- appointment section -->
    <section class="appointment-section">
        <div class="has-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                        <div class="appointment-area">
                            <div class="title">Want to</div>
                            <div class="section-title">Make a Schedule</div>
                            <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="email" name="form_email" value="" placeholder="Email" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <input type="number" name="form_phone" value="" placeholder="Phone" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <i class="flaticon-calendar"></i>
                                        <input type="text" name="date" placeholder="Date" id="datepicker">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <i class="flaticon-clock-1"></i>
                                        <input type="text" name="time" placeholder="Time">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <select class="custom-select-box">
                                            <option>Select Service</option>
                                            <option>Desktop</option>
                                            <option>Iphone</option>
                                            <option>Laptop</option>
                                            <option>Macbook</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="appoinment-btn">
                                    <button type="submit" data-loading-text="Please wait...">Appoinment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appointment section end -->

    <!-- team section -->
    <section class="team-section  text-center">
        <div class="container">
            <div class="team-title">
                <div class="section-title">Meet Our Experts</div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box"><figure><img src="images/team/1.jpg" alt=""></figure></div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <ul class="img-content">
                                <li><a href="team.html"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-content">
                            <a href="team.html"><h4>Charles Nicholes</h4></a>
                            <p>Tablet Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box"><figure><img src="images/team/2.jpg" alt=""></figure></div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <ul class="img-content">
                                <li><a href="team.html"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-content">
                            <a href="team.html"><h4>Julia Robertson</h4></a>
                            <p>Desktop Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box"><figure><img src="images/team/3.jpg" alt=""></figure></div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <ul class="img-content">
                                <li><a href="team.html"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-content">
                            <a href="team.html"><h4>Richard Antony</h4></a>
                            <p>iPhone Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="inner-box">
                            <div class="img-box"><figure><img src="images/team/4.jpg" alt=""></figure></div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                </div>
                            </div>
                            <ul class="img-content">
                                <li><a href="team.html"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="team.html"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div class="single-content">
                            <a href="team.html"><h4>Sunny Vandosky</h4></a>
                            <p>Android Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team section end -->

    <!-- working section -->
    <section class="working-section">
        <div class="container">
            <div class="working-title text-center">
                <div class="section-title">Working Proccess</div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-one">
                        <div class="icon-box"><i class="fa fa-desktop" aria-hidden="true"></i></div>
                        <div class="number">1</div>
                        <h4>Damage Device</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-two">
                        <div class="icon-box"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                        <div class="number">2</div>
                        <h4>Send it to Us</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-three">
                        <div class="icon-box"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                        <div class="number">3</div>
                        <h4>Repair Device</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-item-four">
                        <div class="icon-box"><i class="fa fa-reply" aria-hidden="true"></i></div>
                        <div class="number">4</div>
                        <h4>Quick Return</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- working section end -->

    <!-- testimonial & faq section -->
    <section class="testimonial-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="testimonial-area">
                        <div class="testimonial-title"><div class="section-title">Trusted Clients</div></div>
                        <div class="testimonial-slider">
                            <div class="testimonial-content">
                                <div class="img-box"><figure><img src="images/testimonial-author.png" alt=""></figure></div>
                                <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercita
                                    tion ullamco laboris nisi ut aliquip excepteur sint occaecat cu<br />
                                    idatat non proident sunt in culpa.</p>
                                <div class="testimonial-autor">
                                    <h4>Julia Robertson</h4>
                                    <div class="text">Happy Clients</div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="img-box"><figure><img src="images/testimonial-author.png" alt=""></figure></div>
                                <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercita
                                    tion ullamco laboris nisi ut aliquip excepteur sint occaecat cu<br />
                                    idatat non proident sunt in culpa.</p>
                                <div class="testimonial-autor">
                                    <h4>Julia Robertson</h4>
                                    <div class="text">Happy Clients</div>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="img-box"><figure><img src="images/testimonial-author.png" alt=""></figure></div>
                                <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercita
                                    tion ullamco laboris nisi ut aliquip excepteur sint occaecat cu<br />
                                    idatat non proident sunt in culpa.</p>
                                <div class="testimonial-autor">
                                    <h4>Julia Robertson</h4>
                                    <div class="text">Happy Clients</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="accrodian-area">
                        <div class="accordion-title"><div class="section-title">FAQ</div></div>
                        <div class="accordion-box">
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn active">
                                    How dose vitae nunc iaculis faucibus?
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content collapsed">
                                    <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercitation ullam
                                        co laboris nisi ut aliquip excepteur sint occaecat cu</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How dose hendrit ipsum non dolor rhoncus?
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercitation ullam
                                        co laboris nisi ut aliquip excepteur sint occaecat cu</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How dose  lorem dapibus tellus?
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercitation ullam
                                        co laboris nisi ut aliquip excepteur sint occaecat cu</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How dose urna consectur condimetum?
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercitation ullam
                                        co laboris nisi ut aliquip excepteur sint occaecat cu</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    How dose rhoncus facilisis at in nisl?
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid et dolore magna aliqu enim ad minim veniam quis nostrud exercitation ullam
                                        co laboris nisi ut aliquip excepteur sint occaecat cu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial & faq section end -->

    <!-- cta section -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="img-box"></div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="cta-content">
                        <div class="title">Need a <span>Computer</span> Repair?</div>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit, sed do eiusmtempor incid <br />et dolore magna aliqu enim ad minim veniam quis nostru.</p>
                        <div class="cta-btn"><a href="#" class="btn-style-one">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta section end -->

    <!-- news section -->
    <section class="news-section">
        <div class="container">
            <div class="news-title text-center">
                <div class="section-title">Our Latest News</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-box">
                            <figure><a href="our-blog.html"><img src="images/news-1.jpg" alt=""></a></figure>
                        </div>
                        <div class="news-content">
                            <div class="top-content">
                                <div class="date"><span>25</span><br /> Feb</div>
                                <div class="title"><a href="our-blog.html">Finibus Bonorum Malorum.</a></div>
                                <ul class="list">
                                    <li><i class="fa fa-user"></i><span>Admin</span></li>
                                    <li><i class="fa fa-heart-o" aria-hidden="true"></i>350</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>30</li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim.</p>
                            <a href="our-blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-box">
                            <figure><a href="our-blog.html"><img src="images/news-2.jpg" alt=""></a></figure>
                        </div>
                        <div class="news-content">
                            <div class="top-content">
                                <div class="date"><span>26</span><br /> Feb</div>
                                <div class="title"><a href="our-blog.html">Enim Ipsam Voluptatem Quia.</a></div>
                                <ul class="list">
                                    <li><i class="fa fa-user"></i><span>Admin</span></li>
                                    <li><i class="fa fa-heart-o" aria-hidden="true"></i>350</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>30</li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim.</p>
                            <a href="our-blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-item">
                        <div class="img-box">
                            <figure><a href="our-blog.html"><img src="images/news-3.jpg" alt=""></a></figure>
                        </div>
                        <div class="news-content">
                            <div class="top-content">
                                <div class="date"><span>27</span><br /> Feb</div>
                                <div class="title"><a href="our-blog.html">Modi Tempora Incidunt Labore.</a></div>
                                <ul class="list">
                                    <li><i class="fa fa-user"></i><span>Admin</span></li>
                                    <li><i class="fa fa-heart-o" aria-hidden="true"></i>350</li>
                                    <li><i class="fa fa-comments-o" aria-hidden="true"></i>30</li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim.</p>
                            <a href="our-blog.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news section end -->

    <!-- footer area -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget logo-widget">
                            <div class="footer-logo"><figure><a href="index.html"><img src="images/footer-logo.png" alt=""></a></figure></div>
                            <div class="widget-content">
                                <p>Lorem ipsum dolor amet consectetur adipisicing elit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim veniam quis nostrud exercita
                                    tion ullam</p>
                                <ul class="footer-social">
                                    <li><a href="#" class="hvr-radial-out"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="hvr-radial-out"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="hvr-radial-out"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column col-md-2 col-sm-6 col-xs-12">
                        <div class="footer-widget link-widget">
                            <div class="footer-title">Services Link</div>
                            <ul class="list">
                                <li><a href="#">Tablets & iPad Repair</a></li>
                                <li><a href="#">Smart Phone Repair</a></li>
                                <li><a href="#">Laptop & Desktp Repair</a></li>
                                <li><a href="#">Gadget Repair</a></li>
                                <li><a href="#">Console Repair</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget contact-widget">
                            <div class="footer-title">Contact Us</div>
                            <p>Lorem ipsum dolor sit amet, consect
                                etur adipisicing elit sed do eiusmod</p>
                            <div class="text">Location: 1201 park street,<br />
                                Avenue,</div>
                            <div class="text">Phone: [88] 657 524 332</div>
                            <div class="text">Email: info@repairpro.com</div>
                        </div>
                    </div>
                    <div class="footer-column col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget subscribe-widget">
                            <div class="footer-title">NewsLetter</div>
                            <p>Lorem ipsum dolor sit amet, consect
                                etur adipisicing elit sed do eiusmod.</p>
                            <form method="post" action="index.html">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Enter your email" required>
                                    <button type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <div class="text"><span>{{ env('APP_NAME') }}</span> © {{ date_format(date_create(), 'Y') }} Todos os direitos reservados</div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->



</div>
<!--End pagewrapper-->



<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>



<!--Google Map APi Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRvBPo3-t31YFk588DpMYS6EqKf-oGBSI"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.themepunch.tools.min.js"></script>
<script src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!-- owl.carousel -->
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<!-- js count to -->
<script type="text/javascript" src="js/jquery.appear.js"></script>
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/masterslider.js"></script>
<script type="text/javascript" src="js/jquery.polyglot.language.switcher.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script src="js/validate.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/timePicker.js"></script>
<script src="js/html5lightbox/html5lightbox.js"></script>

<!-- Theme js _________ -->
<script type="text/javascript" src="js/theme.js"></script>
<script src="js/map-script.js"></script>

<script src="js/common.js"></script>
<!-- End of .page_wrapper -->

<script>
    isMobile();
</script>
</body>
</html>
