<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:files,phone|regex:/^([0-9\s\-\+\(\)]*)$/|min:9'
        ]);
        $phone = $request->input('phone');
        $file = File::where('phone', 'LIKE', '%' . $phone . '%')->first();
        return view('files.files', compact('file'));
    }
}
