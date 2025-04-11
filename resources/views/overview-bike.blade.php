@vite(['resources/js/app.js'])

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 20px;
    }

    a.action-link {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        margin-bottom: 20px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    a.action-link:hover {
        background-color: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 14px 18px;
        text-align: left;
        border-bottom: 1px solid #e6e6e6;
    }

    th {
        background-color: #007bff;
        color: white;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f7ff;
    }

    .action-link, .delete-button {
        font-size: 13px;
        border-radius: 5px;
        padding: 6px 12px;
        margin: 0 2px;
        transition: all 0.2s ease;
    }

    .action-link {
        background-color: #17a2b8;
        color: white;
    }

    .action-link:hover {
        background-color: #138496;
    }

    .delete-button {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .delete-button:hover {
        background-color: #c82333;
    }

    form.delete-bike-form {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
    }

    @media (max-width: 768px) {
        th, td {
            padding: 10px 12px;
            font-size: 14px;
        }

        table {
            font-size: 13px;
        }

        form.delete-bike-form {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<a href="/create-bike" class="action-link" style="margin: 1em">Maak een fiets</a>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Voorraad</th>
        <th>Productcategorieën</th>
        <th>Merk</th>
        <th>SN</th>
        <th>Frame Materiaal</th>
        <th>Batterij Typen</th>
        <th>Wiel Maat</th>
        <th>Versnelling</th>
        <th>Kleur Varianten</th>
        <th>Garantie In Maanden</th>
        <th>Afbeelding</th>
        <th>Acties</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fietsen as $fiets)
        <tr>
            <td>{{ $fiets->FietsId }}</td>
            <td>{{ $fiets->Naam }}</td>
            <td>{{ $fiets->Prijs }}</td>
            <td>{{ $fiets->Voorraad }}</td>
            <td>{{ $fiets->Productcategorieën }}</td>
            <td>{{ $fiets->Merk }}</td>
            <td>{{ $fiets->SN }}</td>
            <td>{{ $fiets->FrameMateriaal }}</td>
            <td>{{ $fiets->BatterijTypen }}</td>
            <td>{{ $fiets->WielMaat }}</td>
            <td>{{ $fiets->Versnelling }}</td>
            <td>{{ $fiets->KleurVarianten }}</td>
            <td>{{ $fiets->GarantieInMaanden }}</td>
            <td>
                @if($fiets->images->isNotEmpty())
                    <img src="{{ route('image.fiets', ['filename' => basename($fiets->images->first()->Src)]) }}" alt="Bike Image" style="width: 250px; height: auto;">
                @else
                    Geen afbeelding
                @endif
            </td>
            <td>
                <form class="delete-bike-form" data-id="{{ $fiets->FietsId }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a href="/update-bike/{{ $fiets->FietsId }}" class="action-link">Bijwerken</a>
                    <button type="button" class="delete-button delete-bike-button">Verwijderen</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        $(document).on('click', '.delete-bike-button', function () {
            const form = $(this).closest('.delete-bike-form');
            const bikeId = form.data('id');
            const token = form.find('input[name="_token"]').val();

            if (confirm('Weet je zeker dat je deze fiets wilt verwijderen?')) {
                $.ajax({
                    url: `/delete-bike/${bikeId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function () {
                        toastr.success('Fiets succesvol verwijderd.');
                        form.closest('tr').remove();
                    },
                    error: function () {
                        toastr.error('Er is een fout opgetreden bij het verwijderen van de fiets.');
                    }
                });
            }
        });
    });
</script>
