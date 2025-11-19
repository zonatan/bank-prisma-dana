<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\ChatQA;
use App\Models\ChatHistory;

class ChatController extends Controller
{
    // INI YANG PENTING: HALAMAN UTAMA ADALAH LANDING PAGE
    public function index()
    {
        return view('home'); // GANTI DARI 'chat' MENJADI 'home'
    }

    // Fungsi send tetap sama
    public function send(Request $request)
    {
        $userId = session('user')->id ?? 0;
        $key = 'chat_' . $userId;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            return response()->json(['error' => 'Tunggu 3 detik'], 429);
        }
        RateLimiter::hit($key, 3);

        $qa = ChatQA::find($request->qa_id);
        if (!$qa) return response()->json(['error' => 'Not found'], 404);

        return response()->json([
            'question' => $qa->question,
            'answer' => $qa->answer
        ]);
    }

    public function history()
    {
        if (!session('user')) return redirect()->route('login');
        $histories = ChatHistory::with('qa')
            ->where('user_id', session('user')->id)
            ->latest()
            ->take(20)
            ->get();
        return view('chat.history', compact('histories'));
    }
}