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
                    <div class="col-md-12">
                        @include('elements.messages')
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
                                        <td>@if($lot->image!='noimage') <a href="#"  data-toggle="modal" data-target="#lotImageModal">Ver croquis</a> @else <span class="app-text-muted">Sin imágen</span> @endif</td>
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

<!-- Modal -->
<div class="modal fade" id="lotImageModal" tabindex="-1" aria-labelledby="lotImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lotImageModalLabel">Imágen del lote</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection