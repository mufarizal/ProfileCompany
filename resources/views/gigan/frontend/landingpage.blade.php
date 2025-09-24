@extends('gigan.layouts.guest')

@section('content')
    {{-- Banner --}}
    @if ($landingPage->banner_image)
        <div class="banner" style="background-image: url('{{ asset('storage/' . $landingPage->banner_image) }}')">
            <h1>{{ $landingPage->banner_title }}</h1>
            <p>{{ $landingPage->banner_subtitle }}</p>
        </div>
    @endif

    {{-- About / Visi Misi --}}
    <section class="about">
        <h2>{{ $landingPage->about_title }}</h2>

        {{-- About Image --}}
        @if ($landingPage->about_image)
            <div class="about-image">
                <img src="{{ asset('storage/' . $landingPage->about_image) }}" alt="{{ $landingPage->about_title }}"
                    style="max-width:100%;">
            </div>
        @endif

        <p>{{ $landingPage->about_description }}</p>
        <div class="visi-misi">
            <div><strong>Visi:</strong> {{ $landingPage->visi }}</div>
            <div><strong>Misi:</strong> {{ $landingPage->misi }}</div>
        </div>
    </section>


    {{--  PROJECTS  --}}
    <section class="landing-projects py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Our Latest Projects</h2>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                                alt="{{ $project->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol ke halaman portofolio lengkap --}}
            <div class="text-center mt-4">
                <a href="{{ route('frontend.portofolio') }}" class="btn btn-primary">Lihat Semua Project</a>
            </div>
        </div>
    </section>


    {{-- Partner --}}
    @if ($landingPage->partners->count())
        <section class="partners">
            <h2>Our Partners</h2>
            <div class="partner-list">
                @foreach ($landingPage->partners as $partner)
                    <div class="partner-card">
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
                        <p>{{ $partner->name }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection
