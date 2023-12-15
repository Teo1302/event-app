<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Eveniment;
use Illuminate\Support\Facades\Session;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsori = Sponsor::with('eveniment')->get();
        return view('sponsori.list', ['sponsori' => $sponsori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
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
            'contact' =>'required',
            'adresa' =>'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Sponsor::create([
            'nume' => $request->nume,
            'descriere' => $request->descriere,
            'contact' => $request->contact,
            'adresa' => $request->adresa,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('sponsori.index')->with('success', 'Sponsor creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor = Sponsor::with('eveniment')->findOrFail($id);
        return view('sponsori.show', ['sponsor' => $sponsor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sponsor = Sponsor::with('eveniment')->findOrFail($id);
        $evenimente = Eveniment::all();
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
            'contact' =>'required',
            'adresa' =>'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $sponsor = Sponsor::findOrFail($id);
        $sponsor->update([
            'nume' => $request->nume,
            'descriere' => $request->descriere,
            'contact' => $request->contact,
            'adresa' => $request->adresa,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('sponsori.index')->with('success', 'Sponsor actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        return redirect()->route('sponsori.index')->with('success', 'Sponsor șters cu succes.');
    }
}
