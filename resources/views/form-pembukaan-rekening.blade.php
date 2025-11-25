@extends('layouts.app')

@section('title', 'Form Pembukaan Rekening - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION FORM -->
<section class="pt-24 pb-12 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Form Pembukaan Rekening</h1>
                <p class="text-xl opacity-90">Isi form berikut untuk membuka rekening tabungan dengan mudah</p>
            </div>
            <div class="hidden md:flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl p-4">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white text-xl"></i>
                </div>
                <div>
                    <p class="font-semibold">{{ Auth::user()->name }}</p>
                    <p class="text-sm opacity-80">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BREADCRUMB -->
<section class="bg-white border-b border-gray-200">
    <div class="max-w-6xl mx-auto px-6 py-4">
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-red-600 transition-colors">
                <i class="fas fa-home"></i>
            </a>
            <span class="text-gray-400"><i class="fas fa-chevron-right text-xs"></i></span>
            <span class="text-red-600 font-medium">Form Pembukaan Rekening</span>
        </nav>
    </div>
</section>

<!-- FORM SECTION -->
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Proses Pembukaan Rekening</h2>
                <span class="text-sm font-medium text-red-600">Langkah <span id="currentStepDisplay">1</span> dari 5</span>
            </div>
            
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-medium text-red-600">Progress Pengisian</span>
                <span class="text-sm font-medium text-red-600"><span id="progressPercentage">20%</span></span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div id="progressBar" class="bg-red-600 h-3 rounded-full transition-all duration-500 ease-out" style="width: 20%"></div>
            </div>
            
            <!-- Step Indicators -->
            <div class="grid grid-cols-5 gap-4 mt-6">
                <div class="text-center">
                    <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-bold">1</div>
                    <span class="text-sm font-medium text-red-600">Jenis Nasabah</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-bold">2</div>
                    <span class="text-sm font-medium text-gray-500">Data Pribadi</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-bold">3</div>
                    <span class="text-sm font-medium text-gray-500">Pekerjaan & Keuangan</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-bold">4</div>
                    <span class="text-sm font-medium text-gray-500">Alamat & Kontak</span>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-bold">5</div>
                    <span class="text-sm font-medium text-gray-500">Produk & Pernyataan</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <form id="pembukaanRekeningForm" action="{{ route('form.submit') }}" method="POST" class="bg-white rounded-2xl shadow-lg overflow-hidden">
            @csrf

            <!-- Step 1: Jenis Nasabah -->
            <div id="step1" class="form-step">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm">1</span>
                        Jenis Nasabah
                    </h3>

                    <div class="space-y-6">
                        <!-- Jenis Nasabah -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">Jenis Nasabah *</label>
                            <div class="grid md:grid-cols-2 gap-4">
                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg hover:border-red-500 cursor-pointer transition-colors">
                                    <input type="radio" name="jenis_nasabah" value="Baru" required class="mr-3 text-red-600">
                                    <div>
                                        <span class="font-medium text-gray-700">Nasabah Baru</span>
                                        <p class="text-sm text-gray-500 mt-1">Saya belum memiliki rekening di Bank Prisma Dana</p>
                                    </div>
                                </label>
                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg hover:border-red-500 cursor-pointer transition-colors">
                                    <input type="radio" name="jenis_nasabah" value="Eksisting" required class="mr-3 text-red-600">
                                    <div>
                                        <span class="font-medium text-gray-700">Nasabah Eksisting</span>
                                        <p class="text-sm text-gray-500 mt-1">Saya sudah memiliki rekening di Bank Prisma Dana</p>
                                    </div>
                                </label>
                            </div>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Informasi untuk Nasabah Eksisting -->
                        <div id="infoEksisting" class="bg-blue-50 border border-blue-200 rounded-lg p-4 hidden">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                                <div>
                                    <p class="text-blue-800 font-medium">Informasi untuk Nasabah Eksisting</p>
                                    <p class="text-blue-700 text-sm mt-1">
                                        Nasabah eksisting cukup mengisi data yang berubah (jika ada) dan bagian yang bertanda merah pada formulir.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi Step 1 -->
                    <div class="flex justify-end mt-8 pt-6 border-t border-gray-200">
                        <button type="button" onclick="nextStep(2)" class="bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium flex items-center gap-2">
                            Selanjutnya <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 2: Data Pribadi -->
            <div id="step2" class="form-step hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm">2</span>
                        Data Pribadi
                    </h3>

                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                   placeholder="Masukkan nama lengkap sesuai identitas">
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Nama Alias -->
                        <div>
                            <label for="nama_alias" class="block text-sm font-medium text-gray-700 mb-2">Nama Alias</label>
                            <input type="text" id="nama_alias" name="nama_alias"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                   placeholder="Nama panggilan (jika ada)">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin *</label>
                            <div class="flex gap-4">
                                <label class="flex items-center">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" required class="mr-2 text-red-600">
                                    <span class="text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" required class="mr-2 text-red-600">
                                    <span class="text-gray-700">Perempuan</span>
                                </label>
                            </div>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir *</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                   placeholder="Kota tempat lahir">
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir *</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Jenis Identitas -->
                        <div>
                            <label for="jenis_identitas" class="block text-sm font-medium text-gray-700 mb-2">Jenis Identitas *</label>
                            <select id="jenis_identitas" name="jenis_identitas" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <option value="">Pilih Identitas</option>
                                <option value="KTP">KTP</option>
                                <option value="KK">KK</option>
                                <option value="Passport">Passport</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Nomor Identitas -->
                        <div>
                            <label for="nomor_identitas" class="block text-sm font-medium text-gray-700 mb-2">Nomor Identitas *</label>
                            <input type="text" id="nomor_identitas" name="nomor_identitas" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                   placeholder="Nomor identitas sesuai dokumen">
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Masa Berlaku Identitas -->
                        <div>
                            <label for="masa_berlaku_identitas" class="block text-sm font-medium text-gray-700 mb-2">Masa Berlaku Identitas</label>
                            <select id="masa_berlaku_identitas" name="masa_berlaku_identitas"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <option value="">Pilih Masa Berlaku</option>
                                <option value="Seumur Hidup">Seumur Hidup</option>
                                <option value="Berlaku Sampai">Berlaku Sampai</option>
                            </select>
                        </div>

                        <!-- Tanggal Berlaku Identitas -->
                        <div id="tanggalBerlakuContainer" class="hidden">
                            <label for="tanggal_berlaku_identitas" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berlaku Sampai</label>
                            <input type="date" id="tanggal_berlaku_identitas" name="tanggal_berlaku_identitas"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                        </div>
                    </div>

                    <!-- Navigasi Step 2 -->
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(1)" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i> Sebelumnya
                        </button>
                        <button type="button" onclick="nextStep(3)" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 3: Pekerjaan & Keuangan -->
            <div id="step3" class="form-step hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm">3</span>
                        Data Pekerjaan & Keuangan
                    </h3>

                    <div class="space-y-6">
                        <!-- Status Bekerja -->
                        <div>
                            <label for="status_bekerja" class="block text-sm font-medium text-gray-700 mb-2">Status Bekerja *</label>
                            <select id="status_bekerja" name="status_bekerja" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <option value="">Pilih Status Bekerja</option>
                                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                <option value="Pegawai Negeri">Pegawai Negeri</option>
                                <option value="Wirausaha">Wirausaha</option>
                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                <option value="BUMN/BUMD">BUMN/BUMD</option>
                                <option value="TNI/Polri">TNI/Polri</option>
                                <option value="Profesional">Profesional</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Data Perusahaan (akan muncul jika status bekerja tertentu) -->
                        <div id="dataPerusahaan" class="hidden">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700 mb-2">Nama Perusahaan</label>
                                    <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                                <div>
                                    <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                                <div>
                                    <label for="bidang_usaha" class="block text-sm font-medium text-gray-700 mb-2">Bidang Usaha</label>
                                    <input type="text" id="bidang_usaha" name="bidang_usaha"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                                <div>
                                    <label for="status_pekerjaan" class="block text-sm font-medium text-gray-700 mb-2">Status Pekerjaan</label>
                                    <select id="status_pekerjaan" name="status_pekerjaan"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                        <option value="">Pilih Status</option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Outsourcing">Outsourcing</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Data Keuangan -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Tujuan Pembukaan Rekening -->
                            <div>
                                <label for="tujuan_pembukaan_rekening" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Pembukaan Rekening *</label>
                                <select id="tujuan_pembukaan_rekening" name="tujuan_pembukaan_rekening" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Tujuan</option>
                                    <option value="Simpanan">Simpanan</option>
                                    <option value="Bisnis">Bisnis</option>
                                    <option value="Gaji">Gaji</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Sumber Dana -->
                            <div>
                                <label for="sumber_dana" class="block text-sm font-medium text-gray-700 mb-2">Sumber Dana *</label>
                                <select id="sumber_dana" name="sumber_dana" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Sumber Dana</option>
                                    <option value="Gaji">Gaji</option>
                                    <option value="Hasil Usaha">Hasil Usaha</option>
                                    <option value="Hasil Investasi">Hasil Investasi</option>
                                    <option value="Hibah">Hibah</option>
                                    <option value="Warisan">Warisan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Penghasilan per Bulan -->
                            <div>
                                <label for="penghasilan_per_bulan" class="block text-sm font-medium text-gray-700 mb-2">Penghasilan per Bulan *</label>
                                <select id="penghasilan_per_bulan" name="penghasilan_per_bulan" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Penghasilan</option>
                                    <option value="<Rp.3jt">< Rp.3 juta</option>
                                    <option value="Rp.3-5jt">Rp.3-5 juta</option>
                                    <option value="Rp.5-10jt">Rp.5-10 juta</option>
                                    <option value="Rp.10-20jt">Rp.10-20 juta</option>
                                    <option value="Rp.20-50jt">Rp.20-50 juta</option>
                                    <option value="Rp.50-100jt">Rp.50-100 juta</option>
                                    <option value="Rp.100-500jt">Rp.100-500 juta</option>
                                    <option value=">Rp.500jt">> Rp.500 juta</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Pendapatan Bruto per Tahun -->
                            <div>
                                <label for="pendapatan_bruto_per_tahun" class="block text-sm font-medium text-gray-700 mb-2">Pendapatan Bruto per Tahun *</label>
                                <select id="pendapatan_bruto_per_tahun" name="pendapatan_bruto_per_tahun" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Pendapatan</option>
                                    <option value="<Rp.100jt">< Rp.100 juta</option>
                                    <option value="Rp.100-250jt">Rp.100-250 juta</option>
                                    <option value="Rp.250-500jt">Rp.250-500 juta</option>
                                    <option value="Rp.500-750jt">Rp.500-750 juta</option>
                                    <option value="Rp.750jt-1M">Rp.750 juta - 1 M</option>
                                    <option value=">Rp.1M">> Rp.1 Miliar</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>
                        </div>

                        <!-- NPWP -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status NPWP *</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="status_npwp" value="Ada" required class="mr-2 text-red-600">
                                        <span class="text-gray-700">Ada</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="status_npwp" value="Tidak Ada" required class="mr-2 text-red-600">
                                        <span class="text-gray-700">Tidak Ada</span>
                                    </label>
                                </div>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div id="npwpContainer" class="hidden">
                                <label for="npwp" class="block text-sm font-medium text-gray-700 mb-2">Nomor NPWP</label>
                                <input type="text" id="npwp" name="npwp"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       placeholder="Contoh: 12.345.678.9-012.345">
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi Step 3 -->
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(2)" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i> Sebelumnya
                        </button>
                        <button type="button" onclick="nextStep(4)" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 4: Alamat & Kontak -->
            <div id="step4" class="form-step hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm">4</span>
                        Data Alamat & Kontak
                    </h3>

                    <div class="space-y-6">
                        <!-- Alamat Terkini -->
                        <div>
                            <label for="alamat_terkini" class="block text-sm font-medium text-gray-700 mb-2">Alamat Terkini *</label>
                            <textarea id="alamat_terkini" name="alamat_terkini" rows="3" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                      placeholder="Alamat lengkap sesuai identitas"></textarea>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Provinsi -->
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi *</label>
                                <input type="text" id="provinsi" name="provinsi" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Kota -->
                            <div>
                                <label for="kota" class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten *</label>
                                <input type="text" id="kota" name="kota" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Kecamatan -->
                            <div>
                                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan *</label>
                                <input type="text" id="kecamatan" name="kecamatan" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Kelurahan -->
                            <div>
                                <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan *</label>
                                <input type="text" id="kelurahan" name="kelurahan" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- RT/RW -->
                            <div>
                                <label for="rt_rw" class="block text-sm font-medium text-gray-700 mb-2">RT/RW</label>
                                <input type="text" id="rt_rw" name="rt_rw"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       placeholder="Contoh: 001/002">
                            </div>

                            <!-- Kode Pos -->
                            <div>
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- No. Telp -->
                            <div>
                                <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon *</label>
                                <input type="tel" id="no_telp" name="no_telp" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- No. HP -->
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">No. HP *</label>
                                <input type="tel" id="no_hp" name="no_hp" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       value="{{ Auth::user()->email }}">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Status Tempat Tinggal -->
                            <div>
                                <label for="status_tempat_tinggal" class="block text-sm font-medium text-gray-700 mb-2">Status Tempat Tinggal *</label>
                                <select id="status_tempat_tinggal" name="status_tempat_tinggal" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Status</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Milik Keluarga">Milik Keluarga</option>
                                    <option value="Milik Perusahaan">Milik Perusahaan</option>
                                    <option value="Sewa">Sewa</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>
                        </div>

                        <!-- Data Tambahan -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Nama Ibu Kandung -->
                            <div>
                                <label for="nama_ibu_kandung" class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu Kandung *</label>
                                <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Status Perkawinan -->
                            <div>
                                <label for="status_perkawinan" class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan *</label>
                                <select id="status_perkawinan" name="status_perkawinan" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Status</option>
                                    <option value="Lajang">Lajang</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Janda/Duda">Janda/Duda</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Agama -->
                            <div>
                                <label for="agama" class="block text-sm font-medium text-gray-700 mb-2">Agama *</label>
                                <select id="agama" name="agama" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Kewarganegaraan -->
                            <div>
                                <label for="kewarganegaraan" class="block text-sm font-medium text-gray-700 mb-2">Kewarganegaraan *</label>
                                <select id="kewarganegaraan" name="kewarganegaraan" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Kewarganegaraan</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="WNA">WNA</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <!-- Pendidikan -->
                            <div>
                                <label for="pendidikan" class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Terakhir *</label>
                                <select id="pendidikan" name="pendidikan" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi Step 4 -->
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(3)" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i> Sebelumnya
                        </button>
                        <button type="button" onclick="nextStep(5)" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 5: Produk & Pernyataan -->
            <div id="step5" class="form-step hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center text-sm">5</span>
                        Produk & Pernyataan
                    </h3>

                    <div class="space-y-6">
                        <!-- Produk Tabungan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Produk Tabungan yang Dipilih *</label>
                            <div class="grid md:grid-cols-2 gap-3">
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-red-50 cursor-pointer">
                                    <input type="checkbox" name="produk_tabungan[]" value="Tabungan Simpan" class="mr-3 text-red-600">
                                    <span class="text-gray-700">Tabungan Simpan</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-red-50 cursor-pointer">
                                    <input type="checkbox" name="produk_tabungan[]" value="Prisma" class="mr-3 text-red-600">
                                    <span class="text-gray-700">Prisma</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-red-50 cursor-pointer">
                                    <input type="checkbox" name="produk_tabungan[]" value="Simpel" class="mr-3 text-red-600">
                                    <span class="text-gray-700">Simpel</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-red-50 cursor-pointer">
                                    <input type="checkbox" name="produk_tabungan[]" value="Tabunganku" class="mr-3 text-red-600">
                                    <span class="text-gray-700">Tabunganku</span>
                                </label>
                                <label class="flex items-center p-3 border border-gray-300 rounded-lg hover:bg-red-50 cursor-pointer">
                                    <input type="checkbox" name="produk_tabungan[]" value="Karisma" class="mr-3 text-red-600">
                                    <span class="text-gray-700">Karisma</span>
                                </label>
                            </div>
                            <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                        </div>

                        <!-- Deposito (Opsional) -->
                        <div id="depositoSection" class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-medium text-gray-700 mb-4">Khusus Deposito (Opsional)</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label for="jangka_waktu_deposito" class="block text-sm font-medium text-gray-700 mb-2">Jangka Waktu</label>
                                    <select id="jangka_waktu_deposito" name="jangka_waktu_deposito"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                        <option value="">Pilih Jangka Waktu</option>
                                        <option value="1 Bulan">1 Bulan</option>
                                        <option value="3 Bulan">3 Bulan</option>
                                        <option value="6 Bulan">6 Bulan</option>
                                        <option value="12 Bulan">12 Bulan</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="nominal_deposito" class="block text-sm font-medium text-gray-700 mb-2">Nominal Deposito (Rp)</label>
                                    <input type="number" id="nominal_deposito" name="nominal_deposito"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                </div>
                            </div>
                        </div>

                        <!-- Pernyataan -->
                        <div class="space-y-4">
                            <div class="bg-red-50 p-4 rounded-lg">
                                <label class="flex items-start">
                                    <input type="checkbox" name="pernyataan_kebenaran_data" value="1" required class="mt-1 mr-3 text-red-600">
                                    <span class="text-sm text-gray-700">
                                        Data Nasabah yang diisi dalam formulir pembukaan rekening ini adalah yang sebenar-benarnya.
                                    </span>
                                </label>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div class="bg-red-50 p-4 rounded-lg">
                                <label class="flex items-start">
                                    <input type="checkbox" name="pernyataan_pemeriksaan_data" value="1" required class="mt-1 mr-3 text-red-600">
                                    <span class="text-sm text-gray-700">
                                        Bank dapat melakukan pemeriksaan terhadap kebenaran data yang saya berikan dalam formulir data nasabah ini.
                                    </span>
                                </label>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div class="bg-red-50 p-4 rounded-lg">
                                <label class="flex items-start">
                                    <input type="checkbox" name="pernyataan_pemahaman_produk" value="1" required class="mt-1 mr-3 text-red-600">
                                    <span class="text-sm text-gray-700">
                                        Bank telah melakukan penjelasan yang cukup mengenai karakteristik Produk Bank yang saya manfaatkan dan saya telah mengerti serta memahami segala konsekuensi pemanfaatan produk bank.
                                    </span>
                                </label>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div class="bg-red-50 p-4 rounded-lg">
                                <label class="flex items-start">
                                    <input type="checkbox" name="pernyataan_ketentuan_umum" value="1" required class="mt-1 mr-3 text-red-600">
                                    <span class="text-sm text-gray-700">
                                        Saya telah menerima, membaca, mengerti, dan menyetujui Isi Ketentuan Umum dan Persyaratan pembukaan rekening.
                                    </span>
                                </label>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div class="bg-blue-50 p-4 rounded-lg">
                                <label class="flex items-start">
                                    <input type="checkbox" name="persetujuan_pemberian_data" value="1" required class="mt-1 mr-3 text-red-600">
                                    <span class="text-sm text-gray-700">
                                        Dalam rangka pemenuhan peraturan perundang-undangan, saya bersedia jika BPR Prisma Dana memberikan data pribadi saya kepada anak perusahaan atau perusahaan mitra yang bekerjasama dengan Bank Prisma Dana untuk keperluan pemasaran produk.
                                        <br><small class="text-gray-600">*) Data pribadi dimaksud berupa nama lengkap, alamat, dan nomor telepon.</small>
                                    </span>
                                </label>
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>
                        </div>

                        <!-- Tanda Tangan -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_terang" class="block text-sm font-medium text-gray-700 mb-2">Nama Terang *</label>
                                <input type="text" id="nama_terang" name="nama_terang" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                                       placeholder="Nama lengkap untuk tanda tangan">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>

                            <div>
                                <label for="tanggal_penandatanganan" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Penandatanganan *</label>
                                <input type="date" id="tanggal_penandatanganan" name="tanggal_penandatanganan" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                                <div class="error-message text-red-600 text-sm mt-1 hidden"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi Step 5 -->
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(4)" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i> Sebelumnya
                        </button>
                        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Formulir
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Info Support -->
        <div class="bg-red-50 rounded-2xl p-6 mt-8">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-headset text-white text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 mb-2">Butuh Bantuan?</h4>
                    <p class="text-gray-600 mb-3">Tim customer service kami siap membantu Anda dalam mengisi form pembukaan rekening.</p>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-phone text-red-600"></i>
                            <span class="text-gray-700">1500-888</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-envelope text-red-600"></i>
                            <span class="text-gray-700">cs@prismadana.co.id</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-clock text-red-600"></i>
                            <span class="text-gray-700">Senin - Jumat: 08.00 - 17.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Multi-step Form untuk Pembukaan Rekening
