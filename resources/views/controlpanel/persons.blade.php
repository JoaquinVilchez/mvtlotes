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
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-outline-success"><i class="bi bi-file-earmark-excel"></i> Importar hoja de Excel</button>
                        <div class="search-form">
                            <form class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                        <label class="visually-hidden">Name</label>
                                        <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                            <table class="table table-sm table-hover" id="personsTable">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Apellidos y nombres</th>
                                    <th scope="col">Lote</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persons as $person)
                                        <tr>
                                            <td>{{$person->code}}</td>
                                            <td>{{$person->displayName()}}</td>
                                            <td>@if($person->result) <span class="badge bg-success">LOTE {{$person->result->lot->lot_number}}</span> @else NO @endif</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    {{$persons->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-script')
    <script>
        $(document).ready( function () {
            $('#personsTable').DataTable();
        } );
    </script>
@endsection
