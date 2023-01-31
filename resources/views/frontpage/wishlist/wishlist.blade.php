@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1 layout-subpage">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>Account</p>
                    </li>
                    <li>
                        <p>My Wish List</p>
                    </li>
                </ul>

                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-9">
                        <h2 class="title">My Wish List</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-center">Image</td>
                                        <td class="text-left">Product Name</td>
                                        <td class="text-left">Brand</td>
                                        <td class="text-right">Stock</td>
                                        <td class="text-right">Unit Price</td>
                                        <td class="text-right">Action</td>
                                    </tr>
                                </thead>
                                <tbody id="wishlist-body-to-identify">
                                    @if (auth()->user())
                                        @forelse ($wishlist as $item)
                                            <tr data-product_code="{{ $item->product_code }}">
                                                <td class="text-center">
                                                    <a href="product.html"><img width="70px"
                                                            src="{{ asset($item->product->images->count() ? 'storage/' . $item->product->images->first()->src : '/image/catalog/demo/product/80/2.jpg') }}"
                                                            alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
                                                    </a>
                                                </td>
                                                <td class="text-left"><a
                                                        href="product.html">{{ Str::words($item->product->name, 6, '...') }}</a>
                                                </td>
                                                <td class="text-left">{{ $item->product->brand->name }}</td>
                                                <td class="text-right">
                                                    {{ $item->product->stock > 0 ? 'In Stock' : 'Out Stock' }}</td>
                                                <td class="text-right">
                                                    <div class="price">
                                                        {{ ch_currency($item->product->price) }}</div>

                                                </td>
                                                <td class="text-right">
                                                    <button class="btn btn-primary" title="" data-toggle="tooltip"
                                                        onclick="cart.add('{{ $item->product_code }}', '{{ $item->user_id }}', '1');"
                                                        type="button" data-original-title="Add to Cart"><i
                                                            class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-danger" title="" data-toggle="tooltip"
                                                        onclick="wishlist.remove('{{ $item->product_code }}', '{{ $item->user_id }}');"
                                                        type="button" data-original-title="Remove"><i
                                                            class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Product Here</td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Login First To Open Wishlist</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--Middle Part End-->
                    <aside class="col-sm-3 hidden-xs" id="column-right">
                        <h2 class="subtitle">Account</h2>
                        <div class="list-group">
                            <ul class="list-item">
                                <li><a href="login.html">Login</a>
                                </li>
                                <li><a href="register.html">Register</a>
                                </li>
                                <li><a href="#">Forgotten Password</a>
                                </li>
                                <li><a href="#">My Account</a>
                                </li>
                                <li><a href="#">Address Books</a>
                                </li>
                                <li><a href="wishlist.html">Wish List</a>
                                </li>
                                <li><a href="#">Order History</a>
                                </li>
                                <li><a href="#">Downloads</a>
                                </li>
                                <li><a href="#">Reward Points</a>
                                </li>
                                <li><a href="#">Returns</a>
                                </li>
                                <li><a href="#">Transactions</a>
                                </li>
                                <li><a href="#">Newsletter</a>
                                </li>
                                <li><a href="#">Recurring payments</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection
