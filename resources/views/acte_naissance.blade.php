@extends('layouts.app')
<?php

use App\Models\User;
use App\Models\citoyen;
?>  


@section('content')
<div class="container">
<div class="alert alert-primary" role="alert">
 Acte de Naissances
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">NNI</th>
      
      <th scope="col">Acte de Naissance</th>
    </tr> 
  </thead>
  <tbody>
  @foreach($actes as $acte) 
    <tr>
      <th scope="row">{{Auth::guard('citoyen')->user()->nni}}</th>
      <td><a href="{{route('download',$acte->path)}}" target='_blank' class="btn btn-success">Télécharger</a></td>
    </tr>
    @endforeach
  
  </tbody>
</table>
</div>
@endsection