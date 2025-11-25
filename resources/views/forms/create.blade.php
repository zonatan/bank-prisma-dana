 @extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Isi Form Pembukaan Rekening</h1>

    <form action="{{ route('form_submissions.store') }}" method="POST">
        @csrf

        <!-- Data Nasabah -->
        <h2>Data Nasabah</h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Nama</label>
                <input type="text" name="nama" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Status Kawin</label>
                <select name="status_kawin" class="border p-2 w-full" required>
                    <option>Kawin</option>
                    <option>Belum Kawin</option>
                </select>
            </div>
            <div>
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Alamat</label>
                <input type="text" name="alamat" class="border p-2 w-full" required>
            </div>
            <div>
                <label>No HP</label>
                <input type="text" name="no_hp" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" class="border p-2 w-full" required>
            </div>
            <div>
                <label>NPWP</label>
                <input type="text" name="npwp" class="border p-2 w-full">
            </div>
        </div>

        <!-- Jenis Rekening -->
        <h2>Jenis Rekening</h2>
        <input type="text" name="jenis_rekening" class="border p-2 w-full" required>

        <!-- Setoran Awal -->
        <h2>Setoran Awal</h2>
        <input type="text" name="setoran_awal" class="border p-2 w-full" required>

        <!-- Pernyataan -->
        <h2>Pernyataan</h2>
        <textarea name="pernyataan" class="border p-2 w-full" required></textarea>

        <button type="submit" class="bg-blue-500 text-white p-2 mt-4">Submit & Generate PDF</button>
        </form>
</div>
@endsection