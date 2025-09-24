@extends('gigan.layouts.admin')

@section('content')
    <div class="p-6">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        <span class="mr-3">✏️</span>
                        Edit Landing Page
                    </h1>
                    <p class="text-gray-600">Perbarui informasi perusahaan dan konten landing page</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.gigan.landing-pages.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200 inline-flex items-center">
                        <span class="mr-2">←</span>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-4">
                <h2 class="text-xl font-semibold">Formulir Edit Landing Page</h2>
            </div>

            <form action="{{ route('admin.gigan.landing-pages.update', $landingPage->id) }}" method="POST"
                enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Banner Section -->
                    <div class="space-y-6">
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">🖼️</span>
                                Banner Image
                            </label>
                            @if ($landingPage->banner_image)
                                <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-600 mb-2">Current Banner:</p>
                                    <img src="{{ asset('storage/' . $landingPage->banner_image) }}"
                                        class="w-48 h-32 object-cover rounded-lg shadow-sm border border-gray-200"
                                        alt="Current banner image">
                                </div>
                            @endif
                            <input type="file" name="banner_image"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                accept="image/*">
                            @error('banner_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                        </div>
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">🏷️</span>
                                Banner Title
                            </label>
                            <input type="text" name="banner_title"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ old('banner_title', $landingPage->banner_title) }}"
                                placeholder="Masukkan judul banner">
                            @error('banner_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">📝</span>
                                Banner Subtitle
                            </label>
                            <input type="text" name="banner_subtitle"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ old('banner_subtitle', $landingPage->banner_subtitle) }}"
                                placeholder="Masukkan subjudul banner">
                            @error('banner_subtitle')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- About Title -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">📝</span>
                                Judul Tentang Perusahaan
                            </label>
                            <input type="text" name="about_title"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                value="{{ old('about_title', $landingPage->about_title) }}"
                                placeholder="Masukkan judul tentang perusahaan" required>
                            @error('about_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- About Description -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">📄</span>
                                Deskripsi Tentang Perusahaan
                            </label>
                            <textarea name="about_description" rows="6"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none"
                                placeholder="Deskripsikan tentang perusahaan Anda...">{{ old('about_description', $landingPage->about_description) }}</textarea>
                            @error('about_description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">
                                Jelaskan secara singkat tentang perusahaan, sejarah, dan keunggulan utama
                            </p>
                        </div>

                        <!-- About Image -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">🖼️</span>
                                Gambar Perusahaan
                            </label>

                            <!-- Current Image Preview -->
                            @if ($landingPage->about_image)
                                <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                                    <div class="relative inline-block">
                                        <img src="{{ asset('storage/' . $landingPage->about_image) }}"
                                            class="w-48 h-32 object-cover rounded-lg shadow-sm border border-gray-200"
                                            alt="Current company image">
                                        <div
                                            class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-xs">
                                            ✓ Aktif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- File Input -->
                            <div class="relative">
                                <input type="file" name="about_image"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    accept="image/*">
                            </div>
                            @error('about_image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">
                                Format yang didukung: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah
                                gambar.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Visi -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">👁️</span>
                                Visi Perusahaan
                            </label>
                            <div class="relative">
                                <textarea name="visi" rows="5"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none pl-12"
                                    placeholder="Tuliskan visi perusahaan...">{{ old('visi', $landingPage->visi) }}</textarea>
                                <div class="absolute top-3 left-3 text-blue-500 text-lg">
                                    🎯
                                </div>
                            </div>
                            @error('visi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">
                                Visi adalah gambaran masa depan yang ingin dicapai perusahaan
                            </p>
                        </div>

                        <!-- Misi -->
                        <div class="form-group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="mr-2">🚀</span>
                                Misi Perusahaan
                            </label>
                            <div class="relative">
                                <textarea name="misi" rows="7"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none pl-12"
                                    placeholder="Tuliskan misi perusahaan...">{{ old('misi', $landingPage->misi) }}</textarea>
                                <div class="absolute top-3 left-3 text-green-500 text-lg">
                                    ⭐
                                </div>
                            </div>
                            @error('misi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">
                                Misi adalah langkah-langkah konkret untuk mencapai visi perusahaan
                            </p>
                        </div>

                        <!-- Form Info Card -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="text-blue-500 text-xl mr-3 mt-1">💡</div>
                                <div>
                                    <h4 class="text-sm font-semibold text-blue-800 mb-1">Tips Pengisian</h4>
                                    <ul class="text-xs text-blue-700 space-y-1">
                                        <li>• Gunakan bahasa yang mudah dipahami</li>
                                        <li>• Visi harus inspiratif dan jangka panjang</li>
                                        <li>• Misi harus spesifik dan actionable</li>
                                        <li>• Gambar sebaiknya beresolusi tinggi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-3 sm:space-y-0">
                        <div class="text-sm text-gray-500">
                            <span class="mr-2">⚠️</span>
                            Pastikan semua informasi sudah benar sebelum menyimpan perubahan
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.gigan.landing-pages.index') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition duration-200 inline-flex items-center text-sm font-medium">
                                <span class="mr-2">✕</span>
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-8 py-3 rounded-lg transition duration-200 inline-flex items-center text-sm font-medium shadow-sm">
                                <span class="mr-2">💾</span>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Additional Info Card -->
        <div class="mt-6 bg-gradient-to-r from-green-50 to-blue-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center">
                <div class="text-green-500 text-2xl mr-4">📋</div>
                <div>
                    <h3 class="text-sm font-semibold text-green-800 mb-1">Status Form</h3>
                    <p class="text-xs text-green-700">
                        Form ini akan memperbarui informasi pada halaman utama website.
                        Perubahan akan langsung terlihat setelah disimpan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom file input styling */
        input[type="file"]::-webkit-file-upload-button {
            visibility: hidden;
        }

        input[type="file"]::before {
            content: '📁 Pilih File';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: thin solid #888;
            border-radius: 6px;
            padding: 8px 12px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.875rem;
        }

        input[type="file"]:hover::before {
            border-color: #333;
        }

        input[type="file"]:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
        }

        /* Focus animations */
        .form-group input:focus,
        .form-group textarea:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        }

        /* Smooth transitions */
        .form-group input,
        .form-group textarea {
            transition: all 0.2s ease;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(45deg, #3B82F6, #8B5CF6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endsection
