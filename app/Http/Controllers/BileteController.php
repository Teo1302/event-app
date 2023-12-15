<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilete;
use App\Models\Evenimente;

class BileteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bilete = Bilete::with('eveniment')->get();
        return view('bilete.index', ['bilete' => $bilete]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Evenimente::all();
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

        Bilete::create([
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
        $bilet = Bilete::with('eveniment')->findOrFail($id);
        return view('bilete.show', ['bilet' => $bilet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bilet = Bilete::with('eveniment')->findOrFail($id);
        $evenimente = Evenimente::all();
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

        $bilet = Bilete::findOrFail($id);
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
        $bilet = Bilete::findOrFail($id);
        $bilet->delete();

        return redirect()->route('bilete.index')->with('success', 'Bilet șters cu succes.');
    }
}
