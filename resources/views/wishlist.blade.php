@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="row mt-3">
			<div class="col-12">
				<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> Wishlist</span></p>
			</div>
		</div>
		@if(Cart::instance('wishlist')->content()->count() > 0)	
        <div class="row container" style="margin:auto;">
				<div class="col-9 mt-5 mb-5">
					<table class="cart-table wishlist-table">
						<thead>
							<tr>
								<th><input type="checkbox"></th>
								<th></th>
								<th></th>
								<th class="border-end-0 border-start-0">Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            @foreach($items as $item)
							<tr>
								<td><input type="checkbox"></td>
								<td>
                                    <form id="wishlist_form" action="{{route('destroy_wishlist', $item->rowId)}}" method="post">
                                        @csrf
                                        <i class="ri-close-fill" onclick="document.getElementById('wishlist_form').submit()" style="font-size:18px;cursor:pointer"></i>
                                    </form>
                                </td>
								<td><img src="{{asset('product_image')}}/{{$item->model->image}}" alt="{{$item->name}}"></td>
								<td>{{$item->name}}</td>
								<td>${{$item->price}}</td>
								<td>
									<div id="field1" style="display:inline-flex">
                                        <form action="{{route('wishlist_decrease', $item->rowId)}}" method="post">
                                            @csrf 
                                            @method("put")
                                            <button type="submit" id="sub" class="sub me-2">-</button>
                                        </form>
                                        <input type="number" readonly id="1" value="{{$item->qty}}" min="1"/>
                                        <form action="{{route('wishlist_increase',$item->rowId)}}" method="post">
                                            @csrf 
                                            @method("put")    
                                            <button type="submit" id="add" class="add">+</button>
                                        </form>
									</div>
								</td>
								<td>${{$item->subtotal}}</td>
								<td>
                                    <form action="{{route('move_to_cart', $item->rowId)}}" method="post">
                                        @csrf
                                        <button type="submit" class="cart-btn btn">Add to Cart</button>
                                    </form>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
					<div class="d-flex justify-content-between mt-5 mb-5">	
						<div style="display:inline-flex">
							<form action="{{route('remove_wishlist')}}" method="post">
								@csrf 
								@method("DELETE")
								<button type="submit" class="cart-btn btn bg-danger">Clear Wishlist</button>
							</form>
						</div>
						<div style="display:inline-flex">
							<button class="cart-btn btn me-2">Add selected to Cart</button>
							<form action="{{route('all_move_cart')}}" method="post">
								@csrf
								<button type="submit" class="cart-btn btn">Add All to Cart</button>
							</form>
							</div>
					</div>
				</div>
				<div class="col-3 mt-5 mb-5">
					<div class="pb-4 pt-4" style="border:1px solid #e4e5ee;padding:0px 20px;border-radius:6px;">
						<span class="checkout-steps__item-title" style="border-bottom:1px solid #e4e5ee;padding:.75rem">
							<span>WISHLIST TOTALS</span>
						</span>
						<table class="cart-table cart_totals">
							<tbody>
								<tr>
									<th>Subtotal</th>
									<td>${{Cart::instance('wishlist')->subtotal()}}</td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td>Free</td>
								</tr>
								<tr>
									<th>Vat</th>
									<td>${{Cart::instance('wishlist')->tax()}}</td>
								</tr>
								<tr style="border-bottom:0px;">
									<th>Total</th>
									<td>${{Cart::instance('wishlist')->total()}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
            @else
            <div class="container mt-5 mb-5">
             <a href="{{route('shop')}}"> <button type="submit" class="cart-btn btn">Wishlist Now</button></a>
            </div>
        @endif
@endsection