<x-layout>
    <header class="primaryHeader overflow-hidden">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center">
                    
                    <div class="logo-homepage">
                        <h1 class="logo-h1 font2 display-1 fw-bold">PRESTO.IT</h1>
                    </div>
                    
                    <h2 class="slogan font2">{{__('ui.welcomeSlogan')}}</h2>
                    
                    <div class="search-bar mt-4">
                        <form class="d-flex" method="GET" action="{{ route('announcements.search') }}">
                            <input class="form-control me-3" placeholder="{{__('ui.welcomeSearch')}}" type="text" name="searched">
                            <button class="btn src-btn" type="submit">{{__('ui.welcomeSearchBtn')}}</button>
                        </form>
                    </div>
                    
                </div>
                <div class="col-12 col-lg-6 kchd d-none d-lg-block">
                    <div class="bgn position-relative">
                        
                    </div>
                    <img class="img-fluid header-img position-absolute d-none d-md-block" src="./img/shopping_girl.svg" alt="">
                </div>
            </div>
            
        </div>
    </div>
</header>

@if (session()->has('message'))
<div class="flex flex-row my-2 alert alert-success">
    {{ session('message') }}
</div>
@endif
@if (session()->has('access.denied'))
<div class="flex flex-row my-2 alert alert-danger">
    {{ session('access.denied') }}
</div>
@endif
@if (session('sent'))
<div class="alert alert-success">
    {{ session('sent') }}
</div>
@endif
<article class="container slide-in slide-in-second">
    <div class="row justify-content-center">
        
        
        <div class="col-12">
            <div class="description font2">
                
                <div class="row justify-content-center">
                    <hr class="solid w-75">
                    <div class="col-12 col-md-4 p-4">
                        <p>
                            <span class="highlight text-uppercase">Presto.it</span>{{__('ui.descriptionFirst')}}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 p-4">
                        <span class="underline"><a href="{{ route('register') }}">{{__('ui.descriptionRegister')}}</a></span>{{__('ui.descriptionSecond')}}
                        <br>
                        {{__('ui.descriptionThird')}}<span class="underline"><a href="{{ route('announcements.index') }}">{{__('ui.descriptionDeals')}}</a></span>{{__('ui.descriptionFourth')}}<span class="highlight text-uppercase">cashback</span> {{__('ui.descriptionFifth')}}
                    </div>
                    <div class="col-12 col-md-4 p-4">
                        {{__('ui.descriptionSixth')}}<span class="underline"><a href="#revisor-section">{{__('ui.descriptionJob')}}</a></span>{{__('ui.descriptionSeventh')}}
                    </div>
                    <hr class="solid w-75">
                </div>
                
                
            </div>
        </div>
    </div>
</article>

{{-- SEZIONE OFFERTE LAMPO --}}
<section class="container-fluid mb-5 slide-in slide-in-second">
    <div class="row bg-countdown align-items-center">
        
        <div class="col-12 mx-auto">
            <h2 class="text-center accent-c font2 display-3 fw-bold mb-5 offer-title">CASHBACK 51%!<h2>
            </div>
            
            <div class="col-12">
                <div class="row mx-auto justify-content-center countdown text-white fw-bold text-center g-3">
                    <div class="time col-12 col-lg-2">
                        <p class="display-4 text-center fw-bold day"></p>
                        <small>{{ __('ui.welcomeD') }}</small>
                    </div>
                    
                    <div class="time col-12 col-lg-2">
                        <p class="display-4 text-center fw-bold hour"></p>
                        <small>{{ __('ui.welcomeH') }}</small>
                    </div>
                    
                    <div class="time col-12 col-lg-2">
                        <p class="display-4 text-center fw-bold minute"></p>
                        <small>{{ __('ui.welcomeM') }}</small>
                    </div>
                    
                    <div class="time col-12 col-lg-2">
                        <p class="display-4 text-center fw-bold second"></p>
                        <small>{{ __('ui.welcomeS') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    {{-- SEZIONE ULTIMI ANNUNCI --}}
    <section class="container mt-5">
        <div class="row vh-25">
            <h2 class="text-center accent-c font2 display-4 fw-bold">{{__('ui.welcomeLastAnnouncements')}}</h2>
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-6 col-lg-4 my-3 d-flex justify-content-center slide-in slide-in-second">
                <div class="card shadow ">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300): 'https://via.placeholder.com/400x300/BAD9A2/93A392/?text=PRESTO.IT'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-muted fs-6 fw-bold">{{ $announcement->title }}</h5>
                        <p class="card-price fs-1">€ {{ $announcement->price }}</p>
                        <p class="card-text">{{ $announcement->body }}</p>
                    </div>
                    <div class="card-btn">
                        <div class="d-flex justify-content-center">
                            <a href=" {{ route('announcements.show', compact('announcement')) }}" class="btn green-btn m-1">{{__('ui.allAnnouncementsDetails')}}</a>
                            <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" class="btn accent-btn m-1"><i class="bi bi-bookmark"></i> {{$announcement->category->name}}</a>
                        </div>
                    </div>
                    <div class="card-body bg-light container">
                        <div class="row">
                            <div class="col-5">
                                <p class="card-author text-muted fw-bold ">{{__('ui.allAnnouncementsPostedAt')}}</p>
                                <p class="fw-bold">{{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-5">
                                <p class="card-author text-muted fw-bold ">{{__('ui.allAnnouncementsAuthor')}}</p>
                                <p class="fw-bold">{{ $announcement->user->name ?? '' }}</p>
                            </div>
                            <div class="col-2">
                                <form method="POST" action="{{route('revisor.restore_announcement',compact('announcement'))}}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn"><i class="bi bi-arrow-clockwise"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-layout>