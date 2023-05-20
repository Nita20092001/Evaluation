<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointDeVente;

class PointDeVenteController extends Controller
{
    
    public function inserer(Request $request){
        $request->validate([
            "nom"=>"required",
            "emplacement"=>"required"
        ]);

        PointDeVente::create([
            "nom"=>$request->nom,
            "emplacement"=>$request->emplacement
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listePointDeVentes = PointDeVente::all();
        return view('listePointDeVente',compact('listePointDeVentes'));
    }

    public function supprimer($pointdevente){
        PointDeVente::find($pointdevente)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,PointDeVente $pointdevente){
        $request->validate([
            "nom"=>"required",
            "emplacement"=>"required"
        ]);

        $pointdevente->update([
            "nom"=>$request->nom,
            "emplacement"=>$request->emplacement
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(PointDeVente $pointdevente){
        return view("modifierPointDeVente",compact('pointdevente'));
    }

}
