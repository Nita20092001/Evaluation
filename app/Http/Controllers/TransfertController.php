<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\PointDeVente;
use App\Models\Transfert;

class TransfertController extends Controller
{
    public function pageTransfert(){
        $listeLaptops = Laptop::all();
        $listePointDeVentes = PointDeVente::all();

        return view('insertionTransfert',compact("listeLaptops","listePointDeVentes"));
    }

    public function inserer(Request $request){
        $request->validate([
            "idlaptop"=>"required",
            "quantite"=>"required",
            "idpointdevente"=>"required"
        ]);

        Transfert::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantite,
            "idpointdevente"=>$request->idpointdevente,
            "etat"=>"false"
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeTransferts = Transfert::all();
        return view('listeTransfert',compact('listeTransferts'));
    }
}
