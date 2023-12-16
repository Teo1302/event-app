<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Eveniment;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda = Agenda::with('eveniment')->get();
        return view('agende.list', ['agenda' => $agenda]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
        return view('agende.create', ['evenimente' => $evenimente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'ora_inceput' => 'required|date_format:H:i',
            'ora_final' => 'required|date_format:H:i|after:ora_inceput',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Agenda::create([
            'titlu' => $request->titlu,
            'descriere' => $request->descriere,
            'ora_inceput' => $request->ora_inceput,
            'ora_final' => $request->ora_final,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('agende.index')->with('success', 'Eveniment adăugat în agenda cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agenda = Agenda::with('eveniment')->findOrFail($id);
        return view('agende.show', ['agenda' => $agenda]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agenda = Agenda::with('eveniment')->findOrFail($id);
        $evenimente = Eveniment::all();
        return view('agende.edit', ['agenda' => $agenda, 'evenimente' => $evenimente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titlu' => 'required',
            'descriere' => 'required',
            'ora_inceput' => 'required|date_format:H:i',
            'ora_final' => 'required|date_format:H:i|after:ora_inceput',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'titlu' => $request->titlu,
            'descriere' => $request->descriere,
            'ora_inceput' => $request->ora_inceput,
            'ora_final' => $request->ora_final,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('agende.index')->with('success', 'Eveniment din agenda actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('agende.index')->with('success', 'Eveniment din agenda șters cu succes.');
    }
}
