@extends('gigan.layouts.guest')

@section('content')
{{-- Banner --}}
@if($banner && $banner->banner_image)
<div class="banner" style="background-image: url('{{ asset('storage/'.$banner->banner_image) }}')">
    <h1>{{ $banner->banner_title }}</h1>
    <p>{{ $banner->banner_subtitle }}</p>
</div>
@endif

{{-- Daftar Services --}}
<div class="services-list">
@foreach($services as $service)
<div class="service-item">
    @if($service->icon)
    <img src="{{ asset('storage/'.$service->icon) }}" alt="{{ $service->title }}">
    @endif
    <h3>{{ $service->title }}</h3>
    <p>{{ $service->description }}</p>
</div>
@endforeach
</div>

{{-- Form Pengunjung --}}
<h2>Hubungi Kami</h2>
@if(session('success'))<p>{{ session('success') }}</p>@endif
<form action="{{ route('services.contact') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Pesan" required></textarea>
    <button type="submit">Kirim</button>
</form>
@endsection
