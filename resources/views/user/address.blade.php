@extends('user.index')
@section('subContent')
    
<div class="container-fluid py-2">
    @if(session('success'))
        <p class="alert alert-success text-white alert-design">{{session('success')}}</p>
    @endif
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Address</span></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
              <div class="table-responsive p-0" style="width:50%">
                <form method="post" action="{{ route('update_address') }}" class="mt-6 space-y-6">
                    @csrf
                    <x-text-input id="name" name="user_id" type="hidden" class="account-login-input" value="{{Auth::user()->id}}" required />
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Full Name')" />
                        <x-text-input id="name" name="name" type="text" class="account-login-input" value="{{$address->name}}" required />
                        <span class='text-danger'>@error('name') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Phone')" />
                        <x-text-input id="phone" name="phone" type="number" class="account-login-input" value="{{$address->phone}}" required />
                        <span class='text-danger'>@error('phone') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Zip Code')" />
                        <x-text-input id="zip" name="zip" type="number" class="account-login-input" value="{{$address->zip}}" required />
                        <span class='text-danger'>@error('zip') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('State')" />
                        <x-text-input id="state" name="state" type="text" class="account-login-input" value="{{$address->state}}" required />
                        <span class='text-danger'>@error('state') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Town / City')" />
                        <x-text-input id="city" name="city" type="text" class="account-login-input" value="{{$address->city}}" required />
                        <span class='text-danger'>@error('city') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('House no, Building Name')" />
                        <x-text-input id="address" name="address" type="text" class="account-login-input" value="{{$address->address}}" required />
                        <span class='text-danger'>@error('address') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Road Name, Area, Colony')" />
                        <x-text-input id="locality" name="locality" type="text" class="account-login-input" value="{{$address->locality}}" required />
                        <span class='text-danger'>@error('locality') {{$message}} @enderror</span>
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Landmark')" />
                        <x-text-input id="landmark" name="landmark" type="text" class="account-login-input" value="{{$address->landmark}}" required />
                        <span class='text-danger'>@error('landmark') {{$message}} @enderror</span>
                    </div><br>
                        <x-primary-button class="rounded">{{ __('Update') }}</x-primary-button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
    
@endsection