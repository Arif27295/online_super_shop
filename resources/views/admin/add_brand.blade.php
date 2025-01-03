@extends('layouts.admin_layouts')
@section('page_name')
  Add Brand
@endsection
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Brand Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('brand')}}">Back</a></h6>
				
              </div>
            </div>
            <div class="card-body px-0 pb-2" style="margin:1rem">
               <form role="form" class="text-start" method="post" action="{{route('create_brand')}}" enctype="multipart/form-data">
                @csrf
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Brand Name<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="name" id="name" placeholder="Name.. "  value="{{old('name')}}" class="form-control"><br>
                    <span class='text-danger'>@error('name') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Brand Slug</label></div>
                    <input type="text" readonly name="slug" id="slug" class="form-control" value="{{old('slug')}}" placeholder="Brand slug..">
                  </div>
				          <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Upload Image<sup class="text-primary">*</sup></label> </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
							            <img src="" class="effect8" alt="" name="image">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="ri-upload-cloud-2-line"></i>
                                </span>
                                <span class="body-text mt-3">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" accept="images/*"><br>
                                <span class='text-danger'>@error('image') {{$message}} @enderror</span>
							            </label>
					            	</div>
                    </div>					
                  </div>
                  <div class="text-center br-text">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
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