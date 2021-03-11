@extends('layouts.app')

@section('content')
@include('elements.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 border-end mr-0 px-0">
            @include('elements.menu')
        </div>
        <div class="col-md-10">
            <div class="container">
                <div class="row mt-4">
                    @include('elements.messages')
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                            <table class="table table-sm table-hover" id="lotsTable">
                                <thead>
                                    <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Propietario</th>
                                    <th scope="col">Imágen</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lots as $lot)
                                        <tr>
                                            <td>LOTE {{$lot->lot_number}}</td>
                                            <td>{{$lot->group}}</td>
                                            <td>@if($lot->result){{ $lot->result->person->displayName() }} @else - @endif</td>
                                            <td>@if($lot->image!='noimage') <a href="#">Ver croquis</a> @else <span class="app-text-muted">Sin imágen</span> @endif</td>
                                            <td>
                                                <a href="{{route('lot.edit', $lot->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection