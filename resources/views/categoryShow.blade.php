<x-layout>
    <header class="secondaryHeader"></header>
    <div class="container">
        <div class="row vh-25">
            @forelse($category->announcements as $announcement)
            @if($announcement->is_accepted)
            <div class="col-12 col-md-4 my-3">
                <div class="card shadow">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/400x300/BAD9A2/93A392/?text=PRESTO.IT'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-muted fs-6 fw-bold">{{$announcement->title}}</h5>
                        <p class="card-price fs-1">€ {{$announcement->price}}</p>
                        <p class="card-text">{{$announcement->body}}</p>
                    </div>
                    <div class="card-btn">
                        <div class="d-flex justify-content-center">
                            <a href=" {{ route('announcements.show', compact('announcement')) }}" class="btn main-bg m-1">{{__('ui.allAnnouncementsDetails')}}</a>
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
            @endif
            @empty
            <section class="container">
                <div class="row justify-content-center">
                    <hr class="solid w-75 mb-5 hr-cag">
                    <div class="col-12 d-flex justify-content-center ">
                        <h2 class="fw-bold">In questa sezione non sono presenti annunci. <span> <a href="{{route('announcements.create')}}" class="click-here">Clicca qui</a></span> per inserirne uno!</h2>
                    </div>
                    <hr class="solid w-75 mt-5 hr-cag-1">
                </div>
            </section>
            @endforelse
        </div>
    </div>
    
</x-layout>