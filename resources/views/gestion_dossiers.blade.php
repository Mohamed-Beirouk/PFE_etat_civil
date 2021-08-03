@extends('layouts.app')
 <?php
 
use App\Models\Citoyen;
use App\Models\User;
?>  
@section('content')
<div class="container">
  
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Ajouter un dossier</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau dossier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('save_dossiers')}}">
        
     <div class="form-group row">
     <label  class="col-sm-3 col-form-label"><b>propriétaire </b></label>
     <div class="col-sm-9">
     <input name='name'type="text" class="form-control" id="recipient-name">
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label"><b>Etat </b></label>
     <div class="col-sm-9">
     <input name='etat'type="text" class="form-control" id="recipient-name">
     </div>
     </div>

     <div class="form-group row">
     <label  class="col-sm-3 col-form-label"><b>NNI Citoyen</b></label>
     <div class="col-sm-9">
     <input name='citoyen' type="text" pattern="\d*"  title="seulement les numéros" minlength="10" class="form-control" id="recipient-name">
     </div>
     </div>

        <!-- 
    <div class="mb-3">
      <label  class="form-label">NNI Citoyen</label>
      <input required name='citoyen' type="text"  class="form-control">
    </div>

 
      </select>
       
         <br>    -->
  
 
          
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">placer le dossier</button>
      </div>
          
        </form>
      </div>
      
    </div>
  </div>
  
</div>


<div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>rechercher un dossier</h4><hr>
             <form action="{{ route('web.find') }}" method="GET">
        
                <div class="form-group">
                   <label for="">Entrer le NNI du citoyen</label>
                   <input type="text" class="form-control" name="query" placeholder="NNI..." value="{{ request()->input('query') }}">
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

    <table class="table">
  <thead>
    <tr>
     
      
      <th scope="col">Nom de dossier</th>
      
      <th scope="col">Etat?</th>
      <th scope="col">Citoyen</th>
      <th scope="col">déscription</th>
      <th scope="col">supression</th>

    </tr>
  </thead>
  <tbody>
 
   @foreach($dossiers as $dossier)
    <tr>
    
      <td>{{$dossier->nom}}</td>
      
       <td>
       <form action="{{route('modifier_dossier')}}">
       <input type="hidden" name="id" value="{{$dossier->id}}">
       <input type="text" name="etat" value="{{$dossier->etat}}">
       <button type="submit" class="btn btn-success">Valider</button>
       </form>
    
       </td>
       <td>{{$dossier->citoyen_id}} </td>
     <td>{{$dossier->description}}</td>
     <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_dossier">supprimer</button>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
<div class="modal fade" id="delete_dossier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmer la supression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('delete_dossier')}}">
          <div class="mb-3">
          <input type="number" name="id" class="d-none" value="{{$dossier->id}}">
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