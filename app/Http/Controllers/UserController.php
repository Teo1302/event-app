<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilizatori = User::all();
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // Alte reguli de validare, dacă sunt necesare
        ]);

        User::create([
            'name' => $request->name,
            'email' => bcrypt($request->email), // Asigură-te că parola este criptată înainte de a o stoca
            'password' => $request->password,
            // Alte câmpuri, dacă există
        ]);

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilizator = User::findOrFail($id);
        return view('utilizatori.show', ['utilizator' => $utilizator]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilizator = User::findOrFail($id);
        return view('utilizatori.edit', ['utilizator' => $utilizator]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // Alte reguli de validare, dacă sunt necesare
        ]);

        $utilizator = User::findOrFail($id);
        $utilizator->update([
            // Alte câmpuri, dacă există
            'name' => $request->name,
            'email' => bcrypt($request->email), // Asigură-te că parola este criptată înainte de a o stoca
            'password' => $request->password,
        ]);

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator actualizat cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilizator = User::findOrFail($id);
        $utilizator->delete();

        return redirect()->route('utilizatori.index')->with('success', 'Utilizator șters cu succes.');
    }
}
