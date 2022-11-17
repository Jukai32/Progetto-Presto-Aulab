<x-layout>
    <header class="secondaryHeader"></header>
    
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-center accent-c font2 display-5 fw-bold">{{__('ui.detailsTitle')}} {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row my-5">
            
            <div class="col-12 col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    @if($announcement->images)
                    <div class="carousel-inner">
                        @forelse($announcement->images()->get() as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{$image->getUrl(400,300)}}" class="d-block w-100" alt="...">
                        </div>
                        @empty
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/400x300/BAD9A2/93A392/?text=PRESTO.IT" class="d-block w-100" alt="...">
                        </div>
                        @endforelse
                    </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    <div class="col-12 col-md-6">
        <p class="fs-3 mt-2 text-uppercase">{{__('ui.detailsDescription')}}</p>
        <p class="fs-3">{{ $announcement->body }}</p>
        <p class="fs-3 mt-2 text-uppercase">{{__('ui.detailsPrice')}}</p>
        <p class="fs-3">€ {{ $announcement->price }}</p>
        <a class="btn green-btn mt-3 fs-5"
        href="{{ route('categoryShow', ['category' => $announcement->category]) }}"><i class="bi bi-bookmark"></i>
        {{ $announcement->category->name }}</a>
        
    </div>
</div>
</div>
</x-layout>
