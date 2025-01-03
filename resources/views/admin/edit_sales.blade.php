@extends('layouts.admin_layouts')
@section('page_name')
  Add Sales
@endsection
@section('content')
<div class="container-fluid py-2">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sales Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('sales')}}">Back</a></h6>

              </div>
            </div>
            <form role="form" class="text-start" action="{{route('add_sals_product')}}" method="POST">
			    @csrf
              <div class="row">
				<div class="col-6">
                  <div class="card-body px-0 pb-2" style="margin:1rem">
                    <div class="brand-label"><label>Issue From</label><sup class="text-primary">*</sup></div><br>
                    <div class="input-group input-group-outline">
                      <input type="text" readonly value="{{$address->name}}"class="form-control pro_input"><br>
                     </div>
                    <div class="input-group input-group-outline">
                      <input  type="number" readonly value="{{$address->phone}}" class="form-control pro_input"><br>
                    </div>
                    <div class="input-group input-group-outline">
                      <input  type="text" readonly value="{{$address->User->email}}" class="form-control pro_input"><br>
                    </div>
                    <div class="input-group input-group-outline">
                      <textarea class="form-control pro_input" readonly value="{{old('issu_address')}}" name="issu_address" placeholder="Address..">{{$address->address}}, {{$address->locality}}, {{$address->city}}, {{$address->state}}, {{$address->zip}}, {{$address->country}},
                      </textarea><br>
                    </div>
				  </div>
				</div>
				<div class="col-6 part-2">
                  <div class="card-body px-0 pb-2" style="margin:1rem">
                    <div class="brand-label"><label>Issue For<sup class="text-primary">*</sup></label></div><br>
                    <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                      <input type="text" id="issu_for_name" value="{{$edit_data->name}}" name="issu_for_name" placeholder="First Name.. " class="form-control pro_input"><br>
                      <span class='text-danger'>@error('issu_for_name') {{$message}} @enderror</span>
                    </div>
                    <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                      <input type="number" id="issu_for_num" value="{{$edit_data->phone}}" name="issu_for_num" placeholder="Number.." class="form-control pro_input"><br>
                      <span class='text-danger'>@error('issu_for_num') {{$message}} @enderror</span>
                    </div>
                    <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                      <input type="email" id="issu_for_email" value="{{$edit_data->email}}" name="issu_for_email" placeholder="Emial.." class="form-control pro_input"><br>
                      <span class='text-danger'>@error('issu_for_email') {{$message}} @enderror</span>
                    </div>
                    <div class="input-group input-group-outline" style="padding-right:30px">
                      <textarea class="form-control pro_input" value="{{$edit_data->address}}" name="issu_for_address" placeholder="Address..">{{$edit_data->address}}</textarea><br>
                      <span class='text-danger'>@error('issu_for_address') {{$message}} @enderror</span>
                    </div>
                  </div>
			    </div>
			  </div>
              <hr style="height:1px;background:#d2d6da;opacity:1; width:92%;margin:auto">
              <div class="row d-flex justify-content-between">
				<div class="col-8">
                  <div class="row">
                    <div class="col-10">
                      <div class="card-body px-0 pb-2" style="margin:1rem;position:relative">
                        <div class="input-group sales_search_product my-3 mt-0 mb-0 " style="border-radius: 6px 6px 0px 0px !important;">
                          <input type="text" class="form-control" id="search-input" placeholder="Search product name..">
                          <span class="input-group-text"><i class="ri-search-line"></i></span>
                        </div>
                        <ul id="search-results" class="list-group"></ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-body px-0 pb-2" style="margin:1rem;padding-left:30px !important">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>
                        <tbody id="selected-products">
                            @if($edit_data->shop_order_items->count() > 0)
                                @foreach ($edit_data->shop_order_items as $item )
                                    <tr>
                                        <td><img src="{{asset('product_image')}}/{{$item->product->image}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"></td>
                                        <td><p class="text-xs font-weight-bold mb-0">{{$item->product->name}}</p></td>
                                         <td style="display:none;">
                                            <input name="product_id[]" value="{{$item->id}}">
                                          </td>
                                        <td><p class="text-xs font-weight-bold mb-0">$<input class="sals_checkout" readonly id="price" name="price[]" style="width:50px;" value="{{$item->product->sale_price}}"></p></td>
                                        <td class="">
                                              <div id="field1">
                                                <button type="button" id="sub" class="sub me-2" style="font-size:1.25rem!important;width:1.75rem;height:1.75rem;color:#737373">-</button>
                                                <input type="number" name="quantity[]" id="quantity" value="{{$item->quantity}}" readonly  value="1" min="1" style="font-size:.75rem!important;color:#737373"/>
                                                <button type="button" id="add" class="add" style="font-size:1.25rem!important;width:1.75rem;height:1.75rem; color:#737373">+</button>
                                              </div>
                                        </td>
                                        <td><p class="text-xs font-weight-bold mb-0">$<input class="sals_checkout sals_total" readonly id="total"style="width:50px" value="{{$item->price}}"></p></td>
                                        <td class="align-middle" style="text-align:center">
                                          <a class="badge delete-row badge-sm bg-gradient-primary" style="cursor:pointer">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                  </div>
                </div>
					      <div class="col-4">
                  <div class="card-body px-0 pb-2" style="margin:1rem;padding-right:30px !important;">
                        <table class="table align-items-center mb-0 table-striped" style="border:1px solid #e5e5e5;">
                            <tr class="bg-primary">
                              <th colspan="2" class="text-uppercase text-secondary text-xxs font-weight-bolder text-white">Cart Totals</th>
                            </tr>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Total</th>
                              <td style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">$<input name='subtotal' value="{{$edit_data->subtotal}}" class="sals_checkout bg-transparent" readonly id="grand-total" style="width:50px"></p></td>
                            </tr>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                              <td style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">$<input name="discount" value="{{$edit_data->discount}}" class="sals_checkout bg-transparent" readonly id="discount-value" style="width:50px"></p></td>
                            </tr>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                              <td style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">$<input name="total" value="{{$edit_data->total}}" class="sals_checkout bg-transparent font-weight-bold text-primary" readonly id="sum-total" style="width:50px"></p></td>
                            </tr>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Paid</th>
                              <td style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">$<input name="paid" value="{{$edit_data->paid}}" class="sals_checkout bg-transparent paid" readonly  style="width:50px"></p></td>
                            </tr>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Due</th>
                              <td style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">$<input name="due" value="{{$edit_data->due}}" class="sals_checkout bg-transparent due" readonly  style="width:50px"></p></td>
                            </tr>
                        </table>
                        <div class="mt-3" style="border:1px solid #e5e5e5;">
                          <table class="table align-items-center mb-0 table-striped">
                              <tr class="bg-primary">
                                <th colspan="2" class="text-uppercase text-secondary text-xxs font-weight-bolder text-white">Payment options</th>
                              </tr>
                              <tr>
                                <td colspan="2" style="border-bottom:1px solid #e5e5e5"><p class="text-xs font-weight-bold mb-0">
                                  <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('sales')}}">Cash</a>
                                  <a class="m-0 text-white text-capitalize btn bg-success me-3" href="{{route('sales')}}">Card</a>
                                  <a class="m-0 text-white text-capitalize btn bg-secondary me-3" href="{{route('sales')}}">Paypal</a>
                                </p></td>
                              </tr>
                          </table>
                            <div style="padding:15px">
                              <div class="input-group input-group-outline">
                                <input type="number" id="pay" placeholder="Pay.. " class="form-control">
                              </div>
                              <div class="input-group input-group-outline mt-3 d-flex" style="align-items:center;">
                                <input type="number" id="discount"  placeholder="Discount.. " class="form-control">
                                <p class="text-xs font-weight-bold mb-0 me-2 ms-2">OR</p>
                                <input type="number" placeholder="Discount (%).. " class="form-control percentage_discount">
                                </div>
                              <div class="input-group input-group-outline mt-3">
                                <input value="Sale Now" id="submit-from" class="form-control bg-primary text-white text-center">
                              </div>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                            <a class="m-0 text-white text-capitalize btn bg-primary me-3"  data-bs-toggle="tooltip" title="Hold" href="{{route('sales')}}"><i class="ri-pause-mini-line"></i></a>
                            <a class="m-0 text-white text-capitalize btn bg-primary me-3"  data-bs-toggle="tooltip" title="Restore" href="{{route('sales')}}"><i class="ri-reset-left-line"></i></a>
                            <a class="m-0 text-white text-capitalize btn bg-primary me-3"  data-bs-toggle="tooltip" title="Replace" href="{{route('sales')}}"><i class="ri-loop-left-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
