<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilet;
use App\Models\Eveniment;

class BiletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bilete = Bilet::with('eveniment')->get();
        return view('bilete.index', ['bilete' => $bilete]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
        return view('bilete.create', ['evenimente' => $evenimente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tip_bilet' => 'required',
            'pret' => 'required|numeric',
            'cantitate' => 'required|numeric',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Bilet::create([
            'tip_bilet' => $request->tip_bilet,
            'pret' => $request->pret,
            'cantitate' => $request->cantitate,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('bilete.index')->with('success', 'Bilet creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bilet = Bilet::with('eveniment')->findOrFail($id);
        return view('bilete.show', ['bilet' => $bilet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bilet = Bilet::with('eveniment')->findOrFail($id);
        $evenimente = Eveniment::all();
        return view('bilete.edit', ['bilet' => $bilet, 'evenimente' => $evenimente]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tip_bilet' => 'required',
            'pret' => 'required|numeric',
            'cantitate' => 'required|numeric',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $bilet = Bilet::findOrFail($id);
        $bilet->update([
            'tip_bilet' => $request->tip_bilet,
            'pret' => $request->pret,
            'cantitate' => $request->cantitate,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('bilete.index')->with('success', 'Bilet actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bilet = Bilet::findOrFail($id);
        $bilet->delete();

        return redirect()->route('bilete.index')->with('success', 'Bilet șters cu succes.');
    }
}
