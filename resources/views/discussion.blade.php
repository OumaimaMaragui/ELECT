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
          <a class="nav-link text-dark font-weight-bold " href="#" >Don d'energie</a>
        </li>
      </ul>
    </div>
  <div class="col-7">
    <h1 class="text-center">Historique de discussion</h1>

      <br><br><br><br><br>
      @foreach ($aides as $a)
        @if($a->sender_id == Auth::user()->id)
      <div class="m-4" style="position: relative;">
    <div  style="position: absolute;right:0"><span>Moi</span><br>
    <div class="p-3" style="max-width:350px;background-color:rgb(183, 183, 240);border-style:solid;border-radius: 25px;"> {{$a->message}}</div>     
    </div></div>
    <br><br><br>
    @else
      <div class="m-4" style="position: relative;">
        <div  style="position: absolute;left:0"><span>Admin</span><br>
          <div class="p-3" style="max-width:350px;background-color:rgb(238, 144, 144);border-style:solid;border-radius: 25px;">{{$a->message}}</div> 
    </div>
      </div><br><br><br><br>
    @endif
    @endforeach

</div>

@endsection