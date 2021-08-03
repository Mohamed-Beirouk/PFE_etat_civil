@extends('layouts.app')

@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
 Acte de Mariage
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
     <th scope="col">Lieu de Mariage</th>
      <th scope="col">Date de Mariage</th>
        
      <th scope="col">Acte de Mariage</th>
    </tr>
  </thead>
  <tbody>
  @foreach($actes as $acte)
    <tr>
      <th scope="row">{{Auth::guard('citoyen')->user()->nom}}</th>
      <td scope="row">{{Auth::guard('citoyen')->user()->prenom}}</td>
       <td>{{$acte->lieu_mariage}}</td>
      <td>{{$acte->date_mariage}}</td>
      <td>
      @if($acte->path!="")
      <a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a>
     @endif
      </td>
    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
@endsection