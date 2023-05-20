<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processeur;

class ProcesseurController extends Controller
{
    public function inserer(Request $request){
        $request->validate([
            "nom"=>"required",
            "frequence"=>"required"
        ]);

        Processeur::create([
            "nom"=>$request->nom,
            "frequence"=>$request->frequence
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeProcesseurs = Processeur::all();
        return view('listeProcesseur',compact('listeProcesseurs'));
    }

    public function supprimer($processeur){
        Processeur::find($processeur)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Processeur $processeur){
        $request->validate([
            "nom"=>"required",
            "frequence"=>"required"
        ]);

        $processeur->update([
            "nom"=>$request->nom,
            "frequence"=>$request->frequence
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(Processeur $processeur){
        return view("modifierProcesseur",compact('processeur'));
    }
}