let currentStep = 1;
const totalSteps = 5;

// Initialize first step
document.addEventListener('DOMContentLoaded', function() {
    console.log('Form pembukaan rekening initialized');
    showStep(1);
    
    // Event listeners untuk dynamic fields
    setupDynamicFields();
});

function setupDynamicFields() {
    // Masa berlaku identitas
    const masaBerlakuSelect = document.getElementById('masa_berlaku_identitas');
    const tanggalBerlakuContainer = document.getElementById('tanggalBerlakuContainer');
    
    if (masaBerlakuSelect) {
        masaBerlakuSelect.addEventListener('change', function() {
            if (this.value === 'Berlaku Sampai') {
                tanggalBerlakuContainer.classList.remove('hidden');
            } else {
                tanggalBerlakuContainer.classList.add('hidden');
            }
        });
    }
    
    // Status bekerja untuk menampilkan data perusahaan
    const statusBekerjaSelect = document.getElementById('status_bekerja');
    const dataPerusahaan = document.getElementById('dataPerusahaan');
    
    if (statusBekerjaSelect) {
        statusBekerjaSelect.addEventListener('change', function() {
            const pekerjaanTertentu = ['Pegawai Negeri', 'Wirausaha', 'Pegawai Swasta', 'BUMN/BUMD', 'TNI/Polri', 'Profesional'];
            if (pekerjaanTertentu.includes(this.value)) {
                dataPerusahaan.classList.remove('hidden');
            } else {
                dataPerusahaan.classList.add('hidden');
            }
        });
    }
    
    // Status NPWP
    const statusNpwpRadios = document.querySelectorAll('input[name="status_npwp"]');
    const npwpContainer = document.getElementById('npwpContainer');
    
    statusNpwpRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'Ada') {
                npwpContainer.classList.remove('hidden');
            } else {
                npwpContainer.classList.add('hidden');
            }
        });
    });
    
    // Jenis nasabah untuk info eksisting
    const jenisNasabahRadios = document.querySelectorAll('input[name="jenis_nasabah"]');
    const infoEksisting = document.getElementById('infoEksisting');
    
    jenisNasabahRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'Eksisting') {
                infoEksisting.classList.remove('hidden');
            } else {
                infoEksisting.classList.add('hidden');
            }
        });
    });
}

