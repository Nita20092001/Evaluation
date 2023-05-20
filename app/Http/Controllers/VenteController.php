<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Vente;

class VenteController extends Controller
{
    public function pageVente(){
        //$listeLaptops = Laptop::all();

        $listeLaptops = Laptop::whereIn('id', function ($query) {
            $query->select('idlaptop')
                  ->from('reception_pointventes');
        })
        ->get();

        return view('Profil_Point_Vente/vente',compact("listeLaptops"));
    }

    public function lister(){
        $listeVentes = Vente::all();

        return view('Profil_Point_Vente/listevente',compact("listeVentes"));
    }
    
    public function inserer(Request $request){
        $request->validate([
            "idlaptop"=>"required",
            "quantite"=>"required"
        ]);

        Vente::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantite,
            "idpointdevente"=>2,
            "etat"=>"false"
        ]);

        return back();
    }
}
