@extends('layouts.admin_layouts')
@section('page_name')
  Pages
@endsection
@section('content')
@if(session('delete'))
        <p class="alert alert-danger text-white alert-design">{{session('delete')}}</p>
        @elseif(session('success'))
        <p class="alert alert-success text-white alert-design">{{session('success')}}</p>
        @elseif(session('update'))
        <p class="alert alert-success text-white alert-design">{{session('update')}}</p>
    @endif

<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Menu</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_menu')}}">Add Menu</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">link</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($menus->count() > 0)
                        @foreach($menus as $menu)
                            <tr>
                                <td><p class="text-xs font-weight-bold mb-0">{{$menu->id}}</p></td>
                                <td><p class="text-xs font-weight-bold mb-0">{{$menu->name}}</p></td>
                                <td><p class="text-xs font-weight-bold mb-0">{{$menu->link ? $menu->link : 'N/A'}}</p></td>
                                <td class="align-middle" style="text-align:center">
                                    <a href="edit_menu/{{$menu->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                                    <a href="delete_menu/{{$menu->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <tr><td colspan="3" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                    @endif
                </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$menus->links()}}</div>
              </div>
            </div>
          </div>
          <div class="card my-4 mt-5">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sub Menu</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_submenu')}}">Add Sub Menu</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Menu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if($sub_menus->count() > 0)
                     @foreach($sub_menus as $sub_menu)
                        <tr>
                          <td><p class="text-xs font-weight-bold mb-0">{{$sub_menu->id}}</p></td>
                          <td><p class="text-xs font-weight-bold mb-0">{{$sub_menu->menu->name}}</p></td>
                          <td><p class="text-xs font-weight-bold mb-0">{{$sub_menu->name}}</p></td>
                          <td class="align-middle" style="text-align:center">
                            <a href="edit_sub_menu/{{$sub_menu->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                            <a href="delete_sub_menu/{{$sub_menu->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                          </td>
                        </tr>
                      @endforeach
                      @else
                          <tr><td colspan="5" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                    @endif
                  </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$sub_menus->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
