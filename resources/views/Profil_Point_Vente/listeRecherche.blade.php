@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Liste Laptop</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Prix</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($listeRecherches as $liste)
                  <th scope="row">{{ $liste->id }}</th>
                      <td>{{ $liste->marques->nom }}</td>
                      <td>{{ $liste->modele }}</td>
                      <td>{{ $liste->prix }}</td>
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