@extends('layouts.admin_layouts')
@section('page_name')
Banner
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Banner</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_weekend_banner')}}">Add Banner</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtitle</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount Offer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($banners->count() > 0)
                    @foreach($banners as $banner)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$banner->id}}</p>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('banner_image')}}//{{$banner->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$banner->title}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$banner->subtitle}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$banner->discount_offer}}</p>
                      </td>
                      <td class="align-middle" style="text-align:center">
                        <a href="edit_weekend_banner/{{$banner->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                        <a href="delete_weekend_banner/{{$banner->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                  <tr><td colspan="6" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here..</p><td></tr>
                  @endif
                  </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$banners->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
