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

  <legend> Mes  Dossiers </legend> 
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">propriétaire</th>
      <th scope="col">description</th>
      <th scope="col">Etat</th>
      <th> Agent </th>
      
    </tr>
  </thead>
  <tbody>
   @foreach($dossiers as $dossier)
    <tr>
    
      <td>{{$dossier->nom}}</td>
        <td>{{$dossier->description}}</td>
      <td>{{$dossier->etat}}</td>
            <td>{{User::find($dossier->agent_id)->nom}} {{User::find($dossier->agent_id)->prenom}}</td>
     
    
    </tr>
    @endforeach
    
  </tbody>
</table>


</div>
@endsection