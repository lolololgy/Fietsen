<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Bevestig het wachtwoord" required><br>
    <button type="submit">Register</button>
    <br>
    <a href="{{ route('login') }}">Login</a>
</form>
