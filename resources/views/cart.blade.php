<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoofdpagina.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Winkelmand</title>
    @vite(['resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .body-container {
            max-width: 1200px;
            margin: 102px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .cart-item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-info {
            flex: 1;
            padding-left: 20px;
        }

        .cart-item-info h3 {
            margin: 0;
            padding: 0;
            font-size: 1.2rem;
            color: #333;
        }

        .cart-item-info p {
            margin: 5px 0;
            color: #666;
        }

        .cart-item-info span {
            font-size: 1rem;
            color: #000;
            font-weight: bold;
        }

        .cart-controls {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .cart-controls button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background 0.3s;
        }

        .cart-controls button:hover {
            background: #0056b3;
        }

        .checkout-btn {
            background: #28a745;
            color: white;
            margin-top: 20px;
            display: block;
            text-align: center;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .checkout-btn:hover {
            background: #218838;
        }

        .total-price {
            text-align: right;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="logo"><a href="{{route('home')}}"><img src="assets/icons/bike.png" alt="logo"></a></div>
        <nav class="nav">
            <a href="{{route('webshop')}}" class="nav-btn shop-link"><span>Webshop</span></a>
            <a href="#" class="nav-btn">Reviews</a>
            <a href="#" class="nav-btn">Contact</a>
        </nav>
        <div class="user-actions">
            <a href="{{{route('login')}}}" class="login-btn">Inloggen</a>
            <a href="{{route('register')}}" class="registreer-btn">Registreren</a>
            <a href="{{route('winkelmand')}}" class="cart-btn"><img src="assets/icons/shopping-bag.png" alt="shopping cart"></a>
        </div>
    </div>
</header>
<div class="body-container" >
    <h1>Winkelmand</h1>

    @php
        $cart = session()->get('winkelmand', []);
        $total = 0;
    @endphp

    @if(count($cart) > 0)
        @foreach($cart as $item)
            @php
                $itemTotal = $item['prijs'] * $item['hoeveelheid'];
                $total += $itemTotal;
            @endphp
            <div class="cart-item">
                <img src="{{ $item['imageUrl'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $item['naam'] }}">
                <div class="cart-item-info">
                    <h3>{{ $item['naam'] }}</h3>
                    <p>Type: {{ ucfirst($item['type']) }}</p>
                    <p>Hoeveelheid: {{ $item['hoeveelheid'] }}</p>
                    <p>Prijs per stuk: €{{ number_format($item['prijs'], 2, ',', '.') }}</p>
                    <span>Totaal: €{{ number_format($itemTotal, 2, ',', '.') }}</span>
                </div>
                <div class="cart-controls">
                    <button class="remove-item-btn" data-id="{{ $item['id'] }}" data-type="{{ $item['type'] }}">Verwijder</button>
                </div>
            </div>
        @endforeach

        {{-- Display Total Price --}}
        <div class="total-price">
            Totale Prijs: €{{ number_format($total, 2, ',', '.') }}
        </div>

        {{-- Checkout Button --}}
        <button id="checkout-btn" class="checkout-btn">Afrekenen</button>
    @else
        <p>Je winkelmand is leeg.</p>
    @endif
</div>

<script>
    $(document).ready(function () {
        // Checkout button
        $('#checkout-btn').click(function () {
            $.ajax({
                url: '/winkelmand/checkout',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Winkelmand is leeg.');
                    }
                }
            });
        });

        // Remove item button
        $('.remove-item-btn').click(function () {
            const id = $(this).data('id');
            const type = $(this).data('type');

            $.ajax({
                url: '/winkelmand/remove',
                type: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { id: id, type: type },
                success: function (response) {
                    alert('Item verwijderd!');
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>
