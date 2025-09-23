@extends('gigan.layouts.admin')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Edit Page</h1>
                        <p class="text-gray-600 mt-1">Editing page: <span
                                class="font-mono bg-gray-100 px-2 py-1 rounded text-sm">{{ $page->slug }}</span></p>
                    </div>
                    <a href="{{ route('admin.gigan.pages.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Pages
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Page Details</h2>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.gigan.pages.update', ['page' => $page->id]) }}" method="POST"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Page Title
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('title') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                            placeholder="Enter page title..." required>

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug Display (Read-only info) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Page Slug
                        </label>
                        <div
                            class="w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-700 font-mono text-sm">
                            {{ $page->slug }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">The slug is used in the URL and cannot be changed.</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.gigan.pages.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
