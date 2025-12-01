@extends('layouts.app')

@section('title', 'Riwayat Pengajuan - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION -->
<section class="pt-24 pb-12 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Riwayat Pengajuan Rekening</h1>
                <p class="text-xl opacity-90">Lihat status dan riwayat semua pengajuan rekening Anda</p>
            </div>
            <div class="hidden md:flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl p-4">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-history text-white text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-sm opacity-80">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BREADCRUMB -->
<section class="bg-white border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-6 py-4">
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-gray-400"><i class="fas fa-chevron-right text-xs"></i></span>
            <a href="{{ route('form.pembukaan-rekening') }}" class="hover:text-red-600 transition-colors">
                Form Pembukaan Rekening
            </a>
            <span class="text-gray-400"><i class="fas fa-chevron-right text-xs"></i></span>
            <span class="text-red-600 font-medium">Riwayat Pengajuan</span>
        </nav>
    </div>
</section>

<!-- CONTENT SECTION -->
<section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        @if($submissions->count() > 0)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h2 class="text-2xl font-bold">Semua Pengajuan Anda</h2>
                        <p class="text-red-100 mt-1">Total {{ $submissions->total() }} pengajuan</p>
                    </div>
                    <a href="{{ route('form.pembukaan-rekening') }}" 
                       class="bg-white text-red-600 px-6 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        <i class="fas fa-plus mr-2"></i>Ajukan Baru
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Nasabah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($submissions as $submission)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $loop->iteration + ($submissions->currentPage() - 1) * $submissions->perPage() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $submission->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $submission->nama_lengkap }}</div>
                                <div class="text-sm text-gray-500">{{ $submission->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $submission->jenis_nasabah }}
                            </td>
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
                                @if($submission->processed_at)
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $submission->processed_at->format('d/m/Y') }}
                                </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('forms.download-submission', $submission->id) }}" 
                                       class="text-green-600 hover:text-green-900 transition-colors"
                                       title="Download PDF">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    @if($submission->admin_notes)
                                    <button onclick="showNotes('{{ $submission->admin_notes }}')"
                                            class="text-blue-600 hover:text-blue-900 transition-colors"
                                            title="Lihat Catatan Admin">
                                        <i class="fas fa-sticky-note"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-6 py-4 border-t border-gray-200">
                {{ $submissions->links() }}
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-file-alt text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Pengajuan</h3>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                Anda belum memiliki pengajuan pembukaan rekening. Mulai dengan mengajukan pembukaan rekening pertama Anda.
            </p>
            <a href="{{ route('form.pembukaan-rekening') }}" 
               class="bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium inline-flex items-center gap-2">
                <i class="fas fa-plus"></i>
                Ajukan Pembukaan Rekening
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Notes Modal -->
<div id="notesModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full transform transition-all">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Catatan Admin</h3>
        </div>
        <div class="p-6">
            <p id="notesContent" class="text-gray-700"></p>
        </div>
        <div class="flex justify-end p-6 border-t border-gray-200">
            <button onclick="closeNotes()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
function showNotes(notes) {
    document.getElementById('notesContent').textContent = notes;
    document.getElementById('notesModal').classList.remove('hidden');
    document.getElementById('notesModal').classList.add('flex');
}

function closeNotes() {
    document.getElementById('notesModal').classList.remove('flex');
    document.getElementById('notesModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('notesModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeNotes();
    }
});
</script>

<style>
/* Custom styling for pagination */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 2px;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    color: #6b7280;
    text-decoration: none;
    transition: all 0.2s;
}

.pagination li a:hover {
    background-color: #f9fafb;
    border-color: #d1d5db;
}

.pagination li.active span {
    background-color: #dc2626;
    border-color: #dc2626;
    color: white;
}

.pagination li.disabled span {
    color: #9ca3af;
    background-color: #f9fafb;
}
</style>
@endsection