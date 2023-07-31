<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

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
        return view('files.index', compact('files'));
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
            'name' => 'required|string',
            'glasses_type' => 'required|string',
            'client' => 'required|in:local,VIP',
            'degree' => 'required|string',
            'Lenses_type' => 'required|string',
            'status' => 'required|in:received,not_received',
            'price' => 'required|numeric',
            'paid_up' => 'required|numeric',
            'the_rest' => 'required|numeric',
            'comments' => 'required|string',

        ]);
        // dd($request);

        $file = File::create($data);

        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

    public function files(File $file)
    {
        return view('files.files', compact('file'));
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
            'name' => 'string',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9', [Rule::unique('files')],
            'comments' => 'string',
            'degree' => 'string',
            'client' => 'in:local,VIP',
            'status' => 'in:received,not_received',
            'the_rest' => 'numeric',
            'paid_up' => 'numeric',
            'price' => 'numeric',
            'Lenses_type' => 'string',
            'glasses_type' => 'string',

        ]);
        //  dd($request);

        $file->name = $request->input('name');
        $file->phone = $request->input('phone');
        $file->comments = $request->input('comments');
        $file->degree = $request->input('degree');
        $file->client = $request->input('client');
        $file->status = $request->input('status');
        $file->the_rest = $request->input('the_rest');
        $file->paid_up = $request->input('paid_up');
        $file->price = $request->input('price');
        $file->Lenses_type = $request->input('Lenses_type');
        $file->glasses_type = $request->input('glasses_type');
        $file->save();

        return redirect()->route('files.index')->with('status', 'File successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('files.index')->with('status', 'File successfully deleted.');
    }
}
