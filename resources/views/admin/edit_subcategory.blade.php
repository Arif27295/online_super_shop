@extends('layouts.admin_layouts')
@section('page_name')
  Edi Sub Category
@endsection
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Sub Category Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('category')}}">Back</a></h6>
				
              </div>
            </div>
            <div class="card-body px-0 pb-2" style="margin:1rem">
               <form role="form" class="text-start" method="post" action="{{route('update_subcategory',$subCategory->id)}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Sub Category Name<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="name" id="name" placeholder="Name.. "  value="{{$subCategory->name}}" class="form-control"><br>
                    <span class='text-danger'>@error('name') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Sub Category Slug</label></div>
                    <input type="text" readonly name="slug" id="slug" class="form-control" value="{{$subCategory->slug}}" placeholder="Slug..">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <div class="brand-label"><label>Category Name</label></div>
                    <select class="form-select" name="category" style="border:1px solid #d2d6da;">
                      <option>Select category</option>
                      @foreach($categorys as $category)
                      <option value="{{$category->id}}" {{$subCategory->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                      @endforeach
                    </select><br>
                    <span class='text-danger'>@error('category') {{$message}} @enderror</span>
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