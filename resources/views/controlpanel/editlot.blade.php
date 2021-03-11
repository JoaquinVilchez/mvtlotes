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
                <div class="row">
                    @include('elements.messages')
                </div>
                <div class="row mb-3">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="col-md-6 pl-0">
                            <form action="{{route('lot.update', $lot->id)}}" method="POST" enctype="multipart/form-data" >
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label">Número</label>
                                  <input type="text" value="{{$lot->lot_number}}" class="form-control" disabled>
                                  <div class="form-text">El número del lote no se puede modificar</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Grupo</label>
                                    <select name="group" class="form-select">
                                        @for ($i = 1; $i < 5; $i++)
                                            <option value="{{$i}}" @if($lot->group==$i) selected @endif>Grupo {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Imágen</label>
                                    <input class="form-control" name="image" type="file" id="formFile">
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Guardar cambios</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                                @if($lot->image=='noimage')
                                    <img src="{{asset('assets/images/noimage.png')}}" class="rounded border float-start" width="100%">
                                @else
                                    <img src="{{asset('assets/images/plans/'.$lot->image)}}" class="rounded border float-start" width="100%">
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
