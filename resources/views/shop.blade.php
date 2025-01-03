@extends('layouts.home_layouts')
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="container-fluid ps-5 pe-5">
			<div class="row mt-3 mb-3">
				<div class="col-12">
					<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> Shop</span></p>
				</div>
			</div>

			<div class="row">
				<div class="col-3 shop-filter p-0">
					<div class="row">
						<div class="col-12">
							<p class="trending-title">product categories</p>
							@if($categories->count() > 0)
								@foreach($categories as $category)
								<div>
									<div class="shop-category filter-cart">
										<input type="checkbox"  name="categories[]" id="categories" value="{{$category->id}}" @if (in_array($category->id, explode(',',$category_))) checked="checked" @endif>
										<span>{{$category->name}}</span>
										@if($category->subcategories->count() > 0)
										<i class="ri-add-line" style="color: #636363;"></i>
										<i class="ri-subtract-line card-display"></i>
										@endif
									</div>
									<div class="shop-category ps-4 filter-product">
										@if($category->subcategories->count() > 0)
											@foreach($category->subcategories as $subcategory)
												<div class="d-inline-flex">
													<input type="checkbox" name="subcategory[]" value="{{$subcategory->id}}" @if (in_array($subcategory->id, explode(',',$subcategory_))) checked="checked" @endif>
													<span>{{$subcategory->name}}</span>
												</div>	
											@endforeach
										@endif
									</div>
								</div>
								@endforeach
							@endif
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-12">
							<p class="trending-title">Filter by price</p>
							<div class="range">
								<div class="sliderValue">
									<span id="range-count" value="[{{$min_price}},{{$max_price}}]">{{$min_price}}</span>
								</div>
								<div class="field">
									<div class="value left">$1</div>
									<input type="range" id="range-body" min="0" name="price_range"  max="${{$maxPrice}}" value="[{{$min_price}},{{$max_price}}]" steps="1">
									<div class="value right">${{$maxPrice}}</div>
								</div>
							</div>
							<div class="d-flex justify-content-between" style="padding-right: 22px;">
								<div class="filter-price">Min Price: <span>$1</span></div>
								<div class="filter-price">Max Price: <span>${{$maxPrice}}</span></div>
							</div>
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-12 mt-3">
							<p class="trending-title">product status</p>
							<div class="shop-category">
								<input type="checkbox" name="stock_checkbox" value="instock" @if (in_array("instock", explode(',',$stock))) checked="checked" @endif>
								<span>In Stock</span>
							</div>
							<div class="shop-category">
								<input type="checkbox" name="outstock_checkbox" value="outofstock" @if (in_array("outofstock", explode(',',$outofstock))) checked="checked" @endif>
								<span>Out Of Stock</span>
							</div>
						</div>
					</div>
					<div class="row mt-5">
						<div class="col-12 mt-3">
							<p class="trending-title">brands</p>
							@foreach($brands as $brand)
								<div class="shop-category">
									<input type="checkbox" name="brands[]" id="brands" value="{{$brand->id}}" @if (in_array($brand->id, explode(',',$brands_))) checked="checked" @endif>
									<span>{{$brand->name}}</span>
									@if($brand->product->count() > 0)
										<div class="brand-qty">({{$brand->product->count()}})</div>
									@endif
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-9 p-0">
					<div class="row">
						<div class="col-12" style="position:relative;">
							<div class="shop-banner-content">
								<h2 class="shop-banner-text">Organic Meals Prepared</h2>
								<h3 class="shop-banner-title">Delivered to <strong style="color: #00b853;">your Home</strong></h3>
								<p class="shop-banner-description">Fully prepared & delivered nationwide.</p>
							</div>
							<img src="assets/banner-image/bacola-banner-18.jpg" width="100%" style="border-radius:6px;">
						</div>
					</div>
					<div class="row mt-3 d-flex justify-content-between" style="align-items:center;">
						<div class="col-md-8 shop-view-selector">
							<i class="ri-menu-fill"></i>
							<i class="ri-apps-2-fill"></i>
							<i class="ri-grid-fill"></i>
							<i class="ri-grid-line" style="color:#202435"></i>
						</div>
						<div class="col-4 filter-view-selector">
							<i class="ri-filter-line"></i>
							<span>Filter Products</span>
						</div>
						<div class="col-3 col-md-2">
							<select class="form-select  shop_selector" 	name="orderby" id="orderby"> 
								<option value="-1" {{$order == -1 ? 'selected' : '' }}>Default</option>
								<option value="1" {{$order == 1 ? 'selected' : '' }}>New to old product</option>
								<option value="2" {{$order == 2 ? 'selected' : '' }}>Old to new product</option>
								<option value="3" {{$order == 3 ? 'selected' : '' }}>Price: Low To High</option>
								<option value="4" {{$order == 4 ? 'selected' : '' }}>Price: High To Low</option>
							</select>
						</div>
						<div class="col-3 col-md-2">
							<div class="dropdown">
							  <button  type="button" class=" shop-view-selector-btn btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
							    <span style="color:#71778e">Show</span> 12
							  </button>
							  <ul class="dropdown-menu">
							    <li class="a"><a class=" b dropdown-item shop-view-selector-a" href="#">12</a></li>
							    <li class="a"><a class=" b dropdown-item shop-view-selector-a" href="#">24</a></li>
							    <li class="a"><a class=" b dropdown-item shop-view-selector-a" href="#">36</a></li>
							    <li class="a"><a class=" b dropdown-item shop-view-selector-a" href="#">48</a></li>
							  </ul>
							</div>	
						</div>
					</div>
					<div class="row mt-5 best-selling-product">
					@if($products->count() > 0)
						@foreach($products as $product)
						<div class="col-6 col-md-4 col-lg-3 product-box">
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
									<button class="wishlist-sub" type="submit"><i style="cursor:pointer" value="{{$product->id}}" class="ri-heart-line mt-2"></i></button>
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
								<span class="ms-2 text-dark">{{ $product->reviewCountFor() }}</span>
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
		<form id="frmfilter" method="get" action="{{route('shop')}}">
			<input type="hidden" name="categories" id="sh_categories">
			<input type="hidden" name="subcategory" id="subcategory">
			<input type="hidden" name="brands" id="sh_brands">
			<input type="hidden" name="order" id="order" value="{{$order}}">
			<input type="hidden" name="stock_checkbox" id="sh_stk_checkbox">
			<input type="hidden" name="outstock_checkbox" id="sh_outstk_checkbox">
			<input type="hidden" name="min" id="sh_minprice" value="{{$min_price}}">
			<input type="hidden" name="max" id="sh_maxprice" value="{{$max_price}}">
		<form>
