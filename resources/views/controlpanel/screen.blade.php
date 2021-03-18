@extends('layouts.app')

@section('content')
@include('elements.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 border-end mr-0 px-0">
            @include('elements.menu')
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="d-flex align-items-center">
                    <h1 class="mx-4">PNT</h1>
                </div>
                <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" onclick="placaGeneral()" id="option1">Logo MVT</button>
                {{-- <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" onclick="proximoSorteo()" id="option2">Próximo sorteo</button> --}}
            </div>
            <hr>
            <div class="row">
                <div class="d-flex align-items-center">
                    <h1 class="mx-4">CPD</h1>
                </div>
                <button type="button" class="btn btn-mvt-screen" id="headline-cpd-1" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 1); activeButton('headline', 'cpd', 1)">TITULARES <br>CPD - GRP 1</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-cpd-1" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 1); activeButton('alternate', 'cpd', 1);">SUPLENTES <br>CPD - GRP 1</button>
                <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                <button type="button" class="btn btn-mvt-screen" id="headline-cpd-2" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 2); activeButton('headline', 'cpd', 2)">TITULARES <br>CPD - GRP 2</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-cpd-2" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 2); activeButton('alternate', 'cpd', 2)">SUPLENTES <br>CPD - GRP 2</button>
                <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                <button type="button" class="btn btn-mvt-screen" id="headline-cpd-3" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 3); activeButton('headline', 'cpd', 3)">TITULARES <br>CPD - GRP 3</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-cpd-3" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 3); activeButton('alternate', 'cpd', 3)">SUPLENTES <br>CPD - GRP 3</button>
            </div>
            <hr>
            <div class="row">
                <div class="d-flex align-items-center">
                    <h1 class="mx-4">GRL</h1>
                </div>
                <button type="button" class="btn btn-mvt-screen" id="headline-general-1" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 1); activeButton('headline', 'general', 1)">TITULARES <br>GRL - GRP 1</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-general-1" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 1); activeButton('alternate', 'general', 1)">SUPLENTES <br>GRL - GRP 1</button>
                <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                <button type="button" class="btn btn-mvt-screen" id="headline-general-2" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 2); activeButton('headline', 'general', 2)">TITULARES <br>GRL - GRP 2</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-general-2" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 2); activeButton('alternate', 'general', 2)">SUPLENTES <br>GRL - GRP 2</button>
                <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                <button type="button" class="btn btn-mvt-screen" id="headline-general-3" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 3); activeButton('headline', 'general', 3)">TITULARES <br>GRL - GRP 3</button>
                <button type="button" class="btn btn-mvt-screen" id="alternate-general-3" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 3); activeButton('alternate', 'general', 3)">SUPLENTES <br>GRL - GRP 3</button>
            </div>
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
                $('#option1').removeClass('active')
                $('#option1').addClass('active')
            },
            error:function(data){
                console.log('ERROR')
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
                $('.btn-mvt-screen').removeClass('active')
                $('.btn-mvt-screen').addClass('active')
            },
            error:function(data){
                console.log('ERROR')
            }
        });
    }

    function activeButton(winner_type, lottery_type, group){
        $('.btn-mvt-screen').removeClass('active')
        $('#'+winner_type+'-'+lottery_type+'-'+group).addClass('active')
    }
</script>
@endsection
