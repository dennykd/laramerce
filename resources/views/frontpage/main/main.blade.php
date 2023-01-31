@extends('layouts.front-layout')
@section('body')
    <div class="common-home res layout-1">
        <div id="wrapper" class="wrapper-fluid banners-effect-7">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container">
                <div id="content">
                    <div class="slider-full" style="background-color:white!important; ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-3 block-slide">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 block-left">
                                            <div class="module sohomepage-slider ">
                                                <div class="yt-content-slider" data-rtl="yes" data-autoplay="no"
                                                    data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0"
                                                    data-items_column0="1" data-items_column1="1" data-items_column2="1"
                                                    data-items_column3="1" data-items_column4="1" data-arrows="no"
                                                    data-pagination="yes" data-lazyload="yes" data-loop="no"
                                                    data-hoverpause="yes">
                                                    @foreach ($products->shuffle()->take(3) as $item)
                                                        <div class="yt-content-slide" style="width: 100%;">
                                                            <a title="{{ $item->name }}"
                                                                href="{{ route('product-detail', ['product' => $item]) }}"><img
                                                                    src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                    alt="{{ $item->name }}" class="responsive img-mobile"
                                                                    style="width: 650px; height: 510px; object-fit: cover; object-position: center;"></a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="loadeding"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 block-right">
                                            <div class="module">
                                                <div class="block-image-1" style="width: 100%;">
                                                    <ul class="static-image">
                                                        @foreach ($products->shuffle()->take(3) as $item)
                                                            <li><a title="{{ $item->name }}"
                                                                    href="{{ route('product-detail', ['product' => $item]) }}"><img
                                                                        src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                        alt="{{ $item->name }}" class="img-mobile"
                                                                        style="width: 250px; height: 170px; object-fit: cover; object-position: center;"></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <div class="container">
                            <div class="block block_0">
                                <div class="block-categories module">
                                    <h3 class="modtitle"><span>Featured Brands</span></h3>
                                    <div class="yt-content-slider cate-content" data-rtl="yes" data-autoplay="no"
                                        data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                                        data-items_column0="5" data-items_column1="4" data-items_column2="4"
                                        data-items_column3="3" data-items_column4="2" data-arrows="no" data-pagination="yes"
                                        data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                        @forelse ($brands as $item)
                                            <div class="cate cate1">
                                                <div class="inner" style="width: 100%;"><a
                                                        href="{{ route('brand', ['brand' => $item]) }}"><img
                                                            class="img-mobile"
                                                            src="{{ asset($item->logo != null ? 'storage/' . $item->logo->src : 'dist/images/default.jpg') }}"
                                                            alt="Static Image"
                                                            style="width:210px; height: 270px; cover; object-position: center;"></a><a
                                                        class="title-cate"
                                                        href="{{ route('brand', ['brand' => $item]) }}">{{ $item->name }}</a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="cate cate1">
                                                <div class="inner"><a href="#"><img src=""
                                                            alt="No Image"></a><a class="title-cate" href="#">No
                                                        Data</a>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <div class="block block_1">
                                <div class="row products-listing grid">
                                    <div class="column small-11 small-centered product-layout col-md-9">
                                        <div class="custom_deals_featured">
                                            <h2 class="modtitle font-ct"><span>Today Deals</span></h2>
                                            <div class="modcontent">
                                                <div class="slider slider-img slider-single">
                                                    @forelse ($products as $item)
                                                        <div class="slick-slide" data-slick-index="{{ $loop->iteration }}">
                                                            <div class="product-item">
                                                                <div class="product-item-container">
                                                                    <div class="left-block">
                                                                        <div class="product-image-container second_img"
                                                                            style="width: 100%;">
                                                                            <a href="{{ route('product-detail', ['product' => $item]) }}"
                                                                                target="_self"
                                                                                title="{{ $item->name }}">
                                                                                <img src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                                    class="img-1 img-responsive img-mobile"
                                                                                    style="width: 400px; height: 400px; object-fit: cover; object-position: center;"
                                                                                    alt="{{ $item->name }}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-label">
                                                                            <span
                                                                                class="label-product label-sale">-20%</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-block">
                                                                        <div class="caption">
                                                                            <h4><a href="{{ route('product-detail', ['product' => $item]) }}"
                                                                                    target="_self"
                                                                                    title="{{ $item->name }}"
                                                                                    tabindex="{{ $loop->iteration }}">{{ $item->name }}</a>
                                                                            </h4>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                            </div>
                                                                            <p class="des_deal">
                                                                                {!! Str::limit(html_entity_decode(strip_tags($item->description)), 100, '...') !!}</p>
                                                                            <p class="price font-ct">
                                                                                <span
                                                                                    class="price-new">{{ ch_currency($item->price) }}</span>
                                                                                {{-- <span class="price-old">$122.00</span> --}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="slick-slide" data-slick-index="1">
                                                            <div class="product-item">
                                                                <div class="product-item-container">
                                                                    <div class="left-block">
                                                                        <div class="product-image-container second_img">
                                                                            <a href="#" target="_self"
                                                                                title="Pastrami bacon">
                                                                                <img src="image/catalog/demo/product/300/1.jpg"
                                                                                    class="img-1 img-responsive"
                                                                                    alt="Pastrami bacon">
                                                                            </a>
                                                                        </div>
                                                                        <div class="box-label">
                                                                            <span
                                                                                class="label-product label-sale">-20%</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="right-block">
                                                                        <div class="caption">
                                                                            <h4><a href="#" target="_self"
                                                                                    title="Deserunt mollitia"
                                                                                    tabindex="0">No Data</a></h4>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                            </div>
                                                                            <p class="des_deal">
                                                                                No Data</p>
                                                                            <p class="price font-ct">
                                                                                <span class="price-new">$0</span>
                                                                                {{-- <span class="price-old">$122.00</span> --}}
                                                                            </p>
                                                                            <!--countdown box-->
                                                                            <div class="item-time-w">
                                                                                <div class="item-time">
                                                                                    <div class="item-timer">
                                                                                        <div class="defaultCountdown-30">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--end countdown box-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforelse

                                                </div>
                                                <div class="slider slider-item slider-nav">
                                                    @foreach ($products as $item)
                                                        <div class="item-slick"
                                                            data-slick-index="{{ $loop->iteration }}">
                                                            <div class="item-img" style="width: 100%;">
                                                                <img src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                    class="img-1 img-responsive img-mobile"
                                                                    alt="{{ $item->name }}"
                                                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;">
                                                                <div class="box-label">
                                                                    <span class="label-product label-sale">-20%</span>
                                                                </div>
                                                            </div>
                                                            <span
                                                                class="title">{{ Str::words($item->name, 2, '...') }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">

                                        <div class="module best-seller best-seller-custom">
                                            <h3 class="modtitle">
                                                <span><i class="fa fa-diamond fa-hidden"></i>Best Sellers</span>
                                            </h3>
                                            <div class="modcontent">
                                                <div id="so_extra_slider_1" class="so-extraslider">
                                                    <!-- Begin extraslider-inner -->
                                                    <div class="yt-content-slider extraslider-inner" data-rtl="yes"
                                                        data-pagination="no" data-autoplay="no" data-delay="4"
                                                        data-speed="0.6" data-margin="0" data-items_column0="1"
                                                        data-items_column1="1" data-items_column2="1"
                                                        data-items_column3="1" data-items_column4="1" data-arrows="yes"
                                                        data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                                        @foreach ($products->take(2) as $item)
                                                            <div class="item">
                                                                @foreach ($products->random($products->count() > 5 ? 5 : $products->count()) as $ip => $product)
                                                                    @if ($products[$loop->index + 1])
                                                                        <div class="item-wrap style1">
                                                                            <div class="item-wrap-inner">
                                                                                <div class="media-left">
                                                                                    <div class="item-image">
                                                                                        <div class="item-img-info">
                                                                                            <a href="{{ route('product-detail', ['product' => $product]) }}"
                                                                                                target="_self"
                                                                                                title="{{ $product->name }} "
                                                                                                style="width: 100%;">
                                                                                                <img src="{{ asset($product->images->count() ? 'storage/' . $product->images->first()->src : 'image/catalog/demo/product/80/8.jpg') }}"
                                                                                                    alt="{{ $product->name }}"
                                                                                                    class="img-mobile"
                                                                                                    style="width: 90px; height: 90px; object-fit: cover; object-position: center;">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <div class="item-info">
                                                                                        <div class="item-title">
                                                                                            <a href="{{ route('product-detail', ['product' => $product]) }}"
                                                                                                target="_self"
                                                                                                title="Mandouille short">{{ Str::words($product->name, 3, '...') }}</a>
                                                                                        </div>
                                                                                        <div class="rating">
                                                                                            <span class="fa fa-stack"><i
                                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                                            <span class="fa fa-stack"><i
                                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                                            <span class="fa fa-stack"><i
                                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                                            <span class="fa fa-stack"><i
                                                                                                    class="fa fa-star fa-stack-2x"></i></span>
                                                                                            <span class="fa fa-stack"><i
                                                                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                        </div>
                                                                                        <div class="content_price price">
                                                                                            <span
                                                                                                class="price-new product-price">{{ ch_currency($product->price) }}
                                                                                            </span>&nbsp;&nbsp;

                                                                                            {{-- <span class="price-old">$76.00
                                                                                            </span>&nbsp; --}}

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- End item-info -->
                                                                                <!-- End item-wrap-inner -->
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                <!-- End item-wrap -->
                                                            </div>
                                                        @endforeach
                                                        {{-- <div class="item ">
                                                            <div class="item-wrap style1">
                                                                <div class="item-wrap-inner">
                                                                    <div class="media-left">
                                                                        <div class="item-image">
                                                                            <div class="item-img-info">
                                                                                <a href="#" target="_self"
                                                                                    title="Qeserunt shortloin ">
                                                                                    <img src="image/catalog/demo/product/80/5.jpg"
                                                                                        alt="Qeserunt shortloin">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="item-info">
                                                                            <div class="item-title">
                                                                                <a href="#" target="_self"
                                                                                    title="Qeserunt shortloin">
                                                                                    Qeserunt shortloin
                                                                                </a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="content_price price">
                                                                                <span class="price product-price">
                                                                                    $88.00
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End item-wrap -->
                                                            <div class="item-wrap style1">
                                                                <div class="item-wrap-inner">
                                                                    <div class="media-left">
                                                                        <div class="item-image">
                                                                            <div class="item-img-info">
                                                                                <a href="#" target="_self"
                                                                                    title="Consecte quichuck ">
                                                                                    <img src="image/catalog/demo/product/80/6.jpg"
                                                                                        alt="Consecte quichuck">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="item-info">
                                                                            <div class="item-title">
                                                                                <a href="#" target="_self"
                                                                                    title="Consecte quichuck">
                                                                                    Consecte quichuck
                                                                                </a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="content_price price">
                                                                                <span
                                                                                    class="price-new product-price">$55.00
                                                                                </span>&nbsp;&nbsp;
                                                                                <span class="price-old">$61.00
                                                                                </span>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End item-info -->
                                                                    <!-- End item-wrap-inner -->
                                                                </div>
                                                            </div>
                                                            <!-- End item-wrap -->
                                                            <div class="item-wrap style1">
                                                                <div class="item-wrap-inner">
                                                                    <div class="media-left">
                                                                        <div class="item-image">
                                                                            <div class="item-img-info">
                                                                                <a href="#" target="_self"
                                                                                    title="Neatball bresaola ">
                                                                                    <img src="image/catalog/demo/product/80/7.jpg"
                                                                                        alt="Neatball bresaola">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="item-info">
                                                                            <div class="item-title">
                                                                                <a href="#" target="_self"
                                                                                    title="Neatball bresaola">
                                                                                    Neatball bresaola
                                                                                </a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="content_price price">
                                                                                <span
                                                                                    class="price-new product-price">$65.00
                                                                                </span>&nbsp;&nbsp;

                                                                                <span class="price-old">$71.00
                                                                                </span>&nbsp;
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End item-info -->
                                                                    <!-- End item-wrap-inner -->
                                                                </div>
                                                            </div>
                                                            <!-- End item-wrap -->
                                                            <div class="item-wrap style1">
                                                                <div class="item-wrap-inner">
                                                                    <div class="media-left">
                                                                        <div class="item-image">
                                                                            <div class="item-img-info">
                                                                                <a href="#" target="_self"
                                                                                    title="Yutculpa ullamco ">
                                                                                    <img src="image/catalog/demo/product/80/8.jpg"
                                                                                        alt="Yutculpa ullamco">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="item-info">
                                                                            <div class="item-title">
                                                                                <a href="#" target="_self"
                                                                                    title="Yutculpa ullamco">
                                                                                    Yutculpa ullamco
                                                                                </a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                                <span class="fa fa-stack">
                                                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="content_price price">
                                                                                <span
                                                                                    class="price-new product-price">$60.00
                                                                                </span>&nbsp;&nbsp;

                                                                                <span class="price-old">$77.00
                                                                                </span>&nbsp;

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End item-info -->
                                                                    <!-- End item-wrap-inner -->
                                                                </div>
                                                            </div>
                                                            <!-- End item-wrap -->
                                                            <div class="item-wrap style1">
                                                                <div class="item-wrap-inner">
                                                                    <div class="media-left">
                                                                        <div class="item-image">
                                                                            <div class="item-img-info">
                                                                                <a href="#" target="_self"
                                                                                    title="Mandouille short ">
                                                                                    <img src="image/catalog/demo/product/80/1.jpg"
                                                                                        alt="Mandouille short">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="item-info">
                                                                            <div class="item-title">
                                                                                <a href="#" target="_self"
                                                                                    title="Mandouille short">Mandouille
                                                                                    short </a>
                                                                            </div>
                                                                            <div class="rating">
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="fa fa-star-o fa-stack-2x"></i></span>
                                                                            </div>
                                                                            <div class="content_price price">
                                                                                <span
                                                                                    class="price-new product-price">$55.00
                                                                                </span>&nbsp;&nbsp;

                                                                                <span class="price-old">$76.00
                                                                                </span>&nbsp;

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- End item-info -->
                                                                    <!-- End item-wrap-inner -->
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <!--End extraslider-inner -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block block_2">
                                <div class="h1-banner2">
                                    <div class="row banners">
                                        <div class="banner21 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <img src="image/catalog/demo/banners/home1/4.jpg" alt="Image Client">
                                            </a>
                                        </div>
                                        <div class="banner21 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a href="#">
                                                <img src="image/catalog/demo/banners/home1/5.jpg" alt="Image Client">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($brands->take(3) as $ib => $brand)
                                <div class="block block_{{ $ib + 1 }}">
                                    <!-- Listing tabs -->
                                    <div class="module custom-listingtab default-nav">
                                        <div class="box-title font-ct">
                                            <h2 class="modtitle">{{ $brand->name }}</h2>
                                        </div>
                                        <div class="modcontent">
                                            <div id="so_listing_tabs_{{ $ib + 1 }}"
                                                class="so-listing-tabs first-load">
                                                <div class="loadeding"></div>
                                                <div class="ltabs-wrap">
                                                    <div class="ltabs-tabs-container" data-delay="300"
                                                        data-duration="600" data-effect="starwars" data-ajaxurl=""
                                                        data-type_source="0" data-lg="4" data-md="4"
                                                        data-sm="3" data-xxs="3" data-xs="1" data-margin="0">
                                                        <!--Begin Tabs-->
                                                        <div class="ltabs-tabs-wrap">
                                                            <ul class="ltabs-tabs cf font-ct list-sub-cat">
                                                                <li class="ltabs-tab tab-sel"
                                                                    data-category-id="{{ $ib + 1 }}"
                                                                    data-active-content=".items-category-{{ $ib + 1 }}">
                                                                    <span class="ltabs-tab-label">Best sellers</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Tabs-->
                                                    </div>
                                                    <div class="wap-listing-tabs products-list grid">
                                                        <div class="item-cat-image banners">
                                                            <div>
                                                                <a href="#" title="" target="_self">
                                                                    <img class="categories-loadimage" title=""
                                                                        alt=""
                                                                        src="image/catalog/demo/banners/home1/6-196x540.jpg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="ltabs-items-container">
                                                            <!--Begin Items-->
                                                            <div class="ltabs-items ltabs-items-selected items-category-{{ $ib + 1 }}"
                                                                data-total="{{ $brand->products->count() >= 12 ? 12 : $brand->products->count() }}">
                                                                <div class="ltabs-items-inner ltabs-slider">
                                                                    @foreach ($brand->products->random(($brand->products->count() >= 12 ? 12 : $brand->products->count() % 2 == 0) ? $brand->products->count() : $brand->products->count() - 1) as $ip => $product)
                                                                        @if (($ip + 1) % 2 == 1)
                                                                            <div class="ltabs-item">
                                                                                <div
                                                                                    class="item-inner product-thumb transition product-layout">
                                                                                    <div class="product-item-container">
                                                                                        <div class="left-block left-b">
                                                                                            <div class="product-image-container"
                                                                                                style="width: 100%">
                                                                                                <a href="{{ route('product-detail', ['product' => $product]) }}"
                                                                                                    target="_self"
                                                                                                    title="Cupim should">
                                                                                                    <img src="{{ asset($brand->products[$ip]->images->count() ? 'storage/' . $brand->products[$ip]->images->first()->src : 'dist/images/default.jpg') }}"
                                                                                                        class="img-responsive img-mobile"
                                                                                                        style="width: 194.8px; height: 194.8px; object-fit: cover; object-position: center;"
                                                                                                        alt="image">
                                                                                                </a>
                                                                                            </div>

                                                                                            <!--quickview-->
                                                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                                                href="{{ route('quickview', ['product' => $product]) }}"
                                                                                                title="Quick view"
                                                                                                data-fancybox-type="iframe"><i
                                                                                                    class="fa fa-eye"></i><span></span></a>
                                                                                            <!--end quickview-->
                                                                                        </div>
                                                                                        <div class="right-block right-b">

                                                                                            <div class="caption">
                                                                                                <h4><a href="{{ route('product-detail', ['product' => $product]) }}"
                                                                                                        title="Cupim should "
                                                                                                        {{-- target="_self">{{ $brand->products[$ip+1]->name }} --}}
                                                                                                        target="_self">{{ Str::words($brand->products[$ip]->name, 3, '...') }}
                                                                                                    </a></h4>
                                                                                                <div class="price">
                                                                                                    <span
                                                                                                        class="price-new">{{ ch_currency($brand->products[$ip]->price) }}
                                                                                                    </span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="button-group so-quickview cartinfo--static">
                                                                                                    <button type="button"
                                                                                                        class="addToCart"
                                                                                                        title="Add to cart"
                                                                                                        onclick="cart.add('{{ $brand->products[$ip + 1]->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}', '1');">
                                                                                                        <i
                                                                                                            class="fa fa-shopping-basket"></i>
                                                                                                        <span>Add to
                                                                                                            cart
                                                                                                        </span>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="wishlist btn-button"
                                                                                                        title="Add to Wish List"
                                                                                                        onclick="wishlist.add('{{ $brand->products[$ip + 1]->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}');"><i
                                                                                                            class="fa fa-heart"></i><span></span>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="item-inner product-thumb transition product-layout">
                                                                                    <div class="product-item-container">
                                                                                        <div class="left-block left-b">

                                                                                            <div class="product-image-container"
                                                                                                style="width: 100%;">
                                                                                                <a href="{{ route('product-detail', ['product' => $brand->products[$ip + 1]]) }}"
                                                                                                    target="_self"
                                                                                                    title="Drutick lanaeger">
                                                                                                    <img src="{{ asset($brand->products[$ip + 1]->images->count() ? 'storage/' . $brand->products[$ip + 1]->images->first()->src : 'dist/images/default.jpg') }}"
                                                                                                        class="img-responsive img-mobile"
                                                                                                        style="width: 194.8px; height: 194.8px; object-fit: cover; object-position: center;"
                                                                                                        alt="image">
                                                                                                </a>
                                                                                            </div>

                                                                                            <!--quickview-->
                                                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                                                                href="{{ route('quickview', ['product' => $brand->products[$ip + 1]]) }}"
                                                                                                title="Quick view"
                                                                                                data-fancybox-type="iframe"><i
                                                                                                    class="fa fa-eye"></i><span></span></a>
                                                                                            <!--end quickview-->
                                                                                        </div>
                                                                                        <div class="right-block right-b">
                                                                                            <div class="caption">
                                                                                                <h4><a href="{{ route('product-detail', ['product' => $brand->products[$ip + 1]]) }}"
                                                                                                        title="Drutick lanaeger"
                                                                                                        target="_self">{{ Str::words($brand->products[$ip + 1]->name, 3, '...') }}</a>
                                                                                                </h4>
                                                                                                <div class="price">
                                                                                                    <span
                                                                                                        class="price-new">{{ ch_currency($brand->products[$ip + 1]->price) }}</span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="button-group so-quickview cartinfo--static">
                                                                                                    <button type="button"
                                                                                                        class="addToCart"
                                                                                                        title="Add to cart"
                                                                                                        onclick="cart.add('{{ $brand->products[$ip + 1]->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}', '1');">
                                                                                                        <i
                                                                                                            class="fa fa-shopping-basket"></i>
                                                                                                        <span>Add to
                                                                                                            cart
                                                                                                        </span>
                                                                                                    </button>
                                                                                                    <button type="button"
                                                                                                        class="wishlist btn-button"
                                                                                                        title="Add to Wish List"
                                                                                                        onclick="wishlist.add('{{ $brand->products[$ip + 1]->product_code }}', '{{ auth()->user() ? auth()->user()->id : 0 }}');"><i
                                                                                                            class="fa fa-heart"></i><span></span>
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                            <div class="ltabs-items items-category-12 grid"
                                                                data-total="16">
                                                                <div class="ltabs-loading"></div>
                                                            </div>
                                                            <div class="ltabs-items  items-category-13 grid"
                                                                data-total="16">
                                                                <div class="ltabs-loading"></div>
                                                            </div>
                                                            <!--End Items-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Listing tabs -->
                                </div>
                            @endforeach
                            <div class="block block_6">
                                <div class="banners">
                                    <div>
                                        <a href="#">
                                            <img src="image/catalog/demo/banners/home1/9.jpg" alt="Image Client">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="block block_8">
                                <div class="module so-latest-blog custom-ourblog clearfix default-nav">
                                    <h3 class="modtitle"><span>from our blog</span></h3>
                                    <div class="modcontent clearfix">
                                        <div class="so-blog-external">
                                            <div class="yt-content-slider blog-external" data-autoplay="no"
                                                data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30"
                                                data-items_column0="3" data-items_column1="3" data-items_column2="2"
                                                data-items_column3="2" data-items_column4="1" data-arrows="no"
                                                data-pagination="yes" data-lazyload="yes" data-loop="no"
                                                data-hoverpause="yes">

                                                <div class="media">
                                                    <div class="item">
                                                        <div class="content-img">
                                                            <a href="{{ route('blog-detail') }}" target="_self">
                                                                <img src="image/catalog/blog/370x256/3.jpg"
                                                                    alt="Kire tuma feugiat" />
                                                            </a>
                                                            <div class="entry-date font-ct">
                                                                <div class="day-time">14</div>
                                                                <div class="month-time">Jan</div>
                                                            </div>
                                                        </div>
                                                        <div class="content-detail">
                                                            <div class="media-content">
                                                                <h4 class="media-heading font-ct head-item">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        title="Kire tuma feugiat" target="_self">Kire
                                                                        tuma feugiat ipsum dolor</a>
                                                                </h4>
                                                                <div class="media-subcontent">
                                                                    <span class="media-author"><i
                                                                            class="fa fa-book"></i>Ytcdemo</span>
                                                                    <span class="media-comment"><i
                                                                            class="fa fa-comments"></i>2
                                                                        Comments</span>
                                                                    <span class="media-view"><i class="fa fa-eye"></i>1
                                                                        View</span>
                                                                </div>
                                                                <div class="readmore">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        target="_self">Read
                                                                        more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="item">
                                                        <div class="content-img">
                                                            <a href="{{ route('blog-detail') }}" target="_self">
                                                                <img src="image/catalog/blog/370x256/4.jpg"
                                                                    alt="Kire tuma demons vel eum iriure" />
                                                            </a>
                                                            <div class="entry-date font-ct">
                                                                <div class="day-time">12</div>
                                                                <div class="month-time">Nov</div>
                                                            </div>
                                                        </div>
                                                        <div class="content-detail">
                                                            <div class="media-content">
                                                                <h4 class="media-heading font-ct head-item">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        title="Kire tuma demons vel eum iriure"
                                                                        target="_self">Kire tuma demons vel eum
                                                                        iriure</a>
                                                                </h4>
                                                                <div class="media-subcontent">
                                                                    <span class="media-author"><i
                                                                            class="fa fa-book"></i>Ytcdemo</span>
                                                                    <span class="media-comment"><i
                                                                            class="fa fa-comments"></i>2
                                                                        Comments</span>
                                                                    <span class="media-view"><i class="fa fa-eye"></i>1
                                                                        View</span>
                                                                </div>
                                                                <div class="readmore">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        target="_self">Read
                                                                        more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="item">
                                                        <div class="content-img">
                                                            <a href="{{ route('blog-detail') }}" target="_self">
                                                                <img src="image/catalog/blog/370x256/5.jpg"
                                                                    alt="minim veniam  justo duo dolores" />
                                                            </a>
                                                            <div class="entry-date font-ct">
                                                                <div class="day-time">10</div>
                                                                <div class="month-time">Feb</div>
                                                            </div>
                                                        </div>
                                                        <div class="content-detail">
                                                            <div class="media-content">
                                                                <h4 class="media-heading font-ct head-item">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        title="Minim veniam  justo duo dolores"
                                                                        target="_self">Lorem ipsum dolor sit amet</a>
                                                                </h4>
                                                                <div class="media-subcontent">
                                                                    <span class="media-author"><i
                                                                            class="fa fa-book"></i>Ytcdemo</span>
                                                                    <span class="media-comment"><i
                                                                            class="fa fa-comments"></i>2
                                                                        Comments</span>
                                                                    <span class="media-view"><i class="fa fa-eye"></i>1
                                                                        View</span>
                                                                </div>
                                                                <div class="readmore">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        target="_self">Read
                                                                        more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="media">
                                                    <div class="item">
                                                        <div class="content-img">
                                                            <a href="{{ route('blog-detail') }}" target="_self">
                                                                <img src="image/catalog/blog/370x256/6.jpg"
                                                                    alt="Duis autem vel eum tempor inviduntt" />
                                                            </a>
                                                            <div class="entry-date font-ct">
                                                                <div class="day-time">10</div>
                                                                <div class="month-time">Nov</div>
                                                            </div>
                                                        </div>
                                                        <div class="content-detail">
                                                            <div class="media-content">
                                                                <h4 class="media-heading font-ct head-item">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        title="Duis autem vel eum tempor invidunt"
                                                                        target="_self">Duis autem vel eum tempor
                                                                        invidunt</a>
                                                                </h4>
                                                                <div class="media-subcontent">
                                                                    <span class="media-author"><i
                                                                            class="fa fa-book"></i>Ytcdemo</span>
                                                                    <span class="media-comment"><i
                                                                            class="fa fa-comments"></i>2
                                                                        Comments</span>
                                                                    <span class="media-view"><i class="fa fa-eye"></i>1
                                                                        View</span>
                                                                </div>
                                                                <div class="readmore">
                                                                    <a href="{{ route('blog-detail') }}"
                                                                        target="_self">Read
                                                                        more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Main Container -->

            {{-- <div class="model-popup">
    <div id="container-module-newletter" class="hidden-md hidden-sm hidden-xs">
        <div class="so_newletter_custom_popup_bg popup_bg"></div>
        <div class="module main-newsleter-popup so_newletter_custom_popup so_newletter_oca_popup"
            id="so_newletter_custom_popup">
            <div class="so-custom-popup so-custom-oca-popup"
                style="width: 850px; background: url('image/catalog/banners/newletter-bg.jpg') no-repeat white;  ">
                <div class="modcontent">
                    <div class="oca_popup" id="test-popup">
                        <div class="popup-content">
                            <p class="newsletter_promo">Daily Promotion</p>
                            <div class="popup-title">SIGN UP FOR NEWSLETTER </div>
                            <form method="post" name="signup" class="form-group signup">
                                <div class="input-control">
                                    <div class="email"> <input type="email" placeholder="Your email address..."
                                            value="" class="form-control" id="txtemail" name="txtemail">
                                    </div>
                                    <button class="btn btn-default" type="submit"
                                        onclick="return subscribe_newsletter();" name="submit">Subscribe
                                    </button>
                                </div>
                            </form>
                            <label class="hidden-popup"> <input type="checkbox" value="1" name="hidden-popup">
                                <span class="inline">&nbsp;&nbsp;Don't show this popup
                                    again</span> </label>
                        </div>
                    </div>
                </div>
                <!--/.modcontent-->
                <button title="Close" type="button" class="popup-close">×</button>
            </div>
        </div>
    </div>
</div> --}}
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection
