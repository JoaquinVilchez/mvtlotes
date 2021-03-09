@extends('layouts.app')

@section('content')
@include('elements.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 border-end mr-0 px-0">
            @include('elements.menu')
        </div>
        <div class="col-md-10">
            <button type="button" class="btn btn-dark panel-output-button active" data-bs-toggle="button">Placa general</button>
            <button type="button" class="btn btn-dark panel-output-button" data-bs-toggle="button">Próximo sorteo</button>
            <button type="button" class="btn btn-dark panel-output-button" data-bs-toggle="button">Último ganador</button>
            <button type="button" class="btn btn-dark panel-output-button" data-bs-toggle="button">Últimos 5 ganadores</button>
        </div>
    </div>
</div>
@endsection
