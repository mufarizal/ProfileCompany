<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body class="bg-gray-50 font-sans text-gray-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-gradient-to-br from-primary-800 via-primary-900 to-slate-900 text-white flex flex-col shadow-2xl relative overflow-hidden transition-all duration-300 lg:translate-x-0 transform -translate-x-full lg:relative absolute z-50 h-full">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-800/50 via-primary-900/50 to-slate-900/50">
            </div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-4 right-4 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
                <div class="absolute bottom-16 left-4 w-24 h-24 bg-primary-400/10 rounded-full blur-xl"></div>
            </div>

            <!-- Logo Section - Fixed at top -->
            <div class="px-6 py-6 relative z-10 flex-shrink-0 border-b border-white/10">
                <div class="flex items-center justify-center mb-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center shadow-xl">
                        <!-- LOGO PERUSAHAAN -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain" />
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="text-lg font-bold text-white">{{ $footer->company_name }}</h2>
                    <p class="text-xs text-primary-200 mt-1">{{ auth()->user()->name }}</p>
                </div>
            </div>

            <!-- Navigation - Scrollable -->
            <div
                class="flex-1 overflow-y-auto px-4 relative z-10 scrollbar-thin scrollbar-thumb-white/20 scrollbar-track-transparent">
                <nav class="space-y-2 text-sm py-4">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.gigan.dashboard') }}"
                        class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 relative
        {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 font-semibold shadow-lg border border-white/10' : 'hover:bg-white/5' }}">
                        <div
                            class="w-8 h-8 mr-3 bg-white/10 rounded-lg flex items-center justify-center
            {{ request()->routeIs('admin.dashboard') ? 'bg-primary-500 shadow-lg' : 'group-hover:bg-white/20' }}">
                            <i class="fas fa-gauge text-white text-sm"></i>
                        </div>
                        <span class="text-white/90 group-hover:text-white transition-colors">Dashboard</span>
                        @if (request()->routeIs('admin.dashboard'))
                            <div
                                class="absolute right-0 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-primary-400 rounded-l-full">
                            </div>
                        @endif
                    </a>

                    <!-- Kelola Halaman (Dropdown) -->
                    <div class="relative">
                        <!-- Main Button with both navigation and dropdown toggle -->
                        <div
                            class="group flex items-center w-full px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 hover:bg-white/5 cursor-pointer">
                            <!-- Area untuk toggle dropdown -->
                            <div onclick="toggleDropdown('kelola-halaman')" class="flex items-center flex-1">
                                <div
                                    class="w-8 h-8 mr-3 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20">
                                    <i class="fas fa-file-alt text-white text-sm"></i>
                                </div>
                                <span class="text-white/90 group-hover:text-white transition-colors">Page
                                    Management</span>
                                <i id="kelola-halaman-icon"
                                    class="fas fa-chevron-right text-white/60 text-xs transition-transform duration-300 ml-auto"></i>
                            </div>
                        </div>

                        <!-- Dropdown Menu -->
                        <div id="kelola-halaman-dropdown" class="hidden ml-4 mt-1 space-y-1">
                            <a href="{{ route('admin.gigan.landing-pages.index') }}"
                                class="group flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 hover:translate-x-1 hover:bg-white/5">
                                <div
                                    class="w-6 h-6 mr-3 bg-white/5 rounded-md flex items-center justify-center group-hover:bg-white/10">
                                    <i class="fas fa-house text-white/70 text-xs"></i>
                                </div>
                                <span
                                    class="text-white/80 group-hover:text-white transition-colors text-sm">HomePage</span>
                            </a>

                            <a href="{{ route('admin.gigan.services.index') }}"
                                class="group flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 hover:translate-x-1 hover:bg-white/5">
                                <div
                                    class="w-6 h-6 mr-3 bg-white/5 rounded-md flex items-center justify-center group-hover:bg-white/10">
                                    <i class="fas fa-cogs text-white/70 text-xs"></i>
                                </div>
                                <span
                                    class="text-white/80 group-hover:text-white transition-colors text-sm">Layanan</span>
                            </a>

                            <a href="{{ route('admin.gigan.portfolio.index') }}"
                                class="group flex items-center px-4 py-2.5 rounded-lg transition-all duration-300 hover:translate-x-1 hover:bg-white/5">
                                <div
                                    class="w-6 h-6 mr-3 bg-white/5 rounded-md flex items-center justify-center group-hover:bg-white/10">
                                    <i class="fa-solid fa-newspaper text-white/70 text-xs"></i>
                                </div>
                                <span
                                    class="text-white/80 group-hover:text-white transition-colors text-sm">Portofolio</span>
                            </a>


                        </div>
                    </div>

                    <!-- Form Masuk -->
                    <a href="{{ route('admin.gigan.services.messages') }}"
                        class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 hover:bg-white/5">
                        <div
                            class="w-8 h-8 mr-3 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20">
                            <i class="fas fa-sign-in-alt text-white text-sm"></i>
                        </div>
                        <span class="text-white/90 group-hover:text-white transition-colors">Form Masuk</span>
                    </a>

                    <!-- Footer Website -->
                    <a href="{{ route('admin.gigan.footer.edit') }}"
                        class="group flex items-center px-4 py-3 rounded-xl transition-all duration-300 hover:translate-x-1 hover:bg-white/5">
                        <div
                            class="w-8 h-8 mr-3 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20">
                            <i class="fas fa-grip-horizontal text-white text-sm"></i>
                        </div>
                        <span class="text-white/90 group-hover:text-white transition-colors">Footer Website</span>
                    </a>
                </nav>
            </div>

            <!-- Footer sticky -->
            <div
                class="px-4 pt-4 pb-6 bg-gradient-to-r from-slate-900/80 to-primary-900/80 backdrop-blur-sm relative z-10 border-t border-white/10 flex-shrink-0">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-3 px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden lg:ml-0">
            <!-- Mobile Menu Button -->
            <div class="lg:hidden bg-white px-4 py-3 shadow-sm border-b flex-shrink-0">
                <button onclick="toggleSidebar()" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Header -->
            <header
                class="bg-white shadow-sm px-6 py-5 flex justify-between items-center border-b border-gray-100 flex-shrink-0">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">@yield('title')</h1>
                    <!-- Tanggal dan Waktu -->
                    <div id="datetime" class="text-sm text-gray-500 text-right whitespace-nowrap">
                        Loading...
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-6">
                    <!-- User Avatar -->
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Jalankan saat halaman sudah dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const datetimeEl = document.getElementById('datetime');

            function updateDateTime() {
                const now = new Date();

                const days = [
                    'Minggu', 'Senin', 'Selasa', 'Rabu',
                    'Kamis', 'Jumat', 'Sabtu'
                ];
                const months = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];

                const dayName = days[now.getDay()];
                const day = String(now.getDate()).padStart(2, '0');
                const month = months[now.getMonth()];
                const year = now.getFullYear();

                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');

                const formatted = `${dayName}, ${day} ${month} ${year} — ${hours}:${minutes} WIB`;

                datetimeEl.textContent = formatted;
            }

            updateDateTime(); // Set awal
            setInterval(updateDateTime, 1000); // Update setiap detik
        });

        // Toggle sidebar untuk mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                if (overlay) overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                if (overlay) overlay.classList.add('hidden');
            }
        }

        // Toggle dropdown menu
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId + '-dropdown');
            const icon = document.getElementById(dropdownId + '-icon');

            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                icon.classList.add('rotate-90');
            } else {
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-90');
            }
        }
    </script>

    <style>
        /* Custom scrollbar untuk webkit browsers */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>

</body>

</html>
