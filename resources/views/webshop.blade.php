<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>



<body>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
{{--        <img src="https://1886531642.rsc.cdn77.org/content/images/thumbs/0016986_esprit-heren-black-matt.png"--}}
{{--             alt="Card 1 Image" class="w-full h-64 object-contain">--}}
        <img src="{{ route('image.show', ['filename' => 'card1.png']) }}"
             alt="Card 1 Image"
             class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Gazelle Esprit Heren</h2>
            <p class="text-gray-700 mb-4">De Gazelle Esprit Herenfiets is een robuuste en moderne stadsfiets,
                ontworpen voor dagelijks gebruik. Deze fiets staat bekend om zijn stevige frame, onderhoudsarme
                onderdelen en comfortabele rijervaring. De Esprit is
                ideaal voor zowel korte ritjes als langere afstanden in de stad.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€749,-</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
        <img src="https://riesewijk.nl/wp-content/uploads/2024/01/gazelle-ultimate-c380-hmb-belt-heren-2023-582543.png"
             alt="Card 2 Image" class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Gazelle Ultimate C380 HMB Belt Heren</h2>
            <p class="text-gray-700 mb-4">De Gazelle Ultimate C380 HMB Belt Heren is een luxe en comfortabele
                e-bike met een krachtige Bosch-middenmotor en een traploze Enviolo-versnellingsnaaf. Dankzij de
                onderhoudsarme Gates CDX Belt Drive (riemaandrijving) fiets je soepel en stil, zonder
                kettingsmeer of slijtage.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€4.499,00</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
        <img src="https://www.dekkerstweewielers.nl/media/vendit/images/0873AA81-7343-4BA0-9A79-F827F5E8E8A2_950939-0_405307.png"
             alt="Card 3 Image" class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Gazelle Esprit HFB</h2>
            <p class="text-gray-700 mb-4">Met de Esprit zit jij de komende jaren goed. De geïntegreerde koplamp
                is praktisch onverwoestbaar en met de slimme verlichting zie jij alles en ziet iedereen jou! De
                brede banden maken je rit naar school of werk extra comfortabel. En met de krachtige motor ben
                je er nog sneller. Je maakt de Esprit helemaal compleet met een voordrager.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€1.659,00</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
        <img src="https://eenbroekhuisfiets.nl/media/catalog/product/cache/71ca30495b81c8c0142b984363efa62f/G/a/Gazelle_esprit_t3_dames_g50_zwart_001_5978.png"
             alt="Card 4 Image" class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Gazelle Orange C7+ Dames 2025</h2>
            <p class="text-gray-700 mb-4">De Gazelle Orange C7+ Dames is een comfortabele stadsfiets met 7
                versnellingen. De fiets biedt een ontspannen zithouding en is uitgerust met praktische functies
                zoals een sterke bagagedrager, betrouwbare verlichting en duurzame componenten.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€949,00</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 5 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
        <img src="https://www.rullensfietsen.nl/media/bb/5f/77/1685009788/Gazelle-Chamonix-T10-HMS-dames-grey-1.jpg" alt="Card 5 Image"
             class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Gazelle Chamonix T10</h2>
            <p class="text-gray-700 mb-4">De Gazelle Chamonix T10 is een veelzijdige fiets voor dagelijks gebruik en
                langere ritten. Met 10 versnellingen en een lichtgewicht aluminium frame biedt deze fiets comfort en
                betrouwbaarheid voor verschillende terreinen en afstanden.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€999,00</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 6 -->
    <div class="shadow-md rounded-md overflow-hidden transform transition duration-500 hover:scale-105">
        <img src="https://cloudinary.pondigital.solutions/pon-digital-solutions/image/upload/q_auto,f_auto/dmp.pon.bike/1280_YGgEmjgXFya63Q1b.png"
             alt="Card 6 Image" class="w-full h-64 object-contain">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-2">Miss Grace</h2>
            <p class="text-gray-700 mb-4">Op de hippe Miss Grace mag je gezien worden. Naast het fraaie design
                gooit zij nóg hogere ogen op het vlak van comfort en gebruiksgemak. Op de voordrager neem je al
                je bagage gemakkelijk mee. De dubbele pootstandaard en stuurblokkering maken het bepakken
                eenvoudig. De fiets is bovenal stevig gebouwd en kan dus tegen stootje.</p>
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-900">€949,00</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('bekijk') }}">
                        <button class="bg-gray-900 text-white px-8 py-2 rounded gap-3 hover:bg:blue-900">Bekijk</button>
                    </a>
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-900">In winkelwagen</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-8 mt-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between">

            <div class="mb-6 md:mb-0">
                <div class="flex items-center mb-4">

                    <div class="w-12 h-12 bg-gray-200 rounded-full mr-4">
{{--                    <img src="{{ route("/image/Logo.png") }}" alt="Logo">--}}

                    </div>
                    <h3 class="text-xl font-bold">Gazelle</h3>
                </div>

                <div class="flex flex-col space-y-2">
                    <a href="#" class="hover:text-gray-300">Over ons</a>
                    <a href="#" class="hover:text-gray-300">Contact</a>
                    <a href="#" class="hover:text-gray-300">Fietsen</a>
                    <a href="#" class="hover:text-gray-300">Accessoires</a>
                </div>
            </div>


            <div class="md:flex-grow"></div>


            <div class="flex flex-col md:items-end">

                <div class="mb-6">
                    <h4 class="font-semibold mb-2">Blijf op de hoogte</h4>
                    <div class="flex">
                        <input type="email" placeholder="E-mailadres"
                               class="px-4 py-2 text-black rounded-l focus:outline-none" />
                        <button class="bg-red-500 hover:bg-red-900 px-4 py-2 rounded-r">Aanmelden</button>
                    </div>
                </div>


                <div class="flex space-x-4 text-sm text-gray-400">
                    <a href="#" class="hover:text-white">Algemene voorwaarden</a>
                    <a href="#" class="hover:text-white">Privacybeleid</a>
                    <a href="#" class="hover:text-white">Cookies</a>
                </div>
            </div>
        </div>


        <div class="mt-8 pt-4 border-t border-gray-700 text-sm text-gray-400">
            <p>&copy; 2025 Fietsen. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
</body>

</html>
