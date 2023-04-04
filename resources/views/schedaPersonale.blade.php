@extends('layouts.master')

@section('titolo', 'Scheda Personale')

@section('left_navbar')
<li class="nav-item">
    <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
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
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='40%'>
                <col width='20%'>
                <col width='20%'>
                <col width='20%'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-center">N. Serie</th>
                        <th class="text-center">N. Ripetizioni</th>
                        <th class="text-center">Recupero (s)</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($eserciziList as $esercizio)
                    <tr>
                        <td>{{$esercizio->nome}}</td>
                        <td class="text-center">{{$esercizio->serie}}</td>
                        <td class="text-center">{{$esercizio->ripetizioni}}</td>
                        <td class="text-center">{{$esercizio->recupero}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

