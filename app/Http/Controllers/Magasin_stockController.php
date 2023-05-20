<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magasin_stock;
use App\Models\Laptop;
use App\Models\Transfert;
use Illuminate\Support\Facades\DB;


class Magasin_stockController extends Controller
{
    public function pageStock(){
        $listeLaptops = Laptop::all();
        return view('insertionMagasin_stock',compact('listeLaptops'));
    }

    public function inserer(Request $request){
        $request->validate([
            "idlaptop"=>"required",
            "quantite"=>"required"
        ]);

        Magasin_stock::create([
            "idlaptop"=>$request->idlaptop,
            "quantite"=>$request->quantite
        ]);
        
        return back()->with("success","Marque insérer avec succès");
    }

    public function lister(){
        
        $listeMagasin_stocks = Magasin_stock::groupBy('idlaptop')
                                                ->select('idlaptop', DB::raw('SUM(quantite) as quantite'))
                                                ->get();
        $listeTransferts = Transfert::groupBy('idlaptop')
                                                ->select('idlaptop', DB::raw('SUM(quantite) as quantite'))
                                                ->get();


        return view('listeMagasin_stock',compact('listeMagasin_stocks','listeTransferts'));
    }

}
