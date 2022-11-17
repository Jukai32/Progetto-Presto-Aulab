<x-layout>
    <header class="secondaryHeader light-bg"></header>
    <section class="light-bg ">
        <div class="container">
            <div class="row py-5 w-100 justify-content-evenly align-items-center">
                
                <div class="col-12 col-md-6 p-5 ">
                    <div class="form-wrapper bg-white shadow p-5">
                        <h1 class="text-center accent-c font2 display-3 fw-bold mb-3">{{ __('ui.registerTitle') }}</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('ui.registerName') }}</label>
                                <input name="name" type="text" class="form-control"
                                placeholder="{{ __('ui.registerPlName') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input name="email" type="email" class="form-control" aria-describedby="emailHelp"
                                placeholder="{{ __('ui.registerPlEmail') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Password</label>
                                <input name="password" type="password" class="form-control"
                                placeholder="{{ __('ui.registerPlPassword') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('ui.registerPassword') }}</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('ui.registerPlRepPassword') }}">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn accent-btn  px-5 my-3">{{ __('ui.registerBtn') }}</button>
                            </div>
                        </form>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 ">
                    <img class="img-fluid ms-5" src="./img/register_1.svg" alt="">
                </div>
                
            </div>
        </div>
    </section>
</x-layout>
