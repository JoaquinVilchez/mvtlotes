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
                    <div class="col-md-6 border-end">
                        <h2 class="app-text-bold app-text-muted">Datos</h2>
                        <form class="mr-3">
                            <div class="mb-3">
                              <label class="form-label">Nombre</label>
                              <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Apellido</label>
                              <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="app-text-bold app-text-muted">Cambiar contraseña</h2>
                        <form class="ml-3">
                            <div class="mb-3">
                              <label class="form-label">Contraseña antigua</label>
                              <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Nueva contraseña</label>
                              <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmar contraseña</label>
                                <input type="password" class="form-control">
                              </div>
                            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