function showStep(step) {
    console.log('Showing step:', step);
    
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(el => {
        el.classList.add('hidden');
    });
    
    // Show current step
    const currentStepEl = document.getElementById(`step${step}`);
    if (currentStepEl) {
        currentStepEl.classList.remove('hidden');
        console.log('Step element found and shown');
    } else {
        console.error('Step element not found:', `step${step}`);
        return;
    }
    
    // Update progress bar
    const progress = (step / totalSteps) * 100;
    const progressBar = document.getElementById('progressBar');
    const currentStepDisplay = document.getElementById('currentStepDisplay');
    const progressPercentage = document.getElementById('progressPercentage');
    
    if (progressBar) progressBar.style.width = `${progress}%`;
    if (currentStepDisplay) currentStepDisplay.textContent = step;
    if (progressPercentage) progressPercentage.textContent = `${Math.round(progress)}%`;
    
    // Update step indicators
    updateStepIndicators(step);
    
    currentStep = step;
    
    // Scroll to top of form smoothly
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateStepIndicators(activeStep) {
    const indicators = document.querySelectorAll('.grid.grid-cols-5 > div');
    indicators.forEach((indicator, index) => {
        const stepNumber = index + 1;
        const circle = indicator.querySelector('div');
        const text = indicator.querySelector('span');
        
        if (stepNumber === activeStep) {
            circle.className = 'w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-bold';
            text.className = 'text-sm font-medium text-red-600';
        } else if (stepNumber < activeStep) {
            circle.className = 'w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-2 font-bold';
            text.className = 'text-sm font-medium text-green-600';
        } else {
            circle.className = 'w-10 h-10 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-2 font-bold';
            text.className = 'text-sm font-medium text-gray-500';
        }
    });
}

function nextStep(nextStepNumber) {
    console.log('Next button clicked. Current step:', currentStep, 'Next step:', nextStepNumber);
    
    const currentStepEl = document.getElementById(`step${currentStep}`);
    if (!currentStepEl) {
        console.error('Current step element not found');
        alert('Terjadi kesalahan internal. Silakan refresh halaman.');
        return;
    }
    
    const requiredFields = currentStepEl.querySelectorAll('input[required], select[required], textarea[required]');
    let allFilled = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            allFilled = false;
            field.classList.add('border-red-500');
            console.log('Empty required field:', field.name);
        } else {
            field.classList.remove('border-red-500');
        }
    });
    
    // Special check for radio buttons
    const radioGroups = {};
    currentStepEl.querySelectorAll('input[type="radio"][required]').forEach(radio => {
        if (!radioGroups[radio.name]) {
            const checked = currentStepEl.querySelector(`input[name="${radio.name}"]:checked`);
            if (!checked) {
                allFilled = false;
                console.log('No radio selected for:', radio.name);
            }
            radioGroups[radio.name] = true;
        }
    });
    
    if (allFilled) {
        console.log('Validation passed, moving to step:', nextStepNumber);
        showStep(nextStepNumber);
    } else {
        console.log('Validation failed');
        alert('Harap lengkapi semua field yang wajib diisi sebelum melanjutkan.');
    }
}

