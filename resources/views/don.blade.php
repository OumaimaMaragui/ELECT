@extends('layouts.app')

@section('content')
<div class="mr-5 ml-2">
    <div class="row">
        <div class="col-5 ">
            <br><a href="{{route('home')}}"><button class="btn btn-primary ml-5">Acceuil</button></a>
            <br>
<img style="width: 500px" src="{{asset('img/donate.png')}}" alt="">
</div>
<div class="col-7">
    <br><br>
<h1 style="font-family: 'Dancing Script', cursive;">Faites un don d'énergie pour réchauffer le cœur des plus démunis</h1>
<br><br>
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@if (Session::has('error'))
   <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

<form action="{{route('donate')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">L'identifiant du donataire</label>
        <input name="id" type="number" class="form-control" oninput="if(this.value == {{Auth::user()->id}}){alert('Choisissez un identifiant valide');this.value =''}">
    </div>
    <div class="form-group">
        <label for="">Le nombre de KiloWattHeurs</label>
        <input name="conso" type="number" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Charité</button>
</form>
</div>
</div>
</div>
@endsection