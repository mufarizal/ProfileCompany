@extends('gigan.layouts.admin')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Edit Project: {{ $project->title }}</h1>
                        <nav class="flex mt-2" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">

                                <li class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('admin.gigan.portfolio.index') }}"
                                        class="text-gray-500 hover:text-gray-700">Portfolio</a>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-500">Edit Project</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-yellow-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Project Details
                            </h2>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('admin.gigan.portfolio.project.update', $project->id) }}" method="POST"
                                enctype="multipart/form-data" id="editProjectForm">
                                @csrf
                                @method('PUT')

                                <div class="space-y-6">
                                    <!-- Project Title -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Project Title <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="title"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 @error('title') border-red-500 @enderror"
                                            value="{{ old('title', $project->title) }}" placeholder="Enter project title"
                                            required>
                                        @error('title')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p class="mt-1 text-sm text-gray-500">Give your project a clear and descriptive
                                            title</p>
                                    </div>

                                    <!-- Project Description -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Project
                                            Description</label>
                                        <textarea name="description"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 @error('description') border-red-500 @enderror"
                                            rows="6" placeholder="Describe your project in detail...">{{ old('description', $project->description) }}</textarea>
                                        @error('description')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p class="mt-1 text-sm text-gray-500">Provide detailed information about your
                                            project</p>
                                    </div>

                                    <!-- Current Image Display -->
                                    @if ($project->image)
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Current
                                                Image</label>
                                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                                <img src="{{ asset('storage/' . $project->image) }}"
                                                    alt="Current Project Image"
                                                    class="max-h-64 rounded-lg shadow-sm mx-auto hover:scale-105 transition-transform duration-200 cursor-pointer"
                                                    id="currentImage">
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Project Image Upload -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            {{ $project->image ? 'Replace Image' : 'Project Image' }}
                                        </label>
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-yellow-400 transition-colors duration-200">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="projectImage"
                                                        class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                                        <span>{{ $project->image ? 'Choose new file' : 'Upload a file' }}</span>
                                                        <input id="projectImage" name="image" type="file"
                                                            class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                                @if ($project->image)
                                                    <p class="text-xs text-yellow-600 font-medium">Leave empty to keep
                                                        current image</p>
                                                @endif
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </p>
                                        @enderror

                                        <!-- New Image Preview -->
                                        <div id="imagePreview" class="mt-4 hidden">
                                            <div class="border border-blue-200 rounded-lg p-4 bg-blue-50">
                                                <label class="block text-sm font-medium text-blue-700 mb-2">New Image
                                                    Preview:</label>
                                                <img id="previewImg" src="" alt="New Preview"
                                                    class="max-h-48 rounded-lg shadow-sm mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                                    <a href="{{ route('admin.gigan.portfolio.index') }}"
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                        </svg>
                                        Back
                                    </a>
                                    <div class="flex space-x-2">
                                        <button type="button" onclick="resetForm()"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                </path>
                                            </svg>
                                            Reset
                                        </button>
                                        <button type="submit"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Project Info Card -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Project Information
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Created Date</h4>
                                <p class="mt-1 text-sm text-gray-900 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $project->created_at->format('d F Y, H:i') }}
                                </p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Last Updated</h4>
                                <p class="mt-1 text-sm text-gray-900 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $project->updated_at->format('d F Y, H:i') }}
                                </p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Project ID</h4>
                                <p class="mt-1 text-sm text-gray-900 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    {{ $project->id }}
                                </p>
                            </div>
                            @if ($project->image)
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Image Status</h4>
                                    <p class="mt-1 text-sm text-green-600 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Image uploaded
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Editing Tips Card -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="px-6 py-4 border-b border-blue-200">
                            <h3 class="text-lg font-semibold text-blue-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Editing Tips
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <h4 class="font-medium text-blue-900 flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Save Changes
                                </h4>
                                <p class="text-sm text-blue-800">Make sure to click "Update Project" to save your changes.
                                </p>
                            </div>
                            <div>
                                <h4 class="font-medium text-blue-900 flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Image Update
                                </h4>
                                <p class="text-sm text-blue-800">Leave image field empty to keep the current image, or
                                    choose a new one to replace it.</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-blue-900 flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Reset Form
                                </h4>
                                <p class="text-sm text-blue-800">Use "Reset Changes" to restore original values if you make
                                    a mistake.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Danger Zone Card -->
                    <div class="bg-red-50 border border-red-200 rounded-lg">
                        <div class="px-6 py-4 border-b border-red-200">
                            <h3 class="text-lg font-semibold text-red-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Danger Zone
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-red-800 mb-4">Delete this project permanently. This action cannot be
                                undone.</p>
                            <form action="{{ route('admin.gigan.portfolio.project.destroy', $project->id) }}"
                                method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Delete Project
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Store original values for reset functionality
            const originalTitle = document.querySelector('input[name="title"]').value;
            const originalDescription = document.querySelector('textarea[name="description"]').value;

            // Image preview functionality
            document.getElementById('projectImage').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('imagePreview');
                const previewImg = document.getElementById('previewImg');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.classList.add('hidden');
                }
            });

            // Form validation
            document.getElementById('editProjectForm').addEventListener('submit', function(e) {
                const title = document.querySelector('input[name="title"]').value.trim();
                if (title.length < 3) {
                    e.preventDefault();
                    alert('Project title must be at least 3 characters long.');
                    return false;
                }
            });

            // Global reset function
            window.resetForm = function() {
                if (confirm(
                        'Are you sure you want to reset all changes? This will restore the original values.')) {
                    document.querySelector('input[name="title"]').value = originalTitle;
                    document.querySelector('textarea[name="description"]').value = originalDescription;
                    document.getElementById('projectImage').value = '';
                    document.getElementById('imagePreview').classList.add('hidden');
                }
            };

            // Global delete confirmation function
            window.confirmDelete = function() {
                return confirm(
                    'Are you sure you want to delete this project? This action cannot be undone and will permanently remove all project data including images.'
                );
            };
        });
    </script>
@endsection
