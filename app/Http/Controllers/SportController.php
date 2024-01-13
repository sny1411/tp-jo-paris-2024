<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('sport.index', ['sports' => $sports, 'titre' => 'Liste des sports']);
    }

    public function create() {
        return view('sport.create', ['titre' => "Création d'un sport"]);
    }

    public function store(Request $request) {
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'annee_ajout' => 'required',
                'nb_disciplines' => 'required',
                'nb_epreuves' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $sport = new Sport();

        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;

        $sport->save();

        return redirect()->route('sports.index', ['titre' => "Liste des sports"])
            ->with('type', 'primary')
            ->with('msg', 'Tache ajoutée avec succès');
    }

    public function show(Request $request, $id) {
        $sport = Sport::find($id);
        $titre = $request->get('action', 'show') == 'show' ? "Détails d'un sport" : "Suppression d'un sport";
        return view('sport.show', ['titre' => $titre, 'sport' => $sport,
            'action' => $request->get('action', 'show')]);
    }

    public function edit(string $id) {
        $sport = Sport::findOrFail($id);
        return view('sport.edit', ['titre' => "Modification d'un sport", 'sport' => $sport]);
    }

    public function update(Request $request, string $id) {
        if ($request->input('action', 'valide') == "annule") {
            return redirect()->route('sports.index', ['titre' => "Liste des sports"])
                ->with('type', 'warning')
                ->with('msg', 'Modification annulée');
        }
        $sport = Sport::find($id);

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'annee_ajout' => 'required',
                'nb_disciplines' => 'required',
                'nb_epreuves' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;

        $sport->update();

        return redirect()->route('sports.index', ['titre' => "Liste des sports"])
            ->with('type', 'primary')
            ->with('msg', 'Sport modifiée avec succès');
    }

    public function destroy(Request $request, string $id) {
        $tache = Sport::find($id);
        if ($request->delete == 'valide') {
            $tache->delete();
            return redirect()->route('sports.index')
                ->with('type', 'primary')
                ->with('msg', 'Sport supprimée avec succès');
        } else {
            return redirect()->route('sports.index')
                ->with('type', 'warning')
                ->with('msg', 'Suppression sport annulée');
        }
    }
}
