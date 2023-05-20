@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste Vente Laptop</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Quantite Vendu</th>
                      <th scope="col">Date Vente</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($listeVentes as $liste)
                  <th scope="row">{{ $liste->id }}</th>
                      <td>{{ $liste->laptops->marques->nom }}</td>
                      <td>{{ $liste->laptops->modele }}</td>
                      <td>{{ $liste->quantite }}</td>
                      <td>{{ $liste->created_at }}</td>
                      </td>
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