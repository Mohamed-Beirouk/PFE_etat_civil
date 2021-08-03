@extends('layouts.app')

@section('content')
          
      <div class="container">
      <form action="{{route('mod_citoyen')}}"> 
          
        <input type="number" name="id" class="d-none" value="{{$citoyen->id}}">
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nom:</label>
            <input name='nom' type="text" class="form-control" value="{{$citoyen->nom}}" id="recipient-name">
          </div>
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prénom:</label>
            <input name='prenom' type="text" class="form-control" value="{{$citoyen->prenom}}" id="recipient-name">
          </div>
          
            
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date de Naissance:</label>
            <input name='date_naissance' type="date" class="form-control" value="{{$citoyen->date_naissance}}" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Lieu de Naissance:</label>
            <input name='lieu_naissance' type="text" class="form-control" value="{{$citoyen->lieu_naissance}}"  id="recipient-name">
          </div>
        
           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">sexe:</label>
            <select name="sexe" id="">
            <option value="homme">Homme</option>
             <option value="femme">Femme</option>
            </select>
          </div>
          <div class="mb-3">
            <input name='nni' pattern="\d*"  title="seulement les numéros" minlength="10" type="hidden" value="{{$citoyen->nni}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <input name='natio' value="{{$citoyen->nationalite}}" type="hidden" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">nni pére:</label>
            <input name='nni_pere' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" value="{{$citoyen->nni_pere}}" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">nni mére:</label>
            <input name='nni_mere' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" value="{{$citoyen->nni_mere}}" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <a href="{{route('gestion_registes')}}" class="btn btn-secondary">Fermer</a>
        
        <button type="submit" class="btn btn-primary">Valider Modification</button>
      </div>
          </form>
      </div>
@endsection