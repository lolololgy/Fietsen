@vite(['resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<form id="bikeForm">
    <label for="Naam">Naam:</label>
    <input type="text" id="Naam" name="Naam" required><br>

    <label for="Prijs">Prijs:</label>
    <input type="text" id="Prijs" name="Prijs" required><br>

    <label for="Voorraad">Voorraad:</label>
    <input type="text" id="Voorraad" name="Voorraad" required><br>

    <label for="Productcategorieën">Productcategorieën:</label>
    <input type="text" id="Productcategorieën" name="Productcategorieën" required><br>

    <label for="Merk">Merk:</label>
    <input type="text" id="Merk" name="Merk" required><br>

    <label for="SN">Serienummer (SN):</label>
    <input type="text" id="SN" name="SN" required><br>

    <label for="FrameMateriaal">Frame Materiaal:</label>
    <input type="text" id="FrameMateriaal" name="FrameMateriaal" required><br>

    <label for="BatterijTypen">Batterij Typen:</label>
    <input type="text" id="BatterijTypen" name="BatterijTypen" required><br>

    <label for="WielMaat">Wiel Maat:</label>
    <input type="text" id="WielMaat" name="WielMaat" required><br>

    <label for="Versnelling">Versnelling:</label>
    <input type="text" id="Versnelling" name="Versnelling" required><br>

    <label for="KleurVarianten">Kleur Varianten:</label>
    <input type="text" id="KleurVarianten" name="KleurVarianten" required><br>

    <label for="GarantieInMaand">Garantie In Maanden:</label>
    <input type="text" id="GarantieInMaand" name="GarantieInMaand" required><br>

    <button type="submit">Fiets Aanmaken</button>
</form>
<script>
    document.getElementById('bikeForm').addEventListener('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route('store-bike') }}',
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
                KleurVarianten: $('#KleurVarianten').val(),
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
