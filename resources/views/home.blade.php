@extends('layouts.app')

@section('title', 'Produk Tabungan & Simpanan - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION -->
<section id="hero" class="pt-24 pb-20 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Tabungan & Simpanan Terbaik
        </h1>
        <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
            Solusi lengkap untuk mengelola keuangan Anda dengan berbagai produk tabungan, deposito, dan arisan yang menguntungkan
        </p>
        <div class="flex flex-wrap justify-center gap-4 mt-10">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">3.5%</div>
                <div class="text-sm opacity-80">Bunga Tabungan</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">6.5%</div>
                <div class="text-sm opacity-80">Bunga Deposito</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">100%</div>
                <div class="text-sm opacity-80">Aman & Terjamin</div>
            </div>
        </div>
    </div>
</section>

<!-- PENJELASAN PRODUK -->
<section id="tentang" class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Mengapa Memilih Bank Prisma Dana?</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Bank Prisma Dana menyediakan berbagai produk tabungan dan simpanan yang dirancang untuk membantu Anda 
            mencapai tujuan finansial dengan mudah dan aman. Dengan bunga kompetitif, proses yang cepat, dan layanan 
            yang terpercaya, kami siap menjadi partner setia dalam mengelola keuangan Anda.
        </p>
    </div>
</section>

<!-- JENIS-JENIS PRODUK -->
<section id="produk" class="py-16 bg-red-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Produk Tabungan & Simpanan</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Tabungan -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-piggy-bank text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Tabungan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Berbagai pilihan tabungan dengan bunga menarik, gratis biaya admin, dan kemudahan transaksi 
                    melalui mobile banking dan ATM.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-red-600 font-medium">Bunga hingga 3.5%</span>
                        <span class="text-gray-500">Saldo Rp 50rb</span>
                    </div>
                </div>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Gratis biaya admin bulanan</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Kartu debit gratis</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Mobile banking 24 jam</span>
                    </li>
                </ul>
            </div>

            <!-- Deposito -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-line text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Deposito</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Investasi aman dengan bunga tetap dan lebih tinggi. Pilih jangka waktu 1, 3, 6, atau 12 bulan 
                    sesuai kebutuhan Anda.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-red-600 font-medium">Bunga hingga 6.5%</span>
                        <span class="text-gray-500">Min. Rp 1 jt</span>
                    </div>
                </div>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Bunga lebih tinggi</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Jangka waktu fleksibel</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Dijamin LPS</span>
                    </li>
                </ul>
            </div>

            <!-- Arisan -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-users text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Arisan Digital</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Arisan modern dengan sistem digital yang aman dan terpercaya. Kelola arisan dengan mudah 
                    melalui aplikasi mobile banking kami.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-red-600 font-medium">Bebas biaya</span>
                        <span class="text-gray-500">Min. 10 orang</span>
                    </div>
                </div>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Sistem undian fair</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Laporan transparan</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-check text-green-500 text-xs"></i>
                        <span>Notifikasi otomatis</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Additional Products Info -->
        <div class="mt-12 grid md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-r from-red-600 to-red-700 text-white rounded-2xl p-6">
                <h3 class="text-xl font-bold mb-4">Jenis Tabungan</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>Tabungan Simpan</span>
                        <span class="text-red-200">Bunga 2.5%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>Tabungan Prisma</span>
                        <span class="text-red-200">Bunga 3.0%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>Tabungan Simpel</span>
                        <span class="text-red-200">Bunga 2.0%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>Tabunganku</span>
                        <span class="text-red-200">Bunga 2.8%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>Tabungan Karisma</span>
                        <span class="text-red-200">Bunga 3.5%</span>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-2xl p-6">
                <h3 class="text-xl font-bold mb-4">Jenis Deposito</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>1 Bulan</span>
                        <span class="text-blue-200">Bunga 5.0%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>3 Bulan</span>
                        <span class="text-blue-200">Bunga 5.5%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>6 Bulan</span>
                        <span class="text-blue-200">Bunga 6.0%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-white/10 rounded-lg">
                        <span>12 Bulan</span>
                        <span class="text-blue-200">Bunga 6.5%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNTUNGAN MENABUNG -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Keuntungan Menabung di Bank Prisma Dana</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shield-alt text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Dilindungi LPS</h4>
                        <p class="text-gray-600 text-sm mt-1">Seluruh dana nasabah dilindungi Lembaga Penjamin Simpanan</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-mobile-alt text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Banking Digital</h4>
                        <p class="text-gray-600 text-sm mt-1">Akses mudah melalui mobile banking dan internet banking 24 jam</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-credit-card text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Kartu Debit Gratis</h4>
                        <p class="text-gray-600 text-sm mt-1">Gratis pembuatan dan penggantian kartu debit</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-percentage text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Bunga Kompetitif</h4>
                        <p class="text-gray-600 text-sm mt-1">Bunga menarik untuk tabungan dan deposito</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-headset text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Layanan 24/7</h4>
                        <p class="text-gray-600 text-sm mt-1">Customer service siap membantu kapan saja</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bolt text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Proses Cepat</h4>
                        <p class="text-gray-600 text-sm mt-1">Buka rekening online dalam hitungan menit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROSES BUKA REKENING -->
<section class="py-16 bg-gradient-to-br from-red-50 to-red-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Proses Buka Rekening</h2>
        
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-red-200 hidden md:block"></div>
            
            <div class="space-y-12 md:space-y-0">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2 md:order-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Isi Formulir Online</h3>
                        <p class="text-gray-600">Isi formulir pembukaan rekening secara online dengan data yang valid dan lengkap</p>
                    </div>
                    <div class="order-1 md:order-2 relative">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            1
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2"></div>
                    <div class="order-1 relative">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            2
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Verifikasi Dokumen</h3>
                        <p class="text-gray-600">Upload dokumen yang diperlukan untuk proses verifikasi oleh tim kami</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2 md:order-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Proses Approval</h3>
                        <p class="text-gray-600">Tim kami akan memproses dan menyetujui pengajuan dalam 1-2 hari kerja</p>
                    </div>
                    <div class="order-1 md:order-2 relative">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            3
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2"></div>
                    <div class="order-1 relative">
                        <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            4
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Rekening Aktif</h3>
                        <p class="text-gray-600">Rekening Anda aktif dan siap digunakan dengan nomor rekening yang diberikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONI PELANGGAN -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Apa Kata Nasabah Kami</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-red-50 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold">
                        AS
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Ahmad Surya</h4>
                        <p class="text-sm text-gray-600">Nasabah Tabungan</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Buka rekening di Bank Prisma Dana sangat mudah dan cepat. Proses online, tidak perlu antri di bank!"</p>
                <div class="flex text-red-500 mt-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            
            <div class="bg-red-50 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold">
                        DI
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Diana Indah</h4>
                        <p class="text-sm text-gray-600">Nasabah Deposito</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Deposito di Prisma Dana memberikan bunga yang kompetitif. Pelayanan excellent dan transparan."</p>
                <div class="flex text-red-500 mt-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            
            <div class="bg-red-50 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold">
                        RM
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Rizki Maulana</h4>
                        <p class="text-sm text-gray-600">Nasabah Arisan</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Arisan digitalnya sangat membantu. Sistem undian fair dan laporan keuangan sangat transparan."</p>
                <div class="flex text-red-500 mt-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TOMBOL BUKA REKENING -->
<section class="py-16 bg-gradient-to-br from-red-100 to-red-200">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Buka Rekening Tabungan Anda</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            Mulai menabung dengan mudah dan aman bersama Bank Prisma Dana. Buka rekening sekarang dan nikmati berbagai keuntungan eksklusif.
        </p>
        
        @if(Auth::check())
            <!-- Jika sudah login, tampilkan tombol akses form -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('form.pembukaan-rekening') }}" 
                   class="bg-red-600 text-white px-8 py-4 rounded-full font-bold hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-edit mr-2"></i>
                    Isi Form Pembukaan Rekening
                </a>
                <a href="#produk" 
                   class="border-2 border-red-600 text-red-600 px-8 py-4 rounded-full font-bold hover:bg-red-600 hover:text-white transition-all duration-300">
                    <i class="fas fa-info-circle mr-2"></i>
                    Lihat Produk Tabungan
                </a>
            </div>
            <p class="text-sm text-gray-500 mt-4">
                Anda sudah login sebagai <span class="font-semibold">{{ Auth::user()->name }}</span>
            </p>
        @else
            <!-- Jika belum login, tampilkan tombol login/daftar -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('login') }}" 
                   class="bg-red-600 text-white px-8 py-4 rounded-full font-bold hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login untuk Buka Rekening
                </a>
                <a href="{{ route('register') }}" 
                   class="border-2 border-red-600 text-red-600 px-8 py-4 rounded-full font-bold hover:bg-red-600 hover:text-white transition-all duration-300">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Akun Baru
                </a>
            </div>
            <p class="text-sm text-gray-500 mt-4">
                Silakan login atau daftar untuk membuka rekening tabungan
            </p>
        @endif

        <!-- Info Keuntungan -->
        <div class="grid md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-red-600 text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Proses Digital</h4>
                <p class="text-sm text-gray-600">Buka rekening online tanpa perlu ke cabang</p>
            </div>
            
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Aman & Terpercaya</h4>
                <p class="text-sm text-gray-600">Dilindungi LPS dengan sistem keamanan berlapis</p>
            </div>
            
            <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-piggy-bank text-red-600 text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Bunga Kompetitif</h4>
                <p class="text-sm text-gray-600">Dapatkan bunga menarik untuk tabungan Anda</p>
            </div>
        </div>

        <!-- Fitur Tambahan -->
        <div class="grid md:grid-cols-4 gap-4 mt-8">
            <div class="flex items-center justify-center gap-2 text-sm text-gray-700">
                <i class="fas fa-mobile-alt text-red-600"></i>
                <span>Banking Digital</span>
            </div>
            <div class="flex items-center justify-center gap-2 text-sm text-gray-700">
                <i class="fas fa-credit-card text-red-600"></i>
                <span>Kartu Debit Gratis</span>
            </div>
            <div class="flex items-center justify-center gap-2 text-sm text-gray-700">
                <i class="fas fa-transfer text-red-600"></i>
                <span>Transfer Gratis</span>
            </div>
            <div class="flex items-center justify-center gap-2 text-sm text-gray-700">
                <i class="fas fa-lock text-red-600"></i>
                <span>100% Terjamin</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-16 bg-gradient-to-r from-red-600 to-red-700 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Butuh Informasi Lebih Lanjut?</h2>
        <p class="text-xl mb-8 opacity-90">
            Konsultasikan kebutuhan tabungan dan simpanan Anda dengan ahli kami
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#kontak" class="bg-white text-red-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-lg">
                Hubungi Konsultan Kami
            </a>
            <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-red-600 transition">
                Kalkulator Bunga
            </a>
        </div>
    </div>
