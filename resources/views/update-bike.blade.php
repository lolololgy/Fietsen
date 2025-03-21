@vite(['resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<form id="bikeForm">
    <label for="Naam">Naam:</label>
    <input type="text" id="Naam" name="Naam" required value="{{ $fiets->Naam }}"><br>

    <label for="Prijs">Prijs:</label>
    <input type="text" id="Prijs" name="Prijs" required value="{{ $fiets->Prijs }}"><br>

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
</script>
