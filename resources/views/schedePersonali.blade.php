@extends('layouts.master')

@section('titolo', 'Schede Personali')

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
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='80%'>
                <col width='10%'>
                <col width='10%'>
                <thead>
                    <tr>
                        <th>Nome Scheda</th>
                        <th class="" colspan="2">
                            <input type="submit" data-bs-toggle="modal" data-bs-target="#creazioneScheda" class="form-control btn btn-primary" value="Crea Nuova Scheda">
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($schedeList as $scheda)
                    <tr>
                        <td><a class="text-decoration-none" href="{{route('schedaPersonalePage', ['id' => $scheda->id])}}">{{ $scheda->nome }}</a></td>
                        <td>
                            <a class="btn btn-primary  col-md-12" href="{{route('schedaPersonaleEdit', ['id' => $scheda->id])}}">Modifica</a>
                        </td>
                        <td>
                            <a class="btn btn-danger  col-md-12" href="{{ route('schedaDeleteConfirmation', ['id' => $scheda->id]) }}">Elimina</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal" id="creazioneScheda">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Creazione Scheda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="col-form-label">Inserisci il nome della scheda:</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancella</button>
                <button class="btn btn-primary" onclick="
                        window.location = '/profilo/schedaPersonale/' + document.getElementById('nome').value + '/create'">
                    Conferma</button>
            </div>
        </div>
    </div>
</div>
@endsection