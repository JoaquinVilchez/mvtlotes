@extends('layouts.app')

@section('css-script')
    <style>
        .selectpicker{
            border: 1px solid red;
        }
    </style>
@endsection

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
                        <form action="{{route('lottery.store')}}" method="post" class="mr-3" id="LotteryForm">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label class="form-label">Grupo</label>
                                    <select name="group" class="form-control" id="group-select" autofocus>
                                        <option value="">Seleccione un grupo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    {!!$errors->first('group', '<small style="color:red"><i class="fas fa-exclamation-circle"></i> :message</small>') !!}
                                </div>
                                <div class="col">
                                    <label class="form-label">Tipo de sorteo</label>
                                    <select name="lottery_type" class="form-control" id="lottery_type-select">
                                        <option value="general">General</option>
                                        <option value="cpd">CPD</option>
                                    </select>
                                    {!!$errors->first('lottery_type', '<small style="color:red"><i class="fas fa-exclamation-circle"></i> :message</small>') !!}
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label class="form-label">Tipo de ganador</label>
                                    <select name="winner_type" class="form-control" id="winner-select">
                                        <option value="headline">Titular</option>
                                        <option value="alternate">Suplente</option>
                                    </select>
                                    {!!$errors->first('winner_type', '<small style="color:red"><i class="fas fa-exclamation-circle"></i> :message</small>') !!}
                                </div>
                                <div class="col">
                                    <label class="form-label">Lote</label>
                                    <select name="lot" class="form-control" id="lot-select">
                                        <option value="">Seleccione un lote</option>
                                    </select>
                                    {!!$errors->first('lot', '<small style="color:red"><i class="fas fa-exclamation-circle"></i> :message</small>') !!}
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <label class="form-label">Ganador</label>
                                <select name="person" class="selectpicker" data-live-search="true" data-width="100%" id="person-select"></select>
                                {!!$errors->first('person', '<small style="color:red"><i class="fas fa-exclamation-circle"></i> :message</small>') !!}
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="app-text-bold app-text-muted">Últimos 5 registros</h2>
                        @if($results->count()==0)
                            <h5 class="app-text-bold container">Todavía no hay registros</h5>
                        @else
                            @foreach ($results as $result)
                                <div @if($result->winner_type=='headline') class="alert alert-success" @else class="alert alert-primary" @endif role="alert">
                                    Grupo {{$result->person->group}} - @if($result->winner_type=='headline') <strong>LOTE {{$result->lot_id}}</strong> - @endif {{ucfirst(translate($result->winner_type))}} - ({{$result->person->code}})  {{$result->person->displayName()}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-script')
    <script>
        $('.selectpicker').selectpicker();

        $('#group-select').on('change', function(){
            group = $('#group-select').val();
            lottery_type = $('#lottery_type-select').val();
            console.log(group,lottery_type)
            getLots(group,lottery_type)
            getPersons(group,lottery_type)
        })

        $('#lottery_type-select').on('change', function(){
            group = $('#group-select').val();
            lottery_type = $('#lottery_type-select').val();
            console.log(group,lottery_type)
            getLots(group,lottery_type)
            getPersons(group,lottery_type)
        })

        $('#winner-select').on('change', function(){
            if($('#winner-select').val()=='alternate'){
                $('#lot-select').prop('disabled', true);
            }else{
                $('#lot-select').prop('disabled', false);
            }
        })

        function getLots(group,lottery_type){
            $.ajax({
                    url : '{{ route("ajax.getLots") }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{group:group,lottery_type:lottery_type},
                    success:function(data){
                        $('#lot-select').empty();
                        $.each(data, function (index, value) {
                            $('#lot-select').append(`<option value="${value.id}">${value.lot_number} - ${value.denomination}</option>`)
                        })
                    },
                    error: function(data) {
                        console.log('ERROR')
                        $.each(data.responseJSON.errors, function(key,value) {
                            console.log(value)
                        })
                    }
                })
        }

        function getPersons(group, lottery_type){
            $.ajax({
                    url : '{{ route("ajax.getPersons") }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{group:group,lottery_type:lottery_type},
                    success:function(data){
                        $('#person-select').empty();
                        $.each(data, function (index, value) {
                            $('#person-select').append(`<option value="${value.id}">${value.code} - ${value.last_name} ${value.mothers_last_name}, ${value.first_name} (${value.type.toUpperCase()})</option>`)
                        })
                        $('.selectpicker').selectpicker('refresh');
                    },
                    error: function(data) {
                        console.log('ERROR')
                        $.each(data.responseJSON.errors, function(key,value) {
                            console.log(value)
                        })
                    }
                })
        }

    </script>


@endsection
