@extends('layouts.app')

@section('content')
@include('elements.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 border-end mr-0 px-0">
            @include('elements.menu')
        </div>
        <div class="col-md-10">
            <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" onclick="placaGeneral()" id="option1">Placa general</button>
            <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" onclick="proximoSorteo()" id="option2">Próximo sorteo</button>
            <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" id="option1">Último ganador</button>
            <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" id="option1">Últimos 5 ganadores</button>
        </div>
    </div>
</div>
@endsection

@section('js-script')
<script>
    function placaGeneral(){
        $.ajax({
            url : '{{route("output.placageneral")}}',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                $('#option2').removeClass('active')
                $('#option1').addClass('active')
            },
            error:function(data){
                console.log('Mal')
            }
        });
    }

    function proximoSorteo(){
        $.ajax({
            url : '{{route("output.proximosorteo")}}',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                $('#option1').removeClass('active')
                $('#option2').addClass('active')
            },
            error:function(data){
                console.log('Mal')
            }
        });
    }
</script>
@endsection
