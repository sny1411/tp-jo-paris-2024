<x-layout titre="Affiche un sport">
    <h1>{{$titre}}</h1>
    <div class="container show">
        <div> Sport #{{$sport->id}}</div>
        <div>Nom : {{$sport->nom}}</div>
        <div>Année d'ajout : {{$sport->annee_ajout}}</div>
        <div>Nombre de disciplines : {{$sport->nb_disciplines}}</div>
        <div>Nombre d'épreuves : {{$sport->nb_epreuves}}</div>
        <div>Date de début : {{$sport->date_debut}}</div>
        <div>Date de fin : {{$sport->date_fin}}</div>
        <div>
            @if($action == 'delete')
                <form action="{{route('sports.destroy',$sport->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <button type="submit" name="delete" value="valide">Valide</button>
                        <button type="submit" name="delete" value="annule">Annule</button>
                    </div>
                </form>
            @else
                <div>
                    <a href="{{route('sports.index')}}">Retour à la liste</a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
