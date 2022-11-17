<x-layout>
    <header class="secondaryHeader light-bg"></header>
    <section class="light-bg">
        <div class="container">
            <div class="row py-5 justify-content-center align-items-center">
                
                <div class="col-12 col-md-6 p-5">
                    <div class="form-wrapper bg-white shadow p-5">
                        <h1 class="text-center accent-c font2 display-3 fw-bold mb-3">LOGIN!</h1>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input name="email" type="email" class="form-control"
                                placeholder="{{ __('ui.registerPlEmail') }}" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('ui.navPassword') }}</label>
                                <input name="password" type="password" class="form-control"
                                placeholder="{{ __('ui.registerPlPassword') }}">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn accent-btn px-5 my-3">{{ __('ui.navLogIn') }}</button>
                            </div>
                        </form>
                        
                        <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                            <p class="fs-5 font2 me-3">{{ __('ui.registerH4') }}</p>
                            <a class="fs-6 btn green-btn" href="{{ route('register') }}">{{ __('ui.navSignIn') }}</a>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12 col-md-6 p-5">
                    <img class="img-fluid" src="./img/login-orange.svg" alt="">
                </div>
                
                
            </div>
        </div>
    </section>
</x-layout>
