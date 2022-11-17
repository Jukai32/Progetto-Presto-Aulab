<x-layout>
    <header class="secondaryHeader light-bg"></header>
    <div class="container-fluid light-bg">
        <div class="row justify-content-center">
            <h2 class="text-center accent-c font2 display-3 fw-bold">{{__('ui.profileH1Alt')}}</h2>
            
            <div class="col-12 col-md-6 bg-white mb-4 p-4 rounded">
                <form method="POST" action="{{route('updateProfile')}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @if (session()->has('message'))
                    <div class="row justify-content-center my-2 alert alert-success px-5">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if (session()->has('access.denied'))
                    <div class="row justify-content-center my-2 alert alert-danger">
                        {{ session('access.denied') }}
                    </div>
                    @endif
                    <div class="row g-3 mb-3 ">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="profile-img-wrapper">
                                <img src="{{$profile->img ? Storage::url(Auth::user()->profile->img) : '/img/no-photo.jpg'}}" alt="" class="profile-img">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">{{__('ui.profileName')}}</label>
                            <input name="firstName" value="{{$profile->firstName}}" type="text" class="form-control @error('firstName') is-invalid @enderror">
                            @error('firstName')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label fw-bold">{{__('ui.profileSurname')}}</label>
                            <input name="lastName" value="{{$profile->lastName}}" type="text" class="form-control @error('lastName') is-invalid @enderror">
                            @error('lastName')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">{{__('ui.profileAddress')}}</label>
                            <input name="address" value="{{$profile->address}}" type="text" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">{{__('ui.profilePhone')}}</label>
                            <input name="phone" value="{{$profile->phone}}" type="text" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-7">
                            <label class="form-label fw-bold">{{__('ui.profileCity')}}</label>
                            <input name="city" value="{{$profile->city}}" type="text" class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label fw-bold">{{__('ui.profileCountry')}}</label>
                            <input name="country" value="{{$profile->country}}" type="text" class="form-control @error('country') is-invalid @enderror">
                            @error('country')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label fw-bold">{{__('ui.profileZipCode')}}</label>
                            <input name="zipCode" value="{{$profile->zipCode}}" type="text" class="form-control @error('zipCode') is-invalid @enderror">
                            @error('zipCode')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">{{__('ui.profileImg')}}</label>
                            <input name="img" value="{{$profile->img}}" type="file" class="form-control">
                            @error('img')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn accent-bg mt-3">{{__('ui.profileBtnAlt')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>