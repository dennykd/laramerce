@extends('layouts.front-layout')
@section('body')
    <div class="res layout-1">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>Shopping Cart</p>
                    </li>
                </ul>

                <form class="row" action="{{ route('checkout') }}" method="POST">
                    @csrf
                    {{-- hidden value --}}
                    <input type="hidden" id="cart-total-weight" name="weight" value="{{ $weight }}">
                    <input type="hidden" id="cart-total-weight" name="user[name]" value="{{ $isUser->name }}">
                    <input type="hidden" id="cart-total-weight" name="user[id]" value="{{ $isUser->id }}">
                    {{-- hidden value --}}
                    {{-- hidden value --}}
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h2 class="title">Shopping Cart</h2>
                        <div class="table-responsive form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center">Image</td>
                                        <td class="text-left">Product Name</td>
                                        <td class="text-left">Brand</td>
                                        <td class="text-left">Quantity</td>
                                        <td class="text-right">Unit Price</td>
                                        <td class="text-right">Total</td>
                                    </tr>
                                </thead>
                                <tbody id="cart-item-list">
                                    @foreach ($cart as $product)
                                        <tr data-sub_total="{{ $product->product->price * $product->amount }}"
                                            data-product="{{ $product->product_id }}"
                                            data-price="{{ $product->product->price }}">
                                            <td class="text-center"><a
                                                    href="{{ route('product-detail', ['product' => $product->product]) }}"><img
                                                        width="70px" height="70px"
                                                        src="{{ asset($product->product->images->count() ? 'storage/' . $product->product->images->first()->src : 'image/catalog/demo/product/funiture/8.jpg') }}"
                                                        alt="{{ Str::limit($product->product->name, 10, '...') }}"
                                                        title="{{ $product->product->name }}" class="img-thumbnail" /></a>
                                            </td>
                                            <td class="text-left"><a
                                                    href="{{ route('product-detail', ['product' => $product->product]) }}">{{ $product->product->name }}</a><br />
                                                <span>{{ $product->product->weight }}</span>
                                            </td>
                                            <td class="text-left">{{ $product->product->brand->name }}</td>
                                            <td class="text-left" width="200px">
                                                <div class="input-group btn-block quantity">
                                                    <input type="text" name="cart[{{ $loop->index }}][quantity]"
                                                        id="{{ $product->product_id }}-quantity"
                                                        value="{{ $product->amount }}" size="1"
                                                        max="{{ $product->product->stock }}" class="form-control" />
                                                    <input type="hidden" name="cart[{{ $loop->index }}][product][code]"
                                                        value="{{ $product->product_id }}">
                                                    <input type="hidden" name="cart[{{ $loop->index }}][product][name]"
                                                        value="{{ $product->product->name }}">
                                                    <input type="hidden" name="product_code[{{ $loop->index }}]"
                                                        value="{{ $product->product_id }}">
                                                    <span class="input-group-btn">
                                                        <button type="button" data-toggle="tooltip"
                                                            onclick="update_quantity('{{ $product->product_id }}', '{{ $isUser ? $isUser->id : 0 }}')"
                                                            title="Update" class="btn btn-primary"><i
                                                                class="fa fa-clone"></i></button>
                                                        <button type="button" data-toggle="tooltip" title="Remove"
                                                            class="btn btn-danger" onClick=""><i
                                                                class="fa fa-times-circle"></i></button>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-right">{{ ch_currency($product->product->price) }}</td>
                                            <td class="text-right">
                                                {{ ch_currency($product->product->price * $product->amount) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h3 class="subtitle no-margin">What would you like to do next?</h3>
                        <p>Choose if you have a discount code or reward points you want to use or would like to estimate
                            your delivery cost.</p>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapse-shipping" class="accordion-toggle" data-toggle="collapse"
                                            data-parent="#accordion" aria-expanded="false">Estimate
                                            Shipping &amp; Taxes

                                            <i class="fa fa-caret-down"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false"
                                    style="height: 0px;">
                                    <div class="panel-body">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="form-horizontal">
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label"
                                                    for="input-province">Province</label>
                                                <div class="col-sm-10">
                                                    <select name="province_id" id="input-province" class="form-control"
                                                        onchange="getCity(this.value)">
                                                        <option value=""> --- Please Select --- </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-city">City</label>
                                                <div class="col-sm-10">
                                                    <select name="city_id" id="input-city" class="form-control">
                                                        <option value=""> --- Please Select --- </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-postcode">Post
                                                    Code</label>
                                                <div class="col-sm-10"><input type="text" name="postcode"
                                                        value="" placeholder="Post Code" id="input-postcode"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <button type="button" id="button-quote" data-loading-text="Loading..."
                                                class="btn btn-primary" onclick="getCost()">Get Quotes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead><b>Pembeli</b></thead>
                                    <tbody id="package-receiver">
                                        <tr>
                                            <td class="text-right">
                                                <strong>Provinsi :</strong>
                                            </td>
                                            <td class="text-right" id="">...
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Kota :</strong>
                                            </td>
                                            <td class="text-right" id="">...
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Alamat :</strong>
                                            </td>
                                            <td class="text-right" id="">...</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>No Telp :</strong>
                                            </td>
                                            <td class="text-right" id="">...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead><b>Pengirim</b></thead>
                                    <tbody id="package-sender">
                                        <tr>
                                            <td class="text-right">
                                                <strong>Provinsi :</strong>
                                            </td>
                                            <td class="text-right" id="">...
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Kota :</strong>
                                            </td>
                                            <td class="text-right" id="">...
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Alamat :</strong>
                                            </td>
                                            <td class="text-right" id="">...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <thead><b>Pesanan</b></thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Sub-Total:</strong>
                                            </td>
                                            <td class="text-right" data-sub_total="0" id="summary-cart-subtotal">IDR 0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Shipping Fee (JNE):</strong>
                                            </td>
                                            <td class="text-right" data-cart_shipping_fee="0" id="cart-shipping-fee">IDR
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                <strong>Total:</strong>
                                            </td>
                                            <td class="text-right" data-total="0" id="cart-total-pay">IDR 0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="buttons">
                            <div class="pull-left"><a href="{{ route('main') }}" class="btn btn-primary">Continue
                                    Shopping</a>
                            </div>
                            <div class="pull-right"><button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->

                </form>
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/frontpage/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/api/province",
                type: "GET",
                beforeSend: () => {
                    $("#input-province").append(
                        ` <option value=""> Getting Data, Please Wait... </option>`
                    );
                },
                success: (result) => {
                    $("#input-province").children()[1].remove();
                    result.forEach((item) => {
                        $("#input-province").append(
                            ` <option value="${item.province_id}"> ${item.province} </option>`
                        );
                    });
                },
            });

            // summary cart sub total part
            $("#summary-cart-subtotal").html(
                new Intl.NumberFormat("id", {
                    style: "currency",
                    currency: "IDR",
                }).format(calculate_subtotal())
            );

            $("#summary-cart-subtotal").attr("data-sub_total", calculate_subtotal());
            // summary cart sub total part

            // summary total part
            total_to_html();
            // summary total part
        });
    </script>
@endsection
