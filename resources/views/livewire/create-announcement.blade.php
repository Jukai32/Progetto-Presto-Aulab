<section class="light-bg">
    <div class="container light-bg padding-mobile ">
        <div class="row light-bg py-5 ">
            
            <div class="col-12 col-lg-6 bg-white form-wrapper shadow p-4 ">
                
                <h1 class="text-center accent-c font2 fw-bold mb-3 p-3 ">{{ __('ui.createAnH2') }}</h1>
                <form wire:submit.prevent="store" class="bg-white rounded">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.createAnTitle') }}</label>
                        <input wire:model.debounce.500ms="title" type="text"
                        class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.createAnBody') }}</label>
                        <br>
                        <textarea wire:model.debounce.500ms="body" class="form-control @error('body') is-invalid @enderror" type="text"
                        id="" cols="30" rows="5"></textarea>
                        @error('body')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.createAnPrice') }}</label>
                        <input wire:model.debounce.500ms="price" type="number"
                        class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold uppercase">{{ __('ui.createAnCategory') }}</label>
                        <select wire:model.defer="category" class="form-control" id="category">
                            <option selected>{{ __('ui.createAnPlCategory') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold uppercase">{{ __('ui.createAnImg') }}</label>
                        <input wire:model="temporary_images" type="file" name="images" multiple
                        class="form-control  @error('temporary_images.*') is-invalid @enderror"
                        placeholder="Imgììì">
                        @error('temporary_images.*')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Photo preview:</p>
                            <div class="row border border-4 border-info shadow rounded py-4">
                                @foreach ($images as $key => $image)
                                <div class="col my-3">
                                    <div class="img-preview mx-auto shadow rounded"
                                    style="background-image: url( {{ $image->temporaryUrl() }})"></div>
                                    <button type="button"
                                    class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                    wire:click="removeImage({{ $key }})">{{ __('ui.createAnDeleteBtn') }}</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn accent-btn px-5 my-3">{{ __('ui.createAnAdd') }}</button>
                    </div>
                    @if (session()->has('message'))
                    <div class="flex flex-row justify-center my-2 alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    
                </form>
            </div>
            
            
            <div class="col-12 col-lg-6 ps-5 d-flex justify-content-center">
                <img class="img-fluid mt-4 img-create-an" src="/img/inserisci.svg" alt="">
            </div>
        </div>
    </div>
</section>