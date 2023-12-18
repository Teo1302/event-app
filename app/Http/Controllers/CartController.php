<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilet;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $bilete = Bilet::with("eveniment");
        return view('bilete.list', compact('bilete'));
    }

    public function viewCart()
    {
        $cartItems = session()->get('cart', []);
        return view('cart', compact('cartItems'));

    }

    public function addToCart($id)
    {
        $bilet = Bilet::with('eveniment')->findOrFail($id);

        if(!$bilet) {
            abort(404);
        }


        $cartItems = session()->get('cart');

        // Verifică dacă biletul este deja în coșul de cumpărături.
        if (isset($cartItems[$id]))
        {// Dacă da, actualizează cantitatea biletului.
            //Pentru elementul identificat de cheia $id
            // se verifică dacă există deja o cheie 'quantity'
            //Dacă da, se adaugă 1 la valoarea existentă a 'quantity'
            // dacă nu există, se setează 'quantity' la 1
            $cartItems[$id]['quantity'] = isset($cartItems[$id]['quantity']) ? $cartItems[$id]['quantity'] + 1 : 1;
        } else
        {
         // Dacă nu, adaugă biletul în coșul de cumpărături cu detaliile asociate.
            $cartItems[$id] = [
                'event' => $bilet->eveniment->titlu,
                'tip_bilet' => $bilet->tip_bilet,
                'pret' => $bilet->pret,
                'quantity' => 1,
            ];
        }
         // Actualizează coșul de cumpărături în sesiune cu noile modificări.
        session()->put('cart', $cartItems);
// Redirectează înapoi către pagina anterioară și furnizează un mesaj de succes.
        return redirect()->back()->with('success', 'Ticket added in cart!');
    }

    public function removeFromCart(Request $request)
    {

        if($request->id) {
            $cartItems = session()->get('cart');
            if(isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cart', $cartItems);
            }
            return redirect()->back()->with('success', 'Tickets removed!');
        }

    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cartItems = session()->get('cart');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cartItems);
        }
        return redirect()->back()->with('success', 'Ticket quantity updated!');

    }



}
