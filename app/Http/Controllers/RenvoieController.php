<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\PointDeVente;
use App\Models\Renvoie;

class RenvoieController extends Controller
{
    public function pageRenvoie(){
        //$listeLaptops = Laptop::all();

        $listeLaptops = Laptop::whereIn('id', function ($query) {
            $query->select('idlaptop')
                  ->from('reception_pointventes');
        })
        ->get();

        return view('Profil_Point_Vente/renvoie',compact("listeLaptops"));
    }

    public function inserer(Request $request){
        $request->validate([
            "idlaptop"=>"required",
            "quantite"=>"required"
        ]);

        Renvoie::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantite,
            "idpointdevente"=>2,
            "etat"=>"false"
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }
}
