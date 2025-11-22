@extends('layouts.admin')

@section('title', 'Dashboard - Bank Prisma Dana')

@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Dashboard Admin</h1>
            <p class="text-gray-600 mt-2 text-sm sm:text-base">Ringkasan aktivitas dan statistik sistem</p>
        </div>
        <div class="text-sm text-gray-500">
            <i class="fas fa-calendar-alt mr-2"></i>
            {{ now()->format('l, d F Y') }}
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Total Users -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total Users</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalUsers }}</p>
                    <p class="text-blue-600 text-xs mt-2">
                        <i class="fas fa-users mr-1"></i>
                        Customer terdaftar
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Q&A Chatbot -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">Q&A Chatbot</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalQAs }}</p>
                    <p class="text-green-600 text-xs mt-2">
                        <i class="fas fa-robot mr-1"></i>
                        {{ $activeQAs }} aktif
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-robot text-white text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Form PDF -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-medium">Form PDF</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalForms }}</p>
                    <p class="text-purple-600 text-xs mt-2">
                        <i class="fas fa-file-pdf mr-1"></i>
                        Dokumen tersedia
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-file-pdf text-white text-lg"></i>
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-600 text-sm font-medium">System Status</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">Online</p>
                    <p class="text-orange-600 text-xs mt-2">
                        <i class="fas fa-check-circle mr-1"></i>
                        Semua sistem normal
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-server text-white text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- User Registration Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-chart-line text-blue-600"></i>
                Registrasi User (7 Hari Terakhir)
            </h3>
            <div class="h-64 flex items-end justify-between gap-2">
                @foreach($userRegistrations['counts'] as $index => $count)
                <div class="flex flex-col items-center flex-1">
                    <div class="text-xs text-gray-500 mb-1">{{ $userRegistrations['dates'][$index] }}</div>
                    <div 
                        class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg transition-all duration-300 hover:from-blue-600 hover:to-blue-500"
                        style="height: {{ max(20, $count * 10) }}px; max-height: 200px;"
                        title="{{ $count }} users"
                    ></div>
                    <div class="text-xs font-medium text-gray-700 mt-1">{{ $count }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-bolt text-green-600"></i>
                Quick Actions
            </h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.chat') }}" 
                   class="p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-robot text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800 group-hover:text-blue-600">Kelola Q&A</p>
                            <p class="text-xs text-gray-600">{{ $totalQAs }} pertanyaan</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.forms') }}" 
                   class="p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-pdf text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800 group-hover:text-green-600">Kelola Form</p>
                            <p class="text-xs text-gray-600">{{ $totalForms }} dokumen</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.users') }}" 
                   class="p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800 group-hover:text-purple-600">Kelola User</p>
                            <p class="text-xs text-gray-600">{{ $totalUsers }} users</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.chat.export') }}" 
                   class="p-4 bg-orange-50 rounded-xl hover:bg-orange-100 transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-file-export text-white"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800 group-hover:text-orange-600">Export Data</p>
                            <p class="text-xs text-gray-600">Excel report</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Users -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-user-plus text-blue-600"></i>
                User Terbaru
            </h3>
            <div class="space-y-3">
                @forelse($recentUsers as $user)
                <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-xs">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                    </div>
                    <div class="text-xs text-gray-400">
                        {{ $user->created_at->diffForHumans() }}
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                    <i class="fas fa-users text-2xl mb-2 opacity-50"></i>
                    <p class="text-sm">Belum ada user</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Forms -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-file-upload text-green-600"></i>
                Form Terbaru
            </h3>
            <div class="space-y-3">
                @forelse($recentForms as $form)
                <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-pdf text-red-600 text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $form->title }}</p>
                        <p class="text-xs text-gray-500">Uploaded {{ $form->created_at->diffForHumans() }}</p>
                    </div>
                    <a href="{{ $form->file_path }}" target="_blank" 
                       class="p-2 text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fas fa-external-link-alt text-xs"></i>
                    </a>
                </div>
                @empty
                <div class="text-center py-4 text-gray-500">
                    <i class="fas fa-file-pdf text-2xl mb-2 opacity-50"></i>
                    <p class="text-sm">Belum ada form</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions for chart bars */
    .bg-gradient-to-t {
        transition: all 0.3s ease;
    }
</style>
@endsection