@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-8 text-indigo-700">Dashboard Admin</h1>
    
    <!-- STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- TOTAL USER -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-sm font-medium text-gray-500">Total User</h3>
            <p class="text-3xl font-bold text-indigo-600">{{ $stats['users'] }}</p>
        </div>
        
        <!-- Q&A AKTIF -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-sm font-medium text-gray-500">Q&A Aktif</h3>
            <p class="text-3xl font-bold text-green-600">{{ $stats['qa'] }}</p>
        </div>
        
        <!-- FORM PDF -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-sm font-medium text-gray-500">Form PDF</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $stats['forms'] }}</p>
        </div>
    </div>

    <!-- MENU CEPAT -->
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-bold mb-4">Menu Cepat</h3>
            <div class="space-y-2">
                <a href="{{ route('admin.chat') }}" class="block p-3 bg-indigo-50 hover:bg-indigo-100 rounded-lg">Kelola Q&A Chatbot</a>
                <a href="{{ route('admin.forms') }}" class="block p-3 bg-green-50 hover:bg-green-100 rounded-lg">Kelola Form PDF</a>
                <a href="{{ route('admin.users') }}" class="block p-3 bg-purple-50 hover:bg-purple-100 rounded-lg">Kelola User</a>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-bold mb-4">Aktivitas Terbaru</h3>
            <p class="text-sm text-gray-500">Fitur ini bisa ditambah dengan log.</p>
        </div>
    </div>
</div>
@endsection