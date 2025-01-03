<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bacola</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	@stack('link')
</head>
<body>
	<div id="nav-sidevar"  style="display:none;position:absolute;top:0px;">	
		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; z-index: 100;" id="mySidebar">
					<div class="d-flex justify-content-between p-4" style="align-items:center;">
						<img src="assets/home-image/bacola-logo.png" width="50%" style="object-fit: contain;">
						<button class="w3-bar-item w3-button  nav-bar"onclick="w3_close()">&times;</button>
					</div>
					<div class="side-nav-categories" style="position:relative;">
						<div>
							<i class="ri-menu-line"></i>
							<span>ALL CATEGORIES</span>
							<i class="ri-arrow-down-s-line"></i>
						</div>
					</div>
					<div class="categories-items nav-categories-items" style="position:relative;display: none;">
						<div class="category-dropdown">
							<ul class="nav pt-3 flex-column">
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-brands fa-apple"></i></span> Fruits & Vegetables</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-drumstick-bite"></i></span> Meats & Seafood</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-egg"></i></span> Breakfast % Dairy</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-mug-saucer"></i></span> Beverages</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-bread-slice"></i></span> Breads & Bakery</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-ice-cream"></i></span> Frozen Foods</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-cookie-bite"></i></span> Biscuits & Snacks</a></li>
								<li class="nav-item"><a href="#" class="nav-link"><span><i class="fa-solid fa-cart-shopping"></i></span> Grocery & Staples</a></li>
							</ul>
							<ul class="nav flex-column">
								<li class="nav-item"><a href="#" class="nav-link">Value of the Day</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Top 100 Offers</a></li>
								<li class="nav-item"><a href="#" class="nav-link">New Arrivals</a></li>
							</ul>
						</div>
					</div>
				<a href="#" class="w3-bar-item w3-button link-nav">Home</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Shop</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Meats & Seafood</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Bakery</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Beverages</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Blog</a>
				<a href="#" class="w3-bar-item w3-button link-nav">Contact</a>
			</div>
			<div id="main">
				<div class="row p-1 fixed-top nav-header-content">
					<div class="col-2">
						<button id="openNav" class="w3-button nav-bar-2" onclick="w3_open()">&#9776;</button>
					</div>
					<div class="col-7" style="text-align:center;">
						<img src="assets/home-image/bacola-logo-mobile.png" width="80" style="object-fit: contain;">
					</div>
					<div class="col-3" style="position:relative;text-align:end;">
						<span><i class="ri-shopping-bag-4-line" style="color:#ea2b0f;font-size: 20px;"></i></span>
						<span class="cart-count-icon nav-cart-count-icon ">0</span>	
					</div>												
				</div>
			</div>
	</div>
	<section id="header" class="container-fluid ps-5 pe-5 pt-3">
		<div class="row d-flex" style="align-items:center;" >
			<div class="col-3">
				<img src="{{asset('assets/home-image/bacola-logo.png')}}" alt="logo"><br>
				<span>Online Grocery Shopping Center</span>
			</div>
			<div class="col-6" style="position:relative">
				<form action="" mehtod="">
					<div class="input-group">
						<input type="text" class="form-control" id="search-input" placeholder="Search for products...">
						<button class="input-group-text border-0"><i class="ri-search-line"></i></button>
					</div>
					<div class="search-list-show">
						<ul id="box-content-search">
						</ul>
					</div>
				</form>
			</div>
			<div class="col-3 d-inline-flex align-items-center justify-content-end">
				@if(Auth::check())
					@switch(Auth::user()->type)
						@case('admin')
						<a href="{{ route('admin_dashboard') }}"><span style="border: 1px solid #e2e4ec;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;"><i class="ri-user-3-line" style="color: #3e445a;"></i></span></a>
							@break
						@case('user')
						<a href="{{ route('user_dashboard') }}"><span style="border: 1px solid #e2e4ec;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;"><i class="ri-user-3-line" style="color: #3e445a;"></i></span></a>
							@break
						@default
						<a href="{{ route('login') }}"><span style="border: 1px solid #e2e4ec;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;"><i class="ri-user-3-line" style="color: #3e445a;"></i></span></a>
					@endswitch
				@else
				<a href="{{ route('login') }}"><span style="border: 1px solid #e2e4ec;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;"><i class="ri-user-3-line" style="color: #3e445a;"></i></span></a>
				@endif





				@if(Cart::instance('wishlist')->content()->count() > 0)
				<a href="{{route('wishlist')}}">
					<div style="position:relative;">	
						<span style="background-color: #FFFBEC;color: #ff6e00e0;"><i class="ri-heart-2-line"></i></span>
							<span class="wishlist-count-icon">{{Cart::instance('wishlist')->content()->count()}}</span>
					</div>
				</a>
				@else
				<a href="{{route('home')}}">
					<div style="position:relative;cursor:pointer">	
						<span style="background-color: #FFFBEC;color: #ff6e00e0;"><i class="ri-heart-2-line"></i></span>
						<span class="wishlist-count-icon">0</span>
					</div>
				</a>
				@endif
				@if(Cart::instance('cart')->content()->count() > 0)
				<div style="position:relative;">
					<a href="{{route('cart')}}">
						<span style="background-color: #fff1ee;border-color: #fff1ee;"><i class="ri-shopping-bag-4-line" style="color:#ea2b0f"></i></span>
							<span class="cart-count-icon">{{Cart::instance('cart')->content()->count()}}</span>
					</a>
				</div>
				@else
				<div style="position:relative;">
					<a href="{{route('shop')}}">
						<span style="background-color: #fff1ee;border-color: #fff1ee;"><i class="ri-shopping-bag-4-line" style="color:#ea2b0f"></i></span>
						<span class="cart-count-icon">0</span>
					</a>
				</div>
				@endif
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-3" style="position:relative;">
					<div class="dropdown-category-button" style=" background-color: #2bbef9;">
						<i class="ri-menu-line"></i>
						<span>ALL CATEGORIES</span>
						<i class="ri-arrow-down-s-line"></i>
						<p>Total {{$categories_list->count()}} products</p>
					</div>
					<div class="category-dropdown dropdown-category-item" style=" border-radius: 0px 0px 30px 30px;">
						@if($categories_list->count() > 0)
						<ul class="nav pt-3 flex-column bg-white">
							@foreach($categories_list as $category)
							<li class="nav-item"><a href="#" class="nav-link dropdown-item"><span><i class="{{$category->icon_name}}"></i> </span><span> {{$category->name}}</span></a></li>
							@endforeach
						</ul>
						@endif
						<ul class="nav flex-column bg-white">
							<li class="nav-item"><a href="#" class="nav-link dropdown-item ms-3" style="text-align:start">Value of the Day</a></li>
							<li class="nav-item"><a href="#" class="nav-link dropdown-item ms-3" style="text-align:start">Top 100 Offers</a></li>
							<li class="nav-item"><a href="#" class="nav-link dropdown-item ms-3" style="text-align:start">New Arrivals</a></li>
						</ul>
					</div>
			</div>
			<div class="col-9 d-flex justify-content-end">
				<ul class="nav">
					@if($menus->count() > 0)
						@foreach($menus as $menu)
							<li class="nav-item w3-dropdown-hover"><a href="{{ $menu->link && Route::has($menu->link) ? route($menu->link) : '#' }}"" class="nav-link text-uppercase"><i class="{{$menu->icon_name}}" style="color:#3e445a;opacity:.5;margin-right:6px"></i>{{$menu->name}}
								@if($menu->sub_menu->count() > 0)
								<i class="ri-arrow-down-s-line"></i>
								@endif
								</a>
								@if($menu->sub_menu->count() > 0)
								<ul class="w3-ul w3-card w3-dropdown-content" >
									@foreach($menu->sub_menu as $sub_menu)
										<li><a href="#" class="nav-link">{{$sub_menu->name}}</a></li>
									@endforeach
								</ul>	
								@endif
							</li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</section>

	<section id="main" class="container">
        @yield('content')
    </section>
	<section id="footer">
		@yield('footer-nav')
	</section>
	 <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	 <script src="{{asset('js/jquery.min.js')}}"></script>
	 <script>
			$(function(){
				$("#search-input").on("keydown",function(){
					var searchQuery = $(this).val();
					if(searchQuery.length > 2){
					$.ajax({
						type: "GET",
						url: "{{route('search')}}",
						data: {query: searchQuery},
						datatype: 'json',
						success: function(data){
						$("#box-content-search").html('');
						$.each(data, function(index,item){
							var url = "{{route('product', ['id' => ':id'])}}";
							var link = url.replace(':id', item.id);

							$("#box-content-search").append(`
							<li class="nav-item">
								<ul class="nav">
								<li class="mb-10 nav-item">
									<img src="{{asset('product_image')}}/${item.image}" alt="${item.name}" width="75px">
								</li>
								<li class="mb-10 nav-item">
										<a href="${link}" class="body-text nav-link">${item.name}</a>
								</li>
								</ul>
							</li>
							`);
						});
						}
					});
					}
				});
				});



		jQuery(document).ready(function(){
			$(".side-nav-categories").click(function(){
				$(".nav-categories-items").slideToggle("slow");
			});
			$(".dropdown-category-button").click(function(){
				$(".dropdown-category-item").slideToggle(300);
			});

		});
		function w3_open() {
		  document.getElementById("mySidebar").style.width = "50%";
		  document.getElementById("mySidebar").style.display = "block";
		}
		function w3_close() {
		  document.getElementById("mySidebar").style.display = "none";
		}
</script>
	 @stack("scripts")
</body>
</html>