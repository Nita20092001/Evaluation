@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Stock Laptop</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Quantite</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($listeReception_magasins  as $liste)
                  <th scope="row">{{ $liste->idlaptop }}</th>
                      <td>{{ $liste->laptops->marques->nom }}</td>
                      <td>{{ $liste->laptops->modele }}</td>
                      @foreach($listeVentes as $listeV)
                            @if($liste->idlaptop == $listeV->idlaptop)
                            @php
                                $result = $liste->quantite - $listeV->quantite 
                            @endphp
                                @break
                            @else
                            @php
                                 $result = $liste->quantite 
                            @endphp
                            @endif

                      @endforeach

                      @foreach($listeRenvoies as $listeR)
                            @if($liste->idlaptop == $listeR->idlaptop)
                            @php
                                 $result = $liste->quantite - $listeR->quantite 
                            @endphp
                                @break
                            @else
                            @php
                                 $result = $liste->quantite 
                            @endphp
                            @endif

                      @endforeach

                      <td>{{ $result }}</td>                   
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection