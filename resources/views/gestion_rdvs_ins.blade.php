@extends('layouts.app')
 <?php

use App\Models\User;
?>  
@section('content')
<div class="container">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Prendre un Rendez Vous d'inscription</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prendre un Rendez Vous d'inscription</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
<form action="{{route('save_rendez_vous_agent_ins')}}">

      <div class="form-group row">
      <label  class="col-sm-3 col-form-label"><b>téléphone </b></label>
      <div class="col-sm-9">
        <input name='telephone' pattern="\d*"  title="seulement les numéros" type="text"  class="form-control">
        </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-3 col-form-label"><b>etat </b></label>
      <div class="col-sm-9">
      <input name='etat' type="text"  class="form-control">
      </div>
    </div>
     
    <div class="form-group row">
      <label  class="col-sm-3 col-form-label"><b> date </b></label>
      <div class="col-sm-9">
      <input name='date' type="date"  class="form-control">
      </div>
    </div>
  
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">valider</button>
      </div>
 
</form>
      </div>
      
    </div>
  </div>
  
</div>
<br><br>
<div class="alert alert-primary" role="alert">
Gestion des rendez vous d'inscription
</div>
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">telephone</th>
      <th scope="col">Confirmé?</th>
      <th scope="col">Date rdv</th>
    </tr>
  </thead>
  <tbody>
   @foreach($rdvsins as $rdvsins)
    <tr>
    
      <td>{{$rdvsins->telephone}}</td>
      <td>
       @if($rdvsins->etat=="oui")
       <a type="button" href="{{route('modifier_rendez_vous_ins',$rdvsins->id)}}" class="btn btn-success">Oui</a>
       @else
       <a type="button" href="{{route('modifier_rendez_vous_ins',$rdvsins->id)}}" class="btn btn-danger">{{$rdvsins->etat}}</a>
        @endif
       </td>
      <td>{{$rdvsins->date_rdv}}</td>
       
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection