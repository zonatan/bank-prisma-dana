<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChatQA;
use App\Models\Form;

class DashboardController extends Controller
{
    public function index()
    {
        // CEK APAKAH USER ADMIN
        if (!session('user') || session('user')->role !== 'admin') {
            return redirect()->route('home');
        }

        // ISI STATISTIK
        $stats = [
            'users' => User::count(),
            'qa' => ChatQA::where('active', true)->count(),
            'forms' => Form::count(), // TAMBAHKAN INI!
            // 'histories' => ChatHistory::count(), // SUDAH DIHAPUS
        ];

        return view('admin.dashboard', compact('stats'));
    }
}