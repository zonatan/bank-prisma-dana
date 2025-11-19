<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatQA extends Model
{
    protected $table = 'chat_qa'; // INI YANG PENTING!

    protected $fillable = [
        'question',
        'answer',
        'order',
        'active'
    ];

    // Optional: cast active ke boolean
    protected $casts = [
        'active' => 'boolean'
    ];
}