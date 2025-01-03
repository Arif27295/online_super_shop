@extends('layouts.admin_layouts')
@section('page_name')
  Customer
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
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Customer</span></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0 table-striped">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Country</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Registered</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($address->count() > 0)
                      @foreach($address as $c_address)
                      <tr>
                        <td><p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$c_address->name}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$c_address->User->email}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$c_address->phone}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$c_address->country}}</p></td>
                        <td><p class="text-xs font-weight-bold mb-0">{{$c_address->created_at->format('F j, Y')}}</p></td>
                        <td class="align-middle" style="text-align:center">
                          <a href="cus_detils_view/{{$c_address->id}}" class="badge badge-sm bg-gradient-success me-2">View</a>
                          <a href="cus_delete/{{$c_address->id}}" class="badge badge-sm bg-gradient-primary">delete</a>
                        </td>
                      </tr>
                      @endforeach
                    @else
                     <tr><td colspan="5" style="text-align:center;"> <p class="text-xs text-secondary mb-0">No data here.</p><td></tr>
                    @endif
                  </tbody>
                </table>
                <div class="paginate ps-4 pe-4">{{$address->links()}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
