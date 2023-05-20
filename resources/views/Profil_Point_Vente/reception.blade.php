@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
  
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reception Laptop</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">id</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Quantite</th>
                      <th scope="col">Quantite Reçu</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($listeTransferts as $liste)
                  <th scope="row">{{ $liste->id }}</th>
                      <td>{{ $liste->laptops->marques->nom }}</td>
                      <td>{{ $liste->laptops->modele }}</td>
                      <td>{{ $liste->quantite }}</td>
                      <td>
                        <div class="form-group">
                            <form action="{{ route('reception.create') }}" method="post">
                                @csrf
                                <input type="text" name="quantite" class="btn btn-light px-5">
                                <input type="text" name="quantiteTotale" value="{{ $liste->quantite }}" class="btn btn-light px-5" hidden>
                                <input type="text" name="idtransfert" value="{{ $liste->id }}" class="btn btn-light px-5" hidden>
                                <input type="text" name="idlaptop" value="{{ $liste->laptops->id }}" class="btn btn-light px-5" hidden>
                                <input type="text" name="idpointdevente" value="{{ $liste->pointdeventes->id }}" class="btn btn-light px-5" hidden>

                            
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                            
                                <button type="submit"class="btn btn-light px-5">inserer</button>
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