function prevStep(prevStepNumber) {
    console.log('Previous button clicked. Moving to step:', prevStepNumber);
    showStep(prevStepNumber);
}

// Form submission
document.getElementById('pembukaanRekeningForm').addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Form submission started');
    
    let allValid = true;
    for (let step = 1; step <= totalSteps; step++) {
        const stepEl = document.getElementById(`step${step}`);
        if (stepEl) {
            const requiredFields = stepEl.querySelectorAll('input[required], select[required], textarea[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allValid = false;
                    console.log('Empty field in final validation:', field.name);
                }
            });
        }
    }
    
    // Special check for checkboxes in Step 5
    const step5El = document.getElementById('step5');
    if (step5El) {
        const checkboxes = step5El.querySelectorAll('input[type="checkbox"][name="produk_tabungan[]"]');
        const checked = Array.from(checkboxes).some(cb => cb.checked);
        if (!checked) {
            allValid = false;
            console.log('No product selected in final validation');
            alert('Harap pilih setidaknya satu produk tabungan sebelum mengirim.');
        }
    }
    
    if (!allValid) {
        alert('Harap lengkapi semua field yang wajib diisi sebelum mengirim.');
        return;
    }
    
    // Show loading
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
    submitBtn.disabled = true;
    
    // Submit form
    try {
        this.submit();
    } catch (error) {
        console.error('Submission error:', error);
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        alert('Terjadi kesalahan saat mengirim. Silakan coba lagi.');
    }
});

// Debug function
function debugForm() {
    console.log('=== DEBUG FORM ===');
    console.log('Current Step:', currentStep);
    for (let i = 1; i <= totalSteps; i++) {
        const el = document.getElementById(`step${i}`);
        console.log(`Step ${i}:`, el ? 'EXISTS' : 'MISSING');
    }
}
</script>

<style>
.form-step {
    transition: all 0.3s ease-in-out;
}

.hidden {
    display: none !important;
}

.border-red-500 {
    border-color: #ef4444 !important;
}

.error-message {
    transition: all 0.3s ease;
}
</style>
@endsection