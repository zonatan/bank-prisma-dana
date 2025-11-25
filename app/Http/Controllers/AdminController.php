<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChatQAExport;
use App\Models\FormSubmission;
use App\Models\ChatQA;
use App\Models\Form;
use App\Models\User;

class AdminController extends Controller
{
    public function chatIndex()
    {
        // Gunakan Auth::user() instead of session('user')
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('home');
        }
        $qa = ChatQA::orderBy('order')->get();
        return view('admin.chat', compact('qa'));
    }

    public function chatStore(Request $request)
    {
        ChatQA::create($request->only(['question', 'answer', 'order', 'active']));
        return back()->with('success', 'Q&A ditambahkan!');
    }

    public function chatDestroy($id)
    {
        ChatQA::findOrFail($id)->delete();
        return back()->with('success', 'Q&A dihapus!');
    }

    public function exportExcel()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('home');
        }
        return Excel::download(new ChatQAExport, 'qa-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function uploadForm(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf'   => 'required|mimes:pdf|max:10240'
        ]);

        $file = $request->file('pdf');
        $path = $file->store('forms', 'public');
        
        $form = Form::create([
            'title' => $request->title,
            'file_path' => '/storage/' . $path,
            'file_size' => $file->getSize()
        ]);

        return back()->with('success', 'Form berhasil diupload!');
    }

    public function formIndex()
    {
        $forms = Form::all();
        return view('admin.forms', compact('forms'));
    }

    public function chatToggle($id)
    {
        $qa = ChatQA::findOrFail($id);
        $qa->active = !$qa->active;
        $qa->save();
        
        return back()->with('success', 'Status Q&A berhasil diubah');
    }

    public function formDestroy($id)
    {
        $form = Form::findOrFail($id);
        Storage::disk('public')->delete(str_replace('storage/', '', $form->file_path));
        $form->delete();
        return back()->with('success', 'Form dihapus!');
    }

    public function userIndex()
    {
        $users = User::where('role', 'customer')->get();
        return view('admin.users', compact('users'));
    }

    public function userDestroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User dihapus!');
    }

    public function chatEdit($id)
    {
        return response()->json(ChatQA::findOrFail($id));
    }

    public function chatUpdate(Request $request, $id)
    {
        ChatQA::findOrFail($id)->update($request->only(['question', 'answer', 'order', 'active']));
        return back()->with('success', 'Q&A diperbarui!');
    }

    public function chatOrder(Request $request, $id)
    {
        ChatQA::findOrFail($id)->update(['order' => $request->order]);
        return response()->json(['success' => true]);
    }

    public function formSubmissionsIndex()
    {
        $submissions = FormSubmission::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.form-submissions', compact('submissions'));
    }

    public function updateSubmissionStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:new,processed,approved,rejected',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $submission = FormSubmission::findOrFail($id);
        $submission->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'processed_at' => now()
        ]);

        return back()->with('success', 'Status pengajuan berhasil diperbarui!');
    }

    public function viewSubmissionPdf($id)
    {
        $submission = FormSubmission::findOrFail($id);
        
        $pdfPath = storage_path('app/public/' . $submission->pdf_path);
        
        if (!file_exists($pdfPath)) {
            abort(404, 'File PDF tidak ditemukan');
        }

        return response()->file($pdfPath);
    }
}