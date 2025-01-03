@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="row mt-3">
			<div class="col-12">
				<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> Cart</span></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="mb-4 pb-4"></div>
				<section class="shop-checkout container">
				  <h2 class="page-title">Cart</h2>
				  <div class="checkout-steps">
					<a href="cart.html" class="checkout-steps__item active">
					  <span class="checkout-steps__item-number">01</span>
					  <span class="checkout-steps__item-title">
						<span>Shopping Bag</span>
						<em>Manage Your Items List</em>
					  </span>
					</a>
					<a href="checkout.html" class="checkout-steps__item">
					  <span class="checkout-steps__item-number">02</span>
					  <span class="checkout-steps__item-title">
						<span>Shipping and Checkout</span>
						<em>Checkout Your Items List</em>
					  </span>
					</a>
					<a href="order-confirmation.html" class="checkout-steps__item">
					  <span class="checkout-steps__item-number">03</span>
					  <span class="checkout-steps__item-title">
						<span>Confirmation</span>
						<em>Review And Submit Your Order</em>
					  </span>
					</a>
				  </div>
				</section>
			</div>
		</div>
            @if(Cart::instance('cart')->content()->count() > 0)
			<div class="row container" style="margin:auto;">
				<div class="col-8 mt-5 mb-5">
					<table class="cart-table">
						<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            @foreach($items as $item)
							<tr>
								<td><img src="{{asset('product_image')}}/{{$item->model->image}}" alt="{{$item->model->image}}"></td>
								<td>{{$item->name}}</td>
								<td>${{$item->price}}</td>
								<td>
									<div id="field1" style="display:inline-flex;">
                                        <form action="{{route('decrease',$item->rowId)}}" method="post">
                                            @csrf
                                            @method("PUT")
										    <button type="submit" id="sub" class="sub me-2">-</button>
                                        </form>
                                        <input type="number" readonly id="1" value="{{$item->qty}}" min="1"/>
                                        <form action="{{route('increase', ['rowId'=>$item->rowId])}}" method="post">
                                            @csrf
                                            @method("PUT")
										    <button type="submit" id="add" class="add">+</button>
                                        </form>
									</div>
								</td>
								<td>${{$item->subtotal}}</td>
								<td>
                                    <form action="{{route('remove_cart_item', $item->rowId)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <div id="field1">    
                                            <button type="submit" class="add bg-white"><i class="ri-close-fill" style="font-size:18px;cursor:pointer"></i></button>
                                        </div>
                                    </form>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
					<div class="d-flex justify-content-between mt-5 mb-5">	
						<div style="display:inline-flex">
							<input class="account-login-input" type='text' style="width:180px;height:38px;margin-right:12px;">
							<button class="cart-btn btn">Apply Coupon</button>
						</div>
						<div>
                            <form action="{{route('clear_cart')}}" method="post">
							    @csrf 
                                @method('DELETE') 
                                <button type="submit" class="cart-btn btn">Remove All</button>
                            </form>
						</div>
					</div>
				</div>
				<div class="col-4 mt-5 mb-5">
					<div class="pb-4 pt-4" style="border:1px solid #e4e5ee;padding:0px 20px;border-radius:6px;">
						<span class="checkout-steps__item-title" style="border-bottom:1px solid #e4e5ee;padding:.75rem">
							<span>CART TOTALS</span>
						</span>
						<table class="cart-table cart_totals">
							<tbody>
								<tr>
									<th>Subtotal</th>
									<td>${{Cart::instance('cart')->subtotal()}}</td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td>Free</td>
								</tr>
								<tr>
									<th>Vat</th>
									<td>${{Cart::instance('cart')->tax()}}</td>
								</tr>
								<tr>
									<th>Total</th>
									<td>${{Cart::instance('cart')->total()}}</td>
								</tr>
							</tbody>
						</table>
						<form action="{{route('checkout')}}" method="post">
							@csrf	
							<div style="text-align:center;padding:.75rem"><button type="submit" class="cart-btn btn mt-3" style="background:#d51243;width:100%">Proceed to checkout</button></div>
						</form>
					</div>
				</div>
			</div>
        @else
        <div class="container mt-5 mb-5">
           <a href="{{route('shop')}}"> <button type="submit" class="cart-btn btn">Shop Now</button></a>
        </div>
        @endif
@endsection