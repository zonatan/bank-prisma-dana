<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model {
    protected $fillable = ['user_id', 'chat_qa_id', 'asked_at'];
    public function user() { return $this->belongsTo(User::class); }
    public function qa()   { return $this->belongsTo(ChatQA::class, 'chat_qa_id'); }
}
