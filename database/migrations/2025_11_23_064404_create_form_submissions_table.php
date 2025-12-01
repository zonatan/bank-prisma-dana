<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Jenis Nasabah
            $table->enum('jenis_nasabah', ['Baru', 'Eksisting']);
            $table->string('no_cif')->nullable(); // Diisi oleh bank
            
            // DATA NASABAH PERORANGAN
            $table->string('nama_lengkap');
            $table->string('nama_alias')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_identitas', ['KTP', 'KK', 'Passport', 'Lainnya']);
            $table->string('nomor_identitas');
            $table->enum('masa_berlaku_identitas', ['Seumur Hidup', 'Berlaku Sampai'])->nullable();
            $table->date('tanggal_berlaku_identitas')->nullable(); // Jika tidak seumur hidup
            
            // DATA PEKERJAAN
            $table->enum('status_bekerja', [
                'Pelajar/Mahasiswa', 
                'Pegawai Negeri', 
                'Wirausaha', 
                'Pegawai Swasta', 
                'BUMN/BUMD', 
                'TNI/Polri', 
                'Profesional',
                'Ibu Rumah Tangga',
                'Lainnya'
            ]);
            $table->enum('status_pekerjaan', ['Tetap', 'Kontrak', 'Outsourcing'])->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_telp_perusahaan')->nullable();
            $table->string('no_fax_perusahaan')->nullable();
            
            // DATA KEUANGAN
            $table->enum('tujuan_pembukaan_rekening', [
                'Simpanan', 
                'Bisnis', 
                'Gaji', 
                'Lainnya'
            ]);
            $table->enum('sumber_dana', [
                'Gaji', 
                'Hasil Usaha', 
                'Hasil Investasi', 
                'Hibah', 
                'Warisan', 
                'Lainnya'
            ]);
            $table->enum('manfaat_penggunaan_dana', [
                'Nasabah', 
                'Bersama-sama', 
                'Pihak Lain', 
                'Lainnya'
            ]);
            $table->enum('penghasilan_per_bulan', [
                '<Rp.3jt', 
                'Rp.3-5jt', 
                'Rp.5-10jt', 
                'Rp.10-20jt', 
                'Rp.20-50jt', 
                'Rp.50-100jt', 
                'Rp.100-500jt', 
                '>Rp.500jt'
            ]);
            $table->enum('pendapatan_bruto_per_tahun', [
                '<Rp.100jt', 
                'Rp.100-250jt', 
                'Rp.250-500jt', 
                'Rp.500-750jt', 
                'Rp.750jt-1M', 
                '>Rp.1M'
            ]);
            
            // DATA NPWP
            $table->enum('status_npwp', ['Ada', 'Tidak Ada']);
            $table->string('npwp')->nullable();
            
            // DATA PEMBUKAAN REKENING
            $table->string('alamat_terkini');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rt_rw');
            $table->string('kode_pos');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email');
            $table->enum('status_tempat_tinggal', [
                'Milik Sendiri', 
                'Milik Keluarga', 
                'Milik Perusahaan', 
                'Sewa'
            ]);
            $table->string('nama_ibu_kandung');
            $table->enum('status_perkawinan', ['Lajang', 'Menikah', 'Janda/Duda']);
            $table->enum('agama', [
                'Islam', 
                'Kristen', 
                'Katolik', 
                'Hindu', 
                'Buddha', 
                'Konghucu'
            ]);
            $table->enum('kewarganegaraan', ['Indonesia', 'WNA']);
            $table->enum('pendidikan', ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']);
            
            // PRODUK YANG DIPILIH
            $table->json('produk_tabungan')->nullable(); // ['Tabungan Simpan', 'Prisma', 'Simpel', 'Tabunganku', 'Karisma']
            
            // KHUSUS DEPOSITO (jika dipilih)
            $table->enum('jangka_waktu_deposito', ['1 Bulan', '3 Bulan', '6 Bulan', '12 Bulan'])->nullable();
            $table->decimal('nominal_deposito', 15, 2)->nullable();
            $table->string('nominal_deposito_terbilang')->nullable();
            $table->enum('perpanjangan_deposito', ['Otomatis', 'Tidak Diperpanjang'])->nullable();
            $table->decimal('suku_bunga', 5, 2)->nullable();
            $table->string('pembayaran_bunga_ke_rekening')->nullable();
            $table->enum('pencairan_deposito', ['Tunai', 'Transfer'])->nullable();
            $table->string('pencairan_atas_nama')->nullable();
            
            // PERNYATAAN DAN PERSETUJUAN NASABAH
            $table->boolean('pernyataan_kebenaran_data')->default(false);
            $table->boolean('pernyataan_pemeriksaan_data')->default(false);
            $table->boolean('pernyataan_pemahaman_produk')->default(false);
            $table->boolean('pernyataan_ketentuan_umum')->default(false);
            $table->boolean('persetujuan_pemberian_data')->default(false);
            
            // Tanda Tangan
            $table->string('nama_terang');
            $table->date('tanggal_penandatanganan');
            
            // Dokumen
            $table->string('pdf_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_submissions');
    }
};