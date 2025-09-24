@extends('gigan.layouts.admin')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->


        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <svg class="w-8 h-8 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Pesan Masuk
                </h1>
                <p class="text-gray-600 mt-1">Kelola pesan dari pengunjung website</p>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Stats -->
                <div class="bg-white rounded-lg border border-gray-200 px-4 py-2">
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Total: {{ $requests->total() ?? $requests->count() }}</span>
                        </div>
                        @if (isset($unreadCount))
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Belum dibaca: {{ $unreadCount }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <a href="{{ route('admin.gigan.services.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>


        <!-- Messages Table -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                        </path>
                    </svg>
                    Daftar Pesan
                </h2>
            </div>

            <div class="p-6">
                @if (isset($requests) && $requests->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto" id="messagesTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengirim</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pesan</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($requests as $req)
                                    <tr class="hover:bg-gray-50 {{ isset($req->is_read) && !$req->is_read ? 'bg-blue-50' : '' }}"
                                        data-message-id="{{ $req->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $loop->iteration + ($requests->currentPage() - 1) * $requests->perPage() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                                                        {{ strtoupper(substr($req->name, 0, 2)) }}
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 flex items-center">
                                                        {{ $req->name }}
                                                        @if (isset($req->is_read) && !$req->is_read)
                                                            <span
                                                                class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                                Baru
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $req->email }}</div>
                                            <div class="text-sm text-gray-500">
                                                <a href="mailto:{{ $req->email }}"
                                                    class="text-blue-600 hover:text-blue-800 hover:underline">
                                                    Kirim Email
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs">
                                                <div class="truncate" title="{{ $req->message }}">
                                                    {{ Str::limit($req->message, 80) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div>{{ $req->created_at->format('d M Y') }}</div>
                                            <div class="text-xs text-gray-400">{{ $req->created_at->format('H:i') }}</div>
                                            <div class="text-xs text-gray-400">{{ $req->created_at->diffForHumans() }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <button onclick="viewMessage({{ json_encode($req) }})"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition duration-200 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                    Lihat
                                                </button>
                                                <a href="mailto:{{ $req->email }}?subject=Re: {{ $req->name }}"
                                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs transition duration-200 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6">
                                                        </path>
                                                    </svg>
                                                    Balas
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if (method_exists($requests, 'links'))
                        <div class="mt-6 flex justify-between items-center">
                            <div class="text-sm text-gray-700">
                                Menampilkan {{ $requests->firstItem() ?? 1 }} sampai
                                {{ $requests->lastItem() ?? $requests->count() }}
                                dari {{ $requests->total() ?? $requests->count() }} pesan
                            </div>
                            <div>
                                {{ $requests->links() }}
                            </div>
                        </div>
                    @endif
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada pesan masuk</h3>
                        <p class="mt-2 text-sm text-gray-500">Pesan dari pengunjung website akan muncul di sini.</p>
                        <div class="mt-6">
                            <button onclick="refreshMessages()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg inline-flex items-center transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                                Refresh
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Message Detail Modal -->
    <div id="messageModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-8 mx-auto p-5 border max-w-2xl shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Detail Pesan</h3>
                <button onclick="closeMessageModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="mt-4 space-y-4">
                <div class="flex items-center space-x-4">
                    <div id="modalAvatar"
                        class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold">
                    </div>
                    <div>
                        <div id="modalName" class="text-lg font-medium text-gray-900"></div>
                        <div id="modalEmail" class="text-sm text-gray-500"></div>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-sm text-gray-500 mb-2">Pesan:</div>
                    <div id="modalMessage" class="text-gray-900 whitespace-pre-wrap"></div>
                </div>

                <div class="text-xs text-gray-500">
                    Dikirim pada: <span id="modalDate"></span>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="closeMessageModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-md text-sm transition duration-200">
                    Tutup
                </button>
                <button id="modalReplyBtn"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm transition duration-200 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                    Balas via Email
                </button>
            </div>
        </div>
    </div>

    <script>
        function viewMessage(message) {
            const modal = document.getElementById('messageModal');
            const avatar = document.getElementById('modalAvatar');
            const name = document.getElementById('modalName');
            const email = document.getElementById('modalEmail');
            const messageContent = document.getElementById('modalMessage');
            const date = document.getElementById('modalDate');
            const replyBtn = document.getElementById('modalReplyBtn');

            avatar.textContent = message.name.substring(0, 2).toUpperCase();
            name.textContent = message.name;
            email.textContent = message.email;
            messageContent.textContent = message.message;
            date.textContent = new Date(message.created_at).toLocaleString('id-ID');

            replyBtn.onclick = function() {
                window.open('mailto:' + message.email + '?subject=Re: Pesan dari ' + message.name);
            };

            modal.classList.remove('hidden');
        }

        function closeMessageModal() {
            document.getElementById('messageModal').classList.add('hidden');
        }

        function filterMessages(filter) {
            // Implement filter logic here
            console.log('Filter:', filter);
        }

        function sortMessages(sort) {
            // Implement sort logic here
            console.log('Sort:', sort);
        }

        function searchMessages(query) {
            // Implement search logic here
            console.log('Search:', query);
        }

        function refreshMessages() {
            window.location.reload();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('messageModal');
            if (event.target === modal) {
                closeMessageModal();
            }
        }

        // Auto refresh every 30 seconds
        setInterval(function() {
            // You can implement auto-refresh logic here
            // For example, fetch new message count via AJAX
        }, 30000);
    </script>
@endsection
