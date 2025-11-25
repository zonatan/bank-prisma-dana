@extends('layouts.app')

@section('title', 'Informasi Dana & Pembiayaan - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION -->
<section id="hero" class="pt-24 pb-20 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white">
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
<section id="tentang" class="py-16 bg-white">
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
<section id="produk" class="py-16 bg-red-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Jenis-Jenis Dana yang Tersedia</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Dana Pendidikan -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-graduation-cap text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Pendidikan</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk kebutuhan sekolah, kuliah, kursus, dan berbagai program pendidikan lainnya dengan masa depan yang lebih cerah.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-red-600 font-medium">
                        <span>Bunga mulai 3.5%</span>
                    </div>
                </div>
            </div>

            <!-- Dana Usaha Kecil -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 group border border-gray-100">
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-store text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Usaha Kecil</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk modal UMKM, pengembangan usaha, pembelian alat kerja, dan ekspansi bisnis dengan pembiayaan yang fleksibel.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-red-600 font-medium">
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
                <div class="w-14 h-14 bg-red-100 rounded-xl mb-4 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-home text-red-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Dana Konsumtif</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Untuk kebutuhan sehari-hari, renovasi rumah, perbaikan kendaraan, dan kebutuhan mendadak lainnya dengan syarat mudah.
                </p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center text-sm text-red-600 font-medium">
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
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-id-card text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">KTP & KK</h4>
                        <p class="text-gray-600 text-sm mt-1">Kartu Tanda Penduduk dan Kartu Keluarga asli</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-invoice text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Slip Gaji / Penghasilan</h4>
                        <p class="text-gray-600 text-sm mt-1">Surat keterangan penghasilan atau slip gaji 3 bulan terakhir</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-edit text-white text-sm"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Formulir Aplikasi</h4>
                        <p class="text-gray-600 text-sm mt-1">Formulir pengajuan yang sudah diisi lengkap dan ditandatangani</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
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
                
                <div class="flex items-start gap-4 p-4 bg-red-50 rounded-xl">
                    <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
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
<section class="py-16 bg-gradient-to-br from-red-50 to-red-100">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Proses Pengajuan Dana</h2>
        
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-red-200 hidden md:block"></div>
            
            <div class="space-y-12 md:space-y-0">
                <!-- Step 1 -->
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-1 md:text-right md:pr-12 order-2 md:order-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Konsultasi & Pemilihan Jenis Dana</h3>
                        <p class="text-gray-600">Konsultasi dengan ahli kami untuk menentukan produk dana yang paling sesuai dengan kebutuhan Anda</p>
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
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Pencairan Dana</h3>
                        <p class="text-gray-600">Dana akan dicairkan ke rekening Anda dalam waktu 24 jam setelah persetujuan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONI PELANGGAN -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Apa Kata Pelanggan Kami</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-red-50 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold">
                        AS
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">Ahmad Surya</h4>
                        <p class="text-sm text-gray-600">Pengusaha UMKM</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Dana usaha dari Bank Prisma Dana membantu saya mengembangkan bisnis kuliner. Proses cepat dan bunga ringan!"</p>
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
                        <p class="text-sm text-gray-600">Ibu Rumah Tangga</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Alhamdulillah, dana pendidikan untuk anak lancar. Pelayanan ramah dan proses tidak berbelit-belit."</p>
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
                        <p class="text-sm text-gray-600">Freelancer</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">"Butuh dana cepat untuk renovasi rumah, Bank Prisma Dana solusinya. Cair dalam 2 hari kerja saja!"</p>
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

<!-- CTA SECTION -->
<section class="py-16 bg-gradient-to-r from-red-600 to-red-700 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Siap Mengajukan Pembiayaan?</h2>
        <p class="text-xl mb-8 opacity-90">
            Ingin mengetahui simulasi dana dan pembiayaan yang sesuai dengan kebutuhan Anda?
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#kontak" class="bg-white text-red-600 px-8 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-lg">
                Hubungi Konsultan Kami
            </a>
            <a href="#" class="border-2 border-white text-white px-8 py-3 rounded-full font-bold hover:bg-white hover:text-red-600 transition">
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
                            <p class="text-gray-600">pembiayaan@prismadana.co.id</p>
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