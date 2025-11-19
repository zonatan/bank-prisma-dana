<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller {
    public function set(Request $request) {
        $lang = $request->input('lang', 'id');
        if (in_array($lang, ['id', 'en'])) {
            session(['locale' => $lang]);
        }
        return back();
    }
}
