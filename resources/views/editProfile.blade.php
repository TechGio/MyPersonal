@extends('layouts.master')

@section('titolo', 'Modifica Profilo')

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
    <form id="form1" class="form-horizontal" method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control col-sm-6" name="email" id="email" value="{{$email}}" disabled>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control col-sm-6" name="newPassword" id="newPassword" placeholder="Insert new password">
        </div>
        <div class="form-group">
            <label for="repeatNewPassword">Repeat New Password</label>
            <input type="password" class="form-control col-sm-6" id="repeatNewPassword" name="repeatNewPassword" placeholder="Repeat new password">
            <span id="differentPassword"></span>
        </div>
        <div class="form-group row">
            <div class="form-group col">
                <label for="sesso">Sesso</label>
                <input type="text" class="form-control" name="sesso" id="sesso" value="{{$sesso}}" disabled>
            </div>
            <div class="form-group col">
                <label for="età">Età</label>
                <input type="text" class="form-control" name="età" id="età" value="{{$età}}">
                <span id="wrongEtà"></span>
            </div>
            <div class="form-group col">
                <label for="altezza">Altezza</label>
                <input type="text" class="form-control" name="altezza" id="altezza" value="{{$altezza}}">
                <span id="wrongAltezza"></span>
            </div>
            <div class="form-group col">
                <label for="peso">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" value="{{$peso}}">
                <span id="wrongPeso"></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-secondary" href="{{route('profilo')}}" role="button">Cancella</a>
                <input type="submit" class="btn btn-primary" value="Conferma" onclick="event.preventDefault(); editProfile();">
            </div>
        </div>
    </form>
</div>

<div class="modal" id="confermaModifica">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifica Profilo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Confermare le modifiche apportate?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancella</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('form1').submit()">Conferma</button>
      </div>
    </div>
  </div>
</div>
@endsection



