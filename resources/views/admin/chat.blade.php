@extends('layouts.admin')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Kelola Q&A Chatbot</h1>
            <p class="text-gray-600 mt-2">Kelola pertanyaan dan jawaban untuk chatbot customer service</p>
        </div>
        <button onclick="openModal()" 
                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
            <i class="fas fa-plus-circle"></i>
            Tambah Q&A
        </button>
    </div>

    <!-- Tabel Q&A -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pertanyaan
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Jawaban
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Urutan
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($qa as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <div class="text-sm font-medium text-gray-900 truncate" title="{{ $item->question }}">
                                {{ $item->question }}
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-md">
                            <div class="text-sm text-gray-600 truncate" title="{{ $item->answer }}">
                                {{ Str::limit($item->answer, 80) }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" value="{{ $item->order }}" min="1"
                                   class="w-20 p-2 border border-gray-300 rounded-lg bg-white text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                                   onchange="updateOrder({{ $item->id }}, this.value)">
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $item->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <i class="fas fa-circle text-[8px] mr-1.5 {{ $item->active ? 'text-green-500' : 'text-red-500' }}"></i>
                                {{ $item->active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button onclick="editQA({{ $item->id }})" 
                                        class="flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                                    <i class="fas fa-edit text-xs"></i>
                                    Edit
                                </button>
                                <form action="{{ route('admin.chat.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus Q&A ini?')"
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
<div id="qa-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-6">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl transform transition-transform duration-300">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="modal-title" class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-robot text-indigo-600"></i>
                    <span>Tambah Q&A</span>
                </h3>
                <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-times text-gray-500"></i>
                </button>
            </div>
        </div>

        <form id="qa-form" method="POST" class="p-6 space-y-6">
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
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="active" id="qa-active" value="1" class="mr-3 h-5 w-5 text-indigo-600 rounded focus:ring-indigo-500" checked>
                                <span class="text-sm font-medium text-gray-700">Aktif</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal()"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium">
                    Batal
                </button>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Q&A
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('qa-modal').classList.remove('hidden');
    document.getElementById('modal-title').innerHTML = '<i class="fas fa-robot text-indigo-600"></i><span>Tambah Q&A</span>';
    document.getElementById('qa-form').action = "{{ route('admin.chat.store') }}";
    document.getElementById('qa-form').reset();
    document.getElementById('qa-id').value = '';
    document.getElementById('qa-active').checked = true;
    document.getElementById('method-container').innerHTML = '';
}

function closeModal() {
    document.getElementById('qa-modal').classList.add('hidden');
}

function editQA(id) {
    fetch(`/admin/chat/edit/${id}`)
        .then(r => r.json())
        .then(d => {
            document.getElementById('modal-title').innerHTML = '<i class="fas fa-edit text-indigo-600"></i><span>Edit Q&A</span>';
            document.getElementById('qa-form').action = `/admin/chat/update/${id}`;
            document.getElementById('qa-id').value = d.id;
            document.getElementById('qa-question').value = d.question;
            document.getElementById('qa-answer').value = d.answer;
            document.getElementById('qa-order').value = d.order;
            document.getElementById('qa-active').checked = d.active;
            document.getElementById('qa-modal').classList.remove('hidden');

            document.getElementById('method-container').innerHTML = 
                '<input type="hidden" name="_method" value="PATCH">';
        })
        .catch(() => alert('Gagal mengambil data'));
}

function updateOrder(id, order) {
    fetch(`/admin/chat/order/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order })
    })
    .then(() => location.reload())
    .catch(() => alert('Gagal update urutan'));
}

// Close modal when clicking outside
document.getElementById('qa-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
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
</style>
@endsection