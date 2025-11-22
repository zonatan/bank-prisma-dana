@extends('layouts.app')

@section('title', 'Daftar - Bank Prisma Dana')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo & Header -->
        <div class="text-center">
            <div class="mx-auto w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg mb-4">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/logo-bank.png') }}" 
             alt="Bank Prisma Dana" 
             class="w-8 h-8 object-contain">
    </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Buat Akun Baru
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Bergabunglah dengan Bank Prisma Dana untuk pengalaman perbankan digital terbaik
            </p>
        </div>

        <!-- Register Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 transition-all duration-300 hover:shadow-2xl">
            <!-- Error Message -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl flex items-start gap-3">
                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <i class="fas fa-exclamation text-white text-xs"></i>
                    </div>
                    <div>
                        <p class="text-red-800 dark:text-red-200 text-sm font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl flex items-start gap-3">
                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <i class="fas fa-check text-white text-xs"></i>
                    </div>
                    <div>
                        <p class="text-green-800 dark:text-green-200 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Full Name Field -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <i class="fas fa-user text-indigo-600 text-sm"></i>
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="name" 
                            required
                            class="w-full p-4 pl-11 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                            placeholder="Masukkan nama lengkap Anda"
                            value="{{ old('name') }}"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-id-card text-gray-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <i class="fas fa-envelope text-indigo-600 text-sm"></i>
                        Alamat Email
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            name="email" 
                            required
                            class="w-full p-4 pl-11 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                            placeholder="masukkan.email@contoh.com"
                            value="{{ old('email') }}"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-at text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <i class="fas fa-lock text-indigo-600 text-sm"></i>
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password" 
                            required
                            class="w-full p-4 pl-11 pr-10 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                            placeholder="Buat kata sandi yang kuat"
                            id="password"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors" id="password-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <i class="fas fa-lock text-indigo-600 text-sm"></i>
                        Konfirmasi Kata Sandi
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            required
                            class="w-full p-4 pl-11 pr-10 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
                            placeholder="Ketik ulang kata sandi Anda"
                            id="password_confirmation"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors" id="password_confirmation-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start gap-3">
                    <input 
                        type="checkbox" 
                        name="terms" 
                        id="terms"
                        class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 mt-1"
                        required
                    >
                    <label for="terms" class="text-sm text-gray-600 dark:text-gray-400">
                        Saya menyetujui 
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Syarat & Ketentuan</a> 
                        dan 
                        <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium">Kebijakan Privasi</a>
                        Bank Prisma Dana
                    </label>
                </div>
                @error('terms')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-4 px-4 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                >
                    <span class="flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        Buat Akun
                    </span>
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white dark:bg-gray-800 text-gray-500">Sudah memiliki akun?</span>
                    </div>
                </div>
            </div>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 py-3 px-4 rounded-xl font-medium hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-sm hover:shadow-md">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk ke Akun yang Sudah Ada
                </a>
            </div>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors group">
                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="text-center">
            <p class="text-xs text-gray-500 dark:text-gray-400 flex items-center justify-center gap-2">
                <i class="fas fa-shield-alt text-green-500"></i>
                Data Anda dilindungi dengan enkripsi SSL 256-bit
            </p>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const eyeIcon = document.getElementById(fieldId + '-eye');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // Password strength indicator (optional enhancement)
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        
        if (passwordField && confirmPasswordField) {
            passwordField.addEventListener('input', function() {
                checkPasswordMatch();
            });
            
            confirmPasswordField.addEventListener('input', function() {
                checkPasswordMatch();
            });
        }
        
        function checkPasswordMatch() {
            const password = passwordField.value;
            const confirmPassword = confirmPasswordField.value;
            
            if (confirmPassword === '') return;
            
            if (password === confirmPassword) {
                confirmPasswordField.classList.remove('border-red-300');
                confirmPasswordField.classList.add('border-green-300');
            } else {
                confirmPasswordField.classList.remove('border-green-300');
                confirmPasswordField.classList.add('border-red-300');
            }
        }
    });
</script>

<style>
    /* Custom focus styles */
    input:focus {
        outline: none;
        ring: 2px;
    }
    
    /* Smooth transitions for all interactive elements */
    button, a, input {
        transition: all 0.2s ease-in-out;
    }
    
    /* Password match indicators */
    .border-green-300 {
        border-color: #86efac !important;
    }
    
    .border-red-300 {
        border-color: #fca5a5 !important;
    }
    
    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #1f2937;
        }
        .dark\:bg-gray-900 {
            background-color: #111827;
        }
        .dark\:text-white {
            color: #f9fafb;
        }
        .dark\:text-gray-300 {
            color: #d1d5db;
        }
        .dark\:text-gray-400 {
            color: #9ca3af;
        }
        .dark\:border-gray-600 {
            border-color: #4b5563;
        }
        .dark\:placeholder-gray-400::placeholder {
            color: #9ca3af;
        }
    }
</style>
@endsection