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
                <div class="row my-4">
                    <div class="col-md-6 border-end">
                        <h2 class="app-text-bold app-text-muted">Asignar ganador</h2>
                        <form class="mr-3">
                            <div class="mb-3">
                              <label class="form-label">Lote</label>
                              <select class="form-select">
                                <option disabled> LOTE 1 </option>
                                <option disabled> LOTE 2 </option>
                                <option disabled> LOTE 3 </option>
                                <option disabled> LOTE 4 </option>
                                <option selected> LOTE 5 </option>
                                <option> LOTE 6 </option>
                                <option> LOTE 7 </option>
                                <option> LOTE 8 </option>
                                <option> LOTE 9 </option>
                                <option> LOTE 10 </option>
                                <option> LOTE 11 </option>
                                <option> LOTE 12 </option>
                                <option> LOTE 13 </option>
                                <option> LOTE 14 </option>
                                <option> LOTE 15 </option>
                                <option> LOTE 16 </option>
                                <option> LOTE 17 </option>
                                <option> LOTE 18 </option>
                                <option> LOTE 19 </option>
                                <option> LOTE 20 </option>
                                <option> LOTE 21 </option>
                                <option> LOTE 22 </option>
                                <option> LOTE 23 </option>
                                <option> LOTE 24 </option>
                                <option> LOTE 25 </option>
                                <option> LOTE 26 </option>
                                <option> LOTE 27 </option>
                                <option> LOTE 28 </option>
                                <option> LOTE 29 </option>
                                <option> LOTE 30 </option>
                                <option> LOTE 31 </option>
                                <option> LOTE 32 </option>
                                <option> LOTE 33 </option>
                                <option> LOTE 34 </option>
                                <option> LOTE 35 </option>
                                <option> LOTE 36 </option>
                                <option> LOTE 37 </option>
                                <option> LOTE 38 </option>
                                <option> LOTE 39 </option>
                                <option> LOTE 40 </option>
                                <option> LOTE 41 </option>
                                <option> LOTE 42 </option>
                                <option> LOTE 43 </option>
                                <option> LOTE 44 </option>
                                <option> LOTE 45 </option>
                                <option> LOTE 46 </option>
                                <option> LOTE 47 </option>
                              </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ganador</label>
                                <select class="form-select">
                                    <option value="1">1234 - PEREZ SANCHEZ, Juan</option>
                                    <option value="2">1234 - PEREZ SANCHEZ, Juan</option>
                                    <option value="3">1234 - PEREZ SANCHEZ, Juan</option>
                                    <option value="4">1234 - PEREZ SANCHEZ, Juan</option>
                                    <option value="5">1234 - PEREZ SANCHEZ, Juan</option>
                                </select>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Ganador suplente</label>
                                <select class="form-control">
                                    <option value="1">4321 - MALDIVI CORIA, Susana</option>
                                    <option value="2">4321 - MALDIVI CORIA, Susana</option>
                                    <option value="3">4321 - MALDIVI CORIA, Susana</option>
                                    <option value="4">4321 - MALDIVI CORIA, Susana</option>
                                    <option value="5">4321 - MALDIVI CORIA, Susana</option>
                                </select>
                            </div> --}}

                            <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="app-text-bold app-text-muted">Lotes</h2>
                        <div class="lot-map">
                            <button type="button" class="lot disabled"> LOTE 1 </button>
                            <button type="button" class="lot disabled"> LOTE 2 </button>
                            <button type="button" class="lot disabled"> LOTE 3 </button>
                            <button type="button" class="lot disabled"> LOTE 4 </button>
                            <button type="button" class="lot active"> LOTE 5 </button>
                            <button type="button" class="lot expecting"> LOTE 6 </button>
                            <button type="button" class="lot expecting"> LOTE 7 </button>
                            <button type="button" class="lot expecting"> LOTE 8 </button>
                            <button type="button" class="lot expecting"> LOTE 9 </button>
                            <button type="button" class="lot expecting"> LOTE 10 </button>
                            <button type="button" class="lot expecting"> LOTE 11 </button>
                            <button type="button" class="lot expecting"> LOTE 12 </button>
                            <button type="button" class="lot expecting"> LOTE 13 </button>
                            <button type="button" class="lot expecting"> LOTE 14 </button>
                            <button type="button" class="lot expecting"> LOTE 15 </button>
                            <button type="button" class="lot expecting"> LOTE 16 </button>
                            <button type="button" class="lot expecting"> LOTE 17 </button>
                            <button type="button" class="lot expecting"> LOTE 18 </button>
                            <button type="button" class="lot expecting"> LOTE 19 </button>
                            <button type="button" class="lot expecting"> LOTE 20 </button>
                            <button type="button" class="lot expecting"> LOTE 21 </button>
                            <button type="button" class="lot expecting"> LOTE 22 </button>
                            <button type="button" class="lot expecting"> LOTE 23 </button>
                            <button type="button" class="lot expecting"> LOTE 24 </button>
                            <button type="button" class="lot expecting"> LOTE 25 </button>
                            <button type="button" class="lot expecting"> LOTE 26 </button>
                            <button type="button" class="lot expecting"> LOTE 27 </button>
                            <button type="button" class="lot expecting"> LOTE 28 </button>
                            <button type="button" class="lot expecting"> LOTE 29 </button>
                            <button type="button" class="lot expecting"> LOTE 30 </button>
                            <button type="button" class="lot expecting"> LOTE 31 </button>
                            <button type="button" class="lot expecting"> LOTE 32 </button>
                            <button type="button" class="lot expecting"> LOTE 33 </button>
                            <button type="button" class="lot expecting"> LOTE 34 </button>
                            <button type="button" class="lot expecting"> LOTE 35 </button>
                            <button type="button" class="lot expecting"> LOTE 36 </button>
                            <button type="button" class="lot expecting"> LOTE 37 </button>
                            <button type="button" class="lot expecting"> LOTE 38 </button>
                            <button type="button" class="lot expecting"> LOTE 39 </button>
                            <button type="button" class="lot expecting"> LOTE 40 </button>
                            <button type="button" class="lot expecting"> LOTE 41 </button>
                            <button type="button" class="lot expecting"> LOTE 42 </button>
                            <button type="button" class="lot expecting"> LOTE 43 </button>
                            <button type="button" class="lot expecting"> LOTE 44 </button>
                            <button type="button" class="lot expecting"> LOTE 45 </button>
                            <button type="button" class="lot expecting"> LOTE 46 </button>
                            <button type="button" class="lot expecting"> LOTE 47 </button>
                        </div>
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
            // $('.selectpicker').selectpicker();
            // $('#personsTable').DataTable();
        } );
    </script>
@endsection
