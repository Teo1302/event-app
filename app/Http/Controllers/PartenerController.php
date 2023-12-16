<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partener;
use App\Models\Eveniment;

class PartenerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parteneri =Partener::with('eveniment')->get();
        return view('parteneri.list', ['parteneri' => $parteneri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
        return view('parteneri.create', ['evenimente' => $evenimente]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'descriere' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Partener::create([
            'nume' => $request->nume,
            'contact' => $request->contact,
            'email' => $request->email,
            'descriere' => $request->descriere,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('parteneri.index')->with('success', 'Partener creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partener = Partener::with('eveniment')->findOrFail($id);
        return view('parteneri.show', ['partener' => $partener]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partener = Partener::with('eveniment')->findOrFail($id);
        $evenimente = Eveniment::all();
        return view('parteneri.edit', ['parteneri' => $partener, 'evenimente' => $evenimente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nume' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'descriere' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $partener = Partener::findOrFail($id);
        $partener->update([
            'nume' => $request->nume,
            'contact' => $request->contact,
            'email' => $request->email,
            'descriere' => $request->descriere,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('parteneri.index')->with('success', 'Partener actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partener = Partener::findOrFail($id);
        $partener->delete();

        return redirect()->route('parteneri.index')->with('success', 'Partener șters cu succes.');
    }
}
