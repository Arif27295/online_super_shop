@extends('layouts.admin_layouts')
@section('page_name')
  Edit Banner
@endsection
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Banner Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('left_side_banner')}}">Back</a></h6>
				
              </div>
            </div>
            <div class="card-body px-0 pb-2" style="margin:1rem">
               <form class="text-start" method="post" action="{{route('update_sidebar_banner', $banner->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Banner Title<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="title"  placeholder="Title.. "  value="{{$banner->title}}" class="form-control"><br>
                    <span class='text-danger'>@error('title') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Banner Subtitle<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="subtitle" placeholder="Subtitle.. "  value="{{$banner->subtitle}}" class="form-control"><br>
                    <span class='text-danger'>@error('subtitle') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Banner Tag<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="tag" placeholder="Tag.. "  value="{{$banner->tag}}" class="form-control"><br>
                    <span class='text-danger'>@error('tag') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Price<sup class="text-primary">*</sup></label></div>
                    <input type="number" name="price" placeholder="Price.. " step=".01"  value="{{$banner->price}}" class="form-control"><br>
                    <span class='text-danger'>@error('price') {{$message}} @enderror</span>
                  </div>
				          <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Upload Image<sup class="text-primary">*</sup></label> </div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview">
							            <img src="{{asset('banner_image')}}/{{$banner->image}}" class="effect8" alt="{{$banner->image}}" name="image">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="ri-upload-cloud-2-line"></i>
                                </span>
                                <span class="body-text mt-3">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="myFile" name="image" value="{{$banner->image}}" accept="images/*"><br>
                                <span class='text-danger'>@error('image') {{$message}} @enderror</span>
							            </label>
					            	</div>
                    </div>					
                  </div>
                  <div class="text-center br-text">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update</button>
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
    }); 
</script>
@endpush