@extends('layouts.admin_layouts')
@section('content')
@if(session('delete'))
        <p class="alert alert-danger text-white alert-design">{{session('delete')}}</p>
        @elseif(session('success'))
        <p class="alert alert-success text-white alert-design">{{session('success')}}</p>
    @endif

<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Product</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_product')}}">Add Product</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sale Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tags</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Category</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Featured</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stock</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($products->count() > 0)
                    @foreach($products as $product)
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{asset('product_image')}}/{{$product->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->regular_price}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->sale_price}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->pro_discount}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->tags}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->SKU}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->category->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->subCategory ? $product->subCategory->name : 'N/A' }}
                        </p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->brand->name}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->featured == 0 ? 'No' : 'Yes'}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->stock}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->qty}}</p>
                      </td>
                      <td class="align-middle" style="text-align:center">
                        <a href="edit_product/{{$product->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                        <a href="delete_product/{{$product->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                  <tr><td colspan="13" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                  @endif
                  </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$products->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
