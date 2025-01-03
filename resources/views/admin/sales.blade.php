@extends('layouts.admin_layouts')
@section('page_name')
  Sales
@endsection
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sales</span> <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('add_sales')}}">Add Sales</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Items</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purchase Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($orders->count() > 0)
                      @foreach($orders as $order)
                      <tr>
                        <td><p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->name}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->phone}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->total}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->status}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->shop_order_items->count()}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->created_at->format('F j, Y')}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$order->return_date ? $order->return_date : 'N/A'}}</p></td>
                        <td class="align-middle" style="text-align:center">
                          <a href="edit_sales/{{$order->id}}" class="badge badge-sm bg-gradient-success me-2">Edit</a>
                          <a href="delete_sales/{{$order->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
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
