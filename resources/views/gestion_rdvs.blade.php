@extends('layouts.app')
 <?php

use App\Models\Citoyen;
?>  
@section('content')
<div class="container">
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Prendre un Rendez Vous Pour Citoyen</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prendre un Rendez Vous Pour Citoyen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
<form action="{{route('save_rendez_vous_agent')}}">
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
  <label  class="col-sm-3 col-form-label"><b>NNI Citoyen</b></label>
  <div class="col-sm-9">
  <input required name='citoyen' type="text" pattern="\d*"  title="seulement les numéros" minlength="10" class="form-control">
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
            <label for="recipient-name" class="col-form-label">le motif</label>
            <select name="besoin" id="" id="" class="form-select" aria-label="Default select example">
            <option value="carte d'identité">carte d'identité</option>
             <option value="passport">passport</option>
            <option value="corriger des faux informations">corriger des faux informations</option>
            <option value="faire un acte">faire un acte</option>
            </select>
          </div>
     <div class="mb-3">
      <label  class="form-label">Déscription</label>
      <input required name='description' type="text"  class="form-control">
    </div>
    <div class="mb-3">
      <label  class="form-label">NNI Citoyen</label>
      <input required name='citoyen' type="text"  class="form-control">
    </div>
    <div class="mb-3">
      <label  class="form-label">date</label>
      @if ($message = Session::get('danger'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif 
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
<div class="alert alert-primary" role="alert">
Gestion des rendez vous
</div>
@if ($message = Session::get('danger'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Date rdv</th>
      <th scope="col">le motif</th>
      <th scope="col">Déscription</th>
      <th scope="col">Confirmé?</th>
      <th scope="col">Citoyen</th>
    </tr>
  </thead>
  <tbody>
   @foreach($rdvs as $rdv)
    <tr>
    
      <td>{{$rdv->date_rdv}}</td>
      <td>{{$rdv->besoin}}</td>
      <td>{{$rdv->description}}</td>
       <td>
       @if($rdv->etat=="oui")
       <a type="button" href="{{route('modifier_rendez_vous',$rdv->id)}}" class="btn btn-success">Oui</a>
       @else
       <a type="button" href="{{route('modifier_rendez_vous',$rdv->id)}}" class="btn btn-danger">{{$rdv->etat}}</a>
        @endif
       </td>
       <td>{{$rdv->citoyen_id}}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection