<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizatori;

class UtilizatoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilizatori = Utilizatori::all();
        return view('utilizatori.index', ['utilizatori' => $utilizatori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('utilizatori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nume_utilizator' => 'required',
            'parola' => 'required',
            'email' => 'required|email',
            // Alte reguli de validare, dacă sunt necesare
        ]);

        Utilizator::create([
            'nume_utilizator' => $request->nume_utilizator,
            'parola' => bcrypt($request->parola), // Asigură-te că parola este criptată înainte de a o stoca
            'email' => $request->email,
            // Alte câmpuri, dacă există
        ]);

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilizator = Utilizatori::findOrFail($id);
        return view('utilizatori.show', ['utilizator' => $utilizator]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilizator = Utilizatori::findOrFail($id);
        return view('utilizatori.edit', ['utilizator' => $utilizator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nume_utilizator' => 'required',
            'parola' => 'required',
            'email' => 'required|email',
            // Alte reguli de validare, dacă sunt necesare
        ]);

        $utilizator = Utilizatori::findOrFail($id);
        $utilizator->update([
            'nume_utilizator' => $request->nume_utilizator,
            'parola' => bcrypt($request->parola),
            'email' => $request->email,
            // Alte câmpuri, dacă există
        ]);

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilizator = Utilizatori::findOrFail($id);
        $utilizator->delete();

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator șters cu succes.');
    }
}
