@extends('layouts.app')

@section('content')

<div class="w-100 p-4">
    <div class="row">
    <div class="col-4">
      <br><br><br> 
      <ul class="nav flex-column">
        <li class="nav-item border w-75 p-2"  style="background-color: #cbd4e4">
          <a class="nav-link text-dark font-weight-bold"  href="{{route('home')}}">Acceuil </a>
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
    
    <h3 class="text-center">Ajuster votre mensualité</h3>
    <br><br><br>
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@if (Session::has('error'))
   <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<div class="d-flex justify-content-around">
<img src="{{asset('img/plus.png')}}" style="height: 60px;width:60px" onclick="add()">
<img src="{{asset('img/minus.jpg')}}" style="height: 60px;width:60px" onclick="remove()">
</div>
<form action="{{route('mensualite')}}" method="POST">
@csrf
<div class="d-flex justify-content-center m-5">
    <input name="suggestion" id="montant" class="form-control w-50" type="text" value="{{$suggestion}}">
    <div class="input-group-append">
        <span class="input-group-text">DH</span>
      </div>
</div>
<div class="d-flex justify-content-center m-5">
    <button type="submit" class="btn" style="background-color: rgb(50, 192, 145);color:white" >Confirmer</button>
</div></form>
</div></div>
</div>

@endsection
<script src="{{asset('js/mensualite.js')}}"></script>