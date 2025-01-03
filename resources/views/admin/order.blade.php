@extends('layouts.admin_layouts')
@section('page_name')
  Order
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Order</span></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-striped">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subtotal</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tax</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Items</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delivered On</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($orders->count() > 0)
                    @foreach($orders as $order)
                    <tr>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->id}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->name}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->phone}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->subtotal}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->tax}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->total}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">
                        @if($order->status == 'delivered')
                        <span class="badge bg-success">Delivered</span>
                        @elseif($order->status == 'canceled')
                        <span class="badge bg-danger">canceled</span>
                        @else
                          <span class="badge bg-warning">Ordered</span>
                        @endif
                      </p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->created_at}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->orderItem->count()}}</p></td>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->delivered_date}}</p></td>
                      <td class="align-middle" style="text-align:center;display:flex;align-items:center;justify-content:space-around">
                        <a href="{{route('order_details', $order->id)}}" style="color:#233A95;"><i class="ri-eye-line"></i></a>
                        <a href="{{route('order_details_delete', $order->id)}}" style="color:#233A95;"><i class="ri-delete-bin-2-line"></i></a>
                      </td>
                    </tr>
                    @endforeach
                  @else
                     <tr><td colspan="13" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                  @endif
                  </tbody>
                </table><br>
                <div class="paginate ps-4 pe-4">{{$orders->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
