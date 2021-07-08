@extends('layouts.appAdmin')

@section('content')

<div class=""><br><br>
    <form action="">
        <div class="d-flex justify-content-between">
            <br><br><br>
            <ul class="nav flex-column w-75">
                <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
                    <a class="nav-link text-dark font-weight-bold" href="{{route('admin.urgente',$sender)}}">Pannes urgentes</a>
                </li>
                <li class="nav-item border w-75 p-2"  style="background-color: #cbd4e4">
                  <a class="nav-link text-dark font-weight-bold"  href="{{route('admin.information',$sender)}}">Demandes d'informations</a>
                </li>
                <li class="nav-item border w-75 p-2" style="background-color: #cbd4e4">
                  <a class="nav-link text-dark font-weight-bold" href="{{route('admin.reclamation',$sender)}}">Réclamations</a>
                </li>
            </ul>        
        </div>
    </form>
</div>

@endsection