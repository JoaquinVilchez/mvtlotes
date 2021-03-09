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
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="search-form">
                            <form class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                        <label class="visually-hidden">Name</label>
                                        <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                              </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <table class="table table-sm table-hover" id="personsTable">
                            <thead>
                                <tr>
                                <th scope="col">Lote</th>
                                <th scope="col">Número</th>
                                <th scope="col">Apellidos y nombres</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1234</td>
                                    <td>PEREZ RODRIGUEZ, Juan Ignacio</td>
                                    <td><i class="bi bi-trash"></i></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1234</td>
                                    <td>PEREZ RODRIGUEZ, Juan Ignacio</td>
                                    <td><i class="bi bi-trash"></i></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>1234</td>
                                    <td>PEREZ RODRIGUEZ, Juan Ignacio</td>
                                    <td><i class="bi bi-trash"></i></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>1234</td>
                                    <td>PEREZ RODRIGUEZ, Juan Ignacio</td>
                                    <td><i class="bi bi-trash"></i></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>1234</td>
                                    <td>PEREZ RODRIGUEZ, Juan Ignacio</td>
                                    <td><i class="bi bi-trash"></i></td>
                                </tr>
                            </tbody>
                        </table>
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
            $('#personsTable').DataTable();
        } );
    </script>
@endsection
