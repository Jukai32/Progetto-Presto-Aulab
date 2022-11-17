<x-layout>
    <header class="secondaryHeader"></header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center accent-c font2 fw-bold">{{$announcement_to_restore ? __('ui.revisorDeletedH1') : __('ui.revisorDeletedH1Alt') }}</h1>
            </div>
            @if (session()->has('message'))
            <div class="flex flex-row justify-center my-2 alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row vh-25">
            @if ($announcement_to_restore)
            @foreach($announcement_to_restore as $announcement)
            <div class="col-12 col-md-4 my-3">
                <div class="card shadow">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/400x300/BAD9A2/93A392/?text=PRESTO.IT'}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-muted fs-6 fw-bold">{{$announcement->title}}</h5>
                        <p class="card-price fs-1">€ {{$announcement->price}}</p>
                        <p class="card-text">{{$announcement->body}}</p>
                    </div>
                    
                    <div class="card-body bg-light container">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-author text-muted fw-bold ">{{__('ui.allAnnouncementsPostedAt')}}</p>
                                <p class="fw-bold">{{ $announcement->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-6">
                                <p class="card-author text-muted fw-bold ">{{__('ui.allAnnouncementsAuthor')}}</p>
                                <p class="fw-bold">{{$announcement->user->name ?? '' }}</p>
                            </div>
                            <div class="col-6">
                                <form method="POST" action="{{route('revisor.restore_announcement',compact('announcement'))}}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">{{__('ui.revisorRestore')}}</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <form action="{{route('revisor.destroy',compact('announcement'))}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{__('ui.revisorDestroy')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            
        </div>
    </div>
    
</x-layout>