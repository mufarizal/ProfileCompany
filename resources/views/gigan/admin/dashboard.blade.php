<div>
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>Tanpa Kerangka</p>
</div>
<div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">logout?</button>
    </form>
</div>
