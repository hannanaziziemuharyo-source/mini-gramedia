<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class SubscriptionPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = SubscriptionPackage::latest()->get();
        $subscriptionPackages = $packages;
        return view('subscription-packages.index', compact('packages', 'subscriptionPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscription-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required'        => 'Nama paket langganan wajib diisi.',
            'description.required' => 'Jenis / Langganan wajib diisi.',
        ]);

        $validateData['price'] = 0;
        $validateData['color'] = '#000000';

        SubscriptionPackage::create($validateData);

        return redirect()->route('admin.paket-langganan.index')->with('success', 'Paket langganan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = SubscriptionPackage::findOrFail($id);
        $subscriptionPackage = $package;
        return view('subscription-packages.edit', compact('package', 'subscriptionPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = SubscriptionPackage::findOrFail($id);

        $validateData = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [
            'name.required'        => 'Nama paket langganan wajib diisi.',
            'description.required' => 'Jenis / Langganan wajib diisi.',
        ]);

        $package->update($validateData);

        return redirect()->route('admin.paket-langganan.index')->with('success', 'Paket langganan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = SubscriptionPackage::findOrFail($id);
        $package->delete();

        return redirect()->route('admin.paket-langganan.index')->with('success', 'Paket langganan berhasil dihapus.');
    }
}
