@extends('layouts.master')

@section('titolo')
{{trans('labels.siteTitle')}}
@endsection

@section('left_navbar')
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        @lang('labels.exercises')
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <li><a class="dropdown-item" href="{{route('fondamentali')}}">@lang('labels.fundamental')</a></li>
        <li><a class="dropdown-item" href="{{route('complementari')}}">@lang('labels.complementary')</a></li>
        <li><a class="dropdown-item" href="{{route('corpoLibero')}}">@lang('labels.bodyweight ')</a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('schede')}}">@lang('labels.cards')</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('calcolatrici')}}">@lang('labels.calculators')</a>
</li>
@endsection

@section('corpo')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{url('/')}}/immagini/bilanciere.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('labels.firstCaroselLabel')</h3>
                <p>@lang('labels.firstCaroselP')</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url('/')}}/immagini/plank.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('labels.secondCaroselLabel')</h3>
                <p>@lang('labels.secondCaroselP')</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url('/')}}/immagini/protein.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>@lang('labels.thirdCaroselLabel')</h3>
                <p>@lang('labels.thirdCaroselP')</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<br>
<div class="container">
    <h2>@lang('labels.homeTitle')</h2>
    <p>@lang('labels.homeBody')</p>
</div>
@endsection
