@extends('layouts.app')

@section('content')
<style>
.glow {
  color: rgb(82, 61, 126);
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px rgb(92, 148, 128), 0 0 40px rgb(92, 148, 128), 0 0 50px rgb(92, 148, 128), 0 0 60px rgb(92, 148, 128) ,0 0 70px rgb(92, 148, 128), 0 0 80px rgb(92, 148, 128);
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px rgb(173, 209, 196), 0 0 40px rgb(173, 209, 196), 0 0 50px rgb(173, 209, 196), 0 0 60px rgb(173, 209, 196), 0 0 70px rgb(173, 209, 196) ,0 0 80px rgb(173, 209, 196);
  }
}
</style>
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
  
<br><br><br><br>
<h3 class="text-center">Consommation quotidienne</h3><br>
<div id="chart4" style="height: 300px;"></div>


<br><br><br>
<h3 class="text-center">Consommation mensuelle</h3><br>
<div id="chart2" style="height: 300px;"></div>

<br><br><br>
<h3 class="text-center">Consommation annuelle</h3><br>
<br>
<div id="chart" style="height: 300px;"></div>

</div>
</div>
</div>  

 
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>

<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

   <script >
const chart = new Chartisan({
        el: '#chart',
        url: "@chart('annuelle_chart')" ,
        hooks: new ChartisanHooks()
        .responsive()
      .colors(['#ECC94B','#DCDCDC'])
      .datasets(['line',{ type: 'line', fill: false }])

      
      });
      const chart2 = new Chartisan({
        el: '#chart2',
        url: "@chart('mensuelle_chart')" ,
        hooks: new ChartisanHooks()
    .beginAtZero()
    .colors(['#ECC94B','#DCDCDC'])
      .datasets(['line',{ type: 'line', fill: false }])

      });


      const chart4 = new Chartisan({
        el: '#chart4',
        url: "@chart('quotidien_chart')" ,
        hooks: new ChartisanHooks()
        .colors(['#ECC94B','#DCDCDC'])
      .datasets(['line',{ type: 'line', fill: false }])
      });


    </script>





@endsection