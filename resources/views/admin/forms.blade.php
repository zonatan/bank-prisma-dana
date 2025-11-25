@extends('layouts.admin')

@section('title', 'Kelola Form PDF - Bank Prisma Dana')

@section('content')
<div class="p-4 sm:p-6 space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Kelola Form PDF</h1>
            <p class="text-gray-600 mt-2 text-sm sm:text-base">Kelola dokumen PDF untuk kebutuhan administrasi nasabah</p>
        </div>
        <button onclick="openUpload()" 
                class="w-full sm:w-auto bg-gradient-to-r from-green-600 to-emerald-600 text-white px-4 sm:px-6 py-3 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
            <i class="fas fa-file-upload"></i>
            <span class="whitespace-nowrap">Upload PDF</span>
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total Form</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $forms->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-file-pdf text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">Tersedia</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $forms->count() }}</p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-4 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-medium">Ukuran Total</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">
                        @php
                            $totalSize = $forms->sum('file_size') / (1024 * 1024); // Convert to MB
                        @endphp
                        {{ number_format($totalSize, 1) }} MB
                    </p>
                </div>
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-database text-white text-lg"></i>
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

    <!-- Tabel PDF - Mobile Card View -->
    <div class="block sm:hidden space-y-4">
        @forelse($forms as $form)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
            <div class="space-y-3">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $form->title }}</h3>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                <i class="fas fa-file-pdf text-xs mr-1"></i>
                                PDF
                            </span>
                            <span class="text-gray-500 text-xs">
                                @php
                                    $fileSizeMB = $form->file_size ? $form->file_size / (1024 * 1024) : 0;
                                @endphp
                                {{ number_format($fileSizeMB, 1) }} MB
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                    <a href="{{ $form->file_path }}" target="_blank" 
                       class="flex items-center gap-1.5 px-3 py-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition-colors text-sm font-medium">
                        <i class="fas fa-eye text-xs"></i>
                        Lihat
                    </a>
                    
                    <form action="{{ route('admin.form.destroy', $form->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Hapus PDF {{ $form->title }}?')"
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
                <i class="fas fa-file-pdf text-4xl mb-4 opacity-50"></i>
                <p class="text-base font-medium">Belum ada Form PDF</p>
                <p class="text-sm mt-1">Klik tombol "Upload PDF" untuk menambahkan form pertama</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Tabel PDF - Desktop Table View -->
    <div class="hidden sm:block bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Judul Form
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            File
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ukuran
                        </th>
                        <th class="px-4 lg:px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($forms as $form)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-file-pdf text-red-600 text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $form->title }}</div>
                                    <div class="text-xs text-gray-500 mt-1">Uploaded {{ $form->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <a href="{{ $form->file_path }}" target="_blank" 
                               class="inline-flex items-center gap-2 px-3 py-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition-colors text-sm font-medium">
                                <i class="fas fa-external-link-alt text-xs"></i>
                                Buka PDF
                            </a>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <span class="text-sm text-gray-600">
                                @php
                                    $fileSizeMB = $form->file_size ? $form->file_size / (1024 * 1024) : 0;
                                @endphp
                                {{ number_format($fileSizeMB, 1) }} MB
                            </span>
                        </td>
                        <td class="px-4 lg:px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ $form->file_path }}" download 
                                   class="flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                                    <i class="fas fa-download text-xs"></i>
                                    Download
                                </a>
                                <form action="{{ route('admin.form.destroy', $form->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus PDF {{ $form->title }}?')"
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
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-file-pdf text-4xl mb-4 opacity-50"></i>
                                <p class="text-lg font-medium">Belum ada Form PDF</p>
                                <p class="text-sm mt-1">Klik tombol "Upload PDF" untuk menambahkan form pertama</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Upload -->
<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4 sm:p-6">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <div class="p-4 sm:p-6 border-b border-gray-200 sticky top-0 bg-white">
            <div class="flex items-center justify-between">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-file-upload text-green-600"></i>
                    <span>Upload Form PDF</span>
                </h3>
                <button type="button" onclick="closeUpload()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-times text-gray-500"></i>
                </button>
            </div>
        </div>

        <form id="upload-form" action="{{ route('admin.form.upload') }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-6 space-y-6">
            @csrf
            
            @if($errors->any())
                <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 text-red-800 text-sm">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>Periksa kembali data yang diinput</span>
                    </div>
                    <ul class="mt-2 text-red-700 text-sm">
                        @foreach($errors->all() as $error)
                            <li class="flex items-center gap-1">
                                <i class="fas fa-circle text-[4px]"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <i class="fas fa-heading text-green-600"></i>
                    Judul Form
                </label>
                <input type="text" name="title" 
                       class="w-full p-4 border border-gray-300 rounded-xl bg-white text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
                       placeholder="Contoh: Form Pembukaan Rekening"
                       value="{{ old('title') }}"
                       required>
                @error('title')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <i class="fas fa-file-pdf text-green-600"></i>
                    File PDF
                </label>
                <div class="relative">
                    <div id="drop-zone" 
                         class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-400 transition-colors duration-200 cursor-pointer">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                        <p class="text-sm text-gray-600 mb-2">Klik untuk memilih file atau drag & drop</p>
                        <p class="text-xs text-gray-500">Format: PDF (Maks: 10MB)</p>
                        <div id="file-name" class="text-sm text-green-600 font-medium mt-2 hidden"></div>
                    </div>
                    <input type="file" name="pdf" id="pdf-input" accept=".pdf" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                           required>
                </div>
                @error('pdf')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeUpload()"
                        class="w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium order-2 sm:order-1">
                    Batal
                </button>
                <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 font-medium shadow-lg hover:shadow-xl order-1 sm:order-2">
                    <i class="fas fa-upload mr-2"></i>
                    Upload PDF
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openUpload() {
    document.getElementById('upload-modal').classList.remove('hidden');
}

function closeUpload() {
    document.getElementById('upload-modal').classList.add('hidden');
    document.getElementById('file-name').classList.add('hidden');
    document.getElementById('file-name').textContent = '';
    document.getElementById('upload-form').reset();
}

// Update file name display
document.getElementById('pdf-input').addEventListener('change', function(e) {
    const fileNameDisplay = document.getElementById('file-name');
    if (this.files.length > 0) {
        const file = this.files[0];
        fileNameDisplay.textContent = file.name + ' (' + (file.size / (1024 * 1024)).toFixed(1) + ' MB)';
        fileNameDisplay.classList.remove('hidden');
    } else {
        fileNameDisplay.classList.add('hidden');
    }
});

// Close modal when clicking outside
document.getElementById('upload-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUpload();
    }
});

// Prevent modal content from closing when clicking inside
document.querySelector('#upload-modal > div').addEventListener('click', function(e) {
    e.stopPropagation();
});

// Drag and drop functionality
const dropZone = document.getElementById('drop-zone');
const fileInput = document.getElementById('pdf-input');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
    document.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
});

function highlight() {
    dropZone.classList.add('border-green-400', 'bg-green-50');
}

function unhighlight() {
    dropZone.classList.remove('border-green-400', 'bg-green-50');
}

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
        fileInput.files = files;
        
        // Trigger change event
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);
    }
}

// Click on drop zone to trigger file input
dropZone.addEventListener('click', function() {
    fileInput.click();
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

    /* File upload dropzone */
    .border-dashed {
        border-style: dashed;
    }
</style>
@endsection