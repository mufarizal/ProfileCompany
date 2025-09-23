@extends('gigan.layouts.admin')
@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Banner</h1>
            <p class="text-gray-600">Add a new banner to your website pages</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('admin.gigan.banner.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- Pages Selection -->
                <div class="form-group">
                    <label for="page_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Select Page <span class="text-red-500">*</span>
                    </label>
                    <select name="page_id" id="page_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <option value="">Choose a page...</option>
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Banner Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Enter banner title...">
                </div>

                <!-- Subtitle -->
                <div class="form-group">
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                        Banner Subtitle
                    </label>
                    <input type="text" name="subtitle" id="subtitle"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Enter banner subtitle...">
                </div>

                <!-- Image Upload -->
                <div class="form-group">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Banner Image <span class="text-red-500">*</span>
                    </label>
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                        <input type="file" name="image" id="image" accept="image/*" class="hidden"
                            onchange="previewImage(this)">
                        <label for="image" class="cursor-pointer">
                            <div class="text-gray-400 mb-2">
                                <svg class="mx-auto h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-600">Click to upload image</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, JPEG up to 10MB</p>
                        </label>
                    </div>
                    <div id="imagePreview" class="mt-4 hidden">
                        <img id="preview" class="max-w-xs rounded-lg shadow-md" alt="Preview">
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <div class="flex items-center">
                        <input type="checkbox" name="status" id="status" value="1" checked
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="status" class="ml-2 block text-sm font-medium text-gray-700">
                            Active Status
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Check to make this banner active</p>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.gigan.banner.index') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Create Banner
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
