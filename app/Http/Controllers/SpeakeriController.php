<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speakeri;
use App\Models\Evenimente;

class SpeakeriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakeri = Speakeri::with('evenimente')->get();
        return view('speakeri.index', ['speakeri' => $speakeri]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Evenimente::all();
        return view('speakeri.create', ['evenimente' => $evenimente]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume' => 'required',
            'prezentare' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        Speakeri::create([
            'nume' => $request->nume,
            'prezentare' => $request->prezentare,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('speakeri.index')->with('success', 'Speaker creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $speaker = Speakeri::with('evenimente')->findOrFail($id);
        return view('speakeri.show', ['speaker' => $speaker]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $speaker = Speakeri::with('evenimente')->findOrFail($id);
        $evenimente = Evenimente::all();
        return view('speakeri.edit', ['speaker' => $speaker, 'evenimente' => $evenimente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nume' => 'required',
            'prezentare' => 'required',
            'eveniment_id' => 'required|exists:evenimente,id',
        ]);

        $speaker = Speakeri::findOrFail($id);
        $speaker->update([
            'nume' => $request->nume,
            'prezentare' => $request->prezentare,
            'eveniment_id' => $request->eveniment_id,
        ]);

        return redirect()->route('speakeri.index')->with('success', 'Speaker actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = Speakeri::findOrFail($id);
        $speaker->delete();

        return redirect()->route('speakeri.index')->with('success', 'Speaker șters cu succes.');
    }
}
