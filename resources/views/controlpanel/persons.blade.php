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
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <table class="table table-sm table-hover" id="personsTable">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
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
