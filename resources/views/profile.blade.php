@extends('layouts.master')

@section('titolo', 'Profilo')

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
    <div class="text-center">
        <center>
            <div class=" avatar col-sm-2 col-md-4">
                @if($sesso == "uomo")
                <img src="{{url('/')}}/immagini/iconaProfiloUomo.jpg" class="img-fluid img-thumbnail rounded" alt="...">
                @else
                <img src="{{url('/')}}/immagini/iconaProfiloDonna.jpg" class="img-fluid img-thumbnail rounded" alt="...">
                @endif
            </div>
        </center>
        <div class="row">
            <h4 class="col-sm-1 col-sm-1 offset-sm-5" style="text-transform: uppercase">{{ Auth::user()->name}}</h4>
            <a class="col-sm-1 col-md-1" href="{{route('editProfilo')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>
        </div>


    </div>
    <br>
    <div class="row justify-content-center text-center">
        <div class="col-sm-2">
            <h5>Sesso</h5>
            <h6>{{$sesso}}</h6>
        </div>
        <div class="col-sm-2">
            <h5>Età</h5>
            <h6>{{$età}}</h6>
        </div>
        <div class="col-sm-2">
            <h5>Altezza</h5>
            <h6>{{$altezza}}</h6>
        </div>
        <div class="col-sm-2">
            <h5>Peso</h5>
            <h6>{{$peso}}</h6>
        </div>
    </div>
    <br>
        <div class="row text-center">
            <div class="d-grid gap-2 col-sm-6 col-xs-12 mx-auto d-sm-block">
        <a class="btn btn-primary" href="{{route('schedePersonali')}}" role="button">Schede</a>
        <a class="btn btn-primary" href="{{route('calcolatrici')}}" role="button">Calcolatrici</a>
        <a class="btn btn-primary" href="{{route('timer')}}" role="button">Timer</a>
    </div>
        </div>
    
@endsection

