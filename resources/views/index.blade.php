@extends('layouts.home_layouts')
@section('content')

<div class="container-fluid ps-5 pe-5 ">
			<!-- slider-first-part-start -->
			<div class="row d-flex justify-content-end">
				<div class="col-12 col-lg-9 slider-thumbnail" style="padding: 15px;">
				@if($slider->count() > 0)
					<div id="demo" class="carousel slide" data-bs-ride="carousel">
					  <!-- Indicators/dots -->
					  
					  <!-- The slideshow/carousel -->
					 	<div class="carousel-inner" style="position: relative;">
					  		<div class="carousel-indicators">
								<button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
								<button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
								<button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
					  		</div>
							<div class="carousel-item active">
								<div class="slider-item">
									<div class="slider-description">
										<span>{{$first_slider->subtitle}}</span><br class="spaced-break">
										<span>-{{$first_slider->discount_offer}}% off</span>
									</div>
									<div class="slider-content">
										<h2>{{$first_slider->title}}</h2>
										<p>{{$first_slider->description}}</p>
									</div>
									<div class="content-footer">
										<p>from <span>${{$first_slider->price}}</span></p>
										<button>Shop Now <i class="ri-arrow-right-s-fill"></i></button>
									</div>
								</div>
								<img src="{{asset('slider_image')}}/{{$first_slider->image}}" alt="Los Angeles" class="d-block" width="100%">
							</div>
					  	@foreach($slider as $slide)
							<div class="carousel-item">
								<div class="slider-item">
									<div class="slider-description">
										<span>{{$slide->subtitle}}</span><br class="spaced-break">
										<span>-{{$slide->discount_offer}}% off</span>
									</div>
									<div class="slider-content">
										<h2>{{$slide->title}}</h2>
										<p>{{$slide->description}}</p>
									</div>
									<div class="content-footer">
										<p>from <span>${{$slide->price}}</span></p>
										<button>Shop Now <i class="ri-arrow-right-s-fill"></i></button>
									</div>
								</div>
								<img src="{{asset('slider_image')}}/{{$slide->image}}" alt="Los Angeles" class="d-block" width="100%">
							</div>
						@endforeach
					  	</div>
					  <!-- Left and right controls/icons -->
					</div>
				@endif	
				</div>
			</div>
			<!-- slider-first-part-end -->

			<div class="row mt-3 mb-5">
				<div class="col-12 col-md-3 mb-5 banner-image-thumbnail">
					<div class="row">
						<div class="col-12 p-0">
							@if($sidebar_banner->count() > 0)
								@foreach($sidebar_banner as $banner)
									<div class="banner-image mb-5" style="position: relative;">
										<div class="banner-content">
											<div class="content-header">{{$banner->subtitle}}</div>
											<div class="content-main">{{$banner->tag}}</div>
											<div class="content-footer">{{$banner->title}}</div>
											<div class="content-footer-li mt-2">
												<span>Only-from</span><br>
												<span class="content-footer-li-price">${{$banner->price}}</span>
											</div>
										</div>
										<img src="{{asset('banner_image')}}//{{$banner->image}}" alt="banner-image">
									</div>
								@endforeach
							@endif
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-12 order-sugest">
							<div class="border-bottom-0" style="border-radius: 5px 5px 0px 0px;">
								<i class="ri-mobile-download-line"></i>
								<p>Download the Bacola App to your Phone.</p>
							</div>
							<div class="border-bottom-0">
								<i class="ri-wallet-3-line"></i>
								<p>Order now so you dont miss the opportunities.</p>
							</div>
							<div style="border-radius: 0px 0px 5px 5px;">
								<i class="ri-timer-2-line"></i>
								<p>Your order will arrive at your door in 15 minutes.</p>
							</div>
						</div>
					</div>
					<!-- trending-product-start -->
					<div class="row mt-4 mb-5">
						<div class="col-12">
							<p class="trending-title">Trending Products</p>
						</div>
						<div class="col-12" style="border: 1px solid #edeef5;">
							<div class="row mt-3 mb-3">
								<div class="col-4 p-0" style="align-content: center;">
									<img src="assets/best-selling-product/product-image-7-346x310.jpg" width="100%">
								</div>
								<div class="col-8 p-0">
									<div style="margin: 11px 0px 11px 10px;">
										<p class="tranding-description">USDA Choice Angus Beef Stew Meat</p>
										<p class="best-selling-rate"><s>$20.35</s> $14.97</p>
									</div>
								</div> 
							</div>
							<div class="row mt-3 mb-3">
								<div class="col-4 p-0" style="align-content: center;">
									<img src="assets/best-selling-product/product-image-4.jpg" width="100%">
								</div>
								<div class="col-8 p-0">
									<div style="margin: 11px 0px 11px 10px;">
										<p class="tranding-description">Warrior Blend Organic</p>
										<p class="best-selling-rate"><s>$39.00</s> $32.97</p>
									</div>
								</div> 
							</div>
							<div class="row mt-3 mb-3">
								<div class="col-4 p-0" style="align-content: center;">
									<img src="assets/best-selling-product/product-image-48.jpg" width="100%">
								</div>
								<div class="col-8 p-0">
									<div style="margin: 11px 0px 11px 10px;">
										<p class="tranding-description">Encore Seafoods Stuffed Alaskan Salmon</p>
										<p class="best-selling-rate"><s>$54.35</s> $43.97</p>
									</div>
								</div> 
							</div>
							<div class="row mt-3 mb-3">
								<div class="col-4 p-0" style="align-content: center;">
									<img src="assets/best-selling-product/product-image-5-346x310.jpg" width="100%">
								</div>
								<div class="col-8 p-0">
									<div style="margin: 11px 0px 11px 10px;">
										<p class="tranding-description">Vital Farms Pasture-Raised Egg Bites Bacon & Cheddar</p>
										<p class="best-selling-rate"><s>$25.35</s> $14.97</p>
									</div>
								</div> 
							</div>
							<div class="row mt-3 mb-3">
								<div class="col-4 p-0" style="align-content: center;">
									<img src="assets/best-selling-product/product-image-46-346x310.jpg" width="100%">
								</div>
								<div class="col-8 p-0">
									<div style="margin: 11px 0px 11px 10px;">
										<p class="tranding-description">Field Roast Chao Cheese Creamy Original</p>
										<p class="best-selling-rate"><s>$22.35</s> $16.97</p>
									</div>
								</div> 
							</div>
						</div>
					</div>
					<!-- trending-product-end -->

					<!-- customer-review-start -->
					<div class="row mt-5">
						<div class="col-12">
							<p class="trending-title">Customer Comment</p>
							<div class="cus-das">
								<h5 class="rivew-title">The Best Marketplace</h5>
								<p class="rivew-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
								<div class="mt-4 mb-2">
									<div class="rivew-img"><img src="assets/cus-review/avatar-3.jpg" width="100%"></div>
									<div>
										<span class="rivew-name">Tina Mcdonnell</span><br>
										<span class="rivew-desig">Sales Manager</span>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- customer-review-end -->
				</div>
				<div class="col-12 col-md-9 main-thumbnail p-0">
					
					<!-- best-selling-product-start -->
					@if($best_product > 0) 
					<div class="row mb-2 best-selling-title">
						<div class="col-8">
							<h3>best sellers</h3>
							<p>Do not miss the current offers until the end of March.</p>	
						</div>
						<div class="col-4 d-flex justify-content-end">
							<button>View All <i class="fa-solid fa-arrow-right"></i></button>	
						</div>
					</div>
					<div class="row best-selling-product">
							<i class="ri-arrow-left-s-line"></i>
							<i class="ri-arrow-right-s-line"></i>
							@foreach($best_product as $product)
							<div class="col-6 col-lg-4 col-xl-3 product-box">
								<div class= "best-selling-badge">
									@if($product->pro_discount !== "")
									<span class="badge badge-style-1" style="background: #2bbef9;">{{$product->pro_discount}}%</span><br>
									@endif
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
										<button class="wishlist-sub" type="submit"><i style="cursor:pointer" class="ri-heart-line mt-2"></i></button>
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
									<span>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
									</span>
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
						</div>
					@endif
					<!-- best-selling-product-end -->

					<!-- poster-start -->
					<div class="row poster mt-4">
						<div class="col-12 col-lg-7 poster-content">
							<p>Always Taking Care</p>
							<h5>In store or online your health & safety is our top priority.</h5>
						</div>
						<div class="col-12 col-lg-5 p-0 poster-img">
							<img src="assets/home-image/banner-box2.jpg" width="100%">
						</div>
					</div>
					<!-- poster-end -->

					<!-- hot-product-start -->
					<div class="row mb-5 mt-5 best-selling-title">
						<div class="col-8">
							<h3 style="letter-spacing: -.6px;">HOT PRODUCT FOR <sapn style="color:#ed174a">THIS WEEK</sapn></h3>
							<p>Dont miss this opportunity at a special discount just for this week.</p>	
						</div>
						<div class="col-4 d-flex justify-content-end">
							<button>View All <i class="fa-solid fa-arrow-right"></i></button>	
						</div>
					</div>
					<div class="row mt-4 hot-product">
						<div class="col-12 col-lg-3 hot-product-image">
							<div style="position:relative;">
								<span class="hot-product-percent">19%</span>
								<img src="assets/home-image/product-image-50.jpg">
							</div>		
						</div>
						<div class="col-12 col-lg-9" style="padding: 0 1.25rem 1.25rem;">
							<div class="best-selling-content hot-product-content">
								<p class="best-selling-rate"><s>$4.29</s> $3.25</p>
								<h5>Chobani Complete Vanilla Greek Yogurt</h5>
								<p class="stock-item"><span>1 kg</span> IN STOCK</p>
							</div>
							<div class="progress">
							  <div class="progress-bar" style="width:70%"></div>
							</div>
							<div class="hot-product-time-exp mt-4">
								<div style="float:left;"><span>23</span> : <span>10</span> : <span>17</span> : <span>58</span></div>
								<div class="exp-text">Remains until the end of the offer</div>
							</div>
						</div>
					</div>
					<!-- hot-product-end -->
					<!-- discount-banner-start -->
					<div class="row mt-4">
						<div class="col-12 discount-banner">
							<div class="purchase-text">Super discount for your  <strong>first purchase.</strong></div>
							<span class="purchase-code">FREE25BAC</span>
							<span class="purchase-description">Use discount code in checkout!</span>
						</div>
					</div>
					<!-- discount-banner-end -->
					<!-- new-product-start -->
					<div class="row mb-2 mt-5 best-selling-title">
						<div class="col-8">
							<h3>new products</h3>
							<p>New products with updated stocks.</p>	
						</div>
						<div class="col-4 d-flex justify-content-end">
							<button>View All <i class="fa-solid fa-arrow-right"></i></button>	
						</div>
					</div>
					<div class="row best-selling-product new-product">
					@if($products->count() > 0)
						@foreach($products as $product)
						<div class="col-6 col-lg-4 col-xl-3 product-box">
							<div>
								<div class= "best-selling-badge">
								@if($product->pro_discount !== "")
									<span class="badge badge-style-1" style="background: #2bbef9;">{{$product->pro_discount}}%</span><br>
								@endif
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
										<button class="wishlist-sub" type="submit"><i style="cursor:pointer" class="ri-heart-line mt-2"></i></button>
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
									<span>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
									</span>
									<p class="best-selling-rate">
									@if($product->sale_price)
									<s>${{$product->regular_price}}</s> ${{$product->sale_price}}
									@else
									{{$product->regular_price}}
									@endif
									</p>
									@if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
									<a href="{{route('cart')}}"><button class="new-product-btn">Go to cart</button></a>
									@else
									<form action="{{route('add_cart')}}" method="post">
										@csrf
										<input type="hidden" name="id" value="{{$product->id}}">
										<input type="hidden" name="name" value="{{$product->name}}">
										<input type="hidden" name="quantity" value="1">
										<input type="hidden" name="price" value="{{$product->sale_price == ''? $product->regular_price : $product->sale_price}}">
										<button class="new-product-btn">Add to cart</button>
								</form>
								@endif
								</div>	
							</div>															
						</div>
						@endforeach
					@endif
					</div>
					<!-- new-product-end -->
					
					<!--weekend-banner-start -->
					<div class="row mt-4 d-flex justify-content-between">
						@if($weekend_banner->count() > 0)
							@foreach($weekend_banner as $banner)
								<div class="col-12 col-lg-6 weekend-banner mb-4 p-0" style="position:relative;">
									<div class="weekend-discount">
										<p class="discount-text">Weekend Discount {{$banner->discount_offer}}%</p>
										<h5 class="discount-title">{{$banner->title}}</h5>
										<p class="discount-discription">{{$banner->subtitle}}</p>
										<button>Shop Now</button>
									</div>
									<img class="discount-image" src="{{asset('banner_image')}}//{{$banner->image}}" width="100%">
								</div>
							@endforeach
						@endif
					</div>
					<!--weekend-banner-end -->

				</div>
			</div>
			<!-- category-part-start -->
			<div class="row category-product mb-5 container-fluid">
				<div class="col-12 col-lg-2 category-first-item">
					@if($first_category->count() > 0)
					<img class="category-img-1" src="{{asset('category_image')}}/{{$first_category->image}}">	
					<div style="text-align: center;">
						<h5 class="category-title">{{$first_category->name}}</h5>
						<span class="category-item">{{$first_category->product->count()}} Items</span>
					</div>
					@endif
				</div>
				<div class="col-12 col-lg-10 p-0">
					<div class="row">
					@if($categories->count() > 0)
						@foreach($categories as $category)
						<div class="col-6 col-lg-3 category-product-2">
							<div class="row">
								<div class="col-12 col-lg-6 p-0 category-img"><img class="category-img-2" src="{{asset('category_image')}}/{{$category->image}}"></div>
								<div class="col-12 col-lg-6  category-content">
									<h5 class="category-title">{{$category->name}}</h5>
									<span class="category-item">{{$category->product->count()}} Items</span>
								</div>
							</div>
						</div>
						@endforeach
					@endif
					</div>
				</div>
			</div>
			<!-- category-part-end -->
		</div>
	
@endsection
@section('footer-nav')
<div class="row fixed-bottom nav-footer justify-content-between">
	<div class="col-2">
		<i class="ri-store-2-line"></i><br>
		<span>Store</span>
	</div>
	<div class="col-2">
	<i class="ri-search-line"></i><br>
		<span>Search</span>
	</div>
	<div class="col-2">
		<i class="ri-heart-line"></i></i><br>
		<span>Wishlist</span>
	</div>
	<div class="col-2">
		<i class="ri-user-line"></i></i><br>
		<span>Account</span>
	</div>
	<div class="col-2">
		<i class="ri-menu-line"></i><br>
		<span>Categories</span>
	</div>
</div>
@endsection
@push('scripts')
<script>
jQuery(document).ready(function(){
	$('.carousel-item:first-child').addClass('active');
});
</script>
@endpush