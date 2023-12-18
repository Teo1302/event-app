<!-- resources/views/checkout.blade.php -->

@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <div class="container mt-4">
        <!-- Formularul pentru procesarea plăților -->
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <!-- Alte câmpuri necesare pentru checkout -->

            <!-- Butonul de submit pentru efectuarea plății -->
            <button type="submit" class="btn btn-success">Plătește acum</button>
        </form>
    </div>

    <!-- Include scriptul Stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Configurarea cheii publice de la Stripe
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Configurarea elementelor Stripe
        var elements = stripe.elements();

        // Adăugarea elementului Card în formular
        var card = elements.create('card');
        card.mount('#card-element');
    </script>
@endsection

<?php
    $total = 0;
    if(session('cart')) {
        foreach(session('cart') as $id => $details) {
            $total += $details['pret'] * $details['quantity'];
        }
    }
    ?>

