<!doctype html>
<html class="no-js" lang="en">
@php
    $viewslideonfront = App\Models\Slide::all();
    $viewCms = App\Models\CMS::all();
    $viewHeader = App\Models\Brand::all();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Themepul">
    @foreach ($viewHeader as $tagline)
        <title> {{ $tagline->sg_brand_tagline }} </title>
    @endforeach
    @foreach ($viewHeader as $faviconIcon)
        <link href="{{ asset('/images/brandimages/' . $faviconIcon->sg_favicon_icon) }}" rel="icon" />
    @endforeach
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/assets/bootstrap-4.1.1/bootstrap.min.css') }}">
    <!-- END BOOTSTRAP CSS -->
    <!-- ANIMATED CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/assets/animations/animate.css') }}">
    <!-- END ANIMATED CSS -->
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/assets/owlcarousel/owl.carousel.css') }}">
    <!-- END OWL CAROUSEL -->
    <!-- FONT CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/icofont.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/flaticon.css') }}">
    <!-- END CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/assets/swiper/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/assets/video/video.popup.css') }}">
    <!-- STYLE CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/frontassets/assets/lightbox/jquery.littlelightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/style.css') }}">
    <!-- END STYLE CSS -->
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/frontassets/css/responsive.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i%7COpen+Sans:300,300i,400,600,600i,700,800"
        rel="stylesheet">
    <!-- END RESPONSIVE CSS -->
</head>

<body class="darg-bg">
    <div id="welcome-user" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content welcome-box">
                <div class="modal-header bb-0">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body welcome-box-body">
                    <div class="white-popup">
                        <div class="banner-newsletter">
                            @foreach ($viewCms as $viewpopupimage)
                                <img src="{{ asset('images/popupimage/' . $viewpopupimage->sg_cms_popup_image) }}"
                                    alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header header-color">
        <div class="top-slider">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="top-slider" class="owl-carousel">
                            @foreach ($viewslideonfront as $slidedata)
                                <div class="item">
                                    {{ $slidedata->sg_text_line }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP HEADER -->
        <!-- START HEADER MENU -->
        <div class="header-main-menu">
            <div class="container">
                <div class="box-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 logos">
                            <div class="logo pl-4">
                                @foreach ($viewHeader as $logoData)
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('images/brandimages/' . $logoData->sg_brand_logo) }}"
                                            alt="Home Logo">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="mobile-menu">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="col-xl-9 col-lg-9 menus">
                            <!-- NAVBAR -->
                            <div class="header-menu">
                                <nav class="navbar navbar-expand-md btco-hover-menu">
                                    <div class="collapse navbar-collapse" id="navmenu">
                                        <ul class="navbar-nav">
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/') }}">home1</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ url('/products') }}"> Products </a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ url('/contact-us') }}">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- END NAVBAR -->
                            <div class="header-minicart-area">

                                <div class="header-mini-cart">
                                    <ul class="navbar-right">
                                        <li>
                                            <a href="{{ url('checkout') }}" id="">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="badge">{{ count((array) session('cart')) }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="shopping-cart">
                                    <div class="shopping-cart-header">
                                        <i class="fa fa-shopping-cart cart-icon"></i><span
                                            class="badge">{{ count((array) session('cart')) }}</span>
                                        <div class="shopping-cart-total">
                                            <?php $total = 0; ?>
                                            @if ((array) session('cart'))
                                                @foreach ((array) session('cart') as $id => $details)
                                                    {{ $total += $details['price'] * $details['quantity'] }}
                                                @endforeach
                                            @endif
                                        </div>
                                        <span class="lighter-text">Total:</span>
                                        <span class="main-color-text">${{ $total }}</span>
                                    </div>
                                    <ul class="shopping-cart-items">
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                <li class="clearfix">
                                                    <div class="mini-cart-img">
                                                        <img src="{{ asset('/images/productimages/' . $details['photo']) }}"
                                                            alt="{{ $details['name'] }}" />
                                                    </div>
                                                    <div class="mini-cart-list-contnt">
                                                        <span class="item-name"><a
                                                                href="">{{ $details['name'] }}</a></span>
                                                        <span class="item-price">${{ $details['price'] }}</span>
                                                        <span class="item-quantity">Quantity:
                                                            {{ $details['quantity'] }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <a href="{{ url('cart') }}" class="button">View All</a>
                                </div>

                            </div>
                            <!--end shopping-cart -->
                            <!-- END MINI CART LIST -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END HEADER MENU -->
    </header>
