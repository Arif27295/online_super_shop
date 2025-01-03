@extends('layouts.admin_layouts')
@section('page_name')
  Edit Menu
@endsection
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Edit Menu Information</span> <a class="m-0 text-white text-capitalize btn bg-primary me-3" href="{{route('pages')}}">Back</a></h6>
				
              </div>
            </div>
            <div class="card-body px-0 pb-2" style="margin:1rem">
               <form role="form" class="text-start" method="post" action="{{route('update_menu',$menu->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Menu Name<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="name" id="name" placeholder="Name.. "  value="{{$menu->name}}" class="form-control" required><br>
                    <span class='text-danger'>@error('name') {{$message}} @enderror</span>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Icon Name<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="icon_name" id="icon_name" placeholder="Icon Name.. "  value="{{$menu->icon_name ? $menu->icon_name : 'null'}}" class="form-control"><br>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <div class="brand-label"><label>Link<sup class="text-primary">*</sup></label></div>
                    <input type="text" name="link" id="link" placeholder="Link.. "  value="{{$menu->link ? $menu->link : 'null'}}" class="form-control"><br>
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
        $('#link').on('keyup', function(){
          var theTitle = this.value.toLowerCase().trim();
          slugInput = $("#link"),
          theSlug = theTitle.replace(/&/g, '-and-')
          .replace(/[^a-z0-9-]+/g, '-')
          .replace(/\-\-+/g, '-')
          .replace(/^-+|-+&/g, '');
          slugInput.val(theSlug);
      }); 
    }); 
</script>
@endpush