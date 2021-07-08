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
    <h1 class="text-center mb-5">Page d'actualités</h1>

      @foreach ($notif as $n)
      
    @if ($n->type == 'annonce')
    <div class="d-flex justify-content-center">
      <div >
        <img src="{{asset('img/annonce.jpg')}}" alt="" style="width:100px;height:100px">
      </div>
      <div class="alert alert-primary">
            <p>{{$n->date}}</p>
     <h5 class="pl-5">{{$n->texte}}</h5> 
     </div>
    </div>
    @endif

    @if ($n->type == 'alerte')
    <div class="d-flex justify-content-center">
      <div >
        <img src="{{asset('img/alerte.png')}}" alt="" style="width:100px;height:100px">
      </div>
      <div class="alert alert-danger">
      <p>{{$n->date}}</p>
     <h5 class="pl-5">{{$n->texte}}</h5> 
      </div>
    </div>
    @endif

    @if ($n->type == 'notification')
    <div class="d-flex justify-content-center">
      <div >
        <img src="{{asset('img/notif.png')}}" alt="" style="width:100px;height:100px">
      </div>
      <div class="alert alert-success">
      <p>{{$n->date}}</p>
     <h5 class="pl-5">{{$n->texte}}</h5> 
      </div>
    </div>
    @endif


    @endforeach
  </div>
    </div>
</div>
</div>

@endsection