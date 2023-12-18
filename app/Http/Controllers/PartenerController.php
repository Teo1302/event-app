<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partener;
use App\Models\Eveniment;

class PartenerController extends Controller
{
    /**
     * Display a listing of the resource.
     * Se obtine o lista de parteneri si se afiseaza intr un view
     */
    public function index()
    {
        $parteneri =Partener::with('eveniment')->get();
        return view('parteneri.list', ['parteneri' => $parteneri]);
        /**
         * in var parteneri stocam rezultatul interogarii
         * interogare eloquent cu rolul de a obtine partenerii din bd +evenimentele asociate lor
         * nu mai trebuie facuta o alta interogare pt ca am folosit metoda with
         * cu get se obtine rezultatul sub forma de colectie Eloquent
         * ['parteneri' => $parteneri] e un array asociativ ce furnizeaza date catre vizualizare,
         * variabila $parteneri ce contine rezultaul inteorgarii se trimite catre fisierul de vizualizare (parteneri.list)
         * variabila $parteneri se acceseaza in blade folosind cheia asociata valorii adica parteneri
         * return view('parteneri.list', ['parteneri' => $parteneri]);  faciliteaza transmiterea datelor intre controller si view
         */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evenimente = Eveniment::all();
        return view('parteneri.create', ['evenimente' => $evenimente]);
        /**
         * $evenimente = Eveniment::all(); extrage toate înregistrările din tabelul evenimente din baza de date
         * le stochează în variabila $evenimente
         * return view('parteneri.create', ['evenimente' => $evenimente]);
         * în vederea creării unui partener, utilizatorul va putea selecta dintr-o listă derulantă
         * evenimentul cu care dorește să asocieze noul partener.
         * returneaza o vedere numite parteneri.create si se transmite in aceasta vedere variabila evenimente printr-un arry asociativ
         */
    }
    /**
     * Metoda store este responsabilă pentru procesarea datelor primite de la formularul de creare a unui nou partener
     * și salvarea acestora în baza de date.
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
        /**
         * $request->validate([...]):
         * Această linie validează datele primite în obiectul Request folosind reguli specifice pentru fiecare câmp
         */
        Partener::create([
            'nume' => $request->nume,
            'contact' => $request->contact,
            'email' => $request->email,
            'descriere' => $request->descriere,
            'eveniment_id' => $request->eveniment_id,
        ]);
        /**
         *  Datele sunt preluate din obiectul Request, care conține informațiile trimise de la formular
         *
         */
        return redirect()->route('parteneri.index')->with('success', 'Partener creat cu succes.');

    }

    /**
     *
     * metoda with pentru a atașa un mesaj de succes sesiunii
     * sesiunile sunt utilizate pentru a păstra date între request-uri
     */
    public function show(string $id)
    {
        $partener = Partener::with('eveniment')->findOrFail($id);
        return view('parteneri.show', ['partener' => $partener]);
    }

    /**
     * findOrFail($id); metodă oferită de Eloquent pentru a găsi o înregistrare din baza de date după cheia primară
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
