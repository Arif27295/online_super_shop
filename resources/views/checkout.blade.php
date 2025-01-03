@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="row mt-3">
			<div class="col-12">
				<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> Chackout</span></p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="mb-4 pb-4"></div>
				<section class="shop-checkout container">
				  <h2 class="page-title">CHECKOUT</h2>
				  <div class="checkout-steps">
					<a href="cart.html" class="checkout-steps__item active">
					  <span class="checkout-steps__item-number">01</span>
					  <span class="checkout-steps__item-title">
						<span>Shopping Bag</span>
						<em>Manage Your Items List</em>
					  </span>
					</a>
					<a href="checkout.html" class="checkout-steps__item active">
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
		<div class="row container mt-5 mb-5" style="margin:auto;">
            <div class="col-8">
				<form action="{{route('place_order')}}" method="post">
					@csrf 
					@if($address)
					<div class="row">
							<div class="col-6">
								<label class="account-login-label">Full Name *</label><br>
								<input class="account-login-input"  name="name" readonly value="{{$address->name}}" type='text'>
							</div>
							<div class="col-6">
								<label class="account-login-label">Phone Number *</label><br>
								<input class="account-login-input" name="phone" readonly value="{{$address->phone}}" type='number'>
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
								<label class="account-login-label">pincode *</label><br>
								<input class="account-login-input" name="zip" readonly value="{{$address->zip}}" type='number'>
							</div>
							<div class="col-4">
								<label class="account-login-label">State *</label><br>
								<input class="account-login-input" name="state" readonly value="{{$address->state}}" type='text'>
							</div>
							<div class="col-4">
								<label class="account-login-label">Town / City *</label><br>
								<input class="account-login-input" name="city" readonly value="{{$address->city}}" type='text'>
							</div>
						</div><br>
						<div class="row">
							<div class="col-6">
								<label class="account-login-label">House no, Building Name *</label><br>
								<input class="account-login-input" name="address" readonly value="{{$address->address}}" type='text'>
							</div>
							<div class="col-6">
								<label class="account-login-label">Road Name, Area, Colony *</label><br>
								<input class="account-login-input" name="locality" readonly value="{{$address->locality}}" type='text'>
							</div>
						</div><br>
						<div class="row">
							<div class="col-12">
								<label class="account-login-label">Landmark *</label><br>
								<input class="account-login-input" name="landmark" readonly value="{{$address->landmark}}" type='text'>
							</div>
						</div>

					@else


						<div class="row">
							<div class="col-6">
								<label class="account-login-label">Full Name *</label><br>
								<input class="account-login-input" name="name" value="{{old('name')}}" type='text'>
								@error('name') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
							<div class="col-6">
								<label class="account-login-label">Phone Number *</label><br>
								<input class="account-login-input" name="phone" value="{{old('phone')}}" type='number'>
								@error('phone') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
								<label class="account-login-label">pincode *</label><br>
								<input class="account-login-input" name="zip" value="{{old('zip')}}" type='number'>
								@error('zip') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
							<div class="col-4">
								<label class="account-login-label">State *</label><br>
								<input class="account-login-input" name="state" value="{{old('state')}}" type='text'>
								@error('state') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
							<div class="col-4">
								<label class="account-login-label">Town / City *</label><br>
								<input class="account-login-input" name="city" value="{{old('city')}}" type='text'>
								@error('city') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
						</div><br>
						<div class="row">
							<div class="col-6">
								<label class="account-login-label">House no, Building Name *</label><br>
								<input class="account-login-input" name="address" value="{{old('address')}}" type='text'>
								@error('address') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
							<div class="col-6">
								<label class="account-login-label">Road Name, Area, Colony *</label><br>
								<input class="account-login-input" name="locality" value="{{old('locality')}}" type='text'>
								@error('locality') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
						</div><br>
						<div class="row">
							<div class="col-12">
								<label class="account-login-label">Landmark *</label><br>
								<input class="account-login-input" name="landmark" value="{{old('landmark')}}" type='text'>
								@error('landmark') <span class="text-danger"> {{$message}} </span> @enderror
							</div>
						</div>
				@endif
			</div>
			  <div class="col-4">
					<div class="pb-4 pt-4" style="border:1px solid #e4e5ee;padding:0px 20px;border-radius:6px;">
						<span class="checkout-steps__item-title" style="border-bottom:1px solid #e4e5ee;padding:.75rem">
							<span>Your Order</span>
						</span>
						<table class="cart-table cart_totals">
							<tbody>
								<tr>
									<th>Product</th>
									<td>Subtotal</td>
								</tr>
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
						<div class="mt-4 mb-4">
							<div class="form-check">
							  <input type="radio" class="form-check-input" id="radio3" name="mode" value="cod" checked>Cash on delivery
							  <label class="form-check-label" for="radio3"></label>
							</div>
							<div class="form-check">
							  <input type="radio" class="form-check-input" id="radio1" name="mode" value="card">Debit or Credit Card
							  <label class="form-check-label" for="radio1"></label>
							</div>
							<div class="form-check">
							  <input type="radio" class="form-check-input" id="radio2" name="mode" value="paypal">Paypal
							  <label class="form-check-label" for="radio2"></label>
							</div>
						</div>
						<p class="cackout-description">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#" style="color:#ed174a">privacy policy</a>.</p>
						<div style="text-align:center;padding:.75rem"><button type="submit" class="cart-btn btn mt-3" style="background:#d51243;width:100%">Place Order</button></div>
					</div>
                </form>
			</div>
@endsection