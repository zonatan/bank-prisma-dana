<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // TAMBAHKAN INI
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChatQAExport;
use App\Models\ChatQA;
use App\Models\Form;
use App\Models\User;

class AdminController extends Controller
{
    public function chatIndex()
    {
        if (!session('user') || session('user')->role !== 'admin') {
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
        if (!session('user') || session('user')->role !== 'admin') {
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

    $path = $request->file('pdf')->store('forms', 'public');
    
    Form::create([
        'title' => $request->title,
        'file_path' => asset('storage/' . $path) // INI YANG PENTING
    ]);

    return back()->with('success', 'Form berhasil diupload!');
}
    // app/Http/Controllers/AdminController.php
public function formIndex()
{
    $forms = Form::all();
    return view('admin.forms', compact('forms'));
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
}