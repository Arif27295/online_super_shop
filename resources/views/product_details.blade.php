@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="container-fluid ps-5 pe-5" style="background:#F7F8FD">
			<div class="row mb-3">
				<div class="col-12 pt-3">
					<p class="woocomerce-header">Home <i class="ri-arrow-right-s-line" style="color:#9b9bb4"></i> <span style="color:#3e445a">Biscuits & snacks</span><i class="ri-arrow-right-s-line" style="color:#9b9bb4"></i><span>{{$product->name}}</span></p>
				</div>
			</div>
			<div class="row p-5" style="background:#fff;border-radius:6px;">
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<h1 class="product-det-name">{{$product->name}}</h1>
							<div class="product-det-brand">Brands: <span>{{{$product->brand->name}}}</span></div>
							<div class="product-det-review">
								@for ($i = 1; $i <= 5; $i++)
									@if ($i <= $product->averageRating())
										<i class="ri-star-fill text-warning"></i>
									@else
										<i class="ri-star-fill"></i>
									@endif
								@endfor
								<span>{{$reviewCountForProduct}} REVIEW</span>
							</div>
							<div class="product-det-badge">SKU: <span>{{$product->SKU}}</span></div>	
						</div>
					</div>
				<div class="row">
					<div class="col-5" style="position:relative;">
						<div><span class="badge badge-style-1" style="background: #2bbef9;">${{$product->pro_discount}}</span></div>
						<div class="w3-content" style="max-width:1200px">
						  <img class="mySlides" src="{{asset('product_image')}}/{{$product->image}}" style="width:100%;">
                         
                          
						  <div class="w3-row-padding w3-section">
                              <div class="w3-col s4">
							     <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('product_image')}}/{{$product->image}}" alt="{{$product->image}}" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
							</div>
                            @foreach($images as $index => $image)
							<div class="w3-col s4">
							  <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('images')}}/{{$image->images}}" alt="{{$image->images}}" style="width:100%;cursor:pointer" onclick="currentDiv({{ $index + 1 }})">
							</div>
                            @endforeach
						  </div>
						</div>		
					</div>
					<div class="col-4 products-details" style="border-bottom:1px solid #e3e4e6">
						<p class="best-selling-rate">
                            @if($product->sale_price)
                                <s>${{$product->regular_price}}</s> ${{$product->sale_price}}
                            @else
                                {{$product->regular_price}}
                            @endif
                        </p>
						<span class="badge badge-style-1 badge-style-2 mt-1">{{$product->stock}}</span>
						<p class="description">{{$product->short_description}}</p>
                        @if(Cart::instance('cart')->content()->where('id',$product->id)->count() > 0)
                            <a href="{{route('cart')}}"><button class="det_add">Go TO CART</button></a>
                        @else
                        <form action="{{route('add_cart')}}" method="post">
                                @csrf
                            <div id="field1">
                                <button type="button" id="sub" class="sub me-2">-</button>
                                <input type="number" name="quantity" readonly id="1" value="1" min="1"/>
                                <button type="button" id="add" class="add">+</button>
                                <button class="det_add">ADD TO CART</button>
                            </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->sale_price == ''? $product->regular_price : $product->sale_price}}">
                        </form>
                        @endif
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="wish_add"><i class="ri-heart-fill"></i> ADD TO WISHLIST</button>       
							<button class="wish_add"><i class="ri-share-line"></i> SHARE</button>
						</div>
						<div class="product-det-brand type"><i class="ri-check-line"></i> Type: {{$product->tags}}</div><br>
						<div class="product-det-brand mt-2" style="width:100%">Category: <span>{{$product->category->name}}</span></div>
					</div>
				</div>	
			</div>
			<div class="row mt-5">
				<div class="col-12">
					<div class="row">
						<div class="col-12 pro_footer_detail">
							<span class="active-detail dis-1">DESCRIPTION</span>
							<span class="dis-2">ADDTIONAL INFORMATION</span>
							<span class="dis-3">REVIEWS({{$reviewCountForProduct}})</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12 pro_footer_detail-des">
							<div class="pro-footer-div-1">
								<p>{{$product->description}}</p>
							</div>
							<div class="pro-footer-div-2" style="display:none">
								<div class="product-det-brand mt-2" style="width:100%">Weight: <span>1.25kg</span></div>
								<div class="product-det-brand mt-2" style="width:100%">Dimensions: <span>90 x 60 x  90 cm</span></div>
								<div class="product-det-brand mt-2" style="width:100%">Size: <span>XS, S, M, L, XL</span></div>
								<div class="product-det-brand mt-2" style="width:100%">Color: <span>Black, Orange, White</span></div>
							</div>
							<div class="pro-footer-div-3" style="display:none">
								<p class="pro_detail-title">{{$reviewCountForProduct}} review for Angie’s Boomchickapop Sweet & Salty Kettle Corn</p>
								@if($reviews->count() > 0)
									@foreach($reviews as $review)
										@if($review->product_id === $product->id)
											<div class="mt-5 mb-5">
												<img src="https://secure.gravatar.com/avatar/dd28514c9a8cfba334e05f21703be28e?s=60&d=mm&r=g" alt="img" style="width:65px;border-radius:100%; float:left;margin-right:20px;">
												<div>
													<div class="product-det-review" style="float:none;">
														@for( $i = 1; $i <= 5; $i++ )
															<i class="ri-star-fill {{ $i <= $review->rating ? 'text-warning' : '' }}"></i>
														@endfor
													</div>
													<strong style="font-size:1rem;font-weight:500">{{$review->user->name}} – <span style="font-size:.75rem;color:#71778e">{{$review->created_at->format('F j, Y')}}</span></strong>
													<p>{{$review->review}}</p>
												</div>
											</div>
										@endif
									@endforeach
								@endif
								
								@if(Auth::check())
									@if(optional($r_reviews)->user_id == Auth::user()->id && optional($r_reviews)->product_id == $product->id)
										
									@else
										<p class="pro_detail-title mt-5 pb-3" style="border-bottom:1px solid #e3e4e6">Add a review</p>
										<p>Your email address will not be published. Required fields are marked *</p>
										<label class="account-login-label">Your rating *</label>
										<div>
											<div class="product-det-review" value="1">
												<i class="ri-star-fill"></i>
												</div>
												<div class="product-det-review" value="2">
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
												</div>
												<div class="product-det-review" value="3">
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
												</div>
												<div class="product-det-review" value="4">
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
												</div>
												<div class="product-det-review" value="5">
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
													<i class="ri-star-fill"></i>
												</div>
												<span class='text-danger'>@error('rating') {{$message}} @enderror</span>
												<p id="respanel"></p>
										</div><br><br>
										
										<form action="{{ route('reviews.store') }}" method="POST">
											@csrf
											<input type="hidden" name="rating" id="rating" value="">
											<input type="hidden" name="product_id" value="{{$product->id}}">
											<div>
												<label class="account-login-label">Your review *</label><br>
												<textarea class="account-login-input" style="height:190px;" name="review" required></textarea>
												<span class='text-danger'>@error('review') {{$message}} @enderror</span>
											</div><br>
											<button class="det_add rounded" type="submit" style="font-weight:600;margin:0">Submit</button>
										</form>
									@endif
								@endif
							</div>
						</div>
					</div>
					
					<div class="row mb-3 mt-5 best-selling-title">
						<div class="col-6">
							<h3 class="pro_detail-title">Related products</h3>	
						</div>
					</div>
					<div class="row best-selling-product">
					@if($rproduct->count() > 0)
						@foreach($rproduct as $product)
						<div class="col-6 col-lg-4 col-xl-3 product-box">
							<div class= "best-selling-badge">
								<span class="badge badge-style-1" style="background: #2bbef9;">{{$product->pro_discount}}%</span><br>
								@if($product->tags !== "")
									@if($product->tags == 'recommended')
									<span class="badge badge-style-1 badge-style-2 mt-1" style="background: #86869a;">RECOMMENDED</span>
									@elseif($product->tags == 'organic')
									<span class="badge badge-style-1 badge-style-2 mt-1" style="background: #e5f8ed; color:#038e42">ORGANIC</span>
									@endif
								@endif
							</div>
							<div class="best-selling-badge-button">
								<i class="ri-focus-mode"></i>
								@if(Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
									<i class="ri-heart-fill mt-2"></i>
									@else
									<form action="{{route('add_wishlist')}}" method="post">
										@csrf
										@method("PUT")
										<input type="hidden" name="id" value="{{$product->id}}">
										<input type="hidden" name="name" value="{{$product->name}}">
										<input type="hidden" name="price" value="{{$product->sale_price == '' ? $product->regular_price : $product->sale_price}}">
										<input type="hidden" name="quantity" value="1">
										<button class="wishlist-sub" type="submit"><i style="cursor:pointer" class="ri-heart-line mt-2"></i><button>
									</form>
								@endif
							</div>
							<a href="{{route('product_details',['product_slug'=>$product->slug])}}"><img src="{{asset('product_image')}}/{{$product->image}}" alt='{{$product->image}}' width="100%"></a>
							<div class="best-selling-content">
							<a href="{{route('product_details',['product_slug'=>$product->slug])}}" style="text-decoration:none;"><h5>{{$product->name}}</h5></a>
							<p class="stock-item">
										@if($product->stock == 'instock')
											instock
										@elseif($product->stock == 'outofstock')
											Out of Stock
										@endif
									</p>
								@for ($i = 1; $i <= 5; $i++)
									@if ($i <= $product->averageRating())
										<i class="ri-star-fill text-warning" style="font-size:.6875rem"></i>
									@else
										<i class="ri-star-fill" style="font-size:.6875rem;color:#9B9BB4"></i>
									@endif
								@endfor

								<span class="text-dark ms-1">{{$product->reviewCountFor()}}</span>
								<p class="best-selling-rate">
									@if($product->sale_price)
									<s>${{$product->regular_price}}</s> ${{$product->sale_price}}
									@else
									{{$product->regular_price}}
									@endif
									</p>
									@if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
									<a href="{{route('cart')}}"><button type="submit" style="background:#2BBEF9;color:#fff">Go to cart</button></a>
								@else
								<form action="{{route('add_cart')}}" method="post">
									@csrf
									<input type="hidden" name="id" value="{{$product->id}}">
									<input type="hidden" name="name" value="{{$product->name}}">
									<input type="hidden" name="quantity" value="1">
									<input type="hidden" name="price" value="{{$product->sale_price == ''? $product->regular_price : $product->sale_price}}">
									<button type="submit">Add to cart</button>
								</form>
								@endif
							</div>
						</div>
						@endforeach
					@endif
					</div>
				</div>
			</div>
		</div>
@endsection
@push('scripts')
<script>
		$(document).ready(function(){




			$(".product-det-review").click(function() {
				var value = $(this).attr('value');
				$("#rating").val(value);
			});


			$(".pro_footer_detail span").click(function(){
				$(".pro_footer_detail span").removeClass('active-detail');
				$(this).addClass("active-detail");
			});
			$(".dis-2").click(function(){
				$(".pro-footer-div-1").css({"display": "none"});
				$(".pro-footer-div-2").css({"display": "block"});
				$(".pro-footer-div-3").css({"display": "none"});
			});
			$(".dis-1").click(function(){
				$(".pro-footer-div-1").css({"display": "block"});
				$(".pro-footer-div-2").css({"display": "none"});
				$(".pro-footer-div-3").css({"display": "none"});
			});
			$(".dis-3").click(function(){
				$(".pro-footer-div-3").css({"display": "block"});
				$(".pro-footer-div-2").css({"display": "none"});
				$(".pro-footer-div-1").css({"display": "none"});
			});

			$(".product-det-review").click(function(){
				$(".product-det-review").removeClass('add_review_color');
				$(this).addClass('add_review_color');
			});
		
		
		$('.add').click(function () {
			if ($(this).prev().val() < 100) {
			$(this).prev().val(+$(this).prev().val() + 1);
			}
		});
		$('.sub').click(function () {
				if ($(this).next().val() > 1) {
				if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
				}
		});
		});
	 
		function currentDiv(n) {
		  showDivs(slideIndex = n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("demo");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		  }
		  for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
		  }
		  x[slideIndex-1].style.display = "block";
		  dots[slideIndex-1].className += " w3-opacity-off";
		}
		</script>
@endpush