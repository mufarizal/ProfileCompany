<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Website' }}</title>
    @vite('resources/css/app.css')
</head>

<body>

    {{-- NAVBAR --}}
    <nav>
        <ul>
            <li><a href="{{ route('frontend.landingpage') }}">Home</a></li>
            <li><a href="{{ route('frontend.services') }}">Services</a></li>
            <li><a href="{{ route('frontend.portofolio') }}">Portfolio</a></li>
        </ul>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-black p-4 mt-5">
        <div class="container text-center">
            @if ($footer)
                <p>{{ $footer->company_name }}</p>
                <p>Alamat: {{ $footer->address }}</p>
                <p>Email: {{ $footer->email }} | Telepon: {{ $footer->phone }}</p>
            @else
                <p>&copy; 2025 </p>
            @endif
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
