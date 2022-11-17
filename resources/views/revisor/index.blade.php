<x-layout>
    <header class="secondaryHeader"></header>
    <div class="container">
        <div class="row">
            @if (session()->has('message'))
                <div class="flex flex-row justify-center my-2 alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-12">
                <h1 class="text-center accent-c font2 fw-bold">
                    {{ $announcement_to_check ? __('ui.revisorH1') : __('ui.revisorH1Alt') }}
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row vh-25">
            @if ($announcement_to_check)
                @foreach ($announcement_to_check as $announcement)
                    <div class="col-12 col-lg-6 my-3 d-flex justify-content-center">
                        <div class="card-revisor shadow">
                            <div id="carousel{{ $announcement->id }}" class="carousel slide" data-bs-ride="carousel">
                                @if ($announcement->images)
                                    <div class="carousel-inner">
                                        @forelse($announcement->images()->get() as $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ $image->getUrl(400, 300) }}" class="d-block w-100"
                                                    alt="...">
                                                <div class="row m-2">
                                                    <div class="col-12 col-md-6 mb-4">
                                                        <h5 class="tc-accent fw-bold">Tags:</h5>
                                                        <div>
                                                            @if ($image->labels)
                                                                @foreach ($image->labels as $label)
                                                                    <span
                                                                        class="bg-light border rounded">{{ $label }},</span>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mb-4">
                                                        <h5 class="fw-bold">{{ __('ui.reviewImage') }}</h5>
                                                        <p>{{ __('ui.adult') }} <span
                                                                class="{{ $image->adult }}"></span></p>
                                                        <p>{{ __('ui.spoof') }} <span
                                                                class="{{ $image->spoof }}"></span></p>
                                                        <p>{{ __('ui.medical') }} <span
                                                                class="{{ $image->medical }}"></span></p>
                                                        <p>{{ __('ui.violence') }} <span
                                                                class="{{ $image->violence }}"></span></p>
                                                        <p>{{ __('ui.racy') }} <span
                                                                class="{{ $image->racy }}"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="carousel-item active">
                                                <img src="https://via.placeholder.com/400x300/BAD9A2/93A392/?text=PRESTO.IT"
                                                    class="d-block w-100" alt="...">
                                            </div>
                                        @endforelse
                                    </div>
                                @endif
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carousel{{ $announcement->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carousel{{ $announcement->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                            <div class="card-body p-3">

                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <h5 class="card-title text-muted fs-4 fw-bold">{{ $announcement->title }}</h5>
                                        <p class="card-price fs-1">€ {{ $announcement->price }}</p>
                                        <p class="card-text">{{ $announcement->body }}</p>
                                        <br>
                                        <p class="card-text border light-bg rounded fw-bold d-inline">
                                            {{ __('ui.createAnCategory') }}: {{ $announcement->category->name }}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body bg-light container p-3 border-top border-bottom">
                                <div class="row">

                                    <div class="col-6">
                                        <p class="card-author text-muted fw-bold pb-2">
                                            {{ __('ui.allAnnouncementsPostedAt') }}</p>
                                        <p class="fw-bold">{{ $announcement->created_at->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-author text-muted fw-bold pb-2">
                                            {{ __('ui.allAnnouncementsAuthor') }}</p>
                                        <p class="fw-bold">{{ $announcement->user->name ?? '' }}</p>
                                    </div>

                                </div>

                            </div>
                            <div class="card-body bg-light container p-3">

                                <div class="row">
                                    <div class="col-6">
                                        <form method="POST"
                                            action="{{ route('revisor.accept_announcement', compact('announcement')) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn main-bg fs-md-4">{{ __('ui.revisorAccept') }}</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <form method="POST"
                                            action="{{ route('revisor.reject_announcement', compact('announcement')) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-danger fs-md-4">{{ __('ui.revisorReject') }}</button>
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
