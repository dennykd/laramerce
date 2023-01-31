@extends('layouts.base-layout')

@section('base_head')
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="keywords"
        content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description"
        content="Revo is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="{{ asset('image/catalog/urban.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- Libs CSS
                                                                                                                                                ============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/lib.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/js/minicolors/miniColors.css') }}" rel="stylesheet">
     <link href="{{ asset('/dist/css/custom.css') }}" rel="stylesheet">

    <!-- Theme CSS
                                                                                                                                                ============================================ -->
    <link href="{{ asset('/css/themecss/so_searchpro.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/so_megamenu.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/so-categories.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/so-newletter-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themecss/slick.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/footer/footer1.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/header/header1.css') }}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet">

    <!-- Google web fonts
                                                                                                                                        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel='stylesheet' type='text/css'>
    <style>
        body {
            font-family: 'Open Sans', sans-serif
        }

        .font-ct,
        h1,
        h2,
        h3,
        .des_deal,
        .item-time-w,
        .item-time-w .name-time,
        .static-menu a.main-menu,
        .container-megamenu.vertical .vertical-wrapper ul li>a strong,
        .container-megamenu.vertical .vertical-wrapper ul.megamenu li .sub-menu .content .static-menu .menu ul li a.main-menu,
        .horizontal ul.megamenu>li>a,
        .footertitle,
        .module h3.modtitle span,
        .breadcrumb li a,
        .item-title a,
        .best-seller-custom .item-info,
        .product-box-desc,
        .product_page_price .price-new,
        .list-group-item a,
        #menu ul.nav>li>a,
        .megamenuToogle-pattern,
        .right-block .caption h4,
        .price,
        .box-price {
            font-family: Raleway, sans-serif;
        }
    </style>
    @yield('head')
@endsection
@section('base_body')
    @if (session()->has('alert'))
        @include('frontpage.fragment.alert')
    @endif
    @if (session()->has('error'))
        @include('frontpage.fragment.error')
    @endif
    @if (session()->has('success'))
        @include('frontpage.fragment.success')
    @endif
    @yield('body')
@endsection
@section('base_script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 2,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <!-- Include Libs & Plugins -->
    <script src="{{ asset('/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('/js/themejs/libs.js') }}"></script>
    <script src="{{ asset('/js/unveil/jquery.unveil.js') }}"></script>
    <script src="{{ asset('/js/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js') }}"></script>
    <script src="{{ asset('/js/datetimepicker/moment.js') }}"></script>
    <script src="{{ asset('/js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/modernizr/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('/js/minicolors/jquery.miniColors.min.js') }}"></script>

    <!-- Theme files -->

    <script src="{{ asset('/js/themejs/application.js') }}"></script>

    <script src="{{ asset('/js/themejs/homepage.js') }}"></script>


    <script src="{{ asset('/js/themejs/so_megamenu.js') }}"></script>
    <script src="{{ asset('/js/themejs/addtocart.js') }}"></script>
    <script src="{{ asset('/js/themejs/cpanel.js') }}"></script>

    @yield('script')
@endsection
