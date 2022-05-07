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
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <h1 class="mx-4">PNT</h1>
                    </div>
                    <button type="button" class="btn btn-mvt-screen" data-bs-toggle="button" onclick="placaGeneral()" id="option1">Logo MVT</button> <br>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="nextlot-cpd-1" data-bs-toggle="button" onclick="proximoSorteo('cpd', 1); activeButton('cpd', 1)">CPD - GRP 1</button>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="nextlot-general-1" data-bs-toggle="button" onclick="proximoSorteo('general', 1); activeButton('general', 1)">GRL - GRP 1</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="nextlot-cpd-2" data-bs-toggle="button" onclick="proximoSorteo('cpd', 2); activeButton('cpd', 2)">CPD - GRP 2</button>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="nextlot-general-2" data-bs-toggle="button" onclick="proximoSorteo('general', 2); activeButton('general', 2)">GRL - GRP 2</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="nextlot-cpd-3" data-bs-toggle="button" onclick="proximoSorteo('cpd', 3); activeButton('cpd', 3)">CPD - GRP 3</button>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="nextlot-general-3" data-bs-toggle="button" onclick="proximoSorteo('general', 3); activeButton('general', 3)">GRL - GRP 3</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="nextlot-cpd-4" data-bs-toggle="button" onclick="proximoSorteo('cpd', 4); activeButton('cpd', 4)">CPD - GRP 4</button>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="nextlot-general-4" data-bs-toggle="button" onclick="proximoSorteo('general', 4); activeButton('general', 4)">GRL - GRP 4</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <h1 class="mx-4">CPD</h1>
                    </div>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="headline-cpd-1" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 1); activeButton('cpd', 1, 'headline')">TITULARES <br>CPD - GRP 1</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd-alternate" id="alternate-cpd-1" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 1); activeButton('cpd', 1, 'alternate');">SUPLENTES <br>CPD - GRP 1</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="headline-cpd-2" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 2); activeButton('cpd', 2, 'headline')">TITULARES <br>CPD - GRP 2</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd-alternate" id="alternate-cpd-2" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 2); activeButton('cpd', 2, 'alternate')">SUPLENTES <br>CPD - GRP 2</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="headline-cpd-3" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 3); activeButton('cpd', 3, 'headline')">TITULARES <br>CPD - GRP 3</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd-alternate" id="alternate-cpd-3" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 3); activeButton('cpd', 3, 'alternate')">SUPLENTES <br>CPD - GRP 3</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-cpd" id="headline-cpd-4" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'cpd', 4); activeButton('cpd', 4, 'headline')">TITULARES <br>CPD - GRP 4</button>
                    <button type="button" class="btn btn-mvt-screen btn-cpd-alternate" id="alternate-cpd-4" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'cpd', 4); activeButton('cpd', 4, 'alternate')">SUPLENTES <br>CPD - GRP 4</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <h1 class="mx-4">GRL</h1>
                    </div>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="headline-general-1" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 1); activeButton('general', 1, 'headline')">TITULARES <br>GRL - GRP 1</button>
                    <button type="button" class="btn btn-mvt-screen btn-general-alternate" id="alternate-general-1" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 1); activeButton('general', 1, 'alternate')">SUPLENTES <br>GRL - GRP 1</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="headline-general-2" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 2); activeButton('general', 2, 'headline')">TITULARES <br>GRL - GRP 2</button>
                    <button type="button" class="btn btn-mvt-screen btn-general-alternate" id="alternate-general-2" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 2); activeButton('general', 2, 'alternate')">SUPLENTES <br>GRL - GRP 2</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="headline-general-3" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 3); activeButton('general', 3, 'headline')">TITULARES <br>GRL - GRP 3</button>
                    <button type="button" class="btn btn-mvt-screen btn-general-alternate" id="alternate-general-3" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 3); activeButton('general', 3, 'alternate')">SUPLENTES <br>GRL - GRP 3</button>
                    <span class="mx-2" style="border-left: 2px solid grey; height: 110px"></span>
                    <button type="button" class="btn btn-mvt-screen btn-general" id="headline-general-4" data-bs-toggle="button" onclick="ultimos5Ganadores('headline', 'general', 4); activeButton('general', 4, 'headline')">TITULARES <br>GRL - GRP 4</button>
                    <button type="button" class="btn btn-mvt-screen btn-general-alternate" id="alternate-general-4" data-bs-toggle="button" onclick="ultimos5Ganadores('alternate', 'general', 4); activeButton('general', 4, 'alternate')">SUPLENTES <br>GRL - GRP 4</button>
                </div>
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

    function activeButton(lottery_type, group, winner_type) {
        $('.btn-mvt-screen').removeClass('active')
        if(typeof winner_type !== 'undefined') {
            $('#'+winner_type+'-'+lottery_type+'-'+group).addClass('active')
        }else {
            $('#nextlot-'+lottery_type+'-'+group).addClass('active')
        }
    }
</script>
@endsection