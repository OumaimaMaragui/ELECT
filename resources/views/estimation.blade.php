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
<div class="d-flex justify-content-around">
    <div ><br><br>
    <img src="{{asset('img/plus.png')}}" style="height: 60px;width:60px" onclick="add()"><br>
<br><br><br><br>
<img src="{{asset('img/equal.png')}}" style="height: 60px;width:60px" onclick="estimate()"><br>

  </div>
<div class=" w-75">
<input id="nom" type="text" class="form-control" placeholder="Nom de l'équipement">
<input id="puissance" type="number" min="0" class="form-control" placeholder="Puissance électrique de l'équipement en W">
<input id="nombre" type="number" min="0" class="form-control" placeholder="Nombre d'équipements">
<select  class="form-control" id="temps">
    <option value="1">moins d'une heure</option>
    <option value="2">1H - 3H</option>
    <option value="4">3H - 5H</option>
    <option value="6">5H - 7H</option>
    <option value="8">7H - 9H</option>
    <option value="10">9H - 11H</option>
    <option value="12">11H - 13H</option>
    <option value="14">13H - 15H</option>
    <option value="16">15H - 17H</option>
    <option value="18">17H - 19H</option>
    <option value="20">19H - 21H</option>
    <option value="20">19H - 21H</option>
    <option value="24">24H</option>
</select>
<br><br><br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Equipement</th>
        <th scope="col">Puissance electrique</th>
        <th scope="col">Nombre</th>
        <th scope="col">Temps estimé</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody id="tbody">
    </tbody>
  </table></div>
</div>
</div>
  </div>
@endsection
<script src="{{asset('js/estimation.js')}}"></script>
