<div class="account-container">
    <h1 class="account-header">Welkom, {{ $customer->name }}!</h1>
    <div class="account-details">
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Telefoon:</strong> {{ $customer->Telefoon }}</p>
        <p><strong>Adres:</strong> {{ $customer->Adres }}</p>
        <p><strong>Postcode:</strong> {{ $customer->Postcode }}</p>
    </div>
    <div class="account-actions">
        <form method="POST" action="/logout">
            @csrf
            <button class="logout-btn">Uitloggen</button>
        </form>
        <a href="/overview-bike" class="manage-shop-btn">Beheer webshop</a>
    </div>
</div>
<style>
    .account-container {
        width: 80%;
        margin: 0 auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .account-header {
        font-size: 2em;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .account-details {
        font-size: 1.1em;
        color: #555;
    }

    .account-details p {
        margin: 10px 0;
    }

    .account-details strong {
        color: #333;
    }

    .account-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    .logout-btn, .manage-shop-btn {
        padding: 10px 20px;
        font-size: 1.1em;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        border: none;
    }

    .logout-btn {
        background-color: #d9534f;
        color: white;
    }

    .logout-btn:hover {
        background-color: #c9302c;
    }

    .manage-shop-btn {
        background-color: #5bc0de;
        color: white;
    }

    .manage-shop-btn:hover {
        background-color: #31b0d5;
    }

</style>
