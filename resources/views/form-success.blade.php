@extends('layouts.app')

@section('title', 'Form Berhasil Dikirim - Bank Prisma Dana')

@section('content')
<!-- HERO SECTION -->
<section class="pt-24 pb-16 bg-gradient-to-br from-green-600 via-green-700 to-green-800 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold mb-4">Formulir Berhasil Dikirim!</h1>
        <p class="text-xl opacity-90">Terima kasih telah mengisi formulir pembukaan rekening Bank Prisma Dana</p>
    </div>
</section>

<!-- CONTENT SECTION -->
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <!-- Success Icon -->
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Pengajuan Anda Telah Diterima</h2>
            
            <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                Formulir pembukaan rekening Anda telah berhasil dikirim dan sedang diproses oleh tim kami. 
                Anda akan menerima pemberitahuan melalui email dan SMS mengenai status pengajuan Anda.
            </p>

            <!-- Submission Details -->
            <div class="bg-gray-50 rounded-xl p-6 mb-8 text-left max-w-2xl mx-auto">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-info-circle text-red-600"></i>
                    Detail Pengajuan
                </h3>
                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Nomor Pengajuan:</span>
                        <p class="font-semibold">#{{ request()->get('id') ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Tanggal Pengajuan:</span>
                        <p class="font-semibold">{{ now()->format('d F Y H:i') }}</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Status:</span>
                        <p class="font-semibold text-green-600">Menunggu Verifikasi</p>
                    </div>
                    <div>
                        <span class="text-gray-600">Estimasi Proses:</span>
                        <p class="font-semibold">1-2 Hari Kerja</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-8">
                <a href="{{ route('form.pembukaan-rekening') }}" 
                   class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                    <i class="fas fa-plus mr-2"></i>
                    Ajukan Lagi
                </a>
                <a href="{{ route('form.history') }}" 
                   class="border-2 border-red-600 text-red-600 px-6 py-3 rounded-lg hover:bg-red-600 hover:text-white transition-colors font-medium">
                    <i class="fas fa-history mr-2"></i>
                    Lihat Riwayat
                </a>
                @if(request()->get('id'))
                <a href="{{ route('forms.download-submission', request()->get('id')) }}" 
                   class="border-2 border-green-600 text-green-600 px-6 py-3 rounded-lg hover:bg-green-600 hover:text-white transition-colors font-medium">
                    <i class="fas fa-download mr-2"></i>
                    Download PDF
                </a>
                @endif
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 max-w-2xl mx-auto">
                <h3 class="font-bold text-blue-800 mb-3 flex items-center gap-2">
                    <i class="fas fa-list-check text-blue-600"></i>
                    Langkah Selanjutnya
                </h3>
                <div class="space-y-3 text-sm text-blue-700">
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs flex-shrink-0">1</span>
                        <p>Tim kami akan memverifikasi data Anda dalam 1-2 hari kerja</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs flex-shrink-0">2</span>
                        <p>Anda akan menerima konfirmasi melalui email dan SMS</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs flex-shrink-0">3</span>
                        <p>Rekening Anda akan aktif dan dapat digunakan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Info -->
        <div class="bg-red-50 rounded-2xl p-6 mt-8">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-headset text-white text-lg"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-800 mb-2">Butuh Bantuan?</h4>
                    <p class="text-gray-600 mb-3">Tim customer service kami siap membantu Anda.</p>
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
// Auto redirect to history after 10 seconds
setTimeout(function() {
    window.location.href = '{{ route("form.history") }}';
}, 10000);
</script>
@endsection