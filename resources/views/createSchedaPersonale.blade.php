@extends('layouts.master')

@section('titolo', 'Creazione Scheda')

@section('left_navbar')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Esercizi
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="{{route('fondamentali')}}">Fondamentali</a></li>
        <li><a class="dropdown-item" href="{{route('complementari')}}">Complementari</a></li>
        <li><a class="dropdown-item" href="{{route('corpoLibero')}}">Corpo Libero</a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('schede')}}">Schede</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('calcolatrici')}}">Calcolatrici</a>
</li>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <h2>{{$nomeScheda}}</h2>
        <br>
        <div class="col-md-12">
            <form id="form1" method="post">
                @csrf
                <table id="tabella" class="table table-striped table-hover table-responsive" style="width:100%">
                    <col width='40%'>
                    <col width='15%'>
                    <col width='15%'>
                    <col width='15%'>
                    <col width='15%'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>N. Serie</th>
                            <th>N. Ripetizioni</th>
                            <th>Recupero (s)</th>
                            <th><input type="button" class="btn btn-success" value="Aggiungi Esercizio" onclick="appendFormScheda()"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <div id="appendID"></div>
                    </tbody>
                </table>
                <br>
                <div><a class="btn btn-primary offset-md-5 col-md-2" onclick="saveScheda();document.getElementById('form1').submit()">Salva</a></div>
            </form>
        </div>
    </div>
</div>
@endsection



