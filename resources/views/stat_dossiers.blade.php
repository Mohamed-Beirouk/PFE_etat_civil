@extends('layouts.app')
 <?php
 
use App\Models\Citoyen;
use App\Models\User;

?>  
@section('content')
<div class="container">

<div class="alert alert-primary" role="alert">
controller Les dossiers
</div>
<div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>choissisez l'agence a controler</h4><hr>
             <form action="{{ route('dossiers_agence_find') }}" method="GET">
        
               
                <div class="mb-3">
                 <label  for="recipient-name" class="col-form-label">Agence</label>
                 <select name="query" id="" class="form-select" aria-label="Default select example">
                    @foreach(user::all()->where('type','like','agent') as $agent)
                      <option value="{{$agent->id}}"> {{$agent->nom}} {{$agent->prenom}}</option>
                    @endforeach
                 </select> 
                 </div> 

                 
                <div class="form-group">
                 <button type="submit" class="btn btn-primary">chercher</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($dossier))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>NNI du propriétaire</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($dossiers) > 0)
                           @foreach($dossiers as $dossier)
                              <tr>
                                  <td>{{ $dossiers->id }}</td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>
               @endif
</div>
<!-- <div class="alert alert-primary" role="alert">

Gestion Les dossiers
</div> -->
    <table class="table">
  <thead>
    <tr>
     
      
       <th scope="col">Nom de dossier</th>
       <th scope="col">Etat</th>
       <th scope="col">Citoyen</th>
       <th scope="col">date de depot</th>
       <th scope="col">date dernier modification</th>
    </tr>
  </thead>
  <tbody>
 
   @foreach($dossiers as $dossier)
    <tr>
    
      <td>{{$dossier->nom}}</td>
      <td>{{$dossier->etat}} </td>
      <td>{{$dossier->citoyen_id}} </td>
     <td>{{$dossier->created_at}}</td>
     <td>{{$dossier->updated_at}}</td>

    </tr>
    @endforeach
    
  </tbody>
</table>
               
    
</div>
@endsection