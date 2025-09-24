@extends('gigan.layouts.admin')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        

        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Service
                </h1>
                <p class="text-gray-600 mt-1">Buat layanan baru untuk ditampilkan di halaman services</p>
            </div>
            <a href="{{ route('admin.gigan.services.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Form Service
                </h2>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.gigan.services.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title Input -->
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                placeholder="Masukkan judul service">
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Input -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                placeholder="Masukkan deskripsi service...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Jelaskan detail tentang layanan ini</p>
                        </div>

                        <!-- Icon Upload -->
                        <div>
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                                Icon Service
                            </label>
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-gray-400 transition duration-200">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <div class="mt-4">
                                        <label for="icon" class="cursor-pointer">
                                            <span class="mt-2 block text-sm font-medium text-gray-900">
                                                Upload icon atau gambar
                                            </span>
                                            <input id="icon" name="icon" type="file" accept="image/*"
                                                class="sr-only" onchange="previewImage(event)">
                                        </label>
                                        <p class="mt-1 text-sm text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                                    </div>
                                </div>
                            </div>
                            @error('icon')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                            <div id="imagePreview" class="hidden border border-gray-200 rounded-lg p-4">
                                <img id="previewImg" src="" alt="Preview"
                                    class="w-32 h-32 object-cover rounded-lg mx-auto">
                                <button type="button" onclick="removePreview()"
                                    class="mt-2 w-full text-sm text-red-600 hover:text-red-800">
                                    Hapus gambar
                                </button>
                            </div>
                            <div id="noPreview" class="border border-gray-200 rounded-lg p-8 text-center">
                                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-500">Preview gambar akan muncul di sini</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.gigan.services.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg flex items-center transition duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg flex items-center transition duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Service
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Tips untuk Service yang Baik</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Gunakan judul yang jelas dan deskriptif</li>
                            <li>Tulis deskripsi yang menjelaskan manfaat layanan</li>
                            <li>Upload icon yang relevan dengan ukuran optimal 64x64px</li>
                            <li>Pastikan gambar berkualitas tinggi dan tidak blur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                const noPreview = document.getElementById('noPreview');
                const previewImg = document.getElementById('previewImg');

                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
                noPreview.classList.add('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function removePreview() {
            const preview = document.getElementById('imagePreview');
            const noPreview = document.getElementById('noPreview');
            const fileInput = document.getElementById('icon');

            preview.classList.add('hidden');
            noPreview.classList.remove('hidden');
            fileInput.value = '';
        }
    </script>
@endsection
