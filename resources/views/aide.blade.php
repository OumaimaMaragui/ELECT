@extends('layouts.app')

@section('content')
<div class="w-100 p-4">
    <div class="row">
    <div class="col-4">
      <br><br><br> 
      <ul class="nav flex-column">
        <li class="nav-item border w-75 p-2"  style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold"  href="{{route('home')}}">Acceuil</a>
        </li>
        <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold" href="{{route('actualites')}}">Actualités</a>
        </li>
        <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold" href="{{route('estimation')}}">Estimation de la consommation</a>
        </li>
        <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold " href="{{route('aide')}}" >Aide</a>
        </li>
        <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold " href="{{route('don')}}" >Don d'energie</a>
        </li>
      </ul>
    </div>
  <div class="col-6">
    @if (session('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{{session('msg')}}</li>
        </ul>
    </div>
@endif
  <form id="formulaire" action="{{route('send',Auth::user()->id)}}" method="POST">
    @csrf
<div class="form-group">
    <label for="type">Type de d'aide</label>    
    <select class="form-control" name="type">
        <option value="information">Demande d'informations</option>
        <option value="reclamation">Réclamation</option>
        <option value="urgence">Panne urgente</option>
    </select>
</div>
<div class="form-group">
    <label for="message">Votre message</label>
    <textarea id="message" class="form-control" name="message" cols="30" rows="10" required></textarea>
</div></form>
<div class="d-flex justify-content-between">
<button id="envoyer" type="submit" class="btn btn-primary">Envoyer</button>
<a href="{{route('discussion')}}"><button class="btn btn-danger">Historique de discussion</button></a>
</div>
<script type="text/javascript">
var envoyer = document.getElementById('envoyer');
  envoyer.addEventListener('click',(event)=>{
    event.preventDefault()
    if(document.getElementById('message').value == ""){
      alert('Veuillez écrire un message')
    }else{
    document.getElementById('formulaire').submit();}
  })
</script>
<br><br><br><br>
</div>
@endsection