<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $files = File::all();
        if (!$files->isEmpty()) {
            return view('files.index', compact('files'));
        }
        return redirect('/')->with('warning', 'No File yet! to add new File clicke ');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|unique:files,phone|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
        ]);
        $file = File::create($data);
        return redirect()->route('files.index')->withStatus(__('File successfully created.'));
    }

    // show all invoices related to a file
    public function invoices(File $file)
    {
        if (!$file->invoices->isEmpty()) {
            return view('files.files', compact('file'));
        }
        return view('home', ['file' => $file])->with('warning-invoice', 'No invoices yet! to add new invoice clicke ');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $data = $request->validate([
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9', [Rule::unique('files')],

        ]);
        //  dd($request);
        $file->phone = $request->input('phone');
        $file->save();

        return redirect()->route('files.index')->withStatus(__('File successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        if ($file) {
            $file->delete();
            return redirect()->route('files.index')->withStatus(__('File successfully deleted.'));
        }
        return redirect()->route('files.index')->withStatus(__('Invalid File.'));
    }
}
