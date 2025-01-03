@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="row mt-3">
			<div class="col-12">
				<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> Order Recived</span></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="mb-4 pb-4"></div>
				<section class="shop-checkout container">
				  <h2 class="page-title">ORDER RECIVED</h2>
				  <div class="checkout-steps">
					<a href="cart.html" class="checkout-steps__item active">
					  <span class="checkout-steps__item-number">01</span>
					  <span class="checkout-steps__item-title">
						<span>Shopping Bag</span>
						<em>Manage Your Items List</em>
					  </span>
					</a>
					<a href="cart.html" class="checkout-steps__item active">
					  <span class="checkout-steps__item-number">02</span>
					  <span class="checkout-steps__item-title">
						<span>Shipping and Checkout</span>
						<em>Checkout Your Items List</em>
					  </span>
					</a>
					<a href="order-confirmation.html" class="checkout-steps__item active">
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
		<div class="row container mt-5 mb-5" style="margin:auto;">
			<div class="col-12" style="text-align:center;">
				<h2 class="page-title"><i class="ri-check-fill"></i></h2>
				<h2 class="page-title" style="margin-bottom:7px;">Your order is completed!</h2>
				<span class="shop-checkout">
					<span class="checkout-steps__item-title mb-5">
							<em>Thank you. Your order has been received.</em>
					</span>
				</span>
				<div class="row d-flex justify-content-center">
					<div class="col-10 recived-table pt-5 pb-5">
						<table>
							<thead>
								<tr>
									<th>Order Number</th>
									<th>Date</th>
									<th>Total</th>
									<th>Payment Method</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$order->id}}</td>
									<td>{{$order->created_at}}</td>
									<td>${{$order->total}}</td>
									<td>{{$order->transection->mode}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-10 pt-5 pb-5 p-0">
						<div class="pb-4 pt-4" style="border:2px dashed #767676;padding:0px 63px;">
							<span class="checkout-steps__item-title" style="border-bottom:1px solid #e4e5ee;padding:.75rem">
								<span style="text-align:start;">Your Order</span>
							</span>
							<table class="cart-table cart_totals order-received-table">
								<tbody>
									<tr>
										<th><strong>Product</strong></th>
										<td><strong>Subtotal</strong></td>
									</tr>
									
									<tr>
										<th>
											@foreach($products as $product)
												<span>{{$product->name}}<span><br><br>
											@endforeach
										</th>
										<td>
											@foreach($order->orderItem as $item)
											<span>${{$item->price}}</span><br><br>	
											@endforeach
										</td>
									</tr>
									<tr>
										<th>Subtotal</th>
										<td>${{$order->subtotal}}</td>
									</tr>
									<tr>
										<th>Discount</th>
										<td>00</td>
									</tr>
									<tr>
										<th>Shipping</th>
										<td>Free</td>
									</tr>
									<tr>
										<th>Vat</th>
										<td>${{$order->tax}}</td>
									</tr>
									<tr>
										<th><strong>Total</strong></th>
										<td><strong>${{$order->total}}</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<a href="{{route('home')}}"><button type="submit" class="cart-btn btn mt-3" style="width:20%">Go To Home</button></a>
				</div>
			</div>
		</div>
@endsection