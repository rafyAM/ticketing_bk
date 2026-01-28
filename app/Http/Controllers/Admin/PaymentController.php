<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('components.admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $payments = Payment::all();
        return view('components.admin.payments.create', compact('payments'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'kode_pembayaran' => 'required|integer|unique:payments,kode_pembayaran',
            'metode_pembayaran' => 'required|string|max:255',
        ]);

        Payment::create($validatedData);
        
        return redirect()->route('admin.payments.index')
            ->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    public function update( string $id)
    {
        try{
            $payment = Payment::findOrFail($id);

            $validatedData = request()->validate([
                'kode_pembayaran' => 'required|integer|unique:payments,kode_pembayaran,' . $payment->id,
                'metode_pembayaran' => 'required|string|max:255',
            ]);

            $payment->update($validatedData);
            return redirect()->route('admin.payments.index')->with('success', 'Metode pembayaran berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui metode pembayaran.']);
        }
    }

    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('components.admin.payments.show', compact('payment'));
    }

    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('components.admin.payments.edit', compact('payment'));
    }

    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Metode pembayaran berhasil dihapus.');
    }
}
