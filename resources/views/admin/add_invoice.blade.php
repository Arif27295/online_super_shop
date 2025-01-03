@extends('layouts.admin_layouts')
@section('page_name')
  Add Invoice
@endsection
@section('content')
<div class="container-fluid py-2">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Invoice Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('invoice')}}">Back</a></h6>
				
              </div>
            </div>
            <form role="form" class="text-start" action="{{route('create_product')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-6">
					 <div class="card-body px-0 pb-2" style="margin:1rem">
					  <div class="input-group input-group-outline my-3 mt-0">
						<div class="brand-label"><label>Sender Name<sup class="text-primary">*</sup></label></div><br>
						<input type="text" id="name" value="{{old('name')}}" name="name" placeholder="Enter product name.. " class="form-control pro_input"><br>
						<span class='text-danger'>@error('name') {{$message}} @enderror</span>
					  </div>
					  <div class="input-group input-group-outline mb-3">
						<div class="brand-label"><label>Phone Number</label><sup class="text-primary">*</sup></div>
						<input  type="number" id="number" value="{{old('number')}}" name="number" class="form-control pro_input" placeholder="Number.."><br>
						<span class='text-danger'>@error('number') {{$message}} @enderror</span>
					  </div>
					  <div class="input-group input-group-outline mb-3">
						<div class="product-label"><label style="color: #111;font-weight: 600;">Sender Full Address<sup class="text-primary">*</sup></label></div>
						<textarea class="form-control pro_input" value="{{old('address')}}" name="address" placeholder="Address.."></textarea><br>
						<span class='text-danger'>@error('address') {{$message}} @enderror</span>
					  </div>
					 </div>
					</div>
					<div class="col-6 part-2">
                        <div class="card-body px-0 pb-2" style="margin:1rem">
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <div class="brand-label"><label>Invoice Number<sup class="text-primary">*</sup></label></div><br>
                                <input type="number" id="in_num" value="{{old('in_num')}}" name="in_num" placeholder="Invoice number.. " class="form-control pro_input"><br>
                                <span class='text-danger'>@error('in_num') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <div class="brand-label"><label>Issue Date<sup class="text-primary">*</sup></label></div><br>
                                <input type="date" id="date" value="{{old('isu_date')}}" name="isu_date" class="form-control pro_input"><br>
                                <span class='text-danger'>@error('isu_date') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <div class="brand-label"><label>Due Date<sup class="text-primary">*</sup></label></div><br>
                                <input type="date" id="date" value="{{old('du_date')}}" name="du_date" class="form-control pro_input"><br>
                                <span class='text-danger'>@error('du_date') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <div class="brand-label"><label>Amount<sup class="text-primary">*</sup></label></div><br>
                                <input type="text" id="amount" value="{{old('amount')}}" placeholder="$0.00" name="amount" class="form-control pro_input"><br>
                                <span class='text-danger'>@error('amount') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline" >
								<div class="product-label"><label style="color: #111;font-weight: 600;">Status<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input_2" value="{{old('featured')}}" name="featured" style="margin-left:30px">
									<option value="0">Paid</option>
									<option value="1">Cancel</option>
									<option value="2">Pending</option>
								</select><br>
								<span class='text-danger'>@error('featured') {{$message}} @enderror</span>
							 </div>
                        </div>                        
					</div>
				</div>
                <hr style="height:1px;background:#d2d6da;opacity:1; width:92%;margin:auto">
                <div class="row">
					<div class="col-6">
                        <div class="card-body px-0 pb-2" style="margin:1rem">
                            <div class="brand-label"><label>Issue From</label><sup class="text-primary">*</sup></div><br>
                            <div class="input-group input-group-outline">
                                <input type="text" id="name" value="{{old('issu_name')}}" name="issu_name" placeholder="First Name.. " class="form-control pro_input"><br>
                                <span class='text-danger'>@error('issu_name') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline">
                                <input  type="number" id="number" value="{{old('issu_number')}}" name="issu_number" class="form-control pro_input" placeholder="Number.."><br>
                                <span class='text-danger'>@error('issu_number') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline">
                                <input  type="number" id="number" value="{{old('issu_email')}}" name="issu_email" class="form-control pro_input" placeholder="Email.."><br>
                                <span class='text-danger'>@error('issu_email') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline">
                                <textarea class="form-control pro_input" value="{{old('issu_address')}}" name="issu_address" placeholder="Address.."></textarea><br>
                                <span class='text-danger'>@error('issu_address') {{$message}} @enderror</span>
                            </div>
					    </div>
					</div>
					<div class="col-6 part-2">
                        <div class="card-body px-0 pb-2" style="margin:1rem">
                            <div class="brand-label"><label>Issue For<sup class="text-primary">*</sup></label></div><br>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <input type="text" id="issu_for_name" value="{{old('issu_for_name')}}" name="issu_for_name" placeholder="First Name.. " class="form-control pro_input"><br>
                                <span class='text-danger'>@error('issu_for_name') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <input type="number" id="issu_for_num" value="{{old('issu_for_num')}}" name="issu_for_num" placeholder="Number.." class="form-control pro_input"><br>
                                <span class='text-danger'>@error('issu_for_num') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline mt-0" style="padding-right:30px">
                                <input type="email" id="issu_for_email" value="{{old('issu_for_email')}}" name="issu_for_email" placeholder="Emial.." class="form-control pro_input"><br>
                                <span class='text-danger'>@error('issu_for_email') {{$message}} @enderror</span>
                            </div>
                            <div class="input-group input-group-outline" style="padding-right:30px">
                                <textarea class="form-control pro_input" value="{{old('issu_for_address')}}" name="issu_for_address" placeholder="Address.."></textarea><br>
                                <span class='text-danger'>@error('issu_for_address') {{$message}} @enderror</span>
                            </div>
                        </div>                        
					</div>
				</div>
                <div class="row">
                    <div class="col-12">
                        <div class="text-center p-text">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
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
   
</script>
@endpush