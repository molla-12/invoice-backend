<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Ens
// Ens
class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::all();
    }

    public function store(Request $request)
    {
        Log::info('Incoming request data:', $request->all());
        $data = $request->validate([
            'invoice_number' => 'required|string',
            'client_name' => 'required|string',
            'client_address' => 'required|string',
            'item' => 'required|string',
            'total_amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        try {
            $invoice = Invoice::create($data);
            return response()->json($invoice, 201);
        } catch (\Exception $e) {
            // Log any exceptions for debugging
            Log::error('Error creating invoice:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to create invoice'], 500);
        }
    }

    public function show(Invoice $invoice)
    {
        return $invoice;
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'invoice_number' => 'sometimes|string',
            'client_name' => 'sometimes|string',
            'client_address' => 'sometimes|string',
            'item' => 'sometimes|string',
            'total_amount' => 'sometimes|numeric',
            'due_date' => 'sometimes|date',
        ]);

        $invoice->update($data);
        return $invoice;
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json(['message' => 'Invoice deleted']);
    }
}
