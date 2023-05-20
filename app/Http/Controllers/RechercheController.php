<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;



class RechercheController extends Controller
{
    public function pageRecherche(){
        $listeLaptops = Laptop::whereIn('id', function ($query) {
            $query->select('idlaptop')
                  ->from('reception_pointventes');
        })
        ->get();

        return view('Profil_Point_Vente/recherche',compact('listeLaptops'));
    }

    public function recherche(Request $request){

        $listeLaptops = Laptop::whereIn('id', function ($query) {
            $query->select('idlaptop')
                  ->from('reception_pointventes');
        });

        $modele = $request->modele;
        $prixmin = $request->prixmin;
        $prixmax = $request->prixmax;

        if($prixmin == ""){
            $prixmin=0;
        }

        if($prixmax == ""){
            $prixmax=100000000000;
        }

        if($modele == ""){
            $listeRecherches = $listeLaptops->where("prix",">=",$prixmin)
                                           ->where("prix","<=",$prixmax)
                                           ->get();

        }
        else{
            $listeRecherches = $listeLaptops->where("modele",'like','%'.$modele.'%')
                                           ->where("prix",">=",$prixmin)
                                           ->where("prix","<=",$prixmax)
                                           ->with('laptops')
                                           ->get();
        }

        return view('Profil_Point_Vente/listeRecherche',compact("listeRecherches"));

    }
}
