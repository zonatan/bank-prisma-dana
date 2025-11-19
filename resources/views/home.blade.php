@extends('layouts.app')

@section('title', 'Informasi Dana & Pembiayaan - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION -->
<section class="pt-24 pb-20 bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Informasi Dana & Pembiayaan
        </h1>
        <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
            Solusi pembiayaan komprehensif untuk mendukung setiap langkah kehidupan dan usaha Anda
        </p>
        <div class="flex flex-wrap justify-center gap-4 mt-10">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">3.5%</div>
                <div class="text-sm opacity-80">Bunga Ringan</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">24 Jam</div>
                <div class="text-sm opacity-80">Proses Cepat</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center min-w-[150px]">
                <div class="text-2xl font-bold mb-1">100%</div>
                <div class="text-sm opacity-80">Aman & Terjamin</div>
            </div>
        </div>
    </div>
</section>

<!-- PENJELASAN DANA -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Apa Itu Dana & Pembiayaan?</h2>
        <p class="text-lg text-gray-600 leading-relaxed">
            Bank Prisma Dana menyediakan layanan pembiayaan komprehensif untuk membantu masyarakat memenuhi berbagai kebutuhan finansial, 
            mulai dari pendidikan, pengembangan usaha, kesehatan, hingga kebutuhan konsumtif sehari-hari. 
            Dengan proses yang cepat, persyaratan yang mudah, dan bunga yang kompetitif, kami berkomitmen menjadi partner terpercaya dalam mewujudkan impian Anda.
        </p>
    </div>
</section>

<!-- JENIS-JENIS DANA -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Jenis-Jenis Dana yang Tersedia</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Dana Pendidikan -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-blue-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Pendidikan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk kebutuhan sekolah, kuliah, kursus, dan berbagai program pendidikan lainnya dengan masa depan yang lebih cerah.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-blue-600 font-medium">
                        <span>Bunga mulai 3.5%</span>
                    </div>
                </div>
            </div>

            <!-- Dana Usaha Kecil -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-green-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-store text-green-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Usaha Kecil</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk modal UMKM, pengembangan usaha, pembelian alat kerja, dan ekspansi bisnis dengan pembiayaan yang fleksibel.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-green-600 font-medium">
                        <span>Tenor hingga 5 tahun</span>
                    </div>
                </div>
            </div>

            <!-- Dana Kesehatan -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-heartbeat text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Kesehatan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk biaya rawat inap, operasi, pengobatan mendesak, dan berbagai kebutuhan medis lainnya dengan proses cepat.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-red-600 font-medium">
                        <span>Proses 24 jam</span>
                    </div>
                </div>
            </div>

            <!-- Dana Konsumtif -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-purple-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-home text-purple-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Konsumtif</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk kebutuhan sehari-hari, renovasi rumah, perbaikan kendaraan, dan kebutuhan mendadak lainnya dengan syarat mudah.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-purple-600 font-medium">
                        <span>Tanpa agunan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SYARAT PENGAJUAN -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Syarat Pengajuan Dana</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-id-card text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">KTP & KK</h4>
                        <p class="text-gray-600 text-sm mt-1">Kartu Tanda Penduduk dan Kartu Keluarga asli</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-green-50 rounded-xl">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-invoice text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Slip Gaji / Penghasilan</h4>
                        <p class="text-gray-600 text-sm mt-1">Surat keterangan penghasilan atau slip gaji 3 bulan terakhir</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-purple-50 rounded-xl">
                    <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Formulir Aplikasi</h4>
                        <p class="text-gray-600 text-sm mt-1">Formulir pengajuan yang sudah diisi lengkap dan ditandatangani</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl">
                    <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-birthday-cake text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Usia Minimal 21 Tahun</h4>
                        <p class="text-gray-600 text-sm mt-1">Calon peminjam harus berusia minimal 21 tahun</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-ban text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Tidak Memiliki Tunggakan</h4>
                        <p class="text-gray-600 text-sm mt-1">Tidak memiliki tunggakan pinjaman aktif di bank lain</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-indigo-50 rounded-xl">
                    <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check-circle text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Warga Negara Indonesia</h4>
                        <p class="text-gray-600 text-sm mt-1">Berdomisili di Indonesia dengan alamat yang jelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PROSES PENGAJUAN -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Proses Pengajuan Dana</h2>
        
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-blue-200 hidden md:block"></div>
            
            <div class="space-y-12 md:space-y-0">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2 md:order-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Konsultasi & Pemilihan Jenis Dana</h3>
                        <p class="text-gray-600">Konsultasi dengan ahli kami untuk menentukan produk dana yang paling sesuai dengan kebutuhan Anda</p>
                    </div>
                    <div class="order-1 md:order-2 relative">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            1
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2"></div>
                    <div class="order-1 relative">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            2
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Pengumpulan Dokumen</h3>
                        <p class="text-gray-600">Mempersiapkan dan mengumpulkan seluruh dokumen yang diperlukan sesuai persyaratan</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2 md:order-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Proses Verifikasi</h3>
                        <p class="text-gray-600">Tim kami akan melakukan verifikasi dokumen dan data dalam waktu 1-2 hari kerja</p>
                    </div>
                    <div class="order-1 md:order-2 relative">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            3
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2"></div>
                    <div class="order-1 relative">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            4
                        </div>
                    </div>
                    <div class="flex-1 md:text-left md:pl-12 order-3">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Pencairan Dana</h3>
                        <p class="text-gray-600">Dana akan dicairkan ke rekening Anda dalam waktu 24 jam setelah persetujuan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNTUNGAN -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Keuntungan Menggunakan Layanan Kami</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-sm border border-blue-100">
                <div class="w-12 h-12 bg-blue-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-bolt text-blue-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Proses Cepat & Mudah</h3>
                <p class="text-gray-600 text-sm">Pengajuan online dengan proses persetujuan yang efisien</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-green-50 to-white rounded-2xl shadow-sm border border-green-100">
                <div class="w-12 h-12 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-percentage text-green-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Bunga Ringan</h3>
                <p class="text-gray-600 text-sm">Suku bunga kompetitif mulai dari 3.5% per tahun</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-white rounded-2xl shadow-sm border border-purple-100">
                <div class="w-12 h-12 bg-purple-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-purple-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Tenor Fleksibel</h3>
                <p class="text-gray-600 text-sm">Pilihan tenor dari 6 bulan hingga 5 tahun</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-red-50 to-white rounded-2xl shadow-sm border border-red-100">
                <div class="w-12 h-12 bg-red-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-shield-alt text-red-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Aman & Terjamin</h3>
                <p class="text-gray-600 text-sm">Dilindungi sistem keamanan berlapis dan regulasi OJK</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-white rounded-2xl shadow-sm border border-orange-100">
                <div class="w-12 h-12 bg-orange-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-hand-holding-usd text-orange-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Tanpa Jaminan</h3>
                <p class="text-gray-600 text-sm">Untuk nominal tertentu tanpa perlu agunan tambahan</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-indigo-50 to-white rounded-2xl shadow-sm border border-indigo-100">
                <div class="w-12 h-12 bg-indigo-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-headset text-indigo-600 text-lg"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Layanan 24/7</h3>
                <p class="text-gray-600 text-sm">Customer service siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Pertanyaan Umum</h2>
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="w-full text-left p-6 font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span>Berapa lama proses pencairan dana?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 hidden">
                    <p>Proses pencairan dana membutuhkan waktu 1-3 hari kerja setelah semua dokumen lengkap dan disetujui. Untuk pengajuan tertentu dengan syarat khusus, proses dapat dipercepat hingga 24 jam.</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="w-full text-left p-6 font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span>Apa saja dokumen yang dibutuhkan?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 hidden">
                    <p>Dokumen utama yang diperlukan meliputi: KTP, KK, slip gaji 3 bulan terakhir, dan formulir aplikasi. Untuk jenis pembiayaan tertentu mungkin diperlukan dokumen tambahan seperti NPWP atau surat keterangan usaha.</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="w-full text-left p-6 font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span>Apa yang terjadi jika terlambat bayar?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 hidden">
                    <p>Kami memberikan masa tenggang 7 hari kerja dengan pemberitahuan sebelumnya. Setelah itu, akan dikenakan denda keterlambatan sesuai ketentuan yang telah disepakati dalam perjanjian.</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="w-full text-left p-6 font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span>Bisakah mengajukan dana lebih dari satu?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 hidden">
                    <p>Anda dapat mengajukan lebih dari satu produk pembiayaan dengan syarat pembiayaan pertama telah berjalan minimal 6 bulan dengan riwayat pembayaran yang baik.</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <button class="w-full text-left p-6 font-semibold text-gray-800 flex justify-between items-center hover:bg-gray-50 transition-colors">
                    <span>Apakah ada biaya administrasi tambahan?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform"></i>
                </button>
                <div class="px-6 pb-6 text-gray-600 hidden">
                    <p>Ada biaya administrasi sekali bayar sebesar 1% dari total plafon dana yang disetujui. Tidak ada biaya tersembunyi lainnya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Siap Mengajukan Pembiayaan?</h2>
        <p class="text-xl mb-8 opacity-90">
            Ingin mengetahui simulasi dana dan pembiayaan yang sesuai dengan kebutuhan Anda?
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#kontak" class="bg-white text-indigo-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-lg">
                Hubungi Konsultan Kami
            </a>
            <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-indigo-600 transition">
                Simulasi Pembiayaan
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
                    <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Alamat Kantor</h3>
                            <p class="text-gray-600">Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan 12190</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-green-50 rounded-xl">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Telepon</h3>
                            <p class="text-gray-600">1500-888 (24 Jam)</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-purple-50 rounded-xl">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">pembiayaan@prismadana.co.id</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4 p-4 bg-orange-50 rounded-xl">
                        <div class="w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Jumat: 08.00 - 17.00<br>Sabtu: 08.00 - 14.00</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-100 rounded-2xl p-6 flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <i class="fas fa-map-marked-alt text-4xl mb-4"></i>
                    <p class="font-medium">Peta Lokasi Kantor</p>
                    <p class="text-sm mt-2">Google Maps embed akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // FAQ Accordion
    document.querySelectorAll('#kontak button').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');
            
            // Toggle content
            content.classList.toggle('hidden');
            
            // Rotate icon
            icon.classList.toggle('rotate-180');
        });
    });
</script>

<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
    
    /* Smooth transitions for all interactive elements */
    button, a {
        transition: all 0.3s ease;
    }
</style>
@endsection