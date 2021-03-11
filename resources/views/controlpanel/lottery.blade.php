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
                        @include('elements.messages')
                        <h2 class="app-text-bold app-text-muted">Asignar ganador</h2>
                        <form action="{{route('lottery.store')}}" method="post" class="mr-3">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label">Lote</label>
                              <select name="lot" class="form-control">
                                @for ($i = 1; $i < 48; $i++)
                                    <option value="{{$i}}" 

                                    @if($i < getLotteryCount()+1)
                                        disabled
                                    @endif
                                    @if($i == getLotteryCount()+1)
                                        selected
                                    @endif

                                    >LOTE {{$i}}</option>
                                @endfor
                              </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ganador</label>
                                <select name="person" class="form-control">
                                        <option value="" selected disabled>Seleccione una persona ({{$persons->count()}} disponibles)</option>
                                    @foreach ($persons as $person)
                                        <option value="{{$person->id}}">{{$person->code}} - {{$person->displayName()}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="app-text-bold app-text-muted">Lotes</h2>
                        <div class="lot-map">
                            @for ($i = 1; $i < 48; $i++)
                                <button type="button" class="lot 
                                @if($i == getLotteryCount()+1)
                                    disabled
                                @elseif($i == getLotteryCount()+1)
                                    active
                                @elseif($i > getLotteryCount()+1)
                                    expecting
                                @endif
                                "> LOTE {{$i}}</button>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
