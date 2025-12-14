@extends('layouts.admin')

@section('title', 'Admin - Pembukaan Rekening')
@section('page-title', 'Pengajuan Pembukaan Rekening')
@section('page-subtitle', 'Kelola semua pengajuan pembukaan rekening nasabah')

@section('content')
<div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Total Pengajuan</p>
                    <p class="text-2xl font-bold mt-1">{{ $submissions->total() }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-file-alt text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm">Menunggu</p>
                    <p class="text-2xl font-bold mt-1">{{ $submissions->where('status', 'new')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-clock text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm">Diproses</p>
                    <p class="text-2xl font-bold mt-1">{{ $submissions->where('status', 'processed')->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-cog text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm">Selesai</p>
                    <p class="text-2xl font-bold mt-1">{{ $submissions->whereIn('status', ['approved', 'rejected'])->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nasabah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Nasabah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($submissions as $submission)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration + ($submissions->currentPage() - 1) * $submissions->perPage() }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-red-500 to-red-600 flex items-center justify-center text-white font-bold">
                                    {{ substr($submission->nama_lengkap, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $submission->nama_lengkap }}</div>
                                <div class="text-sm text-gray-500">{{ $submission->user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $submission->jenis_nasabah }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            @if(is_array($submission->produk_tabungan))
                                {{ implode(', ', $submission->produk_tabungan) }}
                            @else
                                {{ $submission->produk_tabungan }}
                            @endif
                        </div>
                        @if($submission->nominal_deposito)
                        <div class="text-xs text-gray-500">
                            Deposito: Rp {{ number_format($submission->nominal_deposito, 0, ',', '.') }}
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $submission->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($submission->status == 'new') bg-yellow-100 text-yellow-800
                            @elseif($submission->status == 'processed') bg-blue-100 text-blue-800
                            @elseif($submission->status == 'approved') bg-green-100 text-green-800
                            @elseif($submission->status == 'rejected') bg-red-100 text-red-800
                            @endif">
                            @if($submission->status == 'new') Menunggu
                            @elseif($submission->status == 'processed') Diproses
                            @elseif($submission->status == 'approved') Disetujui
                            @elseif($submission->status == 'rejected') Ditolak
                            @endif
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <!-- View PDF -->
                            

                            <!-- Download PDF -->
                            <a href="{{ route('admin.forms.submission.download', $submission->id) }}"
                               class="text-green-600 hover:text-green-900 transition-colors"
                               title="Download PDF">
                                <i class="fas fa-download"></i>
                            </a>

                            <!-- Update Status -->
                            <button onclick="openStatusModal({{ $submission->id }}, '{{ $submission->status }}')"
                                    class="text-purple-600 hover:text-purple-900 transition-colors"
                                    title="Ubah Status">
                                <i class="fas fa-edit"></i>
                            </button>

                            <!-- View Details -->
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $submissions->links() }}
    </div>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full transform transition-all">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Ubah Status Pengajuan</h3>
        </div>
        <form id="statusForm" method="POST" class="p-6">
            @csrf
            @method('PATCH')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
                        <option value="new">Menunggu</option>
                        <option value="processed">Diproses</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin (Opsional)</label>
                    <textarea name="admin_notes" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeStatusModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Details Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden transform transition-all">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900">Detail Pengajuan</h3>
            <button onclick="closeDetailsModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]" id="detailsContent">
            <!-- Details will be loaded here -->
        </div>
    </div>
</div>

<script>
function openStatusModal(submissionId, currentStatus) {
    const modal = document.getElementById('statusModal');
    const form = document.getElementById('statusForm');
    
    form.action = `/admin/form-submissions/${submissionId}/status`;
    form.querySelector('select[name="status"]').value = currentStatus;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeStatusModal() {
    const modal = document.getElementById('statusModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

function viewDetails(submissionId) {
    fetch(`/admin/form-submissions/${submissionId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('detailsContent').innerHTML = data.html;
                const modal = document.getElementById('detailsModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memuat detail.');
        });
}

function closeDetailsModal() {
    const modal = document.getElementById('detailsModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

// Close modals when clicking outside
document.getElementById('statusModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStatusModal();
    }
});

document.getElementById('detailsModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailsModal();
    }
});
</script>

<style>
/* Custom scrollbar for details modal */
#detailsContent::-webkit-scrollbar {
    width: 6px;
}

#detailsContent::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

#detailsContent::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

#detailsContent::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>
@endsection