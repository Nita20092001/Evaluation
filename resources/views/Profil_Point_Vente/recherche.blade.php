@extends("layouts.master")

@section("contenu")

<div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Reherche Laptop</div>
                <hr>
                <form action="{{ route('recherche.liste') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="input-1">Modele</label>                   
                        <input type="text" name="modele" class="form-control" id="input-2">
                  </div>
                 
                  <div class="form-group">
                    <label for="input-2">Prix Minimum</label>                   
                        <input type="text" name="prixmin" class="form-control" id="input-2">
                  </div>

                  <div class="form-group">
                    <label for="input-3">Prix Maximum</label>                   
                        <input type="text" name="prixmax" class="form-control" id="input-3">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-light px-5">Rechercher</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>

@endsection