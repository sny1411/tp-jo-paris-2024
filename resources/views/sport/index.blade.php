<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des sports</title>
</head>
<body>
    @if(!empty($sports))
        <table>
            <caption>Liste des sports</caption>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de disciplines</th>
                    <th>Nombre d'épreuves</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sports as $sport)
                    <tr>
                        <td>{{ $sport->nom }}</td>
                        <td>{{ $sport->nb_disciplines }}</td>
                        <td>{{ $sport->nb_epreuves }}</td>
                        <td>{{ $sport->date_debut->format('d-m-Y') }}</td>
                        <td>{{ $sport->date_fin->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun sport pour le moment</p>
    @endif
</body>
</html>
