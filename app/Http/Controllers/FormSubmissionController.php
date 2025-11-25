<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormSubmissionsExport;

class FormSubmissionController extends Controller
{
    /**
     * Display a listing of the resource for admin.
     */
    public function index()
    {
        $submissions = FormSubmission::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalSubmissions = FormSubmission::count();
        $newSubmissions = FormSubmission::where('status', 'new')->count();
        $tabunganCount = FormSubmission::whereJsonContains('produk_tabungan', 'Tabungan Simpan')->count();
        $depositoCount = FormSubmission::whereNotNull('nominal_deposito')->count();

        return view('admin.forms-submission', compact(
            'submissions', 
            'totalSubmissions', 
            'newSubmissions', 
            'tabunganCount', 
            'depositoCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('form-pembukaan-rekening');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // Jenis Nasabah
                'jenis_nasabah' => 'required|string',
                
                // Data Nasabah
                'nama_lengkap' => 'required|string|max:255',
                'nama_alias' => 'nullable|string|max:255',
                'jenis_kelamin' => 'required|string',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_identitas' => 'required|string',
                'nomor_identitas' => 'required|string|max:50',
                'masa_berlaku_identitas' => 'nullable|string',
                'tanggal_berlaku_identitas' => 'nullable|date',
                
                // Data Pekerjaan
                'status_bekerja' => 'required|string',
                'status_pekerjaan' => 'nullable|string',
                'nama_perusahaan' => 'nullable|string|max:255',
                'alamat_perusahaan' => 'nullable|string',
                'bidang_usaha' => 'nullable|string|max:255',
                'jabatan' => 'nullable|string|max:255',
                'no_telp_perusahaan' => 'nullable|string|max:20',
                'no_fax_perusahaan' => 'nullable|string|max:20',
                
                // Data Keuangan - DIBUAT NULLABLE UNTUK SEMENTARA
                'tujuan_pembukaan_rekening' => 'nullable|string',
                'sumber_dana' => 'nullable|string',
                'manfaat_penggunaan_dana' => 'nullable|string',
                'penghasilan_per_bulan' => 'nullable|string',
                'pendapatan_bruto_per_tahun' => 'nullable|string',
                'status_npwp' => 'nullable|string',
                'npwp' => 'nullable|string|max:20',
                
                // Data Pembukaan Rekening
                'alamat_terkini' => 'required|string',
                'provinsi' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'rt_rw' => 'nullable|string|max:20',
                'kode_pos' => 'nullable|string|max:10',
                'no_telp' => 'required|string|max:20',
                'no_hp' => 'required|string|max:20',
                'email' => 'required|email',
                'status_tempat_tinggal' => 'required|string',
                'nama_ibu_kandung' => 'required|string|max:255',
                'status_perkawinan' => 'required|string',
                'agama' => 'required|string',
                'kewarganegaraan' => 'required|string',
                'pendidikan' => 'required|string',
                
                // Produk
                'produk_tabungan' => 'required|array',
                
                // Deposito (opsional)
                'jangka_waktu_deposito' => 'nullable|string',
                'nominal_deposito' => 'nullable|numeric',
                'nominal_deposito_terbilang' => 'nullable|string',
                'perpanjangan_deposito' => 'nullable|string',
                'suku_bunga' => 'nullable|numeric',
                'pembayaran_bunga_ke_rekening' => 'nullable|string',
                'pencairan_deposito' => 'nullable|string',
                'pencairan_atas_nama' => 'nullable|string',
                
                // Pernyataan - DIBUAT NULLABLE UNTUK SEMENTARA
                'pernyataan_kebenaran_data' => 'nullable|accepted',
                'pernyataan_pemeriksaan_data' => 'nullable|accepted',
                'pernyataan_pemahaman_produk' => 'nullable|accepted',
                'pernyataan_ketentuan_umum' => 'nullable|accepted',
                'persetujuan_pemberian_data' => 'nullable|accepted',
                
                // Tanda Tangan
                'nama_terang' => 'required|string|max:255',
                'tanggal_penandatanganan' => 'required|date',
            ]);

            // Tambahkan user_id dari user yang login
            $validated['user_id'] = Auth::id();
            $validated['status'] = 'new';

            // Set default values untuk field yang nullable tapi diperlukan
            $validated['tujuan_pembukaan_rekening'] = $validated['tujuan_pembukaan_rekening'] ?? 'Simpanan';
            $validated['sumber_dana'] = $validated['sumber_dana'] ?? 'Gaji';
            $validated['manfaat_penggunaan_dana'] = $validated['manfaat_penggunaan_dana'] ?? 'Nasabah';
            $validated['penghasilan_per_bulan'] = $validated['penghasilan_per_bulan'] ?? '<Rp.3jt';
            $validated['pendapatan_bruto_per_tahun'] = $validated['pendapatan_bruto_per_tahun'] ?? '<Rp.100jt';
            $validated['status_npwp'] = $validated['status_npwp'] ?? 'Tidak Ada';

            // Set default values untuk pernyataan
            $validated['pernyataan_kebenaran_data'] = $validated['pernyataan_kebenaran_data'] ?? true;
            $validated['pernyataan_pemeriksaan_data'] = $validated['pernyataan_pemeriksaan_data'] ?? true;
            $validated['pernyataan_pemahaman_produk'] = $validated['pernyataan_pemahaman_produk'] ?? true;
            $validated['pernyataan_ketentuan_umum'] = $validated['pernyataan_ketentuan_umum'] ?? true;
            $validated['persetujuan_pemberian_data'] = $validated['persetujuan_pemberian_data'] ?? false;

            // Simpan data
            $submission = FormSubmission::create($validated);

            // Generate PDF
            $pdf = PDF::loadView('pdf.form-submission', compact('submission'));
            $pdfPath = 'submissions/form_' . $submission->id . '_' . time() . '.pdf';
            Storage::put('public/' . $pdfPath, $pdf->output());

            // Update submission dengan path PDF
            $submission->update(['pdf_path' => $pdfPath]);

            // Redirect langsung ke halaman success dengan data submission
            return redirect()->route('form.success', ['id' => $submission->id])
                ->with('success', 'Form pembukaan rekening berhasil dikirim!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $submission = FormSubmission::with('user')->findOrFail($id);

        $html = view('admin.partials.submission-detail', compact('submission'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    /**
     * Show success page after form submission.
     */
    public function success($id = null)
    {
        $submission = null;
        
        if ($id) {
            $submission = FormSubmission::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();
        }

        // Jika tidak ada submission yang ditemukan, redirect ke history
        if (!$submission && $id) {
            return redirect()->route('form.history')
                ->with('error', 'Data pengajuan tidak ditemukan.');
        }

        return view('form-success', compact('submission'));
    }

    /**
     * Show submission history for user.
     */
    public function history()
    {
        $submissions = FormSubmission::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('form-history', compact('submissions'));
    }

    /**
     * Download PDF for specific submission.
     */
    public function download($id)
    {
        $submission = FormSubmission::findOrFail($id);
        
        // Cek authorization - admin atau pemilik submission
        if (Auth::user()->role !== 'admin' && $submission->user_id !== Auth::id()) {
            abort(403);
        }

        $pdfPath = storage_path('app/public/' . $submission->pdf_path);
        
        if (!file_exists($pdfPath)) {
            // Regenerate PDF jika file tidak ditemukan
            $pdf = PDF::loadView('pdf.form-submission', compact('submission'));
            return $pdf->download('form-pembukaan-rekening-' . $submission->id . '.pdf');
        }

        return response()->download($pdfPath, 'form-pembukaan-rekening-' . $submission->id . '.pdf');
    }

    /**
     * Export to Excel for admin.
     */
    public function exportExcel()
    {
        return Excel::download(new FormSubmissionsExport, 'form-pembukaan-rekening-' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Export to PDF for admin.
     */
    public function exportPDF()
    {
        $submissions = FormSubmission::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = PDF::loadView('pdf.submissions-report', compact('submissions'));
        return $pdf->download('laporan-pembukaan-rekening-' . date('Y-m-d') . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $submission = FormSubmission::findOrFail($id);
            
            // Hapus file PDF jika ada
            if ($submission->pdf_path && Storage::exists('public/' . $submission->pdf_path)) {
                Storage::delete('public/' . $submission->pdf_path);
            }
            
            $submission->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data pembukaan rekening berhasil dihapus.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}