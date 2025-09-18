@extends('gigan.layouts.admin')

@section('title', 'Kelola Footer')
@section('subtitle', 'Manage footer information and contact details')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-grip-horizontal text-white text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Informasi Footer Website</h3>
                            <p class="text-primary-100 text-sm">Kelola informasi kontak dan detail perusahaan</p>
                        </div>
                    </div>
                </div>

                <!-- Success Alert -->
                @if (session('success'))
                    <div class="mx-6 mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-green-800 font-medium">Berhasil!</p>
                                <p class="text-green-600 text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.gigan.footer.update') }}" method="POST" class="p-6">
                    @csrf

                    <!-- Company Name -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-building text-primary-500 mr-2"></i>
                            Nama Perusahaan
                        </label>
                        <input type="text" name="company_name"
                            value="{{ old('company_name', $footer->company_name ?? '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 @error('company_name') border-red-500 @enderror"
                            placeholder="Masukkan nama perusahaan">
                        @error('company_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt text-primary-500 mr-2"></i>
                            Alamat Lengkap
                        </label>
                        <textarea name="address" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 resize-none @error('address') border-red-500 @enderror"
                            placeholder="Masukkan alamat lengkap perusahaan">{{ old('address', $footer->address ?? '') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- WhatsApp -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-whatsapp text-green-500 mr-2"></i>
                                No. WhatsApp
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">+62</span>
                                </div>
                                <input type="text" name="phone" value="{{ old('phone', $footer->phone ?? '') }}"
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 @error('phone') border-red-500 @enderror"
                                    placeholder="8123456789">
                            </div>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope text-primary-500 mr-2"></i>
                                Email
                            </label>
                            <input type="email" name="email" value="{{ old('email', $footer->email ?? '') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 @error('email') border-red-500 @enderror"
                                placeholder="email@perusahaan.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-instagram text-pink-500 mr-2"></i>
                            Instagram
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm">@</span>
                            </div>
                            <input type="text" name="instagram" value="{{ old('instagram', $footer->instagram ?? '') }}"
                                class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 @error('instagram') border-red-500 @enderror"
                                placeholder="username_instagram">
                        </div>
                        @error('instagram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-2"></i>
                            Pastikan semua informasi sudah benar sebelum menyimpan
                        </div>
                        <button type="submit"
                            class="bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-medium px-8 py-3 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-6">
                <!-- Header -->
                <div class="bg-gray-800 px-4 py-3">
                    <h3 class="text-white font-medium flex items-center">
                        <i class="fas fa-eye mr-2"></i>
                        Preview Footer
                    </h3>
                </div>

                <!-- Preview Content -->
                <div class="p-4 bg-gray-50">
                    <div class="bg-gray-800 text-white p-4 rounded-lg text-sm">
                        <!-- Company Info -->
                        <div class="mb-4">
                            <h4 class="font-semibold text-lg mb-2">
                                {{ old('company_name', $footer->company_name ?? 'Nama Perusahaan') }}
                            </h4>
                            <p class="text-gray-300 text-sm leading-relaxed">
                                {{ old('address', $footer->address ?? 'Alamat perusahaan akan ditampilkan di sini...') }}
                            </p>
                        </div>

                        <!-- Contact Info -->
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <i class="fab fa-whatsapp text-green-400 mr-3 w-4"></i>
                                <span class="text-gray-300">
                                    +62{{ old('phone', $footer->phone ?? '8123456789') }}
                                </span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-400 mr-3 w-4"></i>
                                <span class="text-gray-300">
                                    {{ old('email', $footer->email ?? 'email@perusahaan.com') }}
                                </span>
                            </div>
                            <div class="flex items-center">
                                <i class="fab fa-instagram text-pink-400 mr-3 w-4"></i>
                                <span class="text-gray-300">
                                    {{ old('instagram', $footer->instagram ?? 'username_instagram') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="p-4 bg-blue-50 border-t">
                    <div class="flex items-start">
                        <i class="fas fa-lightbulb text-blue-500 mr-2 mt-1"></i>
                        <div>
                            <p class="text-blue-800 font-medium text-sm">Tips:</p>
                            <p class="text-blue-600 text-xs mt-1">
                                Preview ini menunjukkan bagaimana footer akan terlihat di website.
                                Perubahan akan terlihat setelah disimpan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
