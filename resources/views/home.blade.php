<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoofdpagina</title>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoofdpagina.css') }}">

    <!-- Script -->

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <script src="app.js" async></script>
    <script src="slider.js" async></script>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="#"><img src="assets/icons/bike.png" alt="logo"></a></div>
            <nav class="nav">
                <a href="#" class="nav-btn shop-link"><span>E-Bikes</span></a>
                <a href="#" class="nav-btn">Reviews</a>
                <a href="#" class="nav-btn">Contact</a>
            </nav>
            <div class="user-actions">
                <a href="#" class="login-btn">Inloggen</a>
                <a href="#" class="registreer-btn">Registreren</a>
                <a href="#" class="cart-btn"><img src="assets/icons/shopping-bag.png" alt="shopping cart"></a>
            </div>
        </div>
    </header>

    <div class="hero-slider">
        <div class="slider-wrapper">
            <!-- Slide 1 -->
            <div class="slide active" id="slide-1"
                style="background-image: url('assets/images/viktor-bystrov-Gi0OMNguFaw-unsplash.jpg');">
                <div class="gradient"></div>
                <div class="container">
                    <div class="slider-content">
                        <h1>Ga voor snelheid en prestaties!</h1>
                        <p>Ontdek onze race- en wielrenfietsen voor de ultieme rit. Licht, snel en perfect voor elke
                            uitdaging!</p>
                        <a href="#" class="hyperlink">
                            <span>Bekijk racefietsen</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="slide" id="slide-2"
                style="background-image: url('assets/images/photo-1610898764137-d44d5aa98af9.avif');">
                <div class="gradient"></div>
                <div class="container">
                    <div class="slider-content">
                        <h1>Fietsplezier voor het hele gezin!</h1>
                        <p>Van stadsfietsen tot kinderfietsen – comfortabel, betrouwbaar en klaar voor elk avontuur.</p>
                        <a href="#" class="hyperlink">
                            <span>Bekijk casual fietsen</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="slide" id="slide-3"
                style="background-image: url('assets/images/pexels-adrien-olichon-1257089-2817452.jpg');">
                <div class="gradient"></div>
                <div class="container">
                    <div class="slider-content">
                        <h1>Jouw perfecte fiets vind je hier!</h1>
                        <p>Ontdek ons volledige assortiment – van sportief tot casual, altijd de juiste fiets voor jou.
                        </p>
                        <a href="#" class="hyperlink">
                            <span>Shop alle fietsen</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-nav">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="best-sellers">
            <h2>Meest Verkochte Fietsen</h2>
            <div class="card-container">
                @foreach($fietsen as $fiets)
                <div class="card">
                    <img src="{{ route('image.fiets', ['filename' => basename($fiets->images->first()->Src)]) }}" alt="card img">
                    <section>
                        <p class="beschrijving-fiets">{{ $fiets->Beschrijving }}</p>
                        <a href="#" class="hyperlink-fiets">Hyperlink</a>
                    </section>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="cta-video">
        <div class="gradient"></div>
        <video src="assets/images/GoPro Max： The Wildest Mountain Bike Shot I have Captured!.mp4
        " autoplay></video>
        <div class="hyperlink-video">
            <a href="#">Hyperlink</a>
        </div>
    </section>

    <section class="reviews">
        <a href="#" class="reviewpage-hyperlink">Bekijk alle reviews</a>
        <div class="review-card">
            <div class="sterren">★★★★★</div>
            <div class="gebruiker">
                <img src="profile.jpg" alt="Profielfoto" class="profiel-foto">
                <p class="gebruikersnaam">Gebruikersnaam</p>
            </div>
            <p class="review-text">Dit is een geweldige fiets!</p>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-links">
            <p class="copyright">&copy; 2024 Fiets Webshop</p>
            <a href="#">Privacybeleid</a>
            <a href="#">Cookies</a>
        </div>
        <form class="newsletter-form">
            <input type="email" placeholder="Jouw e-mailadres" class="newsletter-input">
            <button type="submit" class="newsletter-btn">Aanmelden</button>
        </form>
    </footer>
</body>

</html>
