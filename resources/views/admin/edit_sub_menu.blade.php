@extends('layouts.admin_layouts')
@section('page_name')
  Add Sub Menu
@endsection
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sub Menu Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('pages')}}">Back</a></h6>
				
              </div>
            </div>
            <div class="card-body px-0 pb-2" style="margin:1rem">
               <form role="form" class="text-start" method="post" action="{{route('update_submenu',$sub_menu->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Menu Name</label></div>
                    <select class="form-select" value="{{old('menu')}}" name="menu_id" style="border:1px solid #d2d6da;">
                      <option>Select Menu</option>
                      @foreach($menus as $menu)
                         <option value="{{$menu->id}}" {{$sub_menu->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                      @endforeach
                    </select><br>
                    <span class='text-danger'>@error('menu') {{$message}} @enderror</span>
                  </div>
                    <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Sub Menu Name<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="name" id="name" placeholder="Name.. "  value="{{$sub_menu->name}}" class="form-control"><br>
                    <span class='text-danger'>@error('name') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Sub Menu Link<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="link" id="link" placeholder="Link.. "  value="{{$sub_menu->link ? $sub_menu->link : 'N/A'}}" class="form-control"><br>
                  </div>
                  <div class="text-center br-text">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection