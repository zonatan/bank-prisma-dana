<div class="space-y-6">
    <!-- Header -->
    <div class="bg-red-50 rounded-xl p-4">
        <div class="flex justify-between items-start">
            <div>
                <h4 class="font-bold text-gray-800 text-lg">{{ $submission->nama }}</h4>
                <p class="text-gray-600">{{ $submission->email }} • {{ $submission->no_hp }}</p>
            </div>
            <span class="px-3 py-1 bg-red-600 text-white rounded-full text-sm font-medium">
                {{ $submission->created_at->format('d/m/Y') }}
            </span>
        </div>
    </div>

    <!-- Data Pribadi -->
    <div>
        <h5 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fas fa-user text-red-600"></i>
            Data Pribadi
        </h5>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div>
                <span class="text-gray-600">Jenis Kelamin:</span>
                <p class="font-medium">{{ $submission->jenis_kelamin }}</p>
            </div>
            <div>
                <span class="text-gray-600">Tempat/Tgl Lahir:</span>
                <p class="font-medium">{{ $submission->tempat_lahir }}, {{ \Carbon\Carbon::parse($submission->tanggal_lahir)->format('d/m/Y') }}</p>
            </div>
            <div>
                <span class="text-gray-600">Status Perkawinan:</span>
                <p class="font-medium">{{ $submission->status_kawin }}</p>
            </div>
            <div>
                <span class="text-gray-600">Pekerjaan:</span>
                <p class="font-medium">{{ $submission->pekerjaan }}</p>
            </div>
            <div>
                <span class="text-gray-600">Agama:</span>
                <p class="font-medium">{{ $submission->agama }}</p>
            </div>
            <div>
                <span class="text-gray-600">Pendidikan:</span>
                <p class="font-medium">{{ $submission->pendidikan }}</p>
            </div>
        </div>
    </div>

    <!-- Data Identitas -->
    <div>
        <h5 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fas fa-id-card text-red-600"></i>
            Data Identitas
        </h5>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div>
                <span class="text-gray-600">Jenis Identitas:</span>
                <p class="font-medium">{{ $submission->jenis_identitas }}</p>
            </div>
            <div>
                <span class="text-gray-600">Nomor Identitas:</span>
                <p class="font-medium">{{ $submission->nomor_identitas }}</p>
            </div>
            <div>
                <span class="text-gray-600">NPWP:</span>
                <p class="font-medium">{{ $submission->npwp ?: '-' }}</p>
            </div>
            <div>
                <span class="text-gray-600">Nama Ibu Kandung:</span>
                <p class="font-medium">{{ $submission->nama_ibu_kandung }}</p>
            </div>
        </div>
    </div>

    <!-- Data Alamat -->
    <div>
        <h5 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fas fa-home text-red-600"></i>
            Data Alamat
        </h5>
        <div class="text-sm space-y-2">
            <p><span class="text-gray-600">Alamat:</span> {{ $submission->alamat_terkini }}</p>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-600">Provinsi:</span>
                    <p class="font-medium">{{ $submission->provinsi }}</p>
                </div>
                <div>
                    <span class="text-gray-600">Kota:</span>
                    <p class="font-medium">{{ $submission->kota }}</p>
                </div>
                <div>
                    <span class="text-gray-600">Kecamatan:</span>
                    <p class="font-medium">{{ $submission->kecamatan }}</p>
                </div>
                <div>
                    <span class="text-gray-600">Kelurahan:</span>
                    <p class="font-medium">{{ $submission->kelurahan }}</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-600">RT/RW:</span>
                    <p class="font-medium">{{ $submission->rt_rw ?: '-' }}</p>
                </div>
                <div>
                    <span class="text-gray-600">Kode Pos:</span>
                    <p class="font-medium">{{ $submission->kode_pos ?: '-' }}</p>
                </div>
            </div>
            <div>
                <span class="text-gray-600">Status Tempat Tinggal:</span>
                <p class="font-medium">{{ $submission->status_tempat_tinggal }}</p>
            </div>
        </div>
    </div>

    <!-- Data Penghasilan & Produk -->
    <div>
        <h5 class="font-semibold text-gray-800 mb-3 flex items-center gap-2">
            <i class="fas fa-money-bill-wave text-red-600"></i>
            Data Penghasilan & Produk
        </h5>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div>
                <span class="text-gray-600">Sumber Dana:</span>
                <p class="font-medium">{{ $submission->sumber_dana }}</p>
            </div>
            <div>
                <span class="text-gray-600">Penghasilan per Bulan:</span>
                <p class="font-medium">Rp {{ number_format($submission->penghasilan_per_bulan, 0, ',', '.') }}</p>
            </div>
            <div>
                <span class="text-gray-600">Pendapatan Bruto per Tahun:</span>
                <p class="font-medium">{{ $submission->pendapatan_bruto_per_tahun ? 'Rp ' . number_format($submission->pendapatan_bruto_per_tahun, 0, ',', '.') : '-' }}</p>
            </div>
            <div>
                <span class="text-gray-600">Produk yang Dipilih:</span>
                <p class="font-medium">
                    @if(is_array($submission->produk_dipilih))
                        {{ implode(', ', $submission->produk_dipilih) }}
                    @else
                        {{ $submission->produk_dipilih }}
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex gap-3 pt-4 border-t border-gray-200">
        <a href="{{ route('admin.forms.download', $submission->id) }}" 
           class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
            <i class="fas fa-download"></i>
            Download PDF
        </a>
        <button onclick="closeModal()" 
                class="flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
            <i class="fas fa-times"></i>
            Tutup
        </button>
    </div>
</div>