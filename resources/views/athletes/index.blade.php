<x-layout titre="La liste des athlèthes">
    @if(!empty($athletes))
        <table>
            <caption>La liste des athlèthes</caption>
            <tr>
                <th>Nom</th>
                <th>Nationalité</th>
                <th>Age</th>
            </tr>
            @foreach($athletes as $athlete)
                <tr>
                    <td>{{$athlete->nom}}</td>
                    <td>{{$athlete->nationalite}}</td>
                    <td>{{$athlete->age}}</td>
                    <td>
                        <a href="{{route('athletes.show', [$athlete->id])}}">
                            <i class="fa-regular fa-address-card"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h3>Aucun atlethe</h3>
    @endif
    <x-message-info titre="Info" :message="$message"></x-message-info>
</x-layout>
