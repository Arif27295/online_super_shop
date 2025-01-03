@extends('layouts.admin_layouts')
@section('page_name')
  Order Details
@endsection
@section('content')
        @if(session('status'))
        <p class="alert alert-success text-white alert-design">{{session('status')}}</p>
        @endif

<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Ordered Items</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('order')}}">Back</a></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
              <div class="table-responsive p-0">
                <table class="table mt-4 align-items-center mb-0 order_view_table table-striped">
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order No</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->id}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->phone}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zip Code</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->zip}}</p></td>
                    </tr>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Date</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->created_at}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivered Date</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->delivered_date}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Canceled Date</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->canceled_date}}</p></td>
                    </tr>
                    <tr style="border: 1px solid #e5e5e5;">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <td colspan="6" style="text-align:start"><p class="text-xs font-weight-bold mb-0  ms-4">
                        @if($order->status == 'delivered')
                          <span class="badge bg-success p-2">Delivered</span>
                        @elseif($order->status == 'canceled')
                          <span class="badge bg-danger v">Canceled</span>
                        @else
                          <span class="badge bg-warning p-2">Ordered</span>
                        @endif
                        </p></td>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Options</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orderItems ->count() > 0)
                            @foreach($orderItems as $orderItem)
                              <tr style="border:1px solid #e5e5e5">
                                  <td><p class="text-xs font-weight-bold mb-0" style="width:70px"><img src="{{asset('product_image')}}/{{$orderItem->product->image}}" class="ms-1 me-1 border-radius-lg" alt="user1" width="100%"></p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->product->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->price}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->quantity}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->product->SKU}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->product->category->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->product->brand->name}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">{{$orderItem->options}}</p></td>
                                  <td><p class="text-xs font-weight-bold mb-0">
                                    @if($orderItem->rstatus == 0)
                                        No
                                    @else
                                        Yes
                                    @endif
                                  </p></td>
                              </tr>
                            @endforeach
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
              <h6 class="text-dark text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center">Shipping Address</h6>
              <div class="order_details_address pt-4 pb-4">
                  <p>{{$order->name}}</p>
                  <p>{{$order->address}}</p>
                  <p>{{$order->landmark}}</p>
                  <p>{{$order->city}}</p>
                  <p>{{$order->state}}</p>
                  <p>{{$order->zip}}</p>
                  <p>{{$order->country}}</p>
                  <p class="mt-2">Mobile: {{$order->phone}}</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
            <h6 class="text-dark text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center">Transactions</h6>
              <div class="table-responsive p-0">
              <table class="table mt-4 align-items-center mb-0 order_view_table table-striped">
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->subtotal}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tax</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->tax}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->discount}}</p></td>
                    </tr>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->total}}</p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Mode</th>
                      <td><p class="text-xs font-weight-bold mb-0">
                        @if($order->transection->mode == 'cod')
                        Cash On Delivery
                        @elseif($order->transection->mode == 'card')
                        Card
                        @else
                        Paypal
                        @endif
                      </p></td>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Canceled Date</th>
                      <td><p class="text-xs font-weight-bold mb-0">{{$order->canceled_date}}</p></td>
                    </tr>
                    <tr style="border: 1px solid #e5e5e5;">
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <td colspan="6" style="text-align:start"><p class="text-xs font-weight-bold mb-0  ms-4">
                          @if($order->transection ->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                          @elseif($order->transection->status == 'declinded')
                            <span class="badge bg-danger">Declined</span>
                          @elseif($order->transection->status == 'refunded')
                            <span class="badge bg-secondary">Refunded</span>
                          @else
                            <span class="badge bg-warning">Pending</span>
                          @endif
                        </p></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
            <h6 class="text-dark text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center">Update Order Status</h6>
            <form action="{{route('update_status')}}" method="post">
              <div style="display:inline-flex;width:43%;align-items:center">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <div class="input-group input-group-outline me-3" style="width:50%">
                    <select class="form-select pro_input ms-3 mt-3"name="status" style="border:1px solid #d2d6da">
                      <option value="ordered" {{$order->status == 'ordered' ? "selected" : ""}}>Ordered</option>
                      <option value="delivered" {{$order->status == 'delivered' ? "selected" : ""}}>Delivered</option>
                      <option value="canceled" {{$order->status == 'canceled' ? "selected" : ""}}>Canceled</option>
                    </select><br>
                  </div>
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2 mt-0" style="width:30% !important">Update Status</button>
                </div>
              </div>
            </form>
        </div>
      </div>

@endsection
