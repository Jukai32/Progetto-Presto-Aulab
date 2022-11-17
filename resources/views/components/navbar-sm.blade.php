<nav class="navbar-sm d-block d-lg-none fixed-bottom main-bg p-0 mb-2 mx-2 rounded-5" id="navbar">
    
    <div class="d-flex justify-content-center">
        <ul class="navbar-sm-list d-flex m-0 justify-content-center ">
            <li class="nav-sm-link">
                <a class="nav-link" aria-current="page" href="{{ route('welcome') }}"><i class="bi bi-house"></i>
                    <span class="d-none d-lg-flex"></span></a>
                </li>
                <li class="nav-sm-link">
                    <a class="nav-link" aria-current="page" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                    class="bi bi-bookmark"></i> <span class="d-none d-md-flex"></span></a>
                </li>
                
                
                <li class="nav-sm-link">
                    <a class="nav-link" aria-current="page" href="{{ route('announcements.index') }}"><i
                        class="bi bi-card-list"></i> <span class="d-none d-md-flex"></span></a>
                    </li>
                    
                    {{-- lingue --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-translate"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-light">
                        <li><a class="dropdown-item">
                            <x-_locale lang="it" nation="it" />
                        </a></li>
                        <li><a class="dropdown-item">
                            <x-_locale lang="en" nation="gb" />
                        </a></li>
                        <li><a class="dropdown-item">
                            <x-_locale lang="de" nation="de" />
                        </a></li>
                        
                    </ul>
                </li>
                
                @guest  
                <li class="nav-sm-link">
                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i>
                        <span class="d-none d-md-flex">Login</span></a>
                    </li>
                    @else
                    
                    <li class="nav-sm-link  dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="bi bi-person-circle"></i>
                        <span class="d-none d-md-flex"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light">
                        @guest
                        <li>
                            <a href="{{ route('become.revisor') }}"><button class="btn accent-bg ms-2 "
                                type="button">{{ __('ui.footerBtn') }}</button></a>
                            </li>
                            @else
                            @if (!Auth::user()->is_revisor)
                            <li>
                                <a href="{{ route('become.revisor') }}"><button class="btn accent-bg ms-2 "
                                    type="button">{{ __('ui.footerBtn') }}</button></a>
                                </li>
                                @endif
                                @endguest
                                
                                
                                @if (Auth::user()->is_revisor)
                                <li class="nav-item">
                                    <a class="dropdown-item"
                                    href="{{ route('revisor.index') }}">{{ __('ui.navRevisorCheck') }}
                                    ({{ App\Models\Announcement::toBeRevisionedCount() }})</a>
                                </li>
                                <li><a class="dropdown-item"
                                    href="{{ route('revisor.deleted') }}">{{ __('ui.navRevisorRejected') }}</a>
                                </li>
                                @endif
                                
                                <li><a class="dropdown-item"
                                    href="{{ route('announcements.create') }}">{{ __('ui.navUserAddAnnouncement') }}</a>
                                </li>
                                
                                <li>
                                    @if(!Auth::user()->profile()->exists())
                                    <a class="dropdown-item login-dp" href="{{route('profile.index')}}">{{ __('ui.navUpdateInfo') }}</a>
                                    @else
                                    <a class="dropdown-item login-dp" href="{{route('profile.edit')}}">{{ __('ui.navProfile') }}</a>
                                    @endif
                                </li>
                                
                                <a class="nav-link active text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
            
        </nav>
        
        {{-- offcanvas categorie\ --}}
        <div class="offcanvas offcanvas-end dark-bg" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header margin-canvas">
                <h5 class="offcanvas-title  accent-c font2 display-5 fw-bold mb-2 ms-5" id="offcanvasRightLabel">categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body dark-bg">
                @foreach ($categories as $category)
                <div class="container">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="category-wrapper d-flex justify-content-center ">
                                <a href="{{ route('categoryShow', compact('category')) }}" class="category-link">
                                    <div class="category-card shadow rounded text-center m-3">
                                        <div class="img-wrapper">
                                            {{-- <img class="rounded" src="https://picsum.photos/200" alt=""> --}}
                                        </div>
                                        <div class="title-wrapper py-2">
                                            <h2 class="category-title m-0">{{ $category->name }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        