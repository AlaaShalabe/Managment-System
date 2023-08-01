<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(File $file)
    {
        return view('invoices.create', compact('file'));
    }

    public function store(Request $request, File $file)
    {
        $data = $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
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
        Purify::clean($request->input('comments'));
        $data['file_id'] = $file->id;
        $invoice = Invoice::create($data);
        return redirect()->route('files.files', ['file' => $file])->withStatus(__('invoice successfully created.'));
    }

    public function show(Invoice $invoice, File $file)
    {

        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'name' => 'string|regex:/^[A-Za-z]+(\s[A-Za-z]+)*$/',
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

        $invoice->name = $request->input('name');
        $invoice->comments =  Purify::clean($request->input('comments'));
        $invoice->degree = $request->input('degree');
        $invoice->client = $request->input('client');
        $invoice->status = $request->input('status');
        $invoice->the_rest = $request->input('the_rest');
        $invoice->paid_up = $request->input('paid_up');
        $invoice->price = $request->input('price');
        $invoice->Lenses_type = $request->input('Lenses_type');
        $invoice->glasses_type = $request->input('glasses_type');
        $invoice->save();

        return redirect()->route('files.files')->withStatus(__('invoice successfully updated.'));
    }

    public function destroy(Invoice $invoice, File $file)
    {
        if ($invoice) {
            $invoice->delete();
            return redirect()->route('files.index')->withStatus(__('invoice successfully deleted.'));
        }
        return redirect()->back()->withStatus(__('Invalid invoice.'));
    }

    public function destroyMultiple(Request $request)
    {
        dd($request);
        if (!$request->input('ids', [])) {
            return redirect()->back()->withStatus(__('Nothing Selected to delete.'));
        } else {
            $ids = $request->input('ids', []);
            Invoice::whereIn('id', $ids)->delete();
            return redirect()->back()->withStatus(__('Selected Invoices have been deleted.'));
        }
    }
}
