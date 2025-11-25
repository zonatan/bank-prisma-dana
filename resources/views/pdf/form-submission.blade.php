<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form Pembukaan Rekening - {{ $submission->nama_lengkap }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .bank-info {
            text-align: center;
            margin-bottom: 15px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            background-color: #f0f0f0;
            padding: 8px;
            font-weight: bold;
            border-left: 4px solid #dc2626;
            margin-bottom: 10px;
        }
        .row {
            margin-bottom: 8px;
            display: flex;
        }
        .label {
            font-weight: bold;
            width: 200px;
            flex-shrink: 0;
        }
        .value {
            flex-grow: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .signature-section {
            margin-top: 50px;
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="bank-info">
            <h2>BANK PRISMA DANA</h2>
            <h3>PT BR PRISMA DANA</h3>
            <h4>FORMULIR PEMBUKAAN REKENING PERORANGAN</h4>
        </div>
        <p><strong>No. CIF:</strong> {{ $submission->no_cif ?? 'Akan diisi oleh bank' }}</p>
    </div>

    <!-- Jenis Nasabah -->
    <div class="section">
        <div class="section-title">JENIS NASABAH</div>
        <div class="row">
            <div class="label">Jenis Nasabah:</div>
            <div class="value">{{ $submission->jenis_nasabah }}</div>
        </div>
    </div>

    <!-- Data Nasabah -->
    <div class="section">
        <div class="section-title">DATA NASABAH PERORANGAN</div>
        <div class="row">
            <div class="label">Nama Lengkap:</div>
            <div class="value">{{ $submission->nama_lengkap }}</div>
        </div>
        <div class="row">
            <div class="label">Nama Alias:</div>
            <div class="value">{{ $submission->nama_alias ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Jenis Kelamin:</div>
            <div class="value">{{ $submission->jenis_kelamin }}</div>
        </div>
        <div class="row">
            <div class="label">Tempat/Tanggal Lahir:</div>
            <div class="value">{{ $submission->tempat_lahir }}, {{ \Carbon\Carbon::parse($submission->tanggal_lahir)->format('d/m/Y') }}</div>
        </div>
        <div class="row">
            <div class="label">Jenis Identitas:</div>
            <div class="value">{{ $submission->jenis_identitas }}</div>
        </div>
        <div class="row">
            <div class="label">Nomor Identitas:</div>
            <div class="value">{{ $submission->nomor_identitas }}</div>
        </div>
        <div class="row">
            <div class="label">Masa Berlaku Identitas:</div>
            <div class="value">
                {{ $submission->masa_berlaku_identitas ?? '-' }}
                @if($submission->tanggal_berlaku_identitas)
                    - {{ \Carbon\Carbon::parse($submission->tanggal_berlaku_identitas)->format('d/m/Y') }}
                @endif
            </div>
        </div>
    </div>

    <!-- Data Pekerjaan -->
    <div class="section">
        <div class="section-title">DATA PEKERJAAN</div>
        <div class="row">
            <div class="label">Status Bekerja:</div>
            <div class="value">{{ $submission->status_bekerja }}</div>
        </div>
        @if($submission->status_pekerjaan)
        <div class="row">
            <div class="label">Status Pekerjaan:</div>
            <div class="value">{{ $submission->status_pekerjaan }}</div>
        </div>
        @endif
        @if($submission->nama_perusahaan)
        <div class="row">
            <div class="label">Nama Perusahaan:</div>
            <div class="value">{{ $submission->nama_perusahaan }}</div>
        </div>
        @endif
        @if($submission->jabatan)
        <div class="row">
            <div class="label">Jabatan:</div>
            <div class="value">{{ $submission->jabatan }}</div>
        </div>
        @endif
        @if($submission->bidang_usaha)
        <div class="row">
            <div class="label">Bidang Usaha:</div>
            <div class="value">{{ $submission->bidang_usaha }}</div>
        </div>
        @endif
    </div>

    <!-- Data Keuangan -->
    <div class="section">
        <div class="section-title">DATA KEUANGAN</div>
        <div class="row">
            <div class="label">Tujuan Pembukaan Rekening:</div>
            <div class="value">{{ $submission->tujuan_pembukaan_rekening ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Sumber Dana:</div>
            <div class="value">{{ $submission->sumber_dana ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Manfaat Penggunaan Dana:</div>
            <div class="value">{{ $submission->manfaat_penggunaan_dana ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Penghasilan per Bulan:</div>
            <div class="value">{{ $submission->penghasilan_per_bulan ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Pendapatan Bruto per Tahun:</div>
            <div class="value">{{ $submission->pendapatan_bruto_per_tahun ?? '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Status NPWP:</div>
            <div class="value">{{ $submission->status_npwp ?? '-' }}</div>
        </div>
        @if($submission->npwp)
        <div class="row">
            <div class="label">Nomor NPWP:</div>
            <div class="value">{{ $submission->npwp }}</div>
        </div>
        @endif
    </div>

    <!-- Data Pembukaan Rekening -->
    <div class="section">
        <div class="section-title">DATA PEMBUKAAN REKENING</div>
        <div class="row">
            <div class="label">Alamat Terkini:</div>
            <div class="value">{{ $submission->alamat_terkini }}</div>
        </div>
        <div class="row">
            <div class="label">Provinsi:</div>
            <div class="value">{{ $submission->provinsi }}</div>
        </div>
        <div class="row">
            <div class="label">Kota/Kabupaten:</div>
            <div class="value">{{ $submission->kota }}</div>
        </div>
        <div class="row">
            <div class="label">Kecamatan:</div>
            <div class="value">{{ $submission->kecamatan }}</div>
        </div>
        <div class="row">
            <div class="label">Kelurahan:</div>
            <div class="value">{{ $submission->kelurahan }}</div>
        </div>
        @if($submission->rt_rw)
        <div class="row">
            <div class="label">RT/RW:</div>
            <div class="value">{{ $submission->rt_rw }}</div>
        </div>
        @endif
        @if($submission->kode_pos)
        <div class="row">
            <div class="label">Kode Pos:</div>
            <div class="value">{{ $submission->kode_pos }}</div>
        </div>
        @endif
        <div class="row">
            <div class="label">No. Telepon:</div>
            <div class="value">{{ $submission->no_telp }}</div>
        </div>
        <div class="row">
            <div class="label">No. HP:</div>
            <div class="value">{{ $submission->no_hp }}</div>
        </div>
        <div class="row">
            <div class="label">Email:</div>
            <div class="value">{{ $submission->email }}</div>
        </div>
        <div class="row">
            <div class="label">Status Tempat Tinggal:</div>
            <div class="value">{{ $submission->status_tempat_tinggal }}</div>
        </div>
        <div class="row">
            <div class="label">Nama Ibu Kandung:</div>
            <div class="value">{{ $submission->nama_ibu_kandung }}</div>
        </div>
        <div class="row">
            <div class="label">Status Perkawinan:</div>
            <div class="value">{{ $submission->status_perkawinan }}</div>
        </div>
        <div class="row">
            <div class="label">Agama:</div>
            <div class="value">{{ $submission->agama }}</div>
        </div>
        <div class="row">
            <div class="label">Kewarganegaraan:</div>
            <div class="value">{{ $submission->kewarganegaraan }}</div>
        </div>
        <div class="row">
            <div class="label">Pendidikan Terakhir:</div>
            <div class="value">{{ $submission->pendidikan }}</div>
        </div>
    </div>

    <!-- Produk yang Dipilih -->
    <div class="section">
        <div class="section-title">PRODUK YANG DIPILIH</div>
        <div class="row">
            <div class="label">Produk Tabungan:</div>
            <div class="value">
                @if(is_array($submission->produk_tabungan))
                    {{ implode(', ', $submission->produk_tabungan) }}
                @else
                    {{ $submission->produk_tabungan }}
                @endif
            </div>
        </div>
        @if($submission->jangka_waktu_deposito)
        <div class="row">
            <div class="label">Jangka Waktu Deposito:</div>
            <div class="value">{{ $submission->jangka_waktu_deposito }}</div>
        </div>
        @endif
        @if($submission->nominal_deposito)
        <div class="row">
            <div class="label">Nominal Deposito:</div>
            <div class="value">Rp {{ number_format($submission->nominal_deposito, 0, ',', '.') }}</div>
        </div>
        @endif
    </div>

    <!-- Pernyataan -->
    <div class="section">
        <div class="section-title">PERNYATAAN DAN PERSETUJUAN NASABAH</div>
        <table>
            <tr>
                <td width="30">✓</td>
                <td>Data Nasabah yang diisi dalam formulir pembukaan rekening ini adalah yang sebenar-benarnya.</td>
            </tr>
            <tr>
                <td>✓</td>
                <td>Bank dapat melakukan pemeriksaan terhadap kebenaran data yang saya berikan dalam formulir data nasabah ini.</td>
            </tr>
            <tr>
                <td>✓</td>
                <td>Bank telah melakukan penjelasan yang cukup mengenai karakteristik Produk Bank yang saya manfaatkan dan saya telah mengerti serta memahami segala konsekuensi pemanfaatan produk bank.</td>
            </tr>
            <tr>
                <td>✓</td>
                <td>Saya telah menerima, membaca, mengerti, dan menyetujui Isi Ketentuan Umum dan Persyaratan pembukaan rekening.</td>
            </tr>
            <tr>
                <td>{{ $submission->persetujuan_pemberian_data ? '✓' : '✗' }}</td>
                <td>
                    Saya {{ $submission->persetujuan_pemberian_data ? 'bersedia' : 'tidak bersedia' }} jika BPR Prisma Dana memberikan data pribadi saya kepada anak perusahaan atau perusahaan mitra yang bekerjasama dengan Bank Prisma Dana untuk keperluan pemasaran produk.
                    <br><small>*) Data pribadi dimaksud berupa nama lengkap, alamat, dan nomor telepon.</small>
                </td>
            </tr>
        </table>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature-section">
        <div style="margin-bottom: 60px;">
            <div>Hormat saya,</div>
        </div>
        <div style="border-top: 1px solid #000; width: 300px; display: inline-block; padding-top: 5px;">
            <strong>{{ $submission->nama_terang }}</strong>
        </div>
        <div style="margin-top: 5px;">
            {{ \Carbon\Carbon::parse($submission->tanggal_penandatanganan)->format('d F Y') }}
        </div>
    </div>

    <div class="footer">
        <p>Dokumen ini dicetak secara otomatis pada {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
        <p>Bank Prisma Dana - Sistem Pembukaan Rekening Online</p>
    </div>
</body>
</html>