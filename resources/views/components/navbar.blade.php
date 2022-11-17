<nav class="navbar navbar-expand-lg fixed-top shadow main-bg" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="img-fluid logo-nav" src="/img/logo-presto.png" alt="">
        </a>
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link d-block d-lg-none nl" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="bi bi-search"></i></a>
            </li>
        </ul>
        
        
        <div class="d-md-none collapse navbar-collapse ms-auto" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('welcome') }}"><span class="d-none d-md-block"><i class="bi bi-house"></i> Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="{{ route('announcements.index') }}"><i class="bi bi-card-list"></i> {{ __('ui.navAllAnnouncements') }}</a>
                </li>
                
                
                {{-- offcanvas --}}
                <li class="nav-item">
                    <a class="nav-link link-category" aria-current="page" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-bookmark"></i> {{ __('ui.navCategory') }}</a>
                </li>
                
                {{-- lingue --}}
                <li class="nav-item dropdown">
                    <a class="nav-link link-lang" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-translate me-1"></i>{{ __('ui.navLanguages') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-light">
                    <li><a class="dropdown-item">
                        <x-_locale lang="it" nation="it"/> 
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
            {{-- <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">{{__('ui.navSignIn')}}</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @else
            {{-- @if (Auth::user()->is_revisor)
                <li class="nav-item dropdown">
                    <a class="nav-link active " href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('ui.navRevisor') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-light">
                    <li class="nav-item">
                        <a class="dropdown-item"
                        href="{{ route('revisor.index') }}">{{ __('ui.navRevisorCheck') }}
                        ({{ App\Models\Announcement::toBeRevisionedCount() }})</a>
                    </li>
                    <li><a class="dropdown-item"
                        href="{{ route('revisor.deleted') }}">{{ __('ui.navRevisorRejected') }}</a>
                    </li>
                </ul>
            </li>
            @endif --}}
            <li class="nav-item dropdown">
                <a class="nav-link login-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="bi bi-person-circle"></i> 
                {{ __('ui.navUser') }}{{ Auth::user()->name }}
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
                            <a class="dropdown-item login-dp"
                            href="{{ route('revisor.index') }}">{{ __('ui.navRevisorCheck') }}
                            ({{ App\Models\Announcement::toBeRevisionedCount() }})</a>
                        </li>
                        <li><a class="dropdown-item login-dp"
                            href="{{ route('revisor.deleted') }}">{{ __('ui.navRevisorRejected') }}</a>
                        </li>
                        @endif
                        
                        <li>
                            <a class="dropdown-item login-dp"
                            href="{{ route('announcements.create') }}">{{ __('ui.navUserAddAnnouncement') }}</a>
                        </li>
                        
                        <li>
                            @if(!Auth::user()->profile()->exists())
                            <a class="dropdown-item login-dp" href="{{route('profile.index')}}">{{ __('ui.navUpdateInfo') }}</a>
                            @else
                            <a class="dropdown-item login-dp" href="{{route('profile.edit')}}">{{ __('ui.navProfile') }}</a>
                            @endif
                        </li>
                        
                        <li class="mt-2">
                            <a class="text-uppercase text-decoration-none ms-3 fw-bold text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    
                    
                    
                </ul>
            </li>
            @endguest
            
            
        </ul>
        
        
    </div>
</div>
</nav>



{{-- MODALE PER VISUALIZZAZIONE MOBILE --}}
<div class="mt-5 modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                
                <form class="mt-3 d-flex" method="GET" action="{{ route('announcements.search') }}">
                    <input class="form-control me-3" placeholder="{{ __('ui.welcomeSearch') }}" type="text"
                    name="searched">
                    <button class="btn accent-bg" type="submit">{{ __('ui.welcomeSearchBtn') }}</button>
                </form>
                
            </div>
        </div>
    </div>
</div>


{{-- offcanvas per le categorie --}}
<div class="offcanvas offcanvas-end dark-bg" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header margin-canvas">
        <h5 class="offcanvas-title  accent-c font2 display-5 fw-bold mb-2 ms-5" id="offcanvasRightLabel">
            {{ __('ui.navCategory') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body dark-bg mb-5">
            @foreach ($categories as $category)
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="category-wrapper d-flex justify-content-center ">
                            <a href="{{ route('categoryShow', compact('category')) }}" class="category-link">
                                <div class="category-card card-1 shadow rounded text-center m-3">
                                    <div class="img-wrapper">
                                        <img class="rounded category-img" src="{{$category->img}}" alt="">
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
    