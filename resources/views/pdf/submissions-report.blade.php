<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pembukaan Rekening</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN PEMBUKAAN REKENING</h2>
        <h3>BANK PRISMA DANA</h3>
        <p>Periode: {{ date('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Nasabah</th>
                <th>Jenis Nasabah</th>
                <th>Tanggal Pengajuan</th>
                <th>Produk</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $index => $submission)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $submission->nama_lengkap }}</td>
                <td>{{ $submission->jenis_nasabah }}</td>
                <td>{{ $submission->created_at->format('d/m/Y') }}</td>
                <td>
                    @if(is_array($submission->produk_tabungan))
                        {{ implode(', ', $submission->produk_tabungan) }}
                    @else
                        {{ $submission->produk_tabungan }}
                    @endif
                </td>
                <td>{{ $submission->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: right;">
        <p>Total Data: {{ $submissions->count() }}</p>
        <p>Dicetak pada: {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>