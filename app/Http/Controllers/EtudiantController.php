<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    
    
    public function liste_tache()
    {
        $etudiants= Etudiant::orderBy('id')->paginate(6);
        return view("etudiant.liste", compact("etudiants"));
    }

    public function ajouter_tache()
    {
        return view("etudiant.ajouter");
    }

    // traitement pour ajouter une nouvelle tache
    public function ajouter_tache_traitement(Request $request)
    {
        // dd($request->all());

        // validation des champs de formulaire
        $request->validate([
            'nom' => 'required|string', // s'assurer que le nom est bien un string
            'description' => 'required|string', // s'assurer que la description est bien un string
            'date' => 'required|date', // s'assurer que la date est bien un type date
            'priority' => 'required|in:basse,moyenne,haute', // s'assurer que la priorite se retrouve dans la liste 'in' specifie
        ]);

        // creation d'un nouvel objet etudiant
        $etudiant= new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->description = $request->description;
        $etudiant->date = $request->date;
        $etudiant->priority = $request->priority;
        // sauvegarder 
        $etudiant->save();

        // reafficher notre page d'ajout apres ajout et afficher un message success si c'est bien fait
        return redirect('/ajouter')->with('success', 'Tache ajouté avec succès');
    }

    public function update_tache($id)
    {
        // trouver l'id correspondant et afficher ses informations dans une nouvelle vue
        $etudiants= Etudiant::find($id);
        return view("etudiant.update", compact("etudiants"));
    }


    // traitement pour la mise jour d'une tache
    public function update_tache_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required|string', // s'assurer que le nom est bien un string
            'description' => 'required|string', // s'assurer que la description est bien un string
            'date' => 'required|date', // s'assurer que la date est bien un type date
            'priority' => 'required|in:basse,moyenne,haute', // s'assurer que la priorite se retrouve dans la liste 'in' specifie
        ]);

        // creation d'un nouvel objet etudiant
        $etudiant= Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->description = $request->description;
        $etudiant->date = $request->date;
        $etudiant->priority = $request->priority;
        // mettre a jour
        $etudiant->update();

        return redirect('/liste')->with('success', 'Tache mise a jour avec succès');
    }

    // fonction pour supprimer une tache
    public function delete_tache($id)
    {
        $etudiant= Etudiant::find($id);
        $etudiant->delete();
        return redirect('/liste')->with('success', 'Tache supprimé avec succès');
    }
}
