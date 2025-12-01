<?php

namespace App\Exports;

use App\Models\FormSubmission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormSubmissionsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return FormSubmission::with('user')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Nasabah',
            'Email',
            'No. HP',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Produk Dipilih',
            'Penghasilan per Bulan',
            'Status',
            'Tanggal Pengajuan'
        ];
    }

    public function map($submission): array
    {
        return [
            $submission->id,
            $submission->nama,
            $submission->email,
            $submission->no_hp,
            $submission->jenis_kelamin,
            $submission->tempat_lahir,
            $submission->tanggal_lahir,
            is_array($submission->produk_dipilih) ? implode(', ', $submission->produk_dipilih) : $submission->produk_dipilih,
            'Rp ' . number_format($submission->penghasilan_per_bulan, 0, ',', '.'),
            $this->getStatusText($submission->status),
            $submission->created_at->format('d/m/Y H:i')
        ];
    }

    private function getStatusText($status)
    {
        $statuses = [
            'new' => 'Baru',
            'processed' => 'Diproses',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak'
        ];

        return $statuses[$status] ?? $status;
    }
}