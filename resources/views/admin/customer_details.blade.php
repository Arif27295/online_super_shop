@extends('layouts.admin_layouts')
@section('page_name')
  Customer Info
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Customer Info</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('customer')}}">Back</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
              <div class="table-responsive p-0">
                <table class="table mt-4 align-items-center mb-0 order_view_table table-striped">
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Orders</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$customer_det[0]->Total ? $customer_det[0]->Total : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Orders Amount</th>
                      <td><p class="text-xs font-weight-bold mb-0">${{$customer_det[0]->TotalAmount ? $customer_det[0]->TotalAmount : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pending Order</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$customer_det[0]->TotalOrdered ? $customer_det[0]->TotalOrdered : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pending Amount</th>
                      <td><p class="text-xs font-weight-bold mb-0">${{$customer_det[0]->TotalOrderAmount ? $customer_det[0]->TotalOrderAmount : 0}}</p></td>
                    </tr>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivered Orders</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$customer_det[0]->TotalDelivered ? $customer_det[0]->TotalDelivered : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivered Amount</th>
                      <td><p class="text-xs font-weight-bold mb-0">${{$customer_det[0]->TotalDeliveredAmount ? $customer_det[0]->TotalDeliveredAmount : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Canceled Order</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$customer_det[0]->TotalCanceled ? $customer_det[0]->TotalCanceled : 0}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Canceled Amount</th>
                      <td><p class="text-xs font-weight-bold mb-0">${{$customer_det[0]->TotalCanceledAmount ? $customer_det[0]->TotalCanceledAmount : 0}}</p></td>
                    </tr>
                </table>
                <table class="table mt-5 align-items-center mb-0 order_view_table table-striped">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Mode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivered Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Canceled Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($orders ->count() > 0)
                         @foreach($orders as $order)
                             @foreach($order->orderItem as $orderItems)
                              <tr style="border:1px solid #e5e5e5">
                                  <td><p class="text-xs font-weight-bold mb-0" style="width:70px"><img src="{{asset('product_image')}}/{{$orderItems->product->image}}" class="ms-1 me-1 border-radius-lg" alt="user1" width="100%"></p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItems->product->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$order->total}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItems->quantity}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItems->product->SKU}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItems->product->category->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItems->product->brand->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">
                                    @if($order->transections)
                                    @foreach($order->transections as $data)
                                    @if($data->mode == 'cod')
                                        Cash On Delivery
                                        @elseif($data->mode == 'card')
                                        Card
                                        @else
                                        Paypal
                                        @endif
                                        @endforeach
                                        @endif
                                      </p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">
                                    @if($order->status == 'delivered')
                                      <span class="badge bg-success p-2">Delivered</span>
                                    @elseif($order->status == 'canceled')
                                      <span class="badge bg-danger v">Canceled</span>
                                    @else
                                      <span class="badge bg-warning p-2">Ordered</span>
                                    @endif
                                  </p></td>
                                   <td><p class="text-xs font-weight-bold mb-0">{{$order->created_at->format('F j, Y')}}</p></td>
                                   <td><p class="text-xs font-weight-bold mb-0">
                                      {{ $order->delivered_date ? \Carbon\Carbon::parse($order->delivered_date)->format('F j, Y') : 'N/A' }}
                                  </p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">
                                      {{ $order->canceled_date ? \Carbon\Carbon::parse($order->canceled_date)->format('F j, Y') : 'N/A' }}
                                  </p></td>
                                  <td>
                                      <a href="{{route('order_details', $order->id)}}" style="color:#233A95;margin-right:10px"><i class="ri-eye-line"></i></a>
                                      <a href="{{route('order_details_delete', $order->id)}}" style="color:#233A95;"><i class="ri-delete-bin-2-line"></i></a>
                                  </td>
                              </tr>
                          @endforeach
                        @endforeach
                      @else
                        <tr><td colspan="13" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No order here.</p><td></tr>
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-body px-0 pb-2" style="margin: 0px 1rem">
              <h6 class="text-dark text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center">Address</h6>
              <div class="order_details_address pt-4 pb-4">
              <p>{{$address->name}}</p>
                  <p>{{$address->address}}</p>
                  <p>{{$address->landmark}}</p>
                  <p>{{$address->city}}</p>
                  <p>{{$address->state}}</p>
                  <p>{{$address->zip}}</p>
                  <p>{{$address->country}}</p>
                  <p class="mt-2">Mobile: {{$address->phone}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection
