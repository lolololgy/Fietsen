@vite(['resources/js/app.js'])
<label for="Naam">Naam:</label>
<input type="text" id="Naam" name="Naam"><br>

<label for="Prijs">Prijs:</label>
<input type="text" id="Prijs" name="Prijs"><br>



{{--<label for="Voorraad">Voorraad:</label>--}}
{{--<input type="text" id="Voorraad" name="Voorraad"><br>--}}

{{--<label for="Productcategorieën">Productcategorieën:</label>--}}
{{--<input type="text" id="Productcategorieën" name="Productcategorieën"><br>--}}

{{--<label for="Merk">Merk:</label>--}}
{{--<input type="text" id="Merk" name="Merk"><br>--}}

{{--<label for="SN">Serienummer (SN):</label>--}}
{{--<input type="text" id="SN" name="SN"><br>--}}

{{--<label for="FrameMateriaal">Frame Materiaal:</label>--}}
{{--<input type="text" id="FrameMateriaal" name="FrameMateriaal"><br>--}}

{{--<label for="BatterijTypen">Batterij Typen:</label>--}}
{{--<input type="text" id="BatterijTypen" name="BatterijTypen"><br>--}}

{{--<label for="WielMaat">Wiel Maat:</label>--}}
{{--<input type="text" id="WielMaat" name="WielMaat"><br>--}}

{{--<label for="Versnelling">Versnelling:</label>--}}
{{--<input type="text" id="Versnelling" name="Versnelling"><br>--}}

{{--<label for="KleurVarianten">Kleur Varianten:</label>--}}
{{--<input type="text" id="KleurVarianten" name="KleurVarianten"><br>--}}

{{--<label for="GarantieInMaand">Garantie In Maanden:</label>--}}
{{--<input type="text" id="GarantieInMaand" name="GarantieInMaand"><br>--}}

<button type="submit">Fiets Aanmaken</button>

<script>
    document.querySelector('button').addEventListener('click', function() {
        var data = {
            Naam: $('#Naam').value,
            Prijs: $('#Prijs').value,
            // Voorraad: document.querySelector('#Voorraad').value,
            // Productcategorieën: document.querySelector('#Productcategorieën').value,
            // Merk: document.querySelector('#Merk').value,
            // SN: document.querySelector('#SN').value,
            // FrameMateriaal: document.querySelector('#FrameMateriaal').value,
            // BatterijTypen: document.querySelector('#BatterijTypen').value,
            // WielMaat: document.querySelector('#WielMaat').value,
            // Versnelling: document.querySelector('#Versnelling').value,
            // KleurVarianten: document.querySelector('#KleurVarianten').value,
            // GarantieInMaand: document.querySelector('#GarantieInMaand').value,
        };

        $.ajax({
            url: '{{ route('store-bike') }}',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log('Success:', response);
                toastr.success('Fiets is aangemaakt!');
            },
            error: function(error) {
                console.error('Error:', error);
                toastr.error('Er is iets fout gegaan bij het aanmaken van de fiets: ' + error.responseJSON.message);
            }
        });
    });
</script>
