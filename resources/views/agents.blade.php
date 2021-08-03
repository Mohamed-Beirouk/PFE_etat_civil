@extends('layouts.app')

@section('content')
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter une agence</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau agence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_agent')}}">

          <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"> <b>Nom </b></label>
            <div class="col-sm-8">
            <input name='nom' type="text" class="form-control" id="recipient-name">
            </div>
          </div>

           <div class="mb-3">
            <input name='prenom' type="hidden" class="form-control" id="recipient-name">
          </div>
           <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"><b>Email </b></label>
            <div class="col-sm-8">
            <input name='email' type="email" class="form-control" id="recipient-name">
            </div>
          </div>
          <div class="form-group row">
            <label for="recipient-name" class="col-sm-4 col-form-label"><b>mot de passe</b></label>
            <div class="col-sm-8">
            <input name='password' type="password" class="form-control" id="recipient-name">
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
    <table class="table"> 
  <thead>
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">email</th>
      <th scope="col">Modification</th>
      <th scope="col">suppression</th>
    </tr>
  </thead>
  <tbody>
   @foreach($agents as $agent)
    <tr>
    
      <td>{{$agent->nom}} {{$agent->prenom}}</td>
      <td>{{$agent->email}}</td>
      
        
      <td>
        <form action="{{route('update_agent')}}">
          <input type="number" name="id" class="d-none" value="{{$agent->id}}">
          <button type="submit" class="btn btn-success">Modifier</button>
        </form>
      </td>
      <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">supprimer</button>
        </td>
      
    </tr>
    @endforeach
    
  </tbody>
</table>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmer la supression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('delete_agent')}}">
          <div class="mb-3">
          <input type="number" name="id" class="d-none" value="{{$agent->id}}">
          </div>
           
           <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger">supprimer</button>
      </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>




</div>
@endsection