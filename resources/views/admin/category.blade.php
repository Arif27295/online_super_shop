@extends('layouts.admin_layouts')
@section('page_name')
  Category
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Category</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_category')}}">Add Category</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($categories->count() > 0)
                    @foreach($categories as $category)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$category->id}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$category->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$category->slug}}</p>
                      </td>
                      <td class="align-middle" style="text-align:center">
                        <a href="edit_category/{{$category->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                        <a href="delete_category/{{$category->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr><td colspan="6" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                  @endif
                  </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$categories->links()}}</div>
              </div>
            </div>
          </div>
          <div class="card my-4 mt-5">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sub Category</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_subcategory')}}">Add Sub Category</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($subCategory->count() > 0)
                    @foreach($subCategory as $subCategory)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$subCategory->id}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$subCategory->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$subCategory->slug}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$subCategory->category->name}}</p>
                      </td>
                      <td class="align-middle" style="text-align:center">
                        <a href="edit_subcategory/{{$subCategory->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                        <a href="delete_subcategory/{{$subCategory->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                    <tr><td colspan="5" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
