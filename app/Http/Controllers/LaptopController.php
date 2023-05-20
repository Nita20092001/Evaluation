<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecran;
use App\Models\Marque;
use App\Models\Processeur;
use App\Models\DisqueDur;
use App\Models\Ram;
use App\Models\Laptop;

class LaptopController extends Controller
{

    public function pageInsert(){
        $listeMarques = Marque::all();
        $listeProcesseurs = Processeur::all();
        $listeRams = Ram::all();
        $listeEcrans = Ecran::all();
        $listeDisqueDurs = DisqueDur::all();

        return view('insertionLaptop',compact('listeMarques','listeProcesseurs','listeRams','listeEcrans','listeDisqueDurs'));
    }

    public function inserer(Request $request){
        $request->validate([
            "modele"=>"required",
            "idmarque"=>"required",
            "idprocesseur"=>"required",
            "idram"=>"required",
            "idecran"=>"required",
            "iddisquedur"=>"required",
            "prix"=>"required",
            "prix_achat"=>"required",
        ]);

        Laptop::create([

            "modele"=>$request->modele,
            "idmarque"=>$request->idmarque,
            "idprocesseur"=>$request->idprocesseur,
            "idram"=>$request->idram,
            "idecran"=>$request->idecran,
            "iddisquedur"=>$request->iddisquedur,
            "prix"=>$request->prix,
            "prix_achat"=>$request->prix_achat
        ]);

        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        $listeLaptops = Laptop::all();
        return view('listeLaptop',compact('listeLaptops'));
    }

    public function supprimer($laptop){
        Laptop::find($laptop)->delete();

        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Laptop $laptop){
        $request->validate([
            "modele"=>"required",
            "idmarque"=>"required",
            "idprocesseur"=>"required",
            "idram"=>"required",
            "idecran"=>"required",
            "iddisquedur"=>"required",
            "prix"=>"required",
            "prix_achat"=>"required"
        ]);

        $laptop->update([
            "modele"=>$request->modele,
            "idmarque"=>$request->idmarque,
            "idprocesseur"=>$request->idprocesseur,
            "idram"=>$request->idram,
            "idecran"=>$request->idecran,
            "iddisquedur"=>$request->iddisquedur,
            "prix"=>$request->prix,
            "prix_achat"=>$request->prix_achat
        ]);

        return back()->with("success","Marque insérer avec succès");
    }

    public function edit(Laptop $laptop){
        $listeMarques = Marque::all();
        $listeProcesseurs = Processeur::all();
        $listeRams = Ram::all();
        $listeEcrans = Ecran::all();
        $listeDisqueDurs = DisqueDur::all();

        return view('modifierLaptop',compact('laptop','listeMarques','listeProcesseurs','listeRams','listeEcrans','listeDisqueDurs'));
    }
}
