@extends('gigan.layouts.guest')

@section('content')
    {{-- Banner --}}
    @if ($banner && $banner->banner_image)
        <section class="portfolio-banner text-center">
            <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Portfolio Banner" class="img-fluid">
            <h1>{{ $banner->banner_title ?? 'Our Portfolio' }}</h1>
            <p>{{ $banner->banner_subtitle ?? '' }}</p>
        </section>
    @endif

    {{-- Project List --}}
    <section class="portfolio-projects container py-5">
        <div class="row">
            @forelse($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                                alt="{{ $project->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada project nih 😢</p>
            @endforelse
        </div>
    </section>
@endsection
