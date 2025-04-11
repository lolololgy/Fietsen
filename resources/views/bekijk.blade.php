<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gazelle Ultimate C380 - Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoofdpagina.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
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
<div class="container mx-auto px-4 py-8">
    <div class="grid md:grid-cols-2 gap-8 mt-32">
        <!-- Product Image Gallery -->
        <div>
            <div class="bg-white rounded-lg shadow-lg p-6 ">
                <img src="https://riesewijk.nl/wp-content/uploads/2024/01/gazelle-ultimate-c380-hmb-belt-heren-2023-582543.png"
                     alt="Gazelle Ultimate C380 HMB Belt Heren" class="w-full h-96 object-contain rounded-lg">
            </div>
            <div class="flex space-x-4 mt-4">
                <img src="https://riesewijk.nl/wp-content/uploads/2024/01/gazelle-ultimate-c380-hmb-belt-heren-2023-582543.png"
                     alt="Thumbnail 1" class="w-20 h-20 object-contain rounded-lg cursor-pointer hover:opacity-75">

            </div>
        </div>

        <!-- Product Information -->
        <div>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Gazelle Ultimate C380 HMB Belt Heren</h1>

                <div class="flex items-center mb-4">
                    <span class="text-2xl font-bold text-gray-900 mr-4">€4.499,00</span>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                        </svg>
                        <span class="ml-1 text-gray-600">(10 Reviews)</span>
                    </div>
                </div>

                <p class="text-gray-700 mb-6">De Gazelle Ultimate C380 HMB Belt Heren is een luxe en comfortabele
                    e-bike met een krachtige Bosch-middenmotor en een traploze Enviolo-versnellingsnaaf. Dankzij de
                    onderhoudsarme Gates CDX Belt Drive (riemaandrijving) fiets je soepel en stil, zonder
                    kettingsmeer of slijtage.</p>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Specificaties:</h3>
                    <ul class="list-disc list-inside text-gray-700">
                        <li>Bosch middenmotor</li>
                        <li>Traploze Enviolo-versnellingsnaaf</li>
                        <li>Gates CDX Belt Drive</li>
                        <li>Aluminium frame</li>
                        <li>Hydraulische schijfremmen</li>
                    </ul>
                </div>

                <div class="flex space-x-4">
                    <select class="w-24 px-3 py-2 border rounded-md">
                        <option>Maat M</option>
                        <option>Maat L</option>
                    </select>

                    <div class="flex items-center">
                        <button class="bg-gray-200 px-3 py-2 rounded-l-md">-</button>
                        <span class="px-4 py-2 border-t border-b">1</span>
                        <button class="bg-gray-200 px-3 py-2 rounded-r-md">+</button>
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <button
                        class="bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300 flex-grow">
                        In winkelwagen
                    </button>
                    <button
                        class="bg-gray-900 text-white px-6 py-3 rounded-md hover:bg-gray-800 transition duration-300">
                        Direct kopen
                    </button>
                </div>
            </div>

            <!-- Product Features -->
            <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                <h3 class="text-xl font-semibold mb-4">Product Kenmerken</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-medium mb-2">Motor</h4>
                        <p class="text-gray-600">Bosch Performance Line CX</p>
                    </div>
                    <div>
                        <h4 class="font-medium mb-2">Accu</h4>
                        <p class="text-gray-600">625 Wh PowerTube</p>
                    </div>
                    <div>
                        <h4 class="font-medium mb-2">Versnellingen</h4>
                        <p class="text-gray-600">Enviolo Automatiq</p>
                    </div>
                    <div>
                        <h4 class="font-medium mb-2">Frame</h4>
                        <p class="text-gray-600">Aluminium</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
