
@extends('layouts.app')

@section('content')

<div class="container col-8">
    <br><br><br>
    <div class="row">
        <style>
            #aa{
                text-decoration: none;
                color:black;
            }
            #aa:hover{
                color:black;

            }
        </style>
        <div class="col-6"><a class="btn w-100" style="background-color: #b5c5e4" href="{{route('ajustement')}}" ><div style="display:table-cell;vertical-align:middle;height:120px;text-align:center;width:700px">Ajustement de mensualité</div></a></div>
        <div class="col-6"><a class="btn w-100" style="background-color: #7b9bd8" href="{{route('consommation')}}" ><div style="display:table-cell;vertical-align:middle;height:120px;text-align:center;width:700px"> Suivi de consommation</div></a></div>
    </div>    
    <div class="row"><br></div>
    <div class="row">
        <div class="col-6"><a class="btn " style="background-color: #899ab9" href="{{route('actualites')}}" ><div style="display:table-cell;vertical-align:middle;height:120px;;text-align:center;width:700px">Actualités</div></a></div>
        <div class="col-6"><a class="btn " style="background-color: #617baa" href="{{route('estimation')}}" ><div style="display:table-cell;vertical-align:middle;height:120px;;text-align:center;width:700px">Estimation de consommation</div></a></div>
    
    </div>
    <div class="row">
    </div>
</div>
@endsection
