@vite(['resources/js/app.js'])
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    form {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    button {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        width: 100%;
        margin-top: 15px;
        transition: background 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    #imagePreview {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 10px;
        justify-content: center;
    }

    .image-wrapper {
        position: relative;
        border: 1px solid #ddd;
        padding: 5px;
        border-radius: 5px;
        background: white;
    }

    .image-preview {
        max-width: 80px;
        max-height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }

    .remove-image {
        position: absolute;
        top: -5px;
        left: -5px; /* 👈 change from right: 5px */
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 50%;
        width: 20px; /* 👈 give it more size for visibility */
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .terug-div {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 1000;
    }

    .action-link {
        background-color: blue;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
<div class="terug-div">
    <a href="/overview-bike" class="action-link">Terug naar overzicht</a>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<form id="bikeForm">
    <label for="Naam">Naam:</label>
    <input type="text" id="Naam" name="Naam" required value="{{ $fiets->Naam }}"><br>

    <label for="Prijs">Prijs:</label>
    <input type="text" id="Prijs" name="Prijs" required value="{{ $fiets->Prijs }}"><br>

    <label for="Beschrijving">Beschrijving:</label>
    <input type="text" id="Beschrijving" name="Beschrijving" required value="{{ $fiets->beschrijving }}"><br>

    <label for="Voorraad">Voorraad:</label>
    <input type="text" id="Voorraad" name="Voorraad" required value="{{ $fiets->Voorraad }}"><br>

    <label for="Productcategorieën">Productcategorieën:</label>
    <input type="text" id="Productcategorieën" name="Productcategorieën" required value="{{ $fiets->Productcategorieën }}"><br>

    <label for="Merk">Merk:</label>
    <input type="text" id="Merk" name="Merk" required value="{{ $fiets->Merk }}"><br>

    <label for="SN">Serienummer (SN):</label>
    <input type="text" id="SN" name="SN" required value="{{ $fiets->SN }}"><br>

    <label for="FrameMateriaal">Frame Materiaal:</label>
    <input type="text" id="FrameMateriaal" name="FrameMateriaal" required value="{{ $fiets->FrameMateriaal }}"><br>

    <label for="BatterijTypen">Batterij Typen:</label>
    <input type="text" id="BatterijTypen" name="BatterijTypen" required value="{{ $fiets->BatterijTypen }}"><br>

    <label for="WielMaat">Wiel Maat:</label>
    <input type="text" id="WielMaat" name="WielMaat" required value="{{ $fiets->WielMaat }}"><br>

    <label for="Versnelling">Versnelling:</label>
    <input type="text" id="Versnelling" name="Versnelling" required value="{{ $fiets->Versnelling }}"><br>

    <label for="KleurVarianten">Kleur Varianten:</label>
    <input type="text" id="KleurVarianten" name="KleurVarianten" required value="{{ $fiets->KleurVarianten }}"><br>

    <label for="GarantieInMaand">Garantie In Maanden:</label>
    <input type="text" id="GarantieInMaand" name="GarantieInMaand" required value="{{ $fiets->GarantieInMaand }}"><br>

    <div id="imageFields">
        <label for="images">Afbeeldingen:</label>
        <input type="file" id="images" name="images[]" multiple required><br>
    </div>

    <div id="imagePreview">
        @foreach ($images as $image)
            <div class="image-wrapper">
                <img src="{{ route('image.fiets', ['filename' => basename($fiets->images->first()->Src)]) }}" class="image-preview">
                <button type="button" class="remove-image" onclick="deleteImage({{ $image->id }}, '{{ $image->Src }}')">X</button>
            </div>
        @endforeach
    </div>

    <button type="submit">Fiets Bijwerken</button>
</form>
<script>
    document.getElementById('bikeForm').addEventListener('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/update-bike/{{ $fiets->FietsId }}',
            type: 'POST',
            data: {
                Naam: $('#Naam').val(),
                Prijs: $('#Prijs').val(),
                Voorraad: $('#Voorraad').val(),
                Beschrijving: $('#Beschrijving').val(),
                Productcategorieën: $('#Productcategorieën').val(),
                Merk: $('#Merk').val(),
                SN: $('#SN').val(),
                FrameMateriaal: $('#FrameMateriaal').val(),
                BatterijTypen: $('#BatterijTypen').val(),
                WielMaat: $('#WielMaat').val(),
                Versnelling: $('#Versnelling').val(),
                GarantieInMaand: $('#GarantieInMaand').val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log('Success:', response);
                toastr.success(response.message);
            },
            error: function (error) {
                console.error('Error:', error);
                toastr.error(error.responseJSON.message);
            }
        });

    });
    function deleteImage(imageId, imageSrc) {
        if (confirm('Weet je zeker dat je deze afbeelding wilt verwijderen?')) {
            fetch(`/delete-bike-image/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
        }
    }
</script>
