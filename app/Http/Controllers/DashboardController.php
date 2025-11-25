<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ChatQA;
use App\Models\Form;
use App\Models\FormSubmission;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user adalah admin menggunakan Auth
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Akses ditolak.');
        }

        // Ambil data untuk dashboard
        $totalUsers = User::where('role', 'customer')->count();
        $totalQAs = ChatQA::count();
        $totalForms = Form::count();
        $activeQAs = ChatQA::where('active', true)->count();
        $totalSubmissions = FormSubmission::count();
        $pendingSubmissions = FormSubmission::where('status', 'new')->count();

        // Data untuk chart (user registrasi 7 hari terakhir)
        $userRegistrations = $this->getUserRegistrations();
        
        // Data statistik lainnya
        $recentUsers = User::where('role', 'customer')
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();

        $recentForms = Form::orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();

        $recentSubmissions = FormSubmission::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalQAs',
            'totalForms',
            'activeQAs',
            'totalSubmissions',
            'pendingSubmissions',
            'userRegistrations',
            'recentUsers',
            'recentForms',
            'recentSubmissions'
        ));
    }

    /**
     * Get user registration data for the last 7 days
     */
    private function getUserRegistrations()
    {
        $dates = [];
        $counts = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dates[] = $date->format('M j');
            
            $count = User::where('role', 'customer')
                        ->whereDate('created_at', $date->toDateString())
                        ->count();
            $counts[] = $count;
        }

        return [
            'dates' => $dates,
            'counts' => $counts
        ];
    }

    /**
     * Get dashboard statistics for API
     */
    public function getStats()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $stats = [
            'total_users' => User::where('role', 'customer')->count(),
            'total_qa' => ChatQA::count(),
            'total_forms' => Form::count(),
            'active_qa' => ChatQA::where('active', true)->count(),
            'total_submissions' => FormSubmission::count(),
            'pending_submissions' => FormSubmission::where('status', 'new')->count(),
            'user_registrations' => $this->getUserRegistrations()
        ];

        return response()->json($stats);
    }
}