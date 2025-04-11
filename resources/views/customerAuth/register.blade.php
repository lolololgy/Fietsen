@vite(['resources/js/app.js'])

<form method="POST" action="{{ route('register') }}" class="register-form">
    @csrf
    <div class="form-group">
        <input type="text" name="name" placeholder="Name" class="input-field" required><br>
    </div>
    <div class="form-group">
        <input type="email" name="email" placeholder="Email" class="input-field" required><br>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="input-field" required><br>
    </div>
    <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Bevestig het wachtwoord" class="input-field" required><br>
    </div>
    <div class="form-group">
        <input type="text" name="telefoon" placeholder="Telefoon" class="input-field"><br>
    </div>
    <div class="form-group">
        <input type="text" name="adres" placeholder="Adres" class="input-field"><br>
    </div>
    <div class="form-group">
        <input type="text" name="postcode" placeholder="Postcode" class="input-field"><br>
    </div>
    <button type="submit" class="submit-btn">Register</button>
    <br>
    <a href="{{ route('login') }}" class="login-link">Already have an account? Login here</a>
    <a href="{{ route('home') }}" class="register-link">Go home</a>
</form>

<script>
    window.onload = function() {
        @if ($errors->has('password'))
        toastr.error('{{ $errors->first('password') }}');
        @endif
        @if ($errors->has('password_confirmation'))
        toastr.error('{{ $errors->first('password_confirmation') }}');
        @endif
    };
</script>
<style>
    /* Styling the form container */
    .register-form {
        width: 100%;
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f4f4f9;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .register-form .form-group {
        margin-bottom: 15px;
    }

    .input-field {
        width: 100%;
        padding: 12px;
        font-size: 1em;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        margin: 10px 0;
    }

    .input-field:focus {
        border-color: #66afe9;
        outline: none;
    }

    /* Styling the submit button */
    .submit-btn {
        width: 100%;
        padding: 14px;
        font-size: 1.1em;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }

    /* Styling the login link */
    .login-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        text-decoration: none;
        font-size: 1.1em;
        color: #007bff;
    }

    .login-link:hover {
        text-decoration: underline;
    }

    /* Optional: Styling for errors from toastr (just in case!) */
    .toastr-error {
        background-color: #d9534f !important;
        color: white !important;
    }

</style>
