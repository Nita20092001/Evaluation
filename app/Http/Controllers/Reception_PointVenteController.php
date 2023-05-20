<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfert;
use App\Models\Reception_PointVente;
use App\Models\Perte;
use App\Models\Vente;
use App\Models\Renvoie;
use Illuminate\Support\Facades\DB;



class Reception_PointVenteController extends Controller
{
    public function pageReception(){
        $listeTransferts = Transfert::where('etat','false')->get();
        return view('Profil_Point_Vente/reception',compact('listeTransferts'));
    }

    public function inserer(Request $request){
        Transfert::where('id', $request->idtransfert)->update(['etat' => 'true']);

        Perte::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantiteTotale - $request->quantite
        ]);

        Reception_PointVente::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantite,
            "idpointdevente"=>$request->idpointdevente
        ]);
        return back();
    }

    public function lister(){
        $listeReception_magasins = Reception_PointVente::where('idpointdevente','=',2)
                                                        ->groupBy('idlaptop')
                                                        ->select('idlaptop', DB::raw('SUM(quantite) as quantite'))
                                                        ->get();

        $listeVentes = Vente::groupBy('idlaptop')
                            ->select('idlaptop', DB::raw('SUM(quantite) as quantite'))
                            ->get();
        
        $listeRenvoies = Renvoie::groupBy('idlaptop')
                            ->select('idlaptop', DB::raw('SUM(quantite) as quantite'))
                            ->get();

        return view('Profil_Point_Vente/stock',compact('listeReception_magasins','listeVentes','listeRenvoies'));
    }
}
