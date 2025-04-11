@vite(['resources/js/app.js'])
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
    table {
        width: 98%;
        margin: 20px;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e1f5e1;
    }
    td a {
        color: #007BFF;
        text-decoration: none;
        margin-right: 10px;
    }
    td a:hover {
        text-decoration: underline;
    }
</style>
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
            <td>{{ $fiets->GarantieInMaand }}</td>
            <td>
                {{-- <a href="/update-bike/{{ $fiets->FietsId }}">Bijwerken</a>
                     <a href="/delete-bike/{{ $fiets->FietsId }}">Verwijderen</a> --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
