@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(isset($cart_data))
                        @if(Cookie::get('shopping_cart'))
                            @php $total="0" @endphp
                            <div class="shopping-cart">
                                <div class="shopping-cart-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered my-auto  text-center">
                                            <thead>
                                            <tr>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="cart-price">Price</th>
                                                <th class="cart-qty">Quantity</th>
                                                <th class="cart-total">Grandtotal</th>
                                                <th class="cart-romove">Remove</th>
                                            </tr>
                                            </thead>
                                            <tbody class="my-auto">
                                            @foreach ($cart_data as $data)
                                                <tr class="cartpage">
                                                    <td class="cart-product-name-info">
                                                        <h4 class='cart-product-description'>
                                                            <a href="javascript:void(0)">{{ $data['item_name'] }}</a>
                                                        </h4>
                                                    </td>
                                                    <td class="cart-product-sub-total">
                                                        <span class="cart-sub-total-price">{{ number_format($data['item_price'], 2) }}</span>
                                                    </td>
                                                    <td class="cart-product-quantity">
                                                       {{ $data['item_quantity'] }}
                                                    </td>
                                                    <td class="cart-product-grand-total">
                                                        <span class="cart-grand-total-price">{{ number_format($data['item_quantity'] * $data['item_price'], 2) }}</span>
                                                    </td>
                                                    <td style="font-size: 20px;">
                                                        <a href="/cart/delete/{{ $data['item_id'] }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table><!-- /table -->
                                    </div>
                                </div><!-- /.shopping-cart-table -->
                                <div class="row">

                                    <div class="col-md-4 col-sm-12 mt-5">
                                        <div class="cart-shopping-total">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="cart-subtotal-name">Total</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="cart-subtotal-price">
                                                        <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }} AMD</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="cart-checkout-btn text-center">
                                                        @if (Auth::user())
                                                            <a href="/worker/checkout" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                        @else
                                                            <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /.shopping-cart -->
                        @endif
                    @else
                        <div class="row">
                            <div class="col-md-12 mycard py-5 text-center">
                                <div class="mycards">
                                    <h4>Your cart is currently empty.</h4>
                                    <a href="/worker/product" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div> <!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
