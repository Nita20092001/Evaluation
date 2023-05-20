<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function inserer(Request $request){
        $request->validate([
            "nom"=>"required"
        ]);

        Marque::create([
            "nom"=>$request->nom
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeMarques = Marque::all();
        return view('listeMarque',compact('listeMarques'));
    }

    public function supprimer($marque){
        Marque::find($marque)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Marque $marque){
        $request->validate([
            "nom"=>"required",
        ]);

        $marque->update([
            "nom"=>$request->nom
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(Marque $marque){
        return view("modifierMarque",compact('marque'));
    }
}
