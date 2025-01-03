
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
					<p class="woocomerce-header">Home <span><i class="ri-arrow-right-s-line"></i> my account</span></p>
				</div>
			</div>

			<div class="row d-flex justify-content-center">
				<div class="col-5 account-panel pt-5 mb-5">
					<div class="account-slider">
						<div class="mt-5 mb-5" style="text-align:center;">

							 <div class="navigation-manual">
				           	 	<label for="radio1" class="me-4 account-btn active-account-btn">LOGIN</label>
				           	 	<label for="radio2" class="account-btn">REGISTER</label>
				       		 </div>
						</div>
				        <div class="account-slides">
				            <input type="radio" name="radio-btn"  id="radio1">
				            <input type="radio" name="radio-btn" id="radio2">

				            <div class="account-slide first">
				                <div class="account-login-main mb-5">
									<form method="POST" action="{{ route('login') }}">
										@csrf
										<div>
											<label for="email" :value="__('Email')" class="account-login-label">Email address *</label><br>
											<input id="email" class="account-login-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
											<x-input-error :messages="$errors->get('email')" class="mt-2" />
										</div><br>
										<div>
											<label for="password" :value="__('Password')" class="account-login-label">Password *</label><br>
											<input id="password" class="account-login-input" type="password" name="password" required autocomplete="current-password">
											<x-input-error :messages="$errors->get('password')" class="mt-2" />
										</div><br>
										<button>Log in</button>
									</form>
									<a href="" class="forget-pass">Forget Your Password</a>
								</div>
				            </div>
				             <div class="account-slide">
				                <div class="account-login-main">
									<form method="POST" action="{{ route('register') }}">
										@csrf
										<div>
											<label class="account-login-label" for="name" :value="__('Name')">Username *</label><br>
											<input id="name" class="account-login-input" type='text' name="name" :value="old('name')" required autofocus autocomplete="name">
											<x-input-error :messages="$errors->get('name')" class="mt-2" />
										</div><br>
										<div>
											<label for="email" :value="__('Email')" class="account-login-label">Email address *</label><br>
											<input id="email" class="account-login-input" type="email" name="Email" :value="old('email')" required autocomplete="username">
											<x-input-error :messages="$errors->get('Email')" class="mt-2" />
										</div><br>
										<div>
											<label class="account-login-label" for="password" :value="__('Password')">Password *</label><br>
											<input class="account-login-input" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
											<x-input-error :messages="$errors->get('password')" class="mt-2" />
										</div><br>
										<div>
											<label class="account-login-label" for="password_confirmation" :value="__('Confirm Password')">Cornfirm password *</label><br>
											<input class="account-login-input" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
											<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
										</div><br>
										<a href="{{ route('login') }}" class="forget-pass">{{ __('Already registered?') }}</a>
										<button class="mt-4">{{ __('Register') }}</button>
									</form>
								</div>
				            </div>

				            <div class="navigation-auto">
				                <div class="auto-btn1"></div>
				                <div class="auto-btn2"></div>
				            </div>
				        </div>


				       
				    </div>
				</div>
			</div>
		</div>
@endsection
@push('scripts')
<script>
	 	$(document).ready(function(){
		  $(".account-btn").click(function(){
		    $(".account-btn").removeClass('active-account-btn');
		    $(this).addClass('active-account-btn');
		  });
		});
</script>
@endpush