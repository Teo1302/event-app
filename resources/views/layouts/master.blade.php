<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista Sarcini</title>
    <!-- Bootstrap CSS File -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 2 meta tags *must* come first in the head; any other head
   content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Gestiune Evenimente</a>
            </div>
            <ul class="nav navbar-nav">

                <li><a href="{{ route('pagina_utilizator') }}">Pagina Utilizator</a></li>
                <!-- Adăugați alte butoane sau linkuri aici pentru alte pagini -->
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="dropdown ms-auto me-5">
                <button class="btn btn-primary dropdown-toggle" type="button" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Cart <span class="badge bg-dark">
            <?php
            $cartItems = session()->get('cart', []);
            $totalQuantity = 0;
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalQuantity += $item['quantity'];
                $totalPrice += $item['quantity'] * $item['pret']; // Calculate total price for each item
            }

            echo $totalQuantity;
            ?>
        </span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                    <?php foreach ($cartItems as $itemId => $item): ?>
                    <li>
                        <div class="dropdown-item">
                            <strong>Event:</strong> <?php echo $item['event']; ?><br>
                            <strong>Tip bilet:</strong> <?php echo $item['tip_bilet']; ?><br>
                            <strong>Pret:</strong> <?php echo $item['pret']." RON"; ?><br>
                            <strong>Quantity:</strong> <?php echo $item['quantity']; ?><br>
                            <strong>Pret total:</strong> <?php echo $item['quantity'] * $item['pret']." RON"; ?><br>
                            <div class="input-group mb-3">
                                <form action="{{ route('cart.addToCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-start">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $itemId }}">
                                    <button type="submit" class="btn btn-outline-primary me-2">Add 1</button>
                                </form>
                                <form action="{{ route('cart.updateCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $itemId }}">
                                    <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1}}">
                                    <button type="submit" class="btn btn-outline-danger">Remove 1</button>
                                </form>
                            </div>

                            <form action="{{ route('cart.removeFromCart', ['id' => $itemId]) }}" method="POST" class="d-flex justify-content-end">
                                @csrf
                                <input type="hidden" name="id" value="{{ $itemId }}">
                                <button type="submit" class="btn btn-danger w-100">Remove</button>
                            </form>

                        </div>
                    </li>

                    <?php endforeach; ?>
                    <?php if (empty($cartItems)): ?>
                    <li class="dropdown-item">Cart is empty</li>
                    <?php endif; ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="">
                            <span class="btn btn-dark w-100">Check Cart</span>
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <head>
        <h1></h1>
    </head>
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>
