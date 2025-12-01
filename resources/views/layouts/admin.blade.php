<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Bank Prisma Dana')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-red-50 to-red-100 min-h-screen">

<!-- SIDEBAR + CONTENT -->
<div class="flex">
    <!-- SIDEBAR -->
    <aside id="sidebar" class="bg-gradient-to-b from-red-700 to-red-800 text-white min-h-screen p-6 shadow-xl transition-all duration-300 relative z-10 sidebar-expanded">
        <!-- Toggle Button -->
        <button id="sidebar-toggle" class="absolute -right-3 top-8 bg-white text-red-600 w-6 h-6 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-transform">
            <i class="fas fa-chevron-left text-xs" id="toggle-icon"></i>
        </button>

        <!-- Logo Section -->
        <div class="mb-10 pt-4 flex items-center gap-3 transition-all duration-300">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center overflow-hidden">
        <img src="{{ asset('images/logo-bank.png') }}" 
             alt="Bank Prisma Dana" 
             class="w-8 h-8 object-contain">
    </div>
            <div class="sidebar-content transition-all duration-300 overflow-hidden">
                <h1 class="text-xl font-bold whitespace-nowrap">Bank Prisma Dana</h1>
                <p class="text-red-200 text-xs mt-1 whitespace-nowrap">Admin Panel</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item
                      {{ request()->routeIs('admin.dashboard') ? 
                        'bg-white/20 shadow-lg backdrop-blur-sm' : 
                        'hover:bg-white/10 hover:shadow-md' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                    <i class="fas fa-chart-line text-white text-sm"></i>
                </div>
                <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Dashboard</span>
                @if(request()->routeIs('admin.dashboard'))
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 sidebar-content">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                </div>
                @endif
            </a>

            <a href="{{ route('admin.chat') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item
                      {{ request()->routeIs('admin.chat') ? 
                        'bg-white/20 shadow-lg backdrop-blur-sm' : 
                        'hover:bg-white/10 hover:shadow-md' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                    <i class="fas fa-robot text-white text-sm"></i>
                </div>
                <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Q&A Chatbot</span>
                @if(request()->routeIs('admin.chat'))
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 sidebar-content">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                </div>
                @endif
            </a>
            <a href="{{ route('admin.forms.submission.index') }}" 
   class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item
          {{ request()->routeIs('admin.forms.submission.*') ? 
            'bg-white/20 shadow-lg backdrop-blur-sm' : 
            'hover:bg-white/10 hover:shadow-md' }}">
    <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
        <i class="fas fa-file-invoice text-white text-sm"></i>
    </div>
    <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Pembukaan Rekening</span>
    @if(request()->routeIs('admin.forms.submission.*'))
    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 sidebar-content">
        <div class="w-2 h-2 bg-white rounded-full"></div>
    </div>
    @endif
</a>

            <a href="{{ route('admin.forms') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item
                      {{ request()->routeIs('admin.forms') ? 
                        'bg-white/20 shadow-lg backdrop-blur-sm' : 
                        'hover:bg-white/10 hover:shadow-md' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                    <i class="fas fa-file-pdf text-white text-sm"></i>
                </div>
                <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Form PDF</span>
                @if(request()->routeIs('admin.forms'))
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 sidebar-content">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                </div>
                @endif
            </a>

            <a href="{{ route('admin.users') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item
                      {{ request()->routeIs('admin.users') ? 
                        'bg-white/20 shadow-lg backdrop-blur-sm' : 
                        'hover:bg-white/10 hover:shadow-md' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Kelola User</span>
                @if(request()->routeIs('admin.users'))
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 sidebar-content">
                    <div class="w-2 h-2 bg-white rounded-full"></div>
                </div>
                @endif
            </a>

            <a href="{{ route('admin.chat.export') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group relative overflow-hidden sidebar-menu-item hover:bg-white/10 hover:shadow-md">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                    <i class="fas fa-file-export text-white text-sm"></i>
                </div>
                <span class="font-medium sidebar-content transition-all duration-300 overflow-hidden whitespace-nowrap">Export Excel</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="absolute bottom-6 left-6 right-6 sidebar-content transition-all duration-300 overflow-hidden">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 p-3 rounded-xl transition-all duration-300 
                                            bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 
                                            shadow-lg hover:shadow-xl group">
                    <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center group-hover:bg-white/30 transition-colors flex-shrink-0">
                        <i class="fas fa-sign-out-alt text-white text-sm"></i>
                    </div>
                    <span class="font-medium whitespace-nowrap">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 min-h-screen transition-all duration-300" id="main-content">
        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200/50 sticky top-0 z-10">
            <div class="px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                        <i class="fas fa-bars text-gray-700"></i>
                    </button>
                    <div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-600 text-sm mt-1 hidden sm:block">@yield('page-subtitle', 'Selamat datang di Admin Panel')</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <!-- User Info -->
                    @if(session('user'))
                    <div class="flex items-center gap-3 bg-white/50 rounded-xl px-3 py-2 shadow-sm">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gradient-to-r from-red-500 to-red-600 flex items-center justify-center shadow-md">
                            <span class="text-white font-bold text-xs sm:text-sm">{{ substr(session('user')->name, 0, 1) }}</span>
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-800">{{ session('user')->name }}</p>
                            <p class="text-xs text-gray-600 capitalize">{{ session('user')->role }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>
</div>

<!-- Mobile Sidebar Overlay -->
<div id="mobile-overlay" class="fixed inset-0 bg-black/50 z-20 hidden lg:hidden backdrop-blur-sm"></div>

<!-- Mobile Sidebar -->
<div id="mobile-sidebar" class="fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-red-700 to-red-800 text-white transform -translate-x-full transition-transform duration-300 z-30 lg:hidden">
    <div class="p-6">
        <!-- Mobile Logo -->
        <div class="mb-10 pt-4 flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center shadow-lg">
                <i class="fas fa-university text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold">Bank Prisma Dana</h1>
                <p class="text-red-200 text-xs mt-1">Admin Panel</p>
            </div>
            <button id="close-mobile-menu" class="ml-auto p-2 rounded-lg hover:bg-white/10 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group mobile-nav-link
                      {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-lg backdrop-blur-sm' : 'hover:bg-white/10' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fas fa-chart-line text-white text-sm"></i>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.chat') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group mobile-nav-link
                      {{ request()->routeIs('admin.chat') ? 'bg-white/20 shadow-lg backdrop-blur-sm' : 'hover:bg-white/10' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fas fa-robot text-white text-sm"></i>
                </div>
                <span class="font-medium">Q&A Chatbot</span>
            </a>

            <a href="{{ route('admin.forms') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group mobile-nav-link
                      {{ request()->routeIs('admin.forms') ? 'bg-white/20 shadow-lg backdrop-blur-sm' : 'hover:bg-white/10' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fas fa-file-pdf text-white text-sm"></i>
                </div>
                <span class="font-medium">Form PDF</span>
            </a>

            <a href="{{ route('admin.users') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group mobile-nav-link
                      {{ request()->routeIs('admin.users') ? 'bg-white/20 shadow-lg backdrop-blur-sm' : 'hover:bg-white/10' }}">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <span class="font-medium">Kelola User</span>
            </a>

            <a href="{{ route('admin.chat.export') }}" 
               class="flex items-center gap-3 p-3 rounded-xl transition-all duration-300 group mobile-nav-link hover:bg-white/10">
                <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fas fa-file-export text-white text-sm"></i>
                </div>
                <span class="font-medium">Export Excel</span>
            </a>
        </nav>

        <!-- Mobile Logout -->
        <div class="absolute bottom-6 left-6 right-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 p-3 rounded-xl transition-all duration-300 
                                            bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 
                                            shadow-lg">
                    <div class="w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
                        <i class="fas fa-sign-out-alt text-white text-sm"></i>
                    </div>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Sidebar Toggle Functionality
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const toggleIcon = document.getElementById('toggle-icon');
    const sidebarContents = document.querySelectorAll('.sidebar-content');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-expanded');
        sidebar.classList.toggle('sidebar-collapsed');
        
        if (sidebar.classList.contains('sidebar-collapsed')) {
            sidebar.style.width = '80px';
            mainContent.style.marginLeft = '80px';
            toggleIcon.classList.remove('fa-chevron-left');
            toggleIcon.classList.add('fa-chevron-right');
            
            // Hide sidebar contents
            sidebarContents.forEach(content => {
                content.style.opacity = '0';
                content.style.width = '0';
            });
        } else {
            sidebar.style.width = '256px';
            mainContent.style.marginLeft = '0';
            toggleIcon.classList.remove('fa-chevron-right');
            toggleIcon.classList.add('fa-chevron-left');
            
            // Show sidebar contents
            sidebarContents.forEach(content => {
                content.style.opacity = '1';
                content.style.width = 'auto';
            });
        }
    });

    // Mobile menu functionality
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-sidebar').classList.remove('-translate-x-full');
        document.getElementById('mobile-overlay').classList.remove('hidden');
    });

    document.getElementById('close-mobile-menu').addEventListener('click', function() {
        document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
        document.getElementById('mobile-overlay').classList.add('hidden');
    });

    document.getElementById('mobile-overlay').addEventListener('click', function() {
        document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
        document.getElementById('mobile-overlay').classList.add('hidden');
    });

    // Close mobile menu when clicking on navigation links
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
            document.getElementById('mobile-overlay').classList.add('hidden');
        });
    });

    // Initialize sidebar state
    function initializeSidebar() {
        if (window.innerWidth < 1024) {
            // Mobile view - use mobile sidebar
            sidebar.style.display = 'none';
        } else {
            // Desktop view - show desktop sidebar
            sidebar.style.display = 'block';
            sidebar.classList.add('sidebar-expanded');
        }
    }

    // Call on load and resize
    initializeSidebar();
    window.addEventListener('resize', initializeSidebar);
</script>

<style>
    /* Sidebar States */
    .sidebar-expanded {
        width: 256px;
    }
    
    .sidebar-collapsed {
        width: 80px;
    }
    
    /* Smooth transitions for sidebar */
    #sidebar {
        transition: all 0.3s ease-in-out;
    }
    
    #main-content {
        transition: all 0.3s ease-in-out;
    }
    
    .sidebar-content {
        transition: all 0.3s ease-in-out;
    }
    
    /* Custom scrollbar for sidebar */
    aside nav {
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }
    
    aside nav::-webkit-scrollbar {
        width: 4px;
    }
    
    aside nav::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    aside nav::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }
    
    aside nav::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    
    /* Smooth transitions for all elements */
    * {
        transition-property: color, background-color, border-color, transform, opacity;
        transition-duration: 200ms;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Mobile responsive improvements */
    @media (max-width: 768px) {
        #sidebar {
            display: none;
        }
        
        #main-content {
            margin-left: 0 !important;
        }
    }

    /* Tablet responsive */
    @media (min-width: 769px) and (max-width: 1023px) {
        .sidebar-expanded {
            width: 200px;
        }
    }
</style>
</body>
</html>