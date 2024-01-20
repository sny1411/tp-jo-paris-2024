<x-layout :titre="$titre">
    <div class="main-container">
        <h1>{{$titre}}</h1>
        <form action="{{route('sports.update',$sport->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-create">
                <div class="form-control">
                    <label class="form-label" for="nom">Nom :</label>
                    <input class="form-input" type="text" name="nom" id="nom"
                           value="{{ $sport->nom }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="description">Description :</label>
                    <textarea class="form-input" name="description" id="description" rows="6"
                              placeholder="Description..">{{ $sport->description }}</textarea>
                </div>
                <div class="form-control">
                    <label class="form-label" for="nb_disciplines">Nombre de disciplines :</label>
                        <input type="text" name="nb_disciplines" id="nb_disciplines"
                               value="{{ $sport->nb_disciplines }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="annee_ajout">Année d'ajout :</label>
                    <input type="text" name="annee_ajout" id="annee_ajout"
                           value="{{ $sport->annee_ajout }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="nb_epreuves">Nombre d'épreuves :</label>
                    <input type="text" name="nb_epreuves" id="nb_epreuves"
                           value="{{ $sport->nb_epreuves }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="date_debut">Date de début :</label>
                    <input type="date" name="date_debut" id="date_debut"
                           value="{{ $sport->date_debut->format('Y-m-d') }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="date_fin">Date de fin :</label>
                    <input type="date" name="date_fin" id="date_fin"
                           value="{{ $sport->date_fin->format('Y-m-d') }}">
                </div>
                <div class="form-buttons">
                    <button type="submit" name="action" value="annule">Annule</button>
                    <button type="submit" name="action" value="valide">Valide</button>
                </div>
            </div>
        </form>

        <h2>Choix d'une image</h2>
        <form action="{{route('sports.upload', ['id' => $sport->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="doc">Image : </label>
                <input type="file" name="image" id="doc">
            </div>
            <input type="submit" value="Télécharger" name="submit">
        </form>
    </div>
</x-layout>
