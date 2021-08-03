@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
Gestion des registres
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter un Citoyen</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau citoyen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_citoyen')}}">

        <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"> <b>Nom :</b></label>
            <div class="col-sm-9">
            <input name='nom'type="text" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"><b> Prénom :</b></label>
            <div class="col-sm-9">
            <input name='prenom' type="text" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"> <b>nni :</b></label>
            <div class="col-sm-9">
              <input name='nni' type="text" class="form-control" pattern="\d*"  title="seulement les numéros" minlength="10" id="recipient-name">
              </div>
          </div>
          
           
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"><b>Nationalité :</b></label>
            <div class="col-sm-9">
            <input name='natio' type="text" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"><b>sexe :</b></label>
            <div class="col-sm-9">
            <select name="sexe" id="" class="form-select" aria-label="Default select example">
            <option value="homme">Homme</option>
             <option value="femme">Femme</option>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"> <b>nni pére:</b></label>
            <div class="col-sm-9">
              <input name='nni_pere' type="text" class="form-control" pattern="\d*"  title="seulement les numéros" minlength="10" id="recipient-name">
              </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-3 col-form-label"> <b>nni mére:</b></label>
            <div class="col-sm-9">
              <input name='nni_mere' type="text" class="form-control" pattern="\d*"  title="seulement les numéros" minlength="10" id="recipient-name">
              </div>
          </div>
           
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-5 col-form-label"><b>Date de Naissance :</b></label>
            <div class="col-sm-7">
            <input name='date_naissance' type="date" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-5 col-form-label"><b>Lieu de Naissance :</b></label>
            <div class="col-sm-7">
            <input name='lieu_naissance' type="text" class="form-control" id="recipient-name">
            </div>
          </div>
          
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
          
        </form>
      </div>
      
    </div>
  </div>
  
</div>
<div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>rechercher un citoyen</h4><hr>
             <form action="{{ route('web.find_citoyen') }}" method="GET">
        
                <div class="form-group">
                   <label for="">Entrer le NNI du citoyen</label>
                   <input type="text" class="form-control" name="query" pattern="\d*"  title="seulement les numéros" placeholder="NNI..." value="{{ request()->input('query') }}">
                   <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary">chercher</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($citoyen))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>NNI</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($citoyens) > 0)
                           @foreach($citoyens as $citoyen)
                              <tr>
                                  <td>{{ $citoyens->nni }}</td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>
               @endif
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Nni</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Lieu de Naissance</th>
      <th scope="col">sexe</th>
      <th scope="col">action</th>
      

    </tr>
  </thead>
  <tbody>
   @foreach($citoyens as $citoyen)
    <tr>
     <th >{{$citoyen->nni}}</th>
      <th >{{$citoyen->nom}}</th>
      <td>{{$citoyen->prenom}}</td>
      <td>{{$citoyen->date_naissance}}</td>
      <td>{{$citoyen->lieu_naissance}}</td>
       <td>{{$citoyen->sexe}}</td>
       <td>
        <form action="{{route('update_citoyen')}}">
          <input type="number" name="id" class="d-none" value="{{$citoyen->id}}">
          <button type="submit" class="btn btn-success">Modifier</button>
        </form>
      </td>
   
    </tr>
  @endforeach
  </tbody>
</table>

</div>
@endsection