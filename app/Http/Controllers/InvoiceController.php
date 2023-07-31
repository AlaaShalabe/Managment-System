<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }
    public function create()
    {
        $files = File::all();
        return view('invoices.create', compact('files'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'file_id' => 'required|exists:files,id',
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
        $invoice = Invoice::create($data);

        return redirect()->route('invoices.index');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $files = File::all();
        return view('invoices.edit', compact('invoice', 'files'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'name' => 'string',
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

        $invoice->name = $request->input('name');
        $invoice->comments = $request->input('comments');
        $invoice->degree = $request->input('degree');
        $invoice->client = $request->input('client');
        $invoice->status = $request->input('status');
        $invoice->the_rest = $request->input('the_rest');
        $invoice->paid_up = $request->input('paid_up');
        $invoice->price = $request->input('price');
        $invoice->Lenses_type = $request->input('Lenses_type');
        $invoice->glasses_type = $request->input('glasses_type');
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Invoice successfully updated.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice successfully deleted.');
    }

    public function destroyMultiple(Request $request)
    {

        $ids = $request->input('ids');
        Invoice::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Selected Invoices have been deleted.');
    }
}
