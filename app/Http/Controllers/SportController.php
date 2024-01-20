<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);
        if (!isset($cat)) {
            if (!isset($value)) {
                $sports = Sport::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $sports = Sport::where('nb_epreuves', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $sports = Sport::all();
                Cookie::expire('cat');
            } else {
                $sports = Sport::where('nb_epreuves', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }

        $difNbEpreuves = Sport::distinct('nb_epreuves')->pluck('nb_epreuves');

        return view('sport.index', ['sports' => $sports,
            'titre' => 'Liste des sports',
            'difNbEpreuves' => $difNbEpreuves,
            'cat' => $cat]);
    }

    public function create() {
        try {
            $this->authorize('create', Sport::class);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits de création d\'un sport.');
        }
        return view('sport.create', ['titre' => "Création d'un sport"]);
    }

    public function store(Request $request) {
        try {
            $this->authorize('create', Sport::class);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits de création d\'un sport.');
        }
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
            ->with('msg', 'Sport ajoutée avec succès');
    }

    public function show(Request $request, $id) {
        $sport = Sport::find($id);

        try {
            $this->authorize('view', $sport);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits pour voir ce sport.');
        }

        $titre = $request->get('action', 'show') == 'show' ? "Détails d'un sport" : "Suppression d'un sport";
        return view('sport.show', ['titre' => $titre, 'sport' => $sport,
            'action' => $request->get('action', 'show')]);
    }

    public function edit(string $id) {
        $sport = Sport::findOrFail($id);

        try {
            $this->authorize('update', $sport);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits pour modifier ce sport.');
        }

        return view('sport.edit', ['titre' => "Modification d'un sport", 'sport' => $sport]);
    }

    public function update(Request $request, string $id) {
        if ($request->input('action', 'valide') == "annule") {
            return redirect()->route('sports.index', ['titre' => "Liste des sports"])
                ->with('type', 'warning')
                ->with('msg', 'Modification annulée');
        }
        $sport = Sport::find($id);

        try {
            $this->authorize('update', $sport);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits pour modifier ce sport.');
        }

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
        $sport = Sport::find($id);
        if ($request->delete == 'valide') {
            try {
                $this->authorize('delete', $sport);
            } catch (AuthorizationException $e) {
                return redirect()->route('sports.index')
                    ->with('type', 'error')
                    ->with('msg', 'Vous n\'avez pas les droits pour supprimer ce sport.');
            }

            if (isset($sport->url_media) && $sport->url_media != "images/no-image.svg") {
                Storage::delete($sport->url_media);
            }
            $sport->delete();
            return redirect()->route('sports.index')
                ->with('type', 'primary')
                ->with('msg', 'Sport supprimée avec succès');
        } else {
            return redirect()->route('sports.index')
                ->with('type', 'warning')
                ->with('msg', 'Suppression sport annulée');
        }
    }

    public function upload(Request $request, $id) {
        $sport = Sport::findOrFail($id);

        try {
            $this->authorize('update', $sport);
        } catch (AuthorizationException $e) {
            return redirect()->route('sports.index')
                ->with('type', 'error')
                ->with('msg', 'Vous n\'avez pas les droits pour modifier ce sport.');
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
        } else {
            if (!$request->hasFile('image')) {
                $msg = "Aucun fichier téléchargé";
            }
            else {
                $msg = "fichier mal téléchargé";
            }
            return redirect()->route('sports.show', [$sport->id])
                ->with('type', 'error')
                ->with('msg', 'Sport non modifiée (' . $msg . ')');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images/sports', $nom);
        if (isset($sport->url_media) && $sport->url_media != "images/no-image.svg") {
            Storage::delete($sport->url_media);
        }
        $sport->url_media = 'images/sports/' . $nom;
        $sport->save();

        return redirect()->route('sports.show', [$sport->id])
            ->with('type', 'primary')
            ->with('msg', 'Image du sport modifiée avec succès');
    }
}
