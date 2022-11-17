<footer>
    <div class="container-fluid bg-footer">
        <div class="row justify-content-center pt-4">
            <div class="col-9">
                <div class="col-12 py-3 text-center">
                    {{-- <img class="img-fluid me-4 mb-5" src="./Media/logo.png" alt=""> --}}
                    <h2 class="logo-h1 font2 fw-bold">PRESTO.IT</h2>
                </div>
                
                <div class="row d-flex justify-content-between align-items-center">
                    
                    <!-- colonne link -->
                    
                    <div class="col-12 col-md-5 offset-md-1 my-2 ">
                        <h5 class="text-white">{{ __('ui.contactH1') }}</h5>
                        <a href="{{ route('contact') }}"><button class="btn accent-bg text-white mt-3"
                            type="button">{{ __('ui.contactBtn') }}</button></a>
                        </div>
                        
                        
                        <div class="col-12 col-md-5 offset-md-1 ">
                            <h5 class="text-white">{{ __('ui.teamH1') }}</h5>
                            <a href="{{ route('team') }}"><button class="btn accent-bg text-white mt-3"
                                type="button">{{ __('ui.teamBtn') }}</button></a>
                            </div>
                            
                            
                            @guest
                            <div id="revisor-section" class="col-12 col-md-5 offset-md-1 my-2 ">
                                <form>
                                    <h5 class="text-white">{{ __('ui.footerH5') }}</h5>
                                    <p class="text-white">{{ __('ui.footerP') }}</p>
                                    <a href="{{ route('become.revisor') }}"><button class="btn accent-bg text-white mt-3"
                                        type="button">{{ __('ui.footerBtn') }}</button></a>
                                    </form>
                                </div>
                                @else
                                @if (!Auth::user()->is_revisor)
                                <div class="col-md-5 offset-md-1 mb-3 my-2">
                                    <form>
                                        <h5 class="text-white">{{ __('ui.footerH5') }}</h5>
                                        <p class="text-white">{{ __('ui.footerP') }}</p>
                                        <a href="{{ route('become.revisor') }}"><button class="btn accent-bg text-white mt-3"
                                            type="button">{{ __('ui.footerBtn') }}</button></a>
                                        </form>
                                    </div>
                                    @endif
                                    @endguest
                                </div>
                                
                                
                                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-5 border-top">
                                    <p class="text-white">© 2022 Parisi, Pivato, Galbiati, Gravante, Trentadue. Inc. All rights reserved.</p>
                                    <ul class="list-unstyled d-flex">
                                        <li class="ms-5">
                                            <a href="https://www.facebook.com/" target="_blank">
                                                <i class="bi bi-facebook fs-2 social-icon"></i></a>
                                            </li>
                                            <li class="ms-5">
                                                <a href="https://www.instagram.com/" target="_blank">
                                                    <i class="bi bi-instagram fs-2 social-icon"></i></a>
                                                </li>
                                                <li class="ms-5">
                                                    <a href="https://twitter.com/" target="_blank">
                                                        <i class="bi bi-twitter fs-2 social-icon"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        