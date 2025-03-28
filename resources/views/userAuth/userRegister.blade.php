<form method="POST" action="{{ route('userRegister') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Bevestig het wachtwoord" required><br>
    <button type="submit">Register</button>
    <br>
<<<<<<< HEAD:resources/views/userAuth/userRegister.blade.php
    <a href="{{ route('userLogin') }}">Login</a>
=======
    <a href="{{ route('login') }}">Inloggen</a>
>>>>>>> refs/remotes/origin/Brian:resources/views/auth/register.blade.php
</form>
