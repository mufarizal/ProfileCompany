@extends('gigan.layouts.admin')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm">
            <div class="flex items-center">
                <span class="mr-2 text-lg">✅</span>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="p-6">
        <!-- Page Header -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        Manajemen Landing Page
                    </h1>
                    <p class="text-gray-600">Kelola informasi perusahaan dan partner</p>
                </div>
            </div>
        </div>

        {{-- About & Visi Misi Section --}}
        {{-- Banner Section --}}
        @if ($landingPage && ($landingPage->banner_image || $landingPage->banner_title || $landingPage->banner_subtitle))
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow-sm border border-blue-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-4">
                        <h2 class="text-xl font-semibold">Banner Landing Page</h2>
                    </div>
                    <div class="p-6 flex flex-col md:flex-row items-center gap-8">
                        @if ($landingPage->banner_image)
                            <img src="{{ asset('storage/' . $landingPage->banner_image) }}"
                                class="w-64 h-40 object-cover rounded-lg shadow-md border border-gray-200 mb-4 md:mb-0"
                                alt="Banner Image">
                        @endif
                        <div class="flex-1">
                            @if ($landingPage->banner_title)
                                <h3 class="text-2xl font-bold text-blue-700 mb-2">{{ $landingPage->banner_title }}</h3>
                            @endif
                            @if ($landingPage->banner_subtitle)
                                <p class="text-gray-600 text-lg">{{ $landingPage->banner_subtitle }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="mb-6">
            @if ($landingPage)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-blue-500 text-white px-6 py-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold">Tentang Perusahaan</h2>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                Aktif
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="lg:col-span-2">
                                <!-- About Section -->
                                <div class="mb-6">
                                    <h3 class="text-xl font-semibold text-blue-600 mb-3">
                                        {{ $landingPage->about_title }}
                                    </h3>
                                    <p class="text-gray-700 leading-relaxed mb-4">
                                        {{ $landingPage->about_description }}
                                    </p>
                                </div>

                                <!-- Visi Misi -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="border-l-4 border-blue-500 pl-4">
                                        <h4 class="text-lg font-semibold text-blue-600 mb-2">Visi</h4>
                                        <p class="text-gray-600 text-sm">{{ $landingPage->visi }}</p>
                                    </div>
                                    <div class="border-l-4 border-green-500 pl-4">
                                        <h4 class="text-lg font-semibold text-green-600 mb-2">Misi</h4>
                                        <p class="text-gray-600 text-sm">{{ $landingPage->misi }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Section -->
                            <div class="lg:col-span-1">
                                <div class="text-center">
                                    @if ($landingPage->about_image)
                                        <div class="relative inline-block">
                                            <img src="{{ asset('storage/' . $landingPage->about_image) }}"
                                                class="w-full max-w-xs rounded-lg shadow-md object-cover"
                                                style="max-height: 250px;" alt="Company Image">
                                            <div class="absolute top-2 right-2">
                                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">
                                                    ✓
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                            <div class="text-gray-400 text-6xl mb-2">📷</div>
                                            <p class="text-gray-500">Tidak ada gambar</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <a href="{{ route('admin.gigan.landing-pages.edit', $landingPage->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200 inline-flex items-center">
                                <span class="mr-2">✏️</span>
                                Edit Informasi Perusahaan
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">⚠️</div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Data Landing Page</h3>
                        <p class="text-gray-500 mb-6">Silakan tambahkan informasi perusahaan terlebih dahulu</p>
                        <a href="#"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition duration-200 inline-flex items-center">
                            <span class="mr-2">➕</span>
                            Tambah Landing Page
                        </a>
                    </div>
                </div>
            @endif
        </div>

        {{-- Partners Section --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-green-500 text-white px-6 py-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Manajemen Partner</h2>
                    <span class="bg-white text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $landingPage ? count($landingPage->partners) : 0 }} Partner
                    </span>
                </div>
            </div>

            @if ($landingPage && count($landingPage->partners) > 0)
                <!-- Partners Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Logo
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Partner
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Website
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($landingPage->partners as $partner)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($partner->image)
                                            <img src="{{ asset('storage/' . $partner->image) }}"
                                                class="w-16 h-16 rounded-lg shadow-sm object-cover"
                                                alt="{{ $partner->name }}">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                                <span class="text-gray-400 text-2xl">🏢</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $partner->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($partner->website)
                                            <a href="{{ $partner->website }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 text-sm">
                                                {{ Str::limit($partner->website, 30) }}
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-sm">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-2">
                                            {{-- Edit Partner Form --}}
                                            <form action="{{ route('admin.gigan.partners.update', $partner->id) }}"
                                                method="POST" enctype="multipart/form-data"
                                                class="flex items-center space-x-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="name" value="{{ $partner->name }}"
                                                    class="border border-gray-300 rounded px-2 py-1 text-xs w-20" required>
                                                <input type="file" name="image" class="text-xs w-16">
                                                <input type="url" name="website" value="{{ $partner->website }}"
                                                    class="border border-gray-300 rounded px-2 py-1 text-xs w-24"
                                                    placeholder="https://">
                                                <button type="submit"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition duration-200">
                                                    💾
                                                </button>
                                            </form>

                                            {{-- Delete Partner --}}
                                            <form action="{{ route('admin.gigan.partners.destroy', $partner->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition duration-200"
                                                    onclick="return confirm('Yakin ingin menghapus partner ini?')">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-6xl mb-4">🤝</div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Partner</h3>
                    <p class="text-gray-500">Tambahkan partner pertama Anda</p>
                </div>
            @endif

            {{-- Add New Partner Form --}}
            @if ($landingPage)
                <div class="border-t border-gray-200 bg-gray-50 p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        <span class="mr-2">➕</span>
                        Tambah Partner Baru
                    </h3>
                    <form action="{{ route('admin.gigan.landing-pages.partners.store', $landingPage->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Partner</label>
                                <input type="text" name="name"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan nama partner" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Logo Partner</label>
                                <input type="file" name="image"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    accept="image/*">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                <input type="url" name="website"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="https://www.example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">&nbsp;</label>
                                <button type="submit"
                                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                    <span class="mr-2">➕</span>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
