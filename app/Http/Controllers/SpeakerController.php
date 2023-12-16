<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\Eveniment;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakeri = Speaker::with('eveniment')->get();
        return view('speakeri.list', ['speakeri' => $speakeri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
        return view('speakeri.create', ['evenimente' => $evenimente]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'prezentare' => 'required',
            'telefon' => 'required',
            'email' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Speaker::create([
            'nume' => $request->nume,
            'prenume' => $request->prenume,
            'prezentare' => $request->prezentare,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('speakeri.index')->with('success', 'Speaker creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $speaker = Speaker::with('eveniment')->findOrFail($id);
        return view('speakeri.show', ['speaker' => $speaker]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speaker = Speaker::with('eveniment')->findOrFail($id);
        $evenimente = Eveniment::all();
        return view('speakeri.edit', ['speaker' => $speaker, 'evenimente' => $evenimente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nume' => 'required',
            'prenume' => 'required',
            'prezentare' => 'required',
            'telefon' => 'required',
            'email' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $speaker = Speaker::findOrFail($id);
        $speaker->update([
            'nume' => $request->nume,
            'prenume' => $request->prenume,
            'prezentare' => $request->prezentare,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('speakeri.index')->with('success', 'Speaker actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect()->route('speakeri.index')->with('success', 'Speaker șters cu succes.');
    }
}
