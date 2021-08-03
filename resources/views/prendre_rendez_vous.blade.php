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
 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Prendre un Rendez Vous</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <b>Prendre un Rendez Vous</B></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('save_rendez_vous')}}" >
      <div class="form-group row">
        

            <label for="recipient-name" class="col-sm-3 col-form-label"><b>le motif</b></label>
       
           <div class="col-sm-9">
            <select name="besoin" id="" id="" class="form-select" aria-label="Default select example">
            <option value="carte d'identité">carte d'identité</option>
             <option value="passport">passport</option>
            <option value="corriger des faux informations">corriger des faux informations</option>
            <option value="faire un acte">faire un acte</option>
            </select>
         </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-3 col-form-label" ><b>Déscription</b></label>
        <div class="col-sm-9">
        <input name='description' type="text"  class="form-control">  
        </div>

      </div>
      <div class="form-group row">
      <label  class="col-sm-3 col-form-label"><b>Agence</b></label>
      <div class="col-sm-9">
      <select name="agent" id="" id="" class="form-select" aria-label="Default select example">
     @foreach($agents as $agent)
     <option value="{{$agent->id}}"> {{$agent->nom}} {{$agent->prenom}}</option>
     @endforeach
     </select>
      </div>

      </div>
      <div class="form-group row">
        <label  class="col-sm-3 col-form-label" ><b>date</b></label>
        <div class="col-sm-9">
        <input required name='date' type="date"  class="form-control">
        </div>

      </div>


<!--          
     <div class="mb-3">
      <label  class="form-label"><b>Déscription</b></label>
      <input name='description' type="text"  class="form-control">  
    </div>
     <div class="mb-3">
      <label  class="form-label"><b>Agence</b></label>
     <select name="agent" id="" id="" class="form-select" aria-label="Default select example">
     @foreach($agents as $agent)
     <option value="{{$agent->id}}"> {{$agent->nom}} {{$agent->prenom}}</option>
     @endforeach
     </select>
    </div>
    
    <div class="mb-3">
      <label  class="form-label"><b>date</b></label>
    
      <input required name='date' type="date"  class="form-control">
    </div> -->

          
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
   <legend>Mes  Rendez Vous</legend>
   @if ($message = Session::get('danger'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">le  motif</th>
      <th scope="col">Déscription</th>
      <th scope="col">Date du rdv</th>
       <th scope="col">Confirmé?</th>
       <th scope="col">Agence</th>
    </tr>
  </thead>
  <tbody>
   @foreach($rdvs as $rdv)
    <tr>
    
      <td>{{$rdv->besoin}}</td>
      <td>{{$rdv->description}}</td>
      <td>{{$rdv->date_rdv}}</td>
      <td>
      @if($rdv->etat=="oui")
           {{$rdv->etat}}
     
      @else
             {{$rdv->etat}}
      @endif</td>
       <td>{{User::find($rdv->agent_id)->nom}} {{User::find($rdv->agent_id)->prenom}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection