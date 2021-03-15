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

                        <div class="d-flex justify-content-between align-items-center mb-4">
                                <table class="table table-sm table-hover" id="personsTable">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Apellidos y nombres</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Lote</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($persons as $person)
                                            <tr>
                                                <td>{{$person->code}}</td>
                                                <td>{{$person->displayName()}}</td>
                                                <td>{{$person->dni}}</td>
                                                <td>{{$person->group}}</td>
                                                <td>{{strtoupper($person->type)}}</td>
                                                {{-- {{dd($person->result)}} --}}
                                                <td>@if($person->result!=null) 
                                                    @if($person->result->lot_id != null) <span class="badge badge-success">LOTE {{$person->result->lot_id}}</span>
                                                    @else <span class="badge badge-primary">Suplente</span>
                                                    @endif
                                                    @else NO
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                        {{-- {{$persons->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-script')
    <script>
        $(document).ready( function () {
            $('#personsTable').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'},
                "order": [[ 0, "asc" ]]
            });
        });
    </script>
@endsection
