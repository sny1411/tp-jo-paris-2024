<x-layout :titre="$titre">
    <div class="main-container">
        <h1>{{$titre}}</h1>
        <form action="{{route('sports.store')}}" method="POST">
            @csrf
            <div class="form-create">
                <div class="form-control">
                    <label class="form-label" for="nom">Nom :</label>
                    <input class="form-input" type="text" name="nom" id="nom"
                           value="{{ old('nom') }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="description">Description :</label>
                    <textarea class="form-input" name="description" id="description" rows="6"
                              placeholder="Description..">{{ old('description') }}</textarea>
                </div>
                <div class="form-control">
                    <label class="form-label" for="nb_disciplines">Nombre de disciplines :</label>
                    <input type="text" name="nb_disciplines" id="nb_disciplines"
                           value="{{ old('nb_disciplines') }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="annee_ajout">Année d'ajout :</label>
                    <input type="text" name="annee_ajout" id="annee_ajout"
                           value="{{ old('annee_ajout') }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="nb_epreuves">Nombre d'épreuves :</label>
                    <input type="text" name="nb_epreuves" id="nb_epreuves"
                           value="{{ old('nb_epreuves') }}">
                </div>
                <div class="form-control">
                    <label class="form-label" for="date_debut">Date de début :</label>
                    <input type="date" name="date_debut" id="date_debut"
                           value="@if (!empty(old('date_debut'))) {{ old('date_debut') }} @endif">
                </div>
                <div class="form-control">
                    <label class="form-label" for="date_fin">Date de fin :</label>
                    <input type="date" name="date_fin" id="date_fin"
                           value="@if (!empty(old('date_fin'))) {{ old('date_fin') }} @endif">
                </div>
                <div class="form-buttons">
                    <button type="submit" name="action" value="annule">Annule</button>
                    <button type="submit" name="action" value="valide">Valide</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
