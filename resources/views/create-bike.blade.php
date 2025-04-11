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
        right: -5px;
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 50%;
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
    <input type="text" id="Naam" name="Naam" required><br>

    <label for="Prijs">Prijs:</label>
    <input type="text" id="Prijs" name="Prijs" required><br>

    <label for="Beschrijving">Beschrijving:</label>
    <input type="text" id="Beschrijving" name="Beschrijving" required><br>

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

    <div id="imageFields">
        <label for="images">Afbeeldingen:</label>
        <input type="file" id="images" name="images[]" multiple required><br>
    </div>

    <div id="imagePreview"></div>

    <button type="submit">Fiets Aanmaken</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
    // Image upload and display
    document.getElementById('images').addEventListener('change', function (e) {
        let files = e.target.files;
        let previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; // Clear any previous images

        // Loop through the files and create image previews
        Array.from(files).forEach(function (file, index) {
            let reader = new FileReader();
            reader.onload = function (event) {
                let imgElement = document.createElement('img');
                imgElement.src = event.target.result;
                imgElement.classList.add('image-preview');
                imgElement.setAttribute('data-index', index);

                let removeButton = document.createElement('button');
                removeButton.innerText = 'X';
                removeButton.classList.add('remove-image');
                removeButton.onclick = function() {
                    removeImage(index);
                };

                let imageWrapper = document.createElement('div');
                imageWrapper.classList.add('image-wrapper');
                imageWrapper.appendChild(imgElement);
                imageWrapper.appendChild(removeButton);
                previewContainer.appendChild(imageWrapper);
            };
            reader.readAsDataURL(file);
        });

        // Initialize sortable for images
        new Sortable(previewContainer, {
            animation: 150,
            onEnd: function(evt) {
                console.log('Images reordered:', evt.newIndex);
            }
        });
    });

    // Remove image from preview
    function removeImage(index) {
        let images = document.getElementById('images').files;
        let newFiles = Array.from(images).filter((_, i) => i !== index);
        let dataTransfer = new DataTransfer();
        newFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById('images').files = dataTransfer.files;
        document.querySelectorAll('.image-wrapper')[index].remove();
    }

    // Form submission handling
    document.getElementById('bikeForm').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '/create-bike',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
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

<style>
    #imagePreview {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .image-wrapper {
        position: relative;
    }

    .image-preview {
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
    }

    .remove-image {
        position: absolute;
        top: -11px;
        right: 6px;
        background-color: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        padding: 2px;
        cursor: pointer;
        width: 20px;
    }
</style>
