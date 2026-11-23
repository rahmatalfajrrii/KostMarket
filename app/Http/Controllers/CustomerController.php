<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan semua data customer
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('customers.index', compact('customers'));
    }

    // Menampilkan form tambah customer
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil ditambahkan.');
    }

    // Menampilkan form edit customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data customer
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil diperbarui.');
    }

    // Menghapus data customer
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Data customer berhasil dihapus.');
    }
}
