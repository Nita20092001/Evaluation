<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\PointDeVente;
use App\Models\Affectation;
use Illuminate\Support\Facades\DB;

class AffectationController extends Controller
{
    public function pageAffectation(){
        $listeUtilisateurs = Utilisateur::where('profil', 'utilisateur')->get();
        $listePointDeVentes = PointDeVente::all();

        return view('insertionAffectation',compact('listeUtilisateurs','listePointDeVentes'));
    }

    public function inserer(Request $request){
        $request->validate([
            "idutilisateur"=>"required",
            "idpointdevente"=>"required"
        ]);
        
        $exists = DB::table('affectations')->where('idutilisateur', $request->idutilisateur)->exists();

        if($exists){
            return back()->with("success","Deja affecter");
        }else{
            Affectation::create([
                "idutilisateur"=>$request->idutilisateur,
                "idpointdevente"=>$request->idpointdevente
            ]);
            return back()->with("success","affecter");
        }

    }
}
