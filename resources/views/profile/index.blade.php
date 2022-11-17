<x-layout>
    <header class="secondaryHeader  accent-bg-gradient"></header>
    <div class="container-fluid  accent-bg-gradient">
        <div class="row justify-content-evenly">
            <h1 class="text-center accent-c font2 display-3 fw-bold">{{__('ui.profileH1')}}</h1>
            <div class="col-12 col-md-5 bg-white mb-4 p-4 rounded">
                <form method="POST" action="{{route('storeProfile')}}" enctype="multipart/form-data">
                    @csrf
                    @if (session()->has('access.denied'))
                    <div class="row justify-content-center my-2 alert alert-danger">
                        {{ session('access.denied') }}
                    </div>
                    @endif
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label class="form-label fw-bold">{{__('ui.profileName')}}</label>
                            <input name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror">
                            @error('firstName')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label fw-bold">{{__('ui.profileSurname')}}</label>
                            <input name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror">
                            @error('lastName')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">{{__('ui.profileAddress')}}</label>
                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">{{__('ui.profilePhone')}}</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-7">
                            <label class="form-label fw-bold">{{__('ui.profileCity')}}</label>
                            <input name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col-3">
                            <label class="form-label fw-bold">{{__('ui.profileCountry')}}</label>
                            <input name="country" type="text" class="form-control @error('country') is-invalid @enderror">
                            @error('country')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="col-2">
                            <label class="form-label fw-bold">{{__('ui.profileZipCode')}}</label>
                            <input name="zipCode" type="text" class="form-control @error('zipCode') is-invalid @enderror">
                            @error('zipCode')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <input name="img" type="file" class="form-control">
                            @error('img')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn accent-bg mt-3">{{__('ui.profileBtn')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>