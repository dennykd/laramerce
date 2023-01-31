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
                        <p>Order History</p>
                    </li>
                </ul>

                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="">
                        <h2 class="title">Order History</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-center">No</td>
                                        <td class="text-center">Order ID</td>
                                        <td class="text-center">Status Order</td>
                                        <td class="text-right">Total</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}
                                            </td>
                                            <td class="text-center">{{ $item->transaction_id }}</td>
                                            <td class="text-center">{{ $item->transaction_status }}</td>
                                            <td class="text-right">{{ ch_currency($item->gross_amount) }}</td>
                                            <td class="text-center"><a class="btn btn-info" title=""
                                                    data-toggle="tooltip"
                                                    href="{{ route('order_detail', ['order' => $item]) }}"
                                                    data-original-title="View"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--Middle Part End-->
                </div>
            </div>
            <!-- //Main Container -->
            {{-- @include('frontpage.frontpage-footer') --}}
        </div>
    </div>
@endsection
