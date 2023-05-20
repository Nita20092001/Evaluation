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
                <div class="card-title">Renvoie Laptop</div>
                <hr>
                <form action="{{ route('renvoie.create') }}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="input-1">Modele</label>
                                 
                        <select name="idlaptop" class="form-control" id="input-1">                    
                            <option value=""></option>
                            @foreach($listeLaptops as $liste)
                                <option value="{{ $liste->id }}">{{ $liste->modele }}</option>  
                            @endforeach
                        </select>            
                  </div>

                  <div class="form-group">
                    <label for="input-2">Quantite</label>                   
                        <input name="quantite" class="form-control" id="input-2">
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-light px-5">Renvoyer</button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>

@endsection