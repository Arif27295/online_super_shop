@extends('layouts.home_layouts')
@push('link')
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<!-- Nucleo Icons -->
<link href="{{asset('admin_assets/assets/css/material-dashboard.css')}}" rel="stylesheet" />
<link href="{{asset('admin_assets/assets/css/material-dashboard.min.css')}}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<!-- Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
@endpush
@section('content')
<style>
	.dropdown-category-item{
		display:none;
	}
</style>
<div class="container-fluid">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 position-relative  bg-white my-2" style="float:left;z-index:-1" id="sidenav-main" >
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{asset('admin_assets/assets/img/logo-ct-dark.png')}}" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">Creative Tim</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active nav-dark active_color" href="{{route('user_dashboard')}}">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-dark" href="{{route('user_order')}}">
          <i class="ri-file-text-fill opacity-5"></i>
            <span class="nav-link-text ms-1">Order</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-dark" href="{{route('address')}}">
          <i class="ri-link opacity-5"></i>
            <span class="nav-link-text ms-1">Address</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-dark" href="{{route('user_profile')}}">
          <i class="ri-account-pin-circle-line opacity-5"></i>
            <span class="nav-link-text ms-1">Account Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-dark" href="">
          <i class="ri-heart-2-line opacity-5"></i>
            <span class="nav-link-text ms-1">wishlist</span>
          </a>
        </li>
        <li class="nav-item" style="padding-left:.75rem;">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <i class="ri-logout-box-line" style="padding-left:.75rem"></i>
            <button type='submit' class="logout_btn">
              Log out
            </button>
          </form>
        </li>
      </ul>
    </div>
  </aside>
  @yield('subContent')
</div>
@endsection