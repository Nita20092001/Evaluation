<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecran;

class EcranController extends Controller
{
    public function inserer(Request $request){
        $request->validate([
            "taille"=>"required"
        ]);

        Ecran::create([
            "taille"=>$request->taille
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeEcrans = Ecran::all();
        return view('listeEcran',compact('listeEcrans'));
    }

    public function supprimer($ecran){
        Ecran::find($ecran)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Ecran $ecran){
        $request->validate([
            "taille"=>"required"
        ]);

        $ecran->update([
            "taille"=>$request->taille
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(Ecran $ecran){
        return view("modifierEcran",compact('ecran'));
    }
}
