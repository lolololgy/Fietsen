<form method="POST" action="{{ route('userLogin') }}">
    @csrf
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
    <br>
    <a href="{{ route('userRegister') }}">Register</a>
</form>

