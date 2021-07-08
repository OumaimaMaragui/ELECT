@extends('layouts.appAdmin')

@section('content')
<br>
<a href="{{route('admin.home')}}">
<button class="btn btn-lg btn-primary ml-4" >Retour</button></a>
<h1 class="text-center">{{$titre}}</h1>
<br>
<br><br>
<form id="formulaire" action="" method="GET">
    @csrf
<div class="m-4">
    <div class="row">
    <div class="col-5" >
@foreach ($aides as $a)
<div style="border: 5px solid rgb(168, 168, 168);border-width:thin;width:450px" id="{{$a->sender_id}}" onclick="document.getElementById('input'+id).value=id;document.getElementById('formulaire').action=id;document.getElementById('formulaire').submit();">
    <input  type="text" name="input[]" id="input{{$a->sender_id}}" style="display: none" >
<img class="m-2" style="width: 80px;height:80px;" src="{{asset('img/person.jpg')}}" alt="">
<div class="p-3" style="display:inline-block">
<h5>{{$a->nom }} {{$a->prenom}}</h5>
<p class="" style="width:300px">
    {{$a->message}} 
</p>
</div><br></div>
@endforeach
</div>
<div class="col-6">
          @foreach ($discussion as $a)
        @if($a->sender_id == Auth::user()->id)
        <br><br>
      <div class="m-4" style="position: relative;">
    <div  style="position: absolute;right:0"><span>Moi</span><br>
    <div class="p-3" style="max-width:350px;background-color:rgb(183, 183, 240);border-style:solid;border-radius: 25px;"> {{$a->message}}</div>     
    </div></div>
    <br><br>
    @else <br><br>
      <div class="m-4" style="position: relative;">
        <div  style="position: absolute;left:0"><span>{{$a->nom}} {{$a->prenom}}</span><br>
          <div class="p-3" style="max-width:350px;background-color:rgb(238, 144, 144);border-style:solid;border-radius: 25px;">{{$a->message}}</div> 
    </div>
      </div><br><br>
    @endif
    @endforeach
    <br><br><br><br>
</div>
</div>
</div>
</form>
@if($aides != '[]')
<form action="{{url()->current()}}" method="POST">@csrf
  <div class="d-flex offset-6 mr-5">
  <input name="message" type="text"  class="form-control w-100" placeholder="Envoyer un message">
  <button type="submit" class="btn btn-outline-primary ml-1">Envoyer</button>
</div>
</form>
@endif
@endsection