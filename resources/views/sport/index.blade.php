<x-layout :titre="$titre">
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
                    <td><button class="sport-but">
                            <a href="{{route('sports.show', ['sport'=>$sport->id, 'action' => 'show'])}}">🧾</a>
                        </button></td>
                    <td><button class="sport-but">
                            <a href="{{route('sports.edit', ['sport'=>$sport->id])}}">📝</a>
                        </button></td>
                    <td><button class="sport-but">
                            <a href="{{route('sports.show', ['sport'=>$sport->id, 'action' => 'delete'])}}">❌</a>
                        </button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun sport pour le moment</p>
    @endif
</x-layout>