@endsection
@section('footer-nav')
<div class="row fixed-bottom nav-footer justify-content-between">
	<div class="col-2">
		<i class="ri-home-8-line"></i><br>
		<span>Home</span>
	</div>
	<div class="col-2">
		<a href="" class="nav-link">
			<i class="ri-filter-line"></i><br>
			<span>Filter</span>
		</a>
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
</div>

@push('scripts')
<script>
		jQuery(document).ready(function(){
			$('.filter-cart').on('click',function(){
					$(this).next().slideToggle();
					$(this).find('span').toggleClass('filter_toggle_color');
					$(this).find('i').toggleClass('card-display');

				});
		});


		const slideValue =  document.getElementById("range-count");
		const inputSlider = document.getElementById("range-body");
		inputSlider.oninput = (()=>{
			let value = inputSlider.value;
			slideValue.textContent = value;
			slideValue.style.left = (value/2) + "%";
			slideValue.classList.add("show");
		});
		inputSlider.onblur = (()=>{
			  slideValue.classList.remove("show");
		});
		$(function(){
			$("#orderby").on("change",function(){
				$('#order').val($("#orderby option:selected").val());
				$("#frmfilter").submit();
			});

			$("input[name = 'subcategory[]']").on("change",function(){
				var subcategory = "";
				$("input[name = 'subcategory[]']:checked").each(function(){
				if(subcategory == ""){
					subcategory += $(this).val();
				}else{
					subcategory += "," + $(this).val();
				}
				});
				$('#subcategory').val(subcategory);
				$("#frmfilter").submit();
			});
			
			$("input[name = 'categories[]']").on("change",function(){
				var categories = "";
				$("input[name = 'categories[]']:checked").each(function(){
				if(categories == ""){
					categories += $(this).val();
				}else{
					categories += "," + $(this).val();
				}
				});
				$('#sh_categories').val(categories);
				$("#frmfilter").submit();
			});
			$("input[name = 'brands[]']").on("change",function(){
				var brands = "";
				$("input[name = 'brands[]']:checked").each(function(){
				if(brands == ""){
					brands += $(this).val();
				}else{
					brands += "," + $(this).val();
				}
				});
				$('#sh_brands').val(brands);
				$("#frmfilter").submit();
			});
			
			$("input[name = 'stock_checkbox']").on("change",function(){
				var stock_checkbox = "";
				$("input[name = 'stock_checkbox']:checked").each(function(){
				if(stock_checkbox == ""){
					stock_checkbox += $(this).val();
				}else{
					stock_checkbox += "," + $(this).val();
				}
				});
				$('#sh_stk_checkbox').val(stock_checkbox);
				$("#frmfilter").submit();
			});
			$("input[name = 'outstock_checkbox']").on("change",function(){
				var outstock_checkbox = "";
				$("input[name = 'outstock_checkbox']:checked").each(function(){
				if(outstock_checkbox == ""){
					outstock_checkbox += $(this).val();
				}else{
					outstock_checkbox += "," + $(this).val();
				}
				});
				$('#sh_outstk_checkbox').val(outstock_checkbox);
				$("#frmfilter").submit();
			});
			
			$("[name='price_range']").on("change",function(){
				var min = $(this).val().split(',')[0];
				var max = $(this).val().split(',')[1];
				$("#sh_minprice").val(min);
				$("#sh_maxprice").val(max);
				setTimeout(()=>{
				$("#frmfilter").submit();
				}, 2000);
			});
		});
	</script>
@endpush