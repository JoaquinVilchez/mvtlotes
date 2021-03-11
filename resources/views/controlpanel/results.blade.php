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
                        @if ($results->count()>0)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="messages">
                                @include('elements.messages')
                            </div>
                            <div class="search-form">
                                <form class="row row-cols-lg-auto align-items-center">
                                    <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Buscar">
                                    </div>
                                  </form>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                                <table class="table table-sm table-hover" id="personsTable">
                                    <thead>
                                        <tr>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Lote</th>
                                        <th scope="col">Número</th>
                                        <th scope="col">Apellidos y nombres</th>
                                        <th scope="col">DNI</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{$result->person->group}}</td>
                                                <td>{{strtoupper($result->person->type)}}</td>
                                                <td>{{$result->lot->lot_number}}</td>
                                                <td>{{$result->person->code}}</td>
                                                <td>{{$result->person->displayName()}}</td></td>
                                                <td>{{$result->person->dni}}</td>
                                                <td>
                                                    <a href='#' data-resultid="{{$result->id}}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteResultModal">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    @else
                        <h2>Todavía no hay resultados</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="deleteResultModal" tabindex="-1" aria-labelledby="deleteResultModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteResultModal">Eliminar resultado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('lottery.destroy')}}" method="POST">
            @csrf
            <div class="modal-body" style="text-align: center">
                <h5>¡Estás a punto de eliminar un resultado!</h5>
                <p style="font-size: .85em">Esta acción es irreversible.<br>¿Estás seguro de realizar esta acción?</p>
                <input name="resultid" type="hidden" id="resultid" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Sí, estoy seguro</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('js-script')
<script>

    $('#deleteResultModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)

        var resultid = button.data('resultid')
        var modal = $(this)

        modal.find('.modal-body #resultid').val(resultid)

    })
</script>
@endsection
