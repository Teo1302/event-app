<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsori;
use App\Models\Evenimente;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsori = Sponsori::with('eveniment')->get();
        return view('sponsori.index', ['sponsori' => $sponsori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Evenimente::all();
        return view('sponsori.create', ['evenimente' => $evenimente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'descriere' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Sponsori::create([
            'nume' => $request->nume,
            'descriere' => $request->descriere,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('sponsori.index')->with('success', 'Sponsor creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsori::with('eveniment')->findOrFail($id);
        return view('sponsori.show', ['sponsor' => $sponsor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsori::with('eveniment')->findOrFail($id);
        $evenimente = Evenimente::all();
        return view('sponsori.edit', ['sponsor' => $sponsor, 'evenimente' => $evenimente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nume' => 'required',
            'descriere' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $sponsor = Sponsori::findOrFail($id);
        $sponsor->update([
            'nume' => $request->nume,
            'descriere' => $request->descriere,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('sponsori.index')->with('success', 'Sponsor actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsori::findOrFail($id);
        $sponsor->delete();

        return redirect()->route('sponsori.index')->with('success', 'Sponsor șters cu succes.');
    }
}
