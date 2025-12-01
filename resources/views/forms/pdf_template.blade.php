<!DOCTYPE html>
<html>
<head>
    <title>Form Pembukaan Rekening - Bank Prisma Dana</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12pt; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; }
        .header { text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    <h1 class="header">Bank Prisma Dana</h1>
    <h2 class="header">Formulir Pembukaan Rekening Perorangan</h2>

    <h3>Data Nasabah</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $submission->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $submission->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $submission->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $submission->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Status Kawin</th>
            <td>{{ $submission->status_kawin }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $submission->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $submission->alamat }}</td>
        </tr>
        <tr>
            <th>No HP</th>
            <td>{{ $submission->no_hp }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $submission->email }}</td>
        </tr>
        <tr>
            <th>NPWP</th>
            <td>{{ $submission->npwp }}</td>
        </tr>
        <!-- Tambah semua field lain seperti data pekerjaan, keuangan, dll -->
        <tr>
            <th>Pernyataan</th>
            <td>{{ $submission->pernyataan }}</td>
        </tr>
    </table>

    <p>Tanda Tangan Nasabah: ________________________</p>
</body>
</html>