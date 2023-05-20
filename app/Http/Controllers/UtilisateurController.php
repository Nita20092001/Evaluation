<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function inserer(Request $request){
       
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "password1"=>"required",
            "profil"=>"required"
        ]);
        
        if($request->password == $request->password1){
            Utilisateur::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "profil"=>$request->profil
            ]);
            return back()->with("success","Marque insérer avec succès");
        }
        
        return back()->with("success","utilisateur avec succès");
    }

    public function lister(){
        $listeUtilisateurs = Utilisateur::all();
        return view('listeUtilisateur',compact('listeUtilisateurs'));
    }

    public function supprimer($utilisateur){
        Utilisateur::find($utilisateur)->delete();
        
        return back()->with("success","Marque supprimer avec succès");
    }

    public function modifier(Request $request,Utilisateur $utilisateur){
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required",
            "password1"=>"required",
            "profil"=>"required"
        ]);

        if (Hash::check($request->password, $utilisateur->password)) {
            $utilisateur->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password1),
                "profil"=>$request->profil
            ]);
            return back()->with("success","succes");
        }
        
        return back()->with("success","fails");
    }

    public function edit(Utilisateur $utilisateur){
        return view("modifierUtilisateur",compact('utilisateur'));
    }

}
