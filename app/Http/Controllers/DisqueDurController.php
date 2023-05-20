<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisqueDur;

class DisqueDurController extends Controller
{
    public function inserer(Request $request){
        $request->validate([
            "capacite"=>"required"
        ]);

        DisqueDur::create([
            "capacite"=>$request->capacite
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeDisqueDurs = DisqueDur::all();
        return view('listeDisqueDure',compact('listeDisqueDurs'));
    }

    public function supprimer($disquedur){
        DisqueDur::find($disquedur)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,DisqueDur $disquedur){
        $request->validate([
            "capacite"=>"required"
        ]);

        $disquedur->update([
            "capacite"=>$request->capacite
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(DisqueDur $disquedur){
        return view("modifierDisqueDur",compact('disquedur'));
    }

}
