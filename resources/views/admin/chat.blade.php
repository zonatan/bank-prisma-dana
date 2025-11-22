@extends('layouts.admin')

@section('title', 'Kelola Q&A Chatbot - Bank Prisma Dana')

@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Kelola Q&A Chatbot</h1>
            <p class="text-gray-600 mt-2 text-sm sm:text-base">Kelola pertanyaan dan jawaban untuk chatbot customer service</p>
        </div>
        <button onclick="openModal()" 
                class="w-full sm:w-auto bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 sm:px-6 py-3 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
            <i class="fas fa-plus-circle"></i>
            <span class="whitespace-nowrap">Tambah Q&A</span>
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total Q&A</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $qa->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-comments text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">Aktif</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $qa->where('active', true)->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-orange-100 border border-orange-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-600 text-sm font-medium">Nonaktif</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $qa->where('active', false)->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-pause-circle text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-medium">Urutan Tertinggi</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $qa->max('order') ?? 0 }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-sort-amount-up text-white text-lg"></i>
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

    <!-- Tabel Q&A - Mobile Card View -->
    <div class="block sm:hidden space-y-4">
        @forelse($qa as $item)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
            <div class="space-y-3">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $item->question }}</h3>
                        <p class="text-gray-600 text-xs mt-2 line-clamp-2">{{ Str::limit($item->answer, 80) }}</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <input type="number" value="{{ $item->order }}" min="1"
                               class="w-16 p-2 border border-gray-300 rounded-lg bg-white text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               onchange="updateOrder({{ $item->id }}, this.value)">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $item->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            <i class="fas fa-circle text-[6px] mr-1 {{ $item->active ? 'text-green-500' : 'text-red-500' }}"></i>
                            {{ $item->active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <button onclick="editQA({{ $item->id }})" 
                                class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                            <i class="fas fa-edit text-xs"></i>
                        </button>
                        <form action="{{ route('admin.chat.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Hapus Q&A ini?')"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center">
            <div class="flex flex-col items-center justify-center text-gray-500">
                <i class="fas fa-inbox text-3xl mb-3 opacity-50"></i>
                <p class="text-base font-medium">Belum ada Q&A</p>
                <p class="text-sm mt-1">Klik tombol "Tambah Q&A" untuk menambahkan pertanyaan pertama</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Tabel Q&A - Desktop Table View -->
    <div class="hidden sm:block bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pertanyaan
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Urutan
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($qa as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4 max-w-xs">
                            <div class="text-sm font-medium text-gray-900 truncate" title="{{ $item->question }}">
                                {{ $item->question }}
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4 max-w-md">
                            <div class="text-sm text-gray-600 truncate" title="{{ $item->answer }}">
                                {{ Str::limit($item->answer, 80) }}
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                <input type="number" value="{{ $item->order }}" min="1"
                                       class="w-20 p-2 border border-gray-300 rounded-lg bg-white text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                       onchange="updateOrder({{ $item->id }}, this.value)">
                                <button onclick="updateOrder({{ $item->id }}, {{ $item->order - 1 }})" 
                                        class="p-1.5 text-gray-500 hover:text-indigo-600 transition-colors" 
                                        {{ $item->order <= 1 ? 'disabled' : '' }}>
                                    <i class="fas fa-arrow-up text-xs"></i>
                                </button>
                                <button onclick="updateOrder({{ $item->id }}, {{ $item->order + 1 }})" 
                                        class="p-1.5 text-gray-500 hover:text-indigo-600 transition-colors">
                                    <i class="fas fa-arrow-down text-xs"></i>
                                </button>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <form action="{{ route('admin.chat.toggle', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium transition-all duration-200 {{ $item->active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                    <i class="fas fa-circle text-[8px] mr-1.5"></i>
                                    {{ $item->active ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick="editQA({{ $item->id }})" 
                                        class="flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                                    <i class="fas fa-edit text-xs"></i>
                                    Edit
                                </button>
                                <form action="{{ route('admin.chat.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus Q&A ini?')"
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
                                <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada Q&A</p>
                                <p class="text-sm mt-1">Klik tombol "Tambah Q&A" untuk menambahkan pertanyaan pertama</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH / EDIT -->
<div id="qa-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-transform duration-300 scale-95 opacity-0" id="modal-content">
        <div class="p-4 sm:p-6 border-b border-gray-200 sticky top-0 bg-white">
            <div class="flex items-center justify-between">
                <h3 id="modal-title" class="text-lg sm:text-xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-robot text-indigo-600"></i>
                    <span>Tambah Q&A Baru</span>
                </h3>
                <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-times text-gray-500"></i>
                </button>
            </div>
        </div>

        <form id="qa-form" method="POST" class="p-4 sm:p-6 space-y-6">
            @csrf
            <div id="method-container"></div>
            <input type="hidden" name="id" id="qa-id">

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                        <i class="fas fa-question-circle text-indigo-600"></i>
                        Pertanyaan
                    </label>
                    <textarea name="question" id="qa-question" rows="3"
                              class="w-full p-4 border border-gray-300 rounded-xl bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 resize-none"
                              placeholder="Masukkan pertanyaan yang akan ditampilkan di chatbot..."
                              required></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                        <i class="fas fa-comment-dots text-indigo-600"></i>
                        Jawaban
                    </label>
                    <textarea name="answer" id="qa-answer" rows="5"
                              class="w-full p-4 border border-gray-300 rounded-xl bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 resize-none"
                              placeholder="Masukkan jawaban untuk pertanyaan di atas..."
                              required></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-sort-numeric-up text-indigo-600"></i>
                            Urutan Tampil
                        </label>
                        <input type="number" name="order" id="qa-order" value="1" min="1"
                               class="w-full p-4 border border-gray-300 rounded-xl bg-white text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                    </div>

                    <div class="flex items-center justify-start sm:justify-end">
                        <div class="flex items-center h-14">
                            <input type="hidden" name="active" value="0">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="active" id="qa-active" value="1" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900">Aktif</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal()"
                        class="w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium order-2 sm:order-1">
                    Batal
                </button>
                <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl order-1 sm:order-2">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Q&A
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    const modal = document.getElementById('qa-modal');
    const content = document.getElementById('modal-content');
    
    modal.classList.remove('hidden');
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
    
    document.getElementById('modal-title').innerHTML = '<i class="fas fa-robot text-indigo-600"></i><span>Tambah Q&A Baru</span>';
    document.getElementById('qa-form').action = "{{ route('admin.chat.store') }}";
    document.getElementById('qa-form').reset();
    document.getElementById('qa-id').value = '';
    document.getElementById('qa-active').checked = true;
    document.getElementById('method-container').innerHTML = '';
}

function closeModal() {
    const modal = document.getElementById('qa-modal');
    const content = document.getElementById('modal-content');
    
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function editQA(id) {
    fetch(`/admin/chat/edit/${id}`)
        .then(r => r.json())
        .then(d => {
            const modal = document.getElementById('qa-modal');
            const content = document.getElementById('modal-content');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
            
            document.getElementById('modal-title').innerHTML = '<i class="fas fa-edit text-indigo-600"></i><span>Edit Q&A</span>';
            document.getElementById('qa-form').action = `/admin/chat/update/${id}`;
            document.getElementById('qa-id').value = d.id;
            document.getElementById('qa-question').value = d.question;
            document.getElementById('qa-answer').value = d.answer;
            document.getElementById('qa-order').value = d.order;
            document.getElementById('qa-active').checked = d.active;

            document.getElementById('method-container').innerHTML = 
                '<input type="hidden" name="_method" value="PATCH">';
        })
        .catch(() => {
            alert('Gagal mengambil data Q&A');
        });
}

function updateOrder(id, order) {
    if (order < 1) return;
    
    fetch(`/admin/chat/order/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order: parseInt(order) })
    })
    .then(response => {
        if (response.ok) {
            location.reload();
        } else {
            alert('Gagal mengupdate urutan');
        }
    })
    .catch(() => alert('Gagal mengupdate urutan'));
}

// Close modal when clicking outside
document.getElementById('qa-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Prevent modal content from closing when clicking inside
document.getElementById('modal-content').addEventListener('click', function(e) {
    e.stopPropagation();
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

    /* Line clamp for mobile cards */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Smooth transitions */
    * {
        transition-property: color, background-color, border-color, transform, opacity;
        transition-duration: 200ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endsection