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
        //  dd($request);

        $phone = $request->input('phone');
        $phoneQuary = File::query();
        if ($phone) {
            $phoneQuary = $phoneQuary->where('phone', 'LIKE', '%' . $phone . '%');
        }
        $phoneQuary = $phoneQuary->get();
        return  $phoneQuary;
    }
}