@endsection
@push('scripts')
<script type='text/javascript'>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    $(document).ready(function(){


              $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: '{{ route("search_product") }}',
                        type: 'GET',
                        data: { query: query },
                        success: function(products) {
                            $('#search-results').empty();
                            products.forEach(function(product) {
                                $('#search-results').append(`
                                    <li class="list-group-item select-product" data-id="${product.id}" data-image="${product.image}" data-name="${product.name}" data-price="${product.sale_price}">
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                              <img src="{{asset('product_image')}}/${product.image}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                              <h6 class="mb-0 text-sm">${product.name} - $${product.sale_price}</h6>
                                            </div>
                                        </div>
                                    </li>
                                `);
                            });
                        }
                    });
                }
              });


            // Search products
            $('#search-input').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: '{{ route("search_product") }}',
                        type: 'GET',
                        data: { query: query },
                        success: function(products) {
                            $('#search-results').empty();
                            products.forEach(function(product) {
                                $('#search-results').append(`
                                    <li class="list-group-item select-product" data-id="${product.id}" data-image="${product.image}" data-name="${product.name}" data-price="${product.sale_price}">
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                              <img src="{{asset('product_image')}}/${product.image}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                              <h6 class="mb-0 text-sm">${product.name} - $${product.sale_price}</h6>
                                            </div>
                                        </div>
                                    </li>
                                `);
                            });
                        }
                    });
                } else {
                    $('#search-results').empty();
                }
            });

            // Select product and append to list
            $(document).on('click', '.select-product', function() {

                let productId = $(this).data('id');
                let productName = $(this).data('name');
                let productPrice = $(this).data('price');
                let productImage = $(this).data('image');

                $('#selected-products').append(`
                    <tr>
                    <td><img src="{{asset('product_image')}}/${productImage}"" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"></td>
                    <td><p class="text-xs font-weight-bold mb-0">${productName}</p></td>
                         <td style="display:none;">
                            <input name="product_id[]" value="${productId}">
                          </td>
                        <td><p class="text-xs font-weight-bold mb-0">$<input class="sals_checkout" readonly id="price" name="price[]" style="width:50px;" value="${productPrice}"></p></td>
                        <td class="">
                              <div id="field1">
                                <button type="button" id="sub" class="sub me-2" style="font-size:1.25rem!important;width:1.75rem;height:1.75rem;color:#737373">-</button>
                                <input type="number" name="quantity[]" id="quantity" readonly  value="1" min="1" style="font-size:.75rem!important;color:#737373"/>
                                <button type="button" id="add" class="add" style="font-size:1.25rem!important;width:1.75rem;height:1.75rem; color:#737373">+</button>
                              </div>
                        </td>
                        <td><p class="text-xs font-weight-bold mb-0">$<input class="sals_checkout sals_total" readonly id="total"style="width:50px" value="${productPrice}"></p></td>
                        <td class="align-middle" style="text-align:center">
                          <a class="badge delete-row badge-sm bg-gradient-primary" style="cursor:pointer">delete</a>
                        </td>
                    </tr>
                `);

                $(this).closest('li').remove();
                $('#search-input').val("");


                  $('#discount').on('keyup', function () {
                      let discount = parseFloat($(this).val()) || 0;
                      let sub_total = parseFloat($('#grand-total').val()) || 0;


                      if (discount > sub_total) {
                          discount = sub_total;
                          $(this).val(discount);
                      }

                      let sum_total = sub_total - discount;

                      $('#discount-value').val(discount.toFixed(2));
                      $('#sum-total').val(sum_total.toFixed(2));

                      let paid = parseFloat($('.paid').val()) || 0;
                      let due = sum_total - paid;

                      $('.due').val(due.toFixed(2));
                      if($(this).val() !== ""){
                        $('.percentage_discount').attr('readonly', true);
                      }else{
                        $('.percentage_discount').attr('readonly', false);
                      }
                  });

                  $('.percentage_discount').on('keyup', function () {
                      let discountPercentage = parseFloat($(this).val()) || 0;
                      let sub_total = parseFloat($('#grand-total').val()) || 0;


                      if (discountPercentage > 100) {
                          discountPercentage = 100;
                          $(this).val(discountPercentage);
                      }

                      let discount = (sub_total * discountPercentage) / 100;
                      let sum_total = sub_total - discount;

                      $('#discount-value').val(discount.toFixed(2));
                      $('#sum-total').val(sum_total.toFixed(2));

                      let paid = parseFloat($('.paid').val()) || 0;
                      let due = sum_total - paid;
                      $('.due').val(due.toFixed(2));
                      if($(this).val() !== ""){
                        $('#discount').attr('readonly', true);
                      }else{
                        $('#discount').attr('readonly', false);
                      }
                  });


                $('#pay').on('keyup', function () {
                    let pay = parseFloat($(this).val()) || 0;
                    let sum_total = parseFloat($('#sum-total').val()) || 0;

                    if (pay > sum_total) {
                        pay = sum_total;
                        $(this).val(pay);
                    }

                    let total_due = sum_total - pay;

                    $(".paid").val(pay.toFixed(2));
                    $(".due").val(total_due.toFixed(2));
                });

                function updateGrandTotal() {
                  let Total = 0;

                  $('.sals_total').each(function () {
                      let rowTotal = parseFloat($(this).val());
                      if (!isNaN(rowTotal)) {
                          Total += rowTotal;
                      }
                  });

                  $('#grand-total').val(Total.toFixed(2));

                  let discount = parseFloat($('#discount-value').val()) || 0;
                  let sum_total = Total - discount;

                  $('#sum-total').val(sum_total.toFixed(2));

                  let pay = parseFloat($('.paid').val()) || 0;
                  let sum_due = sum_total - pay;

                  $('.due').val(sum_due.toFixed(2));
              }

             $('.add').click(function () {
                  if ($(this).prev().val() > 0) {
                      var quantity =+ $(this).prev().val() + 1;
                      $(this).prev().val(quantity);
                      var price = $(this).closest('tr').find('#price').val();
                      var total = quantity * price;
                      $(this).closest('tr').find('#total').val(total.toFixed(2));
                      updateGrandTotal();
                  }
              });



                $('.sub').click(function () {
                  if ($(this).next().val() > 1) {
                      var quantity = $(this).next().val() - 1;
                      $(this).next().val(quantity);
                      var price = $(this).closest('tr').find('#price').val();
                      var total = quantity * price;
                      $(this).closest('tr').find('#total').val(total.toFixed(2));
                      updateGrandTotal();
                  }
              });


              $(document).on('click', '.delete-row', function () {
                  $(this).closest('tr').remove();
                  updateGrandTotal();
              });

              updateGrandTotal();

            });

	 });

</script>
@endpush
