<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Bevestig het wachtwoord" required><br>
    <input type="text" name="telefoon" placeholder="Telefoon"><br>
    <input type="text" name="adres" placeholder="Adres"><br>
    <input type="text" name="postcode" placeholder="Postcode">
    <button type="submit">Register</button>
    <br>
    <a href="{{ route('login') }}">Login</a>
</form>
