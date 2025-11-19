<!DOCTYPE html>
<html lang="{{ session('locale', 'id') }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bank Prisma Dana')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 min-h-screen transition-colors duration-300 dark:bg-gradient-to-br dark:from-gray-800 dark:to-gray-900 dark:text-gray-200">

<!-- NAVBAR FIXED -->
<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md shadow-lg z-50 transition-all duration-300 dark:bg-gray-900/90">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-bold text-indigo-600 dark:text-indigo-400 transition-colors">
            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                <i class="fas fa-university text-white text-lg"></i>
            </div>
            <span>Bank Prisma Dana</span>
        </a>
        
        <!-- Navigation Links -->
        <div class="hidden md:flex items-center gap-8">
            <a href="#hero" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 relative group">
                <span>Beranda</span>
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
            </a>
            <a href="#tentang" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 relative group">
                <span>Tentang</span>
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
            </a>
            <a href="#produk" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 relative group">
                <span>Produk</span>
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
            </a>
            <a href="#kontak" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 relative group">
                <span>Kontak</span>
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-600 transition-all group-hover:w-full"></span>
            </a>
        </div>
        
        <!-- Right Section -->
        <div class="flex items-center gap-4">
            <!-- AUTH -->
            @if(session('user'))
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2 bg-gray-100 dark:bg-gray-800 rounded-full py-1.5 px-3">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                            <span class="text-white text-xs font-bold">{{ substr(session('user')->name, 0, 1) }}</span>
                        </div>
                        <span class="text-sm font-medium">{{ session('user')->name }}</span>
                    </div>
                    @if(session('user')->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-lg text-xs font-medium hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-cog mr-1"></i> Admin Panel
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-1.5 bg-gradient-to-r from-red-500 to-red-700 text-white rounded-lg text-xs font-medium hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="flex gap-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-1.5"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 border border-indigo-600 text-indigo-600 dark:border-indigo-400 dark:text-indigo-400 rounded-lg text-sm font-medium hover:bg-indigo-50 dark:hover:bg-gray-800 transition-all duration-300">
                        <i class="fas fa-user-plus mr-1.5"></i> Daftar
                    </a>
                </div>
            @endif

            <!-- Dark Mode -->
            <button onclick="toggleDark()" class="p-2.5 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                <span id="dark-icon" class="text-gray-700 dark:text-gray-300">
                    <i class="fas fa-moon"></i>
                </span>
                <span id="light-icon" class="hidden text-yellow-500">
                    <i class="fas fa-sun"></i>
                </span>
            </button>

            <!-- Language -->
            <form action="{{ route('lang.set') }}" method="POST" class="inline">
                @csrf
                <select name="lang" onchange="this.form.submit()" class="text-sm border rounded-lg p-2 bg-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    <option value="id" {{ session('locale') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>EN</option>
                </select>
            </form>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                <i class="fas fa-bars text-gray-700 dark:text-gray-300"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 px-6 py-4 transition-all duration-300">
        <div class="flex flex-col gap-4">
            <a href="#hero" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 border-b border-gray-100 dark:border-gray-800">
                Beranda
            </a>
            <a href="#tentang" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 border-b border-gray-100 dark:border-gray-800">
                Tentang
            </a>
            <a href="#produk" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2 border-b border-gray-100 dark:border-gray-800">
                Produk
            </a>
            <a href="#kontak" class="nav-link text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 font-medium transition-colors duration-200 py-2">
                Kontak
            </a>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="pt-20">
    @yield('content')
</main>

<!-- FLOATING CHAT BUTTON -->
<button id="open-chat" class="fixed bottom-6 right-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-4 rounded-full shadow-2xl hover:shadow-xl hover:scale-105 transition-all duration-300 z-40 group">
    <div class="relative">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        <span class="absolute -top-1 -right-1 flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
        </span>
    </div>
</button>

<!-- CHAT MODAL -->
<div id="chat-modal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-end justify-end p-4 md:p-6 transition-opacity duration-300">
    <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-t-2xl md:rounded-t-3xl shadow-2xl overflow-hidden h-[70vh] md:h-[80vh] flex flex-col transform transition-transform duration-300 scale-95 opacity-0" id="chat-modal-content">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-5 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                    <i class="fas fa-headset"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Chat dengan Kami</h3>
                    <p class="text-indigo-100 text-xs">Kami siap membantu Anda</p>
                </div>
            </div>
            <button id="close-chat" class="text-white hover:text-gray-200 transition-colors p-1 rounded-full hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div id="chat-box" class="flex-1 p-4 overflow-y-auto bg-gray-50 dark:bg-gray-900 space-y-4">
            <div class="flex items-start gap-2">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-white dark:bg-gray-800 p-3 rounded-2xl rounded-tl-none shadow-sm max-w-[80%]">
                    <p class="text-sm text-gray-700 dark:text-gray-300">Halo! Saya asisten virtual Bank Prisma Dana. Ada yang bisa saya bantu?</p>
                </div>
            </div>
        </div>
        <div class="p-4 bg-white dark:bg-gray-800 border-t dark:border-gray-700">
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                <i class="fas fa-question-circle text-indigo-600 dark:text-indigo-400"></i>
                Pilih pertanyaan:
            </p>
            <div class="space-y-2 max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                @foreach(\App\Models\ChatQA::where('active', true)->orderBy('order')->get() as $q)
                    <button onclick="ask({{ $q->id }}, `{{ addslashes($q->question) }}`)"
                            class="w-full text-left p-3 bg-indigo-50 dark:bg-indigo-900/30 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 rounded-lg text-sm transition-all duration-200 group flex items-start gap-3 border border-transparent hover:border-indigo-200 dark:hover:border-indigo-800">
                        <i class="fas fa-comment-dots text-indigo-600 dark:text-indigo-400 mt-0.5 flex-shrink-0"></i>
                        <span class="text-gray-700 dark:text-gray-300 group-hover:text-indigo-700 dark:group-hover:text-indigo-300">{{ $q->question }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    // Smooth scroll
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
            
            // Close mobile menu if open
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    });

    // Dark Mode
    function toggleDark() {
        document.documentElement.classList.toggle('dark');
        localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        document.getElementById('dark-icon').classList.toggle('hidden');
        document.getElementById('light-icon').classList.toggle('hidden');
    }
    
    // Initialize dark mode
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        document.getElementById('dark-icon').classList.add('hidden');
        document.getElementById('light-icon').classList.remove('hidden');
    } else {
        document.getElementById('dark-icon').classList.remove('hidden');
        document.getElementById('light-icon').classList.add('hidden');
    }

    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Chat functionality
    document.getElementById('open-chat').addEventListener('click', () => {
        const modal = document.getElementById('chat-modal');
        const content = document.getElementById('chat-modal-content');
        modal.classList.remove('hidden');
        
        // Trigger animation
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    });
    
    document.getElementById('close-chat').addEventListener('click', () => {
        const modal = document.getElementById('chat-modal');
        const content = document.getElementById('chat-modal-content');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    });

    function ask(id, question) {
        const chatBox = document.getElementById('chat-box');
        
        // Add user question
        chatBox.innerHTML += `
            <div class="flex justify-end">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-3 rounded-2xl rounded-tr-none shadow-sm max-w-[80%]">
                    <p class="text-sm">${question}</p>
                </div>
            </div>
        `;

        // Add typing indicator
        const typing = document.createElement('div');
        typing.innerHTML = `
            <div class="flex items-start gap-2">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-white text-xs"></i>
                </div>
                <div class="bg-white dark:bg-gray-800 p-3 rounded-2xl rounded-tl-none shadow-sm max-w-[80%]">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-100"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-200"></div>
                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">Mengetik...</span>
                    </div>
                </div>
            </div>
        `;
        chatBox.appendChild(typing);
        chatBox.scrollTop = chatBox.scrollHeight;

        // Fetch answer
        fetch("{{ route('chat.send') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ qa_id: id })
        })
        .then(r => r.json())
        .then(d => {
            typing.remove();
            const div = document.createElement('div');
            div.innerHTML = `
                <div class="flex items-start gap-2">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-white text-xs"></i>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-2xl rounded-tl-none shadow-sm max-w-[80%]">
                        <p class="text-sm text-gray-700 dark:text-gray-300" id="answer-${id}"></p>
                    </div>
                </div>
            `;
            chatBox.appendChild(div);
            
            // Typewriter effect
            new Typewriter(`#answer-${id}`, {
                strings: [d.answer],
                autoStart: true,
                delay: 20,
                cursor: ''
            });
            
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    }
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }
    
    .dark .custom-scrollbar::-webkit-scrollbar-track {
        background: #374151;
    }
    
    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #4f46e5;
    }
    
    .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #4338ca;
    }
</style>
</body>
</html>