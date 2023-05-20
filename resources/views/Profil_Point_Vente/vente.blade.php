@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vente</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Processeur</th>
                      <th scope="col">Ram</th>
                      <th scope="col">Ecran</th>
                      <th scope="col">Disque Dur</th>
                      <th scope="col">Prix Vente</th>
                      <th scope="col">Quantite en Stock</th>
                      <th scope="col">Quantite A Vendre</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($listeLaptops as $liste)
                  <tr>
                  
                  <th scope="row">{{ $liste->id }}</th>
                      <td>{{ $liste->marques->nom }}</td>
                      <td>{{ $liste->modele }}</td>
                      <td>{{ $liste->processeurs->nom }}</td>
                      <td>{{ $liste->rams->capacite }}</td>
                      <td>{{ $liste->ecrans->taille }}</td>
                      <td>{{ $liste->disquedurs->capacite }}</td>
                      <td>{{ $liste->prix }}</td>
                      <td>a</td>
                      <td>
                        <div class="form-group">
                            <form action="{{ route('vente.create') }}" method="post">
                                @csrf
                                <input type="text" name="idlaptop" value="{{ $liste->id }}" class="btn btn-light px-5" hidden>
                                <input type="text" name="quantite" class="btn btn-light px-5" >
                            
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                            
                                <button type="submit"class="btn btn-light px-5">Vendre</button>
                            </form>
                        </div>
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