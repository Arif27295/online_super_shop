@extends('layouts.admin_layouts')
@section('page_name')
  Edit Product
@endsection
@section('content')
<div class="container-fluid py-2">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Product Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('product')}}">Back</a></h6>
				
              </div>
            </div>
            <form role="form" class="text-start" action="{{route('update_product', $edit_data->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-6">
					 <div class="card-body px-0 pb-2" style="margin:1rem">
					  <div class="input-group input-group-outline my-3 mt-0">
						<div class="brand-label"><label>Product Name<sup class="text-primary">*</sup></label></div><br>
						<input type="text" id="name" value="{{$edit_data->name}}" name="name" placeholder="Enter product name.. " class="form-control pro_input"><br>
						<span class='text-danger'>@error('name') {{$message}} @enderror</span>
					  </div>
					  <div class="input-group input-group-outline mb-3">
						<div class="brand-label"><label>Product Slug</label></div>
						<input readonly type="text" id="slug" value="{{$edit_data->slug}}" name="slug" class="form-control pro_input" placeholder="Enter product slug.."><br>
						<span class='text-danger'>@error('slug') {{$message}} @enderror</span>
					  </div>
					  <div class="row">
						<div class="col-6">
							<div class="input-group input-group-outline mb-3">
								<div class="brand-label"><label>Category<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input" value="{{old('category')}}" name="category">
                                    @foreach($categorys as $category)
									<option value="{{$category->id}}" {{$edit_data->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
                                    @endforeach
								</select><br>
								<span class='text-danger'>@error('category') {{$message}} @enderror</span>
							 </div>
						</div>
						<div class="col-6">
							<div class="input-group input-group-outline mb-3">
								<div class="brand-label"><label>Brand<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input" value="{{old('brand')}}" name="brand">
                                    @foreach($brands as $brand)
									<option value="{{$brand->id}}" {{$edit_data->brand_id == $brand->id ? "selected" : ""}}>{{$brand->name}}</option>
                                    @endforeach
								</select><br>
								<span class='text-danger'>@error('brand') {{$message}} @enderror</span>
							 </div>
						</div>
					  </div>
					  <div class="row">
						<div class="col-6">
							<div class="input-group input-group-outline mb-3">
								<div class="brand-label"><label>Tags<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input" value="{{old('tags')}}" name="tags">
									<option value="recommended" {{$edit_data->tags == 'recommended'? "selected" : ""}}>Recommended</option>
									<option value="organic" {{$edit_data->tags == 'organic'? "selected" : ""}}>Organic</option>
								</select><br>
								<span class='text-danger'>@error('tags') {{$message}} @enderror</span>
							 </div>
						</div>
						<div class="col-6">
							<div class="input-group input-group-outline my-3 mt-0">
								<div class="product-label"><label style="color: #111;font-weight: 600;">Discount percentage</label></div><br>
								<input type="number" value="{{$edit_data->pro_discount}}" name="discount" placeholder="Percentage.." class="form-control pro_input"><br>
								<span class='text-danger'>@error('discount') {{$message}} @enderror</span>
							  </div>
						</div>
					  </div>
					  <div class="input-group input-group-outline mb-3">
						<div class="product-label"><label style="color: #111;font-weight: 600;">Short Description<sup class="text-primary">*</sup></label></div>
						<textarea class="form-control pro_input" value="{{$edit_data->short_description}}" name="sho_description" placeholder="Short Description..">{{$edit_data->short_description}}</textarea><br>
						<span class='text-danger'>@error('sho_description') {{$message}} @enderror</span>
					  </div>
					  <div class="input-group input-group-outline mb-3">
						<div class="brand-label"><label>Description<sup class="text-primary">*</sup></label></div>
						<textarea class="form-control pro_input" value="{{$edit_data->description}}" name="description" placeholder="Description..">{{$edit_data->description}}</textarea><br>
						<span class='text-danger'>@error('description') {{$message}} @enderror</span>
					  </div>
					  <div class="text-center p-text">
						<button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update</button>
					  </div>
					 </div>
					</div>
					<div class="col-6 part-2">
						<div class="card-body px-0 pb-2" style="margin:1rem">
						 <div class="input-group input-group-outline mb-3">
							<label style="color: #111;font-weight: 600;">Upload Image<sup class="text-primary">*</sup></label>
							<div class="upload-image flex-grow pro_input_2">
								<div class="item" id="imgpreview">
									<img src="{{asset('product_image')}}/{{$edit_data->image}}" class="effect8" alt="{{$edit_data->image}}" name="image2">
								</div>
								<div id="upload-file" class="item up-load">
									<label class="uploadfile" for="myFile">
										<span class="icon">
											<i class="ri-upload-cloud-2-line"></i>
										</span>
										<span class="body-text mt-3">Drop your images here or select <span class="tf-color">click to browse</span></span>
										<input type="file" id="myFile" name="image" value="{{$edit_data->image}}" accept="image/*">
									</label>
								</div>
							</div><br>
							<span class='text-danger'>@error('image') {{$message}} @enderror</span>					
						  </div>
						 <div class="input-group input-group-outline mb-3">
							<label style="color: #111;font-weight: 600;">Upload Gallery Images<sup class="text-primary">*</sup></label>
							<div class="upload-image flex-grow pro_input_2">
								<div class="item multiple_image" id="galUpload">
									@foreach($images as $image)
									<div class="item gitems showing-images border-0" style="position:relative">
										<a class="del_images" href="delete_images/{{$image->id}}"><i class="ri-close-line"></i></a>
										<img id="images" style="float:left;height:100%;margin-right:5px" src="{{asset('images')}}/{{$image->images}}" alt="{{$image->images}}"/>
									</div>
									@endforeach	
								</div>
								<div id="upload-file" class="item up-load">
									<label class="uploadfile" for="gFile">
										<span class="icon">
											<i class="ri-upload-cloud-2-line"></i>
										</span>
										<span class="body-text mt-3">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                        <input type="file" id="gFile" name="images[]" value="{{$image->images}}" accept="image/*" multiple="">
									</label>
								</div>
							</div><br>
							<span class='text-danger'>@error('images[]') {{$message}} @enderror</span>				
						  </div>
						  <div class="row">
							<div class="col-6 part-2">
								<div class="input-group input-group-outline mb-3">
									<label style="color: #111;font-weight: 600;">Regular Price<sup class="text-primary">*</sup></label>
									<input type="number" class="form-control pro_input_2" value="{{$edit_data->regular_price}}" name="reg_price" placeholder="Enter regular price.."><br>
									<span class='text-danger'>@error('reg_price') {{$message}} @enderror</span>
								 </div>
							</div>
							<div class="col-6 part-2">
								<div class="input-group input-group-outline mb-3">
									<label style="color: #111;font-weight: 600;">Sale Price<sup class="text-primary">*</sup></label>
									<input type="number" class="form-control pro_input_2" value="{{$edit_data->sale_price}}" name="sal_price" placeholder="Enter sale price.."><br>
									<span class='text-danger'>@error('sal_price') {{$message}} @enderror</span>
								</div>
							</div>
						  </div>
						  <div class="row">
							<div class="col-6 part-2">
								<div class="input-group input-group-outline mb-3">
									<label style="color: #111;font-weight: 600;">SKU<sup class="text-primary">*</sup></label>
									<input type="text" class="form-control pro_input_2" value="{{$edit_data->SKU}}" name="sku" placeholder="Enter SKU.."><br>
									<span class='text-danger'>@error('sku') {{$message}} @enderror</span>
								 </div>
							</div>
							<div class="col-6 part-2">
								<div class="input-group input-group-outline mb-3">
									<label style="color: #111;font-weight: 600;">Quantity<sup class="text-primary">*</sup></label>
									<input type="number" value="{{$edit_data->qty}}" name="qty" class="form-control pro_input_2" placeholder="Enter quantity.."><br>
									<span class='text-danger'>@error('qty') {{$message}} @enderror</span>
								</div>
							</div>
						  </div>
						  <div class="row">
						<div class="col-6">
							<div class="input-group input-group-outline mb-3">
								<div class="produc-label"><label style="color: #111;font-weight: 600;">Stock<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input_2" value="{{old('stock')}}" name="stock">
									<option value="instock" {{$edit_data->stock == 'instock' ? "selected" : ""}}>Instock</option>
									<option value="outofstock" {{$edit_data->stock == 'outofstock' ? "selected" : ""}}>Out Of Stock</option>
								</select><br>
								<span class='text-danger'>@error('stock') {{$message}} @enderror</span>
							 </div>
						</div>
						<div class="col-6">
							<div class="input-group input-group-outline mb-3">
								<div class="product-label"><label style="color: #111;font-weight: 600;">Featured<sup class="text-primary">*</sup></label></div>
								<select class="form-select pro_input_2" value="{{old('featured')}}" name="featured">
									<option value="0" {{$edit_data->featured == '0' ? "selected" : ""}}>No</option>
									<option value="1" {{$edit_data->featured == '1' ? "selected" : ""}}>Yes</option>
								</select><br>
								<span class='text-danger'>@error('featured') {{$message}} @enderror</span>
							 </div>
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
    $(function(){
        $('#myFile').on("change",function(e){
            const photoInp = $("#myFile");
            const [file] = this.files;
            if(file){
                $('#imgpreview img').attr('src', URL.createObjectURL(file));
                $('#imgpreview').show();
            }
        });
        $('#gFile').on("change",function(e){
            const photoInp = $("#gFile");
            const gphotos = this.files;
            $.each(gphotos, function(key,val){
                $('#galUpload').prepend(`<div class="item gitems border-0"><img style="float:left;height:100%;margin-right:5px" src="${URL.createObjectURL(val)}"/></div>`);
                $('.showing-images').remove();
            });
        });
        
        $('#name').on('keyup', function(){
          var theTitle = this.value.toLowerCase().trim();
          slugInput = $("#slug"),
          theSlug = theTitle.replace(/&/g, '-and-')
          .replace(/[^a-z0-9-]+/g, '-')
          .replace(/\-\-+/g, '-')
          .replace(/^-+|-+&/g, '');
          slugInput.val(theSlug);
      }); 
    }); 
</script>
@endpush