@extends('layouts.front-layout')
@section('head')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endsection
@section('body')
    <div class="res layout-1">
        <div id="wrapper" class="wrapper-fluid banners-effect-5">
            @include('frontpage.frontpage-navbar')
            <!-- Main Container  -->
            <div class="main-container container">
                {{-- hidden value --}}
                <input type="hidden" id="cart-total-weight" name="weight" value="{{ $weight }}">
                <input type="hidden" id="cart-total-weight" name="user[name]" value="{{ $order->name }}">
                <input type="hidden" id="cart-total-weight" name="user[id]" value="{{ $order->user_id }}">
                {{-- hidden value --}}
                <ul class="breadcrumb">
                    <li><a href="{{ route('main') }}"><i class="fa fa-home"></i></a></li>
                    <li>
                        <p>Checkout</p>
                    </li>

                </ul>

                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h2 class="title">Checkout</h2>
                        <div class="so-onepagecheckout row">
                            <div class="col-left col-sm-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                                    </div>
                                    <div class="panel-body">
                                        <fieldset id="account">
                                            <div class="form-group required">
                                                <label for="input-payment-fullname" class="control-label">Full
                                                    Name</label>
                                                <input type="text" class="form-control" id="input-payment-fullname"
                                                    placeholder="Your Name" value="{{ $order->name }}"
                                                    name="user[fullname]" readonly>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-email" class="control-label">E-Mail</label>
                                                <input type="text" class="form-control" id="input-payment-email"
                                                    placeholder="E-Mail" value="{{ $order->email }}" name="user[email]"
                                                    readonly>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-telephone" class="control-label">Telephone</label>
                                                <input type="text" class="form-control" id="input-payment-telephone"
                                                    placeholder="Telephone" value="{{ $order->phone }}"
                                                    name="user[telephone]" readonly>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                                    </div>
                                    <div class="panel-body">
                                        <fieldset id="address" class="required">
                                            <div class="form-group required">
                                                <label for="input-payment-country" class="control-label">Province</label>
                                                <select id="input-province" class="form-control" disabled
                                                    name="destination[province_id]">
                                                    <option value="">{{ $order->province }} </option>

                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-zone" class="control-label">City</label>
                                                <select name="destination[city_id]" id="input-city" disabled
                                                    class="form-control" name="city_id">
                                                    <option value=""> {{ $order->city }} </option>

                                                </select>
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-address-1" class="control-label">Address
                                                    1</label>
                                                <input type="text" class="form-control" readonly
                                                    id="input-payment-address-1" value="{{ $order->address }}"
                                                    name="user[address]">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-right col-sm-9">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center">Image</td>
                                                                <td class="text-left">Product Name</td>
                                                                <td class="text-left">Quantity</td>
                                                                <td class="text-right">Unit Price</td>
                                                                <td class="text-right">Total</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="cart-item-list">
                                                            {{-- @dump($cart) --}}
                                                            @foreach ($cart as $item)
                                                                <tr data-sub_total="{{ $item->price * $item->quantity }}"
                                                                    data-product="{{ $item->product_code }}"
                                                                    data-price="{{ $item->price }}">
                                                                    <td class="text-center"><a href="product.html"><img
                                                                                width="60px"
                                                                                src="{{ asset($item->product->images->count() ? 'storage/' . $item->product->images->first()->src : '/image/catalog/demo/product/funiture/10.jpg') }}"
                                                                                alt="Xitefun Causal Wear Fancy Shoes"
                                                                                title="Xitefun Causal Wear Fancy Shoes"
                                                                                class="img-thumbnail"></a></td>
                                                                    <td class="text-left"><a
                                                                            href="product.html">{{ $item->name }}</a>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <div class="input-group btn-block"
                                                                            style="min-width: 100px;">
                                                                            <input type="hidden"
                                                                                name="cart[{{ $loop->index }}][name]"
                                                                                id="{{ $item->product_code }}-name"
                                                                                value="{{ $item->name }}"
                                                                                class="form-control">
                                                                            <input type="hidden"
                                                                                name="cart[{{ $loop->index }}][product_code]"
                                                                                id="{{ $item->product_code }}-product_code"
                                                                                value="{{ $item->product_code }}"
                                                                                class="form-control">
                                                                            <input type="text" readonly
                                                                                name="cart[{{ $loop->index }}][quantity]"
                                                                                id="{{ $item->product_code }}-quantity"
                                                                                value="{{ $item->quantity }}"
                                                                                max="{{ $item->stock }}"
                                                                                class="form-control">
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">{{ ch_currency($item->price) }}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        {{ ch_currency($item->price * $item->quantity) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Sub-Total:</strong>
                                                                </td>
                                                                <td data-sub_total="0" id="summary-cart-subtotal"
                                                                    class="text-right">IDR 0</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Shipping Fee:</strong>
                                                                </td>
                                                                <td class="text-right" data-cart_shipping_fee="0"
                                                                    id="cart-shipping-fee">
                                                                    {{ ch_currency($order->cost) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Total:</strong>
                                                                </td>
                                                                <td data-total="0" class="text-right">
                                                                    {{ ch_currency($order->gross_amount) }}
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-pencil"></i> Your Message </h4>
                                            </div>
                                            <div class="panel-body">
                                                <textarea readonly rows="4" class="form-control" id="confirm_comment" name="comments">{{ strip_tags($order->comments) }}</textarea>
                                                <br>

                                                @if ($order->transaction_status == 'pending')
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-primary"
                                                                id="pay-button">
                                                                Pay Now</button>
                                                        </div>
                                                    </div>
                                                @elseif ($order->transaction_status == 'settlement')
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-primary">
                                                                Order Complete</button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-primary">
                                                                Order Cancel</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->

                </div>
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/js/frontpage/cart.js') }}"></script>
    {{-- page script --}}
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
    {{-- page script --}}
    {{-- midtrans script --}}
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */

                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */

                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */

                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                }
            })
        });
    </script>
    {{-- midtrans script --}}
@endsection
