@extends('layouts.app')
 <?php

use App\Models\User;
use App\Models\Citoyen;
 
?>  
@section('content')
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mariage" data-bs-whatever="@getbootstrap">+ un Acte Mariage</button>

<div class="modal fade" id="mariage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de mariage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_mariage')}}" method="post" enctype="multipart/form-data">
             @csrf
             
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Date </b></label>
           <div class="col-sm-9">
               <input name='date' type="date" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Lieu </b></label>
           <div class="col-sm-9">
               <input name='lieu' type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>NNI homme</b></label>
           <div class="col-sm-9">
               <input name='homme' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>NNI femme</b></label>
           <div class="col-sm-9">
               <input name='femme' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Acte </b></label>
           <div class="col-sm-9">
               <input name='file' accept=".pdf" type="file" class="form-control" id="recipient-name">
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

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#divorce" data-bs-whatever="@getbootstrap">+ un acte de divorce</button>

<div class="modal fade" id="divorce" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de divorce</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_divorce')}}"method="post" enctype="multipart/form-data">
         
        @csrf  
           
        <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Date </b></label>
           <div class="col-sm-9">
               <input name='date' type="date" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Lieu </b></label>
           <div class="col-sm-9">
               <input name='lieu' type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>NNI homme</b></label>
           <div class="col-sm-9">
               <input name='homme' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>NNI femme</b></label>
           <div class="col-sm-9">
               <input name='femme' pattern="\d*"  title="seulement les numéros" minlength="10" type="text" class="form-control" id="recipient-name">
           </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Acte </b></label>
           <div class="col-sm-9">
               <input name='file' accept=".pdf" type="file" class="form-control" id="recipient-name">
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">+ un acte de Naissance</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">acte de naissance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('creer_naissance')}}" method="post" enctype="multipart/form-data">
         
        @csrf  
        <div class="form-group row">
          <label for="recipient-name" class="col-sm-3 col-form-label"><b>Citoyen :</b></label>
          <div class="col-sm-9">
          <input name='id' type="text" pattern="\d*"  placeholder="NNI" title="seulement les numéros" minlength="10" class="form-control" id="recipient-name">
          </div>
          </div>
          <div class="form-group row">
             <label  class="col-sm-3 col-form-label"><b>Acte </b></label>
           <div class="col-sm-9">
               <input name='file' type="file" accept=".pdf" class="form-control" id="recipient-name" />
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
<div class="alert alert-primary" role="alert">
 Actes de Divorces
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Lieu</th>
      <th scope="col">Date</th>
      <th scope="col">Homme</th>
      <th scope="col">Femme</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
    @foreach($actes_divorces as $acte)
    <tr>
      <th scope="row">{{$acte->lieu_divorce}}</th>
      <td>{{$acte->date_divorce}}</td>
      <td>{{$acte->homme_id}}</td>
      <td>{{$acte->femme_id}}</td>
       <td> 
          @if($acte->path!="")
       <a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a>
       @endif</td>
    </tr>
    @endforeach
  
  </tbody>
</table>
<div class="alert alert-primary" role="alert">
 Actes de Mariage
</div>
<table class="table">
  <thead>
    <tr>
     <th scope="col">Lieu</th>
      <th scope="col">Date</th>
      <th scope="col">Homme</th>
      <th scope="col">Femme</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
      @foreach($actes_mariages as $acte1)
    <tr>
      <th scope="row">{{$acte1->lieu_mariage}}</th>
      <td>{{$acte1->date_mariage}}</td>
      <td>{{$acte1->homme_id}}</td>
      <td>{{$acte1->femme_id}}</td>
      <td> 
      @if($acte1->path!="")
      <a href="{{route('download',$acte1->path)}}" target='_blank' class="btn btn-success">Télécharger</a>
     @endif
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>
 
<div class="alert alert-primary" role="alert">
 Actes de Naissance
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">NNI</th>
      <th scope="col">pdf</th>
    </tr>
  </thead>
  <tbody>
   @foreach($actes_naissances as $acte2)
    <tr>
     
      <td>{{$acte2->citoyen_id}}</td>
      
     
      <td> 
      @if($acte2->path!="")
      <a href="{{route('download',$acte2->path)}}" target='_blank' class="btn btn-success">Télécharger</a>
     @endif
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>




</div>
@endsection