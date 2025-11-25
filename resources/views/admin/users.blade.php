@extends('layouts.admin')

@section('title', 'Kelola User - Bank Prisma Dana')

@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Kelola User</h1>
            <p class="text-gray-600 mt-2 text-sm sm:text-base">Kelola data pengguna sistem Bank Prisma Dana</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="Cari user..." 
                       class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total User</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $users->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">User Aktif</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $users->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-check text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-medium">Admin</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $users->where('role', 'admin')->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-shield text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-600 text-sm font-medium">User Biasa</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $users->where('role', 'user')->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user text-white text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
        <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-white text-xs"></i>
        </div>
        <div>
            <p class="text-green-800 text-sm font-medium">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
        <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fas fa-exclamation text-white text-xs"></i>
        </div>
        <div>
            <p class="text-red-800 text-sm font-medium">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    <!-- Tabel User - Mobile Card View -->
    <div class="block sm:hidden space-y-4">
        @forelse($users as $user)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
            <div class="space-y-3">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-sm">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm">{{ $user->name }}</h3>
                                <p class="text-gray-600 text-xs mt-1">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium 
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                        <i class="fas {{ $user->role === 'admin' ? 'fa-user-shield' : 'fa-user' }} text-xs mr-1"></i>
                        {{ ucfirst($user->role) }}
                    </span>
                    
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Hapus user {{ $user->name }}?')"
                                class="flex items-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                            <i class="fas fa-trash text-xs"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center">
            <div class="flex flex-col items-center justify-center text-gray-500">
                <i class="fas fa-users text-4xl mb-4 opacity-50"></i>
                <p class="text-base font-medium">Belum ada User</p>
                <p class="text-sm mt-1">User yang mendaftar akan muncul di sini</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Tabel User - Desktop Table View -->
    <div class="hidden sm:block bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Bergabung
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-xs">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500 mt-1">ID: {{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                      {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                <i class="fas {{ $user->role === 'admin' ? 'fa-user-shield' : 'fa-user' }} text-xs mr-1.5"></i>
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="text-sm text-gray-600">
                                {{ $user->created_at->diffForHumans() }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $user->created_at->format('d M Y') }}
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if($user->role !== 'admin')
                                <button onclick="promoteUser({{ $user->id }})"
                                        class="flex items-center gap-1.5 px-3 py-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition-colors text-sm font-medium">
                                    <i class="fas fa-user-shield text-xs"></i>
                                    Jadikan Admin
                                </button>
                                @endif
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus user {{ $user->name }}?')"
                                            class="flex items-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                                        <i class="fas fa-trash text-xs"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-users text-4xl mb-4 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada User</p>
                                <p class="text-sm mt-1">User yang mendaftar akan muncul di sini</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function promoteUser(userId) {
    if(confirm('Jadikan user ini sebagai admin?')) {
        fetch(`/admin/user/promote/${userId}`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if(response.ok) {
                location.reload();
            } else {
                alert('Gagal mengubah role user');
            }
        })
        .catch(() => alert('Terjadi kesalahan'));
    }
}

// Search functionality (basic)
document.querySelector('input[type="text"]').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});
</script>

<style>
    /* Custom scrollbar for table */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }

    /* Smooth transitions */
    * {
        transition-property: color, background-color, border-color, transform, opacity;
        transition-duration: 200ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endsection