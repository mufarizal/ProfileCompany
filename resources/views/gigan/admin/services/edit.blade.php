@extends('gigan.layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto mt-8">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-8">
            <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center">
                <svg class="w-7 h-7 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Service
            </h2>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('admin.gigan.services.update', $service->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Service</label>
                    <input id="icon" name="icon" type="file" accept="image/*"
                        class="block w-full text-sm text-gray-500">
                    @if ($service->icon)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->title }}"
                                class="w-16 h-16 object-cover rounded-lg">
                            <p class="text-xs text-gray-500">Icon saat ini</p>
                        </div>
                    @endif
                    @error('icon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.gigan.services.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">Update
                        Service</button>
                </div>
            </form>
            <!-- Delete Confirmation Modal -->
            <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.864-.833-2.634 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-red-700 mt-2 mb-2">Konfirmasi Hapus</h3>
                        <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menghapus service ini? Tindakan ini
                            tidak dapat dibatalkan.</p>
                        <div class="flex justify-center space-x-4">
                            <button type="button" onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md">Batal</button>
                            <form id="deleteFormModal" action="{{ route('admin.gigan.services.destroy', $service->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md">Ya,
                                    Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
@endsection