</section>

<!-- KONTAK & LOKASI -->
<section id="kontak" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kontak & Lokasi</h2>
        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Alamat Kantor</h3>
                            <p class="text-gray-600">Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan 12190</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Telepon</h3>
                            <p class="text-gray-600">1500-888 (24 Jam)</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">cs@prismadana.co.id</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Jumat: 08.00 - 17.00<br>Sabtu: 08.00 - 14.00</p>
                        </div>
                    </div>

                    <!-- Directions Button -->
                    <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-directions text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Dapatkan Petunjuk Arah</h3>
                            <p class="text-gray-600 mb-3">Klik tombol di bawah untuk membuka Google Maps</p>
                            <a href="https://maps.app.goo.gl/rmwb1Tz5K1UxwJXn6" 
                               target="_blank" 
                               class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fas fa-external-link-alt"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Google Maps Embed -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="h-96 md:h-full min-h-[400px]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31910.413177901417!2d124.8162796!3d1.2934837!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32876b6f84457561%3A0x29ba5a6699c66314!2sBank%20Prisma%20Dana%20Cab%20Tomohon!5e0!3m2!1sid!2sid!4v1763798973620!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-2xl">
                    </iframe>
                </div>
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-semibold text-gray-800">Bank Prisma Dana</h4>
                            <p class="text-sm text-gray-600">Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan</p>
                        </div>
                        <a href="https://maps.app.goo.gl/rmwb1Tz5K1UxwJXn6" 
                           target="_blank" 
                           class="flex items-center gap-2 px-3 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-directions"></i>
                            Arah
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Smooth scroll untuk semua link navigasi
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading state for maps
    document.addEventListener('DOMContentLoaded', function() {
        const mapIframe = document.querySelector('iframe');
        if (mapIframe) {
            mapIframe.addEventListener('load', function() {
                console.log('Google Maps loaded successfully');
            });
            
            mapIframe.addEventListener('error', function() {
                console.error('Failed to load Google Maps');
            });
        }
    });
</script>

<style>
    /* Smooth transitions for all interactive elements */
    button, a {
        transition: all 0.3s ease;
    }

    /* Custom styling for maps container */
    .rounded-2xl {
        border-radius: 1rem;
    }

    /* Hover effects for buttons */
    .hover\:bg-red-700:hover {
        background-color: #b91c1c;
    }

    /* Responsive adjustments for maps */
    @media (max-width: 768px) {
        #kontak .grid {
            grid-template-columns: 1fr;
        }
        
        .min-h-\[400px\] {
            min-height: 300px;
        }
    }
</style>
@endsection