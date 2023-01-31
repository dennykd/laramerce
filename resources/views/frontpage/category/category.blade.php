@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1">
        <div id="wrapper" class="wrapper-fluid banners-effect-8">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container product-listing container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>{{ $name->name }}</p>
                    </li>
                </ul>

                <div class="row">
                    <!--Right Part Start -->
                    <aside class="col-sm-4 col-md-3 content-aside left_column sidebar-offcanvas" id="column-left">
                        <span id="close-sidebar" class="fa fa-times"></span>
                        <div class="module">
                            <h3 class="modtitle"><span><i class="fa fa-paste"></i>Filter Shop By</span> </h3>
                            <div class="modcontent ">
                                <form class="type_2">

                                    <div class="table_layout filter-shopby">
                                        <div class="table_row">
                                            <!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->
                                            <div class="table_cell" style="z-index: 103;">
                                                <legend>Search</legend>
                                                <input class="form-control" type="text" value="" size="50"
                                                    autocomplete="off" placeholder="Search" name="search">
                                            </div>
                                            <!--/ .table_cell -->
                                            <!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
                                            <!-- - - - - - - - - - - - - - SUB CATEGORY - - - - - - - - - - - - - - - - -->
                                            <div class="table_cell">
                                                <fieldset>
                                                    <legend>Category</legend>
                                                    <ul class="checkboxes_list">
                                                        @foreach ($categories as $item)
                                                            <li>
                                                                <a href="{{ route('category', ['category' => $item]) }}"
                                                                    class="{{ Request::is('category/' . $item->name) ? 'actives' : '' }}"
                                                                    name="category" id="category_{{ $loop->iteration }}">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                </fieldset>

                                            </div>
                                            <!--/ .table_cell -->
                                            <!-- - - - - - - - - - - - - - End SUB CATEGORY - - - - - - - - - - - - - - - - -->
                                            <!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
                                            <div class="table_cell">
                                                <fieldset>
                                                    <legend>Brand</legend>
                                                    <ul class="checkboxes_list">
                                                        @foreach ($brands as $item)
                                                            <li>
                                                                <a href="{{ route('brand', ['brand' => $item]) }}"
                                                                    name="brand"
                                                                    class="{{ Request::is('category/' . $item->name) ? 'actives' : '' }}"
                                                                    id="brand_{{ $loop->iteration }}">{{ $item->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                </fieldset>

                                            </div>
                                        </div>
                                        <!--/ .table_row -->
                                        <div class="bottom_box">
                                            <div class="buttons_row">
                                                <button type="submit" class="button_grey button_submit">Search</button>
                                                <button type="reset" class="button_grey filter_reset">Reset</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!--/ .table_layout -->
                                </form>
                            </div>
                        </div>

                    </aside>
                    <!--Right Part End -->

                    <!--Middle Part Start-->
                    <div id="content" class="col-md-9 col-sm-12">
                        <a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"
                            style="margin-bottom: 15px;"><i class="fa fa-bars"></i>Sidebar</a>
                        <div class="sidebar-overlay "></div>
                        <div class="products-category">
                            <h3 class="title-category ">{{ $name->name }}</h3>
                            <div class="category-derc">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="banners">
                                            <div>
                                                <a href="#"><img src="/image/catalog/demo/category/img-cate1.png"
                                                        alt="img cate"><br></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Filters -->
                            <div class="product-filter product-filter-top filters-panel">
                                <div class="row">
                                    <div class="col-md-5 col-sm-3 col-xs-12 view-mode">

                                        <div class="list-view">
                                            <button class="btn btn-default grid active" data-view="grid"
                                                data-toggle="tooltip" data-original-title="Grid"><i
                                                    class="fa fa-th"></i></button>
                                            <button class="btn btn-default list" data-view="list" data-toggle="tooltip"
                                                data-original-title="List"><i class="fa fa-th-list"></i></button>
                                        </div>

                                    </div>
                                    <div class="short-by-show form-inline text-right col-md-7 col-sm-9 col-xs-12">
                                        <div class="form-group short-by">
                                            <label class="control-label" for="input-sort">Sort By:</label>
                                            <select id="input-sort" class="form-control" onchange="location = this.value;">
                                                <option value="" selected="selected">Default</option>
                                                <option value="">Name (A - Z)</option>
                                                <option value="">Name (Z - A)</option>
                                                <option value="">Price (Low &gt; High)</option>
                                                <option value="">Price (High &gt; Low)</option>
                                                <option value="">Rating (Highest)</option>
                                                <option value="">Rating (Lowest)</option>
                                                <option value="">Model (A - Z)</option>
                                                <option value="">Model (Z - A)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="input-limit">Show:</label>
                                            <select id="input-limit" class="form-control" onchange="location = this.value;">
                                                <option value="" selected="selected">15</option>
                                                <option value="">25</option>
                                                <option value="">50</option>
                                                <option value="">75</option>
                                                <option value="">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- //end Filters -->
                            <!--changed listings-->
                            <div class="products-list row nopadding-xs so-filter-gird">
                                @foreach ($products as $item)
                                    <div class="product-layout col-lg-3 col-md-4 col-sm-4 col-xxs-6 col-xs-12">
                                        <div class="product-item-container">
                                            <div class="left-block left-b">
                                                {{-- <div class="product-card__gallery product-card__left">
                                                    <div class="item-img thumb-active"
                                                        data-src="/image/catalog/demo/product/electronic/600x600/3-1.jpg">
                                                        <img src="/image/catalog/demo/product/electronic/90x90/3-1.jpg"
                                                            alt="image">
                                                    </div>
                                                    <div class="item-img"
                                                        data-src="/image/catalog/demo/product/electronic/600x600/3-2.jpg">
                                                        <img src="/image/catalog/demo/product/electronic/90x90/3-2.jpg"
                                                            alt="image">
                                                    </div>
                                                    <div class="item-img"
                                                        data-src="/image/catalog/demo/product/electronic/600x600/3.jpg">
                                                        <img src="/image/catalog/demo/product/electronic/90x90/3.jpg"
                                                            alt="image">
                                                    </div>
                                                </div> --}}
                                                <div class="product-image-container">
                                                    <a href="{{ route('product-detail', ['product' => $item]) }}"
                                                        target="_self" title="Drutick lanaeger">
                                                        <img src="{{ asset($item->images->count() ? 'storage/' . $item->images->first()->src : 'dist/images/default.jpg') }}"
                                                            class="img-1 img-responsive" alt="image">
                                                    </a>
                                                </div>

                                                <!--quickview-->
                                                <a class="iframe-link btn-button quickview quickview_handler visible-lg"
                                                    href="{{ route('quickview', ['product' => $item]) }}"
                                                    title="Quick view" data-fancybox-type="iframe"><i
                                                        class="fa fa-eye"></i><span></span></a>
                                                <!--end quickview-->
                                            </div>
                                            <div class="right-block right-b">

                                                <div class="caption">
                                                    <h4><a href="{{ route('product-detail', ['product' => $item]) }}"
                                                            title="Drutick lanaeger"
                                                            target="_self">{{ $item->name }}</a></h4>
                                                    <div class="rate-history">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o  fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o  fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o  fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o  fa-stack-1x"></i><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="fa fa-star-o fa-stack-1x"></i></span>
                                                            </div>
                                                            <a class="rating-num" href="#" target="_blank">(0)</a>
                                                        </div>
                                                        <div class="order-num">Orders (2)</div>
                                                    </div>
                                                    <div class="price"> <span
                                                            class="price-new">{{ ch_currency($item->price) }}</span>
                                                    </div>
                                                    <div class="button-group so-quickview cartinfo--static">
                                                        <button type="button" class="addToCart" title="Add to cart"
                                                            onclick="cart.add('60 ');"> <i
                                                                class="fa fa-shopping-basket"></i>
                                                            <span>Add to cart </span>
                                                        </button>
                                                        <button type="button" class="wishlist btn-button"
                                                            title="Add to Wish List" onclick="wishlist.add('60');"><i
                                                                class="fa fa-heart"></i><span></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--// End Changed listings-->
                            <!-- Filters -->
                            <div class="product-filter product-filter-bottom filters-panel">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <ul class="pagination">
                                            <li class="active">
                                                <span>1</span>
                                            </li>
                                            <li>
                                                <a href="#">2</a>
                                            </li>
                                            <li>
                                                <a href="#">3</a>
                                            </li>
                                            <li><a href="#">&gt;</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 text-right text-show">Showing 1 to 15 of 15 (1 Pages)</div>
                                </div>
                            </div>
                            <!-- //end Filters -->

                        </div>

                    </div>
                    <!--Middle Part End-->
                </div>
                <!--Middle Part End-->
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection

@section('script')
@endsection
