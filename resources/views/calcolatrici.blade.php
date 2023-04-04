@extends('layouts.master')

@section('titolo', 'Calcolatrici')

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
    <a class="nav-link active" href="{{route('calcolatrici')}}">Calcolatrici</a>
</li>
@endsection


@section('corpo')
<div class="container">
    <div class="col-12">
        <div class="offset-md-2">
            <form class="form-horizontal">
                <div class="offset-4"><legend>Calcolatrice</legend></div>
                <div class="form-group row">
                    <label for="età" class="col-form-label col-sm-2">Età</label>
                    <div class="col-sm-4 col-md-6">
                        @if($userID != null)
                        <input type="text" id="età" name="età" class="form-control" value="{{$età}}">
                        @else
                        <input type="text" id="età" name="età" class="form-control" placeholder="età espressa in numero">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="peso peso1" class="col-form-label col-sm-2">Peso</label>
                    <div class="col-sm-4 col-md-6">
                        @if($userID != null)
                        <input type="text" id="peso" name="peso" class="form-control" value="{{$peso}}">
                        @else
                        <input type="text" id="peso" name="peso" class="form-control" placeholder="Peso espresso in kg">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="altezza altezza1" class="col-form-label col-sm-2">Altezza</label>
                    <div class="col-sm-4 col-md-6">
                        @if($userID != null)
                        <input type="text" id="altezza" name="altezza" class="form-control" value="{{$altezza}}">
                        @else
                        <input type="text" id="altezza" name="altezza" class="form-control" placeholder="Altezza espressa in cm">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sesso" class="col-form-label col-sm-2">Sesso</label>
                    <div class="col-sm-4 col-md-6">
                        @if($userID!= null && $sesso == "uomo")
                        <select id="sesso" class="form-select" disabled>
                            <option>uomo</option>
                        </select>
                        @elseif($userID!= null && $sesso == "donna")
                        <select id="sesso" class="form-select" disabled>
                            <option>donna</option>
                        </select>
                        @else
                        <select id="sesso" class="form-select">
                            <option>uomo</option>
                            <option>donna</option>
                        </select>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stileDiVita" class="col-form-label col-sm-2">Stile di vita</label>
                    <div class="col-sm-4 col-md-6">
                        <select id="stileDiVita" class="form-select">
                            <option>Sedentario - sempre seduto</option>
                            <option>Attività moderata - 10 mila passi o 3 giorni in palestra</option>
                            <option>Attività intensa - 10 mila passi e 5/6 giorni di allenamento intenso</option>
                        </select>
                    </div>
                </div>
                <br>
            </form>
            <div class="row col-sm-4 col-md-6 offset-sm-2">
                <button class="btn btn-primary btn-large btn-block" onclick="calcola()">Calcola</button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="offset-2 col-4 text-center" id="fabbisognoCaloricoGiornalieroTitolo"></div>
        <div class="col-4 text-center" id="indiceMassaCorporeaTitolo"></div>
    </div>
    <div class="row">
        <div class="offset-2 col-4 text-center" id="fabbisognoCaloricoGiornaliero"></div>
        <div class="col-4 text-center" id="indiceMassaCorporea"></div>
    </div>
    <br>
    <div></div>
</div>
@endsection


