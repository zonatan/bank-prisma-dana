<?php

namespace App\Exports;

use App\Models\ChatQA;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChatQAExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ChatQA::select('question', 'answer', 'order', 'active')->get();
    }

    public function headings(): array
    {
        return [
            'Pertanyaan',
            'Jawaban',
            'Urutan',
            'Aktif'
        ];
    }
}