<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormSubmission extends Model
{
    protected $fillable = [
        'user_id', 
        'jenis_nasabah', 
        'no_cif',
        
        // Data Nasabah
        'nama_lengkap', 
        'nama_alias', 
        'jenis_kelamin', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'jenis_identitas', 
        'nomor_identitas',
        'masa_berlaku_identitas',
        'tanggal_berlaku_identitas',
        
        // Data Pekerjaan
        'status_bekerja',
        'status_pekerjaan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'bidang_usaha',
        'jabatan',
        'no_telp_perusahaan',
        'no_fax_perusahaan',
        
        // Data Keuangan
        'tujuan_pembukaan_rekening',
        'sumber_dana',
        'manfaat_penggunaan_dana',
        'penghasilan_per_bulan',
        'pendapatan_bruto_per_tahun',
        'status_npwp',
        'npwp',
        
        // Data Pembukaan Rekening
        'alamat_terkini',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'rt_rw',
        'kode_pos',
        'no_telp',
        'no_hp',
        'email',
        'status_tempat_tinggal',
        'nama_ibu_kandung',
        'status_perkawinan',
        'agama',
        'kewarganegaraan',
        'pendidikan',
        
        // Produk
        'produk_tabungan',
        
        // Deposito
        'jangka_waktu_deposito',
        'nominal_deposito',
        'nominal_deposito_terbilang',
        'perpanjangan_deposito',
        'suku_bunga',
        'pembayaran_bunga_ke_rekening',
        'pencairan_deposito',
        'pencairan_atas_nama',
        
        // Pernyataan
        'pernyataan_kebenaran_data',
        'pernyataan_pemeriksaan_data',
        'pernyataan_pemahaman_produk',
        'pernyataan_ketentuan_umum',
        'persetujuan_pemberian_data',
        
        // Tanda Tangan
        'nama_terang',
        'tanggal_penandatanganan',
        
        // Admin fields
        'status',
        'admin_notes',
        'processed_at',
        
        'pdf_path'
    ];

    protected $casts = [
        'produk_tabungan' => 'array',
        'tanggal_lahir' => 'date',
        'tanggal_berlaku_identitas' => 'date',
        'tanggal_penandatanganan' => 'date',
        'processed_at' => 'datetime',
        'pernyataan_kebenaran_data' => 'boolean',
        'pernyataan_pemeriksaan_data' => 'boolean',
        'pernyataan_pemahaman_produk' => 'boolean',
        'pernyataan_ketentuan_umum' => 'boolean',
        'persetujuan_pemberian_data' => 'boolean',
    ];

    /**
     * Get the user that owns the form submission.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}