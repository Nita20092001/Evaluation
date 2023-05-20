<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ram;

class RamController extends Controller
{
    public function inserer(Request $request){
        $request->validate([
            "capacite"=>"required"
        ]);

        Ram::create([
            "capacite"=>$request->capacite
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeRams = Ram::all();
        return view('listeRam',compact('listeRams'));
    }

    public function supprimer($ram){
        Ram::find($ram)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Ram $ram){
        $request->validate([
            "capacite"=>"required"
        ]);

        $ram->update([
            "capacite"=>$request->capacite
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(Ram $ram){
        return view("modifierRam",compact('ram'));
    }
}
