<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="keywords"
        content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description"
        content="Revo is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="{{ asset('image/catalog/favicon.jpg') }}" />
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
</head>

<body class="res layout-subpage">
    <div id="wrapper" class="wrapper-full ">
        <!-- Main Container  -->
        <div class="main-container container">

            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-md-12 col-sm-12">

                    <div class="product-view row quickview-w">
                        <div class="left-content-product">

                            <div class="content-product-left class-honizol col-md-6 col-sm-12 col-xs-12">
                                @foreach ($product->images->take(1) as $index => $img)
                                    <div class="large-image">
                                        <img itemprop="image" class="" src="{{ asset('storage/' . $img->src) }}"
                                            alt="product_pic_{{ $loop->iteration }}">
                                    </div>
                                @endforeach
                                {{-- <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=I3Lo4ysUf80"><i
                                        class="fa fa-youtube-play"></i></a> --}}

                                <div id="thumb-slider" class="yt-content-slider full_slider owl-drag" data-rtl="yes"
                                    data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6"
                                    data-margin="10" data-items_column0="4" data-items_column1="3"
                                    data-items_column2="4" data-items_column3="1" data-items_column4="1"
                                    data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no"
                                    data-hoverpause="yes">
                                    @foreach ($product->images as $index => $img)
                                        <a data-index="{{ $loop->iteration }}" class="img thumbnail ">
                                            <img src="{{ asset('storage/' . $img->src) }}"
                                                alt="product_pic_{{ $loop->iteration }}">
                                        </a>
                                    @endforeach
                                </div>

                            </div>

                            <div class="content-product-right col-md-6 col-sm-12 col-xs-12">
                                <div class="title-product">
                                    <h1>{{ $product->name }}</h1>
                                </div>
                                <!-- Review ---->
                                <div class="box-review">
                                    <div class="rating">
                                        <div class="rating-box">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i
                                                    class="fa fa-star-o fa-stack-1x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        </div>
                                    </div>
                                    <a class="reviews_button" href=""
                                        onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">2
                                        reviews</a>
                                    <span class="order-num">Orders (0)</span>
                                </div>
                                <div class="product_page_price price" itemprop="offerDetails" itemscope=""
                                    itemtype="http://data-vocabulary.org/Offer">
                                    <span class="price-new"><span itemprop="price"
                                            id="price-special">{{ ch_currency($product->price) }}</span></span>
                                    {{-- <span class="price-old" id="price-old">$242.00</span> --}}
                                    {{-- <span class="label-product label-sale">
                                        -55%
                                    </span>
                                    <div class="price-tax"><span>Tax</span> <span id="price-tax"> $90.00 </span></div> --}}

                                </div>

                                <div class="product-box-desc">
                                    <div class="inner-box-desc">

                                        <div class="brand"><span>Brand:</span><a href="#"> SamSung</a> </div>
                                        <div class="model"><span>Product Code:</span>{{ $product->product_code }}
                                        </div>
                                        <div class="stock"><span>Availability:</span> <i
                                                class="fa fa-check-square-o"></i> {{ $product->stock }}</div>

                                    </div>
                                </div>

                                <div class="short_description form-group">
                                    <h3>OverView</h3>{!! strip_tags(html_entity_decode(Str::words($product->description, 20, '...'))) !!}
                                </div>
                                <div id="product">
                                    <h4>Available Option</h4>
                                    <div class="form-group box-info-product">
                                        <div class="option quantity">
                                            <div class="input-group d-flex quantity-control" unselectable="on"
                                                style="-webkit-user-select: none; width: 20%;">
                                                <input class="form-control" style="padding: 0 8px;" type="text"
                                                    name="quantity" value="1" id="product_amount_to_order">
                                                <input type="hidden" name="product_id"
                                                    value="{{ $product->product_code }}">
                                                <span class="input-group-addon product_quantity_down">−</span>
                                                <span class="input-group-addon product_quantity_up">+</span>
                                            </div>
                                        </div>
                                        <div class="cart">
                                            <input type="button" data-toggle="tooltip" title=""
                                                value="Add to Cart" data-loading-text="Loading..." id="button-cart"
                                                class="btn btn-mega btn-lg"
                                                onclick="cart.add('{{ $product->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}');"
                                                data-original-title="Add to Cart">
                                        </div>
                                        <div class="add-to-links wish_comp">
                                            <ul class="blank list-inline">
                                                <li class="wishlist">
                                                    <a class="icon" data-toggle="tooltip" title=""
                                                        onclick="wishlist.add('{{ $product->product_code }}', {{ auth()->user() ? auth()->user()->id : 0 }});"
                                                        data-original-title="Add to Wish List"><i
                                                            class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    {{-- <div class="form-group social_share_detail clearfix">
                                        <label class="">SHARE THIS:</label>
                                        <ul>
                                            <div class="addthis_inline_share_toolbox"></div>
                                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-529be2200cc72db5"></script>
                                        </ul>
                                    </div> --}}
                                </div>
                                <!-- end box info product -->

                            </div>

                        </div>
                    </div>

                    <script type="text/javascript">
                        // Cart add remove functions
                        var cart = {
                            'add': function(product_id, quantity) {
                                parent.addProductNotice('Product added to Cart',
                                    '<img src="image/demo/shop/product/e11.jpg" alt="">',
                                    '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>',
                                    'success');
                            }
                        }

                        var wishlist = {
                            'add': function(product_id) {
                                parent.addProductNotice('Product added to Wishlist',
                                    '<img src="image/demo/shop/product/e11.jpg" alt="">',
                                    '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>',
                                    'success');
                            }
                        }
                        var compare = {
                            'add': function(product_id) {
                                parent.addProductNotice('Product added to compare',
                                    '<img src="image/demo/shop/product/e11.jpg" alt="">',
                                    '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>',
                                    'success');
                            }
                        }
                    </script>


                </div>


            </div>
            <!--Middle Part End-->
        </div>
        <!-- //Main Container -->

        <style type="text/css">
            #wrapper {
                box-shadow: none;
            }

            #wrapper>*:not(.main-container) {
                display: none;
            }

            #content {
                margin: 0
            }

            .container {
                width: 100%;
            }

            .product-info .product-view,
            .left-content-product,
            .box-info-product {
                margin: 0;
            }

            .left-content-product .content-product-right .box-info-product .add-to-links {
                width: auto;
                float: none;
                margin-top: 0px;
                clear: none;
            }

            .add-to-links ul li {
                margin: 0;
            }
        </style>
    </div>


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

</body>

</html>
