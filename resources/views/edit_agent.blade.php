@extends('layouts.app')

@section('content')
      <div class="container">
        <form action="{{route('mod_agent')}}">
            <input type="number" name="id" class="d-none" value="{{$agent->id}}">
            <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"> <b>Nom </b></label>
            <div class="col-sm-8">
            <input name='nom' type="text" value="{{$agent->nom}}"  class="form-control" id="recipient-name">
            </div>
          </div>
          
           <div class="mb-3">
            <!-- <label for="recipient-name" class="col-form-label">Prénom:</label> -->
            <input name='prenom' type="hidden" value="" class="form-control" id="recipient-name">
          </div>
            <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"> <b>email </b></label>
            <div class="col-sm-8">
            <input name='email' type="email" value="{{$agent->email}}"  class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"> <b>Mot de passe </b></label>
            <div class="col-sm-8">
            <input name='password' type="password" class="form-control" id="recipient-name">
            </div>
          </div>
          
            
          <div class="modal-footer">
        <a href="{{route('agents')}}" class="btn btn-secondary">Fermer</a>
        
        <button type="submit" class="btn btn-primary">Valider Modification</button>
        
      </div>
           
        </form>
      </div>

@endsection