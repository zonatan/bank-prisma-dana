<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index()
    {
        if (!session('user')) return redirect()->route('login');
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    public function download($id)
    {
        if (!session('user')) return redirect()->route('login');

        $form = Form::findOrFail($id);
        $path = storage_path('app/public/' . str_replace('storage/', '', $form->file_path));

        if (file_exists($path)) {
            return response()->download($path);
        }
        return back()->with('error', 'File tidak ditemukan');
    }
}