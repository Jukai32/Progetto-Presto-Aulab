<x-layout>
    <header class="secondaryHeader light-bg"></header>
    <section class="light-bg padding-mobile">
        <div class="container light-bg py-5">
            <div class="row justify-content-center">
                <h1 class="text-center accent-c font2 display-5 fw-bold mb-3">
                    {{ __('ui.contactH1') }}
                </h1>
                <div class="col-12 col-md-6">
                    <div class="form-wrapper bg-white shadow p-5">
                        <form method="POST" action="{{ route('contactSubmit') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" name="email"  placeholder="{{ __('ui.registerPlEmail') }}">
                                <div>{{ $errors->first('email') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label fw-bold">{{ __('ui.contactName') }}</label>
                                <input type="text" class="form-control" name="name" placeholder="{{ __('ui.registerPlName') }}">
                                <div>{{ $errors->first('name') }}</div>
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fw-bold">{{ __('ui.contactMessage') }}</label>
                                <textarea class="form-control" name="message" cols="30" rows="5" placeholder="{{ __('ui.contactPlMessage') }}"></textarea>
                                <div>{{ $errors->first('message') }}</div>
                                
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn accent-btn px-5 my-3">{{ __('ui.contactBtn') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
