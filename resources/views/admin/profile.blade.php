@extends('layouts.admin_layouts')
@section('page_name')
  Profile
@endsection
@section('content')

<div class="container-fluid py-2">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3 d-flex justify-content-between m-0 align-items-center"><span>Profile Information</span></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
              <div class="table-responsive p-0" style="width:50%">
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Name')" /><br>
                        <x-text-input id="name" name="name" type="text" class="account-login-input" value="{{Auth::user()->name}}" required />
                        <x-input-error :messages="$errors->updatePassword->get('name')" class="mt-2" />
                    </div><br>
                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="account-login-input" value="{{Auth::user()->email}}" required />
                        <x-input-error :messages="$errors->updatePassword->get('email')" class="mt-2" />
                    </div><br>
                        <x-primary-button class="rounded">{{ __('Update') }}</x-primary-button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"

                            >{{ __('Updated.') }}</p>
                        @endif
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-body px-0 pb-2" style="margin: 0px 1rem">
              <h6 class="text-dark text-capitalize pb-3 ps-3 d-flex justify-content-between m-0 align-items-center">Update Password</h6>
              <p class="mt-1 text-sm text-gray-600 ps-3">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
              </p>
              <div class="table-responsive ps-3" style="width:50%;">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                        <x-text-input id="update_password_current_password" name="current_password" type="password" class="account-login-input" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div><br>

                    <div>
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <x-text-input id="update_password_password" name="password" type="password" class="account-login-input" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div><br>

                    <div>
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="account-login-input" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div><br>

                    <div class="flex items-center gap-4">
                        <x-primary-button class="rounded">{{ __('Update') }}</x-primary-button>

                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Updated.') }}</p>
                        @endif
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-12">
            <div class="card my-4">
            <div class="card-body px-0 pb-2 mb-4" style="margin: 0px 1rem">
            <h6 class="text-dark text-capitalize pb-3 ps-3 d-flex justify-content-between m-0 align-items-center">Address</h6>
              <div class="table-responsive ps-3 p-0" style="width:50%">
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
        <div class="row">
            <div class="col-12">
            <div class="card my-4">
                <div class="card-body px-0 pb-2 mb-4 ps-3" style="margin: 0px 1rem">
                    <h6 class="text-dark text-capitalize d-flex justify-content-between m-0 align-items-center">Delete Account</h6>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </p>
                    <x-danger-button
                        data-bs-toggle="modal" data-bs-target="#myModal" class="bg-danger rounded"
                    >{{ __('Delete Account') }}</x-danger-button>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header border-0">
                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Are you sure you want to delete your account?') }}
                                    </h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="">
                                        <x-text-input
                                            id="password"
                                            name="password"
                                            type="password"
                                            class="account-login-input"
                                            placeholder="{{ __('Password') }}"
                                        />

                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancele</button>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
      </div>

</div>

@endsection
