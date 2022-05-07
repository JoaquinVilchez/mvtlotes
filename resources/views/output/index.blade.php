@extends('layouts.app')

@section('content')
<div id="output">
    <div id="option1">
            <div class="d-flex justify-content-center align-items-center flex-column vh-100">
                <div class="row">
                    <div class="col-12">
                        <img src="{{asset('assets/images/logo_nuestroterreno.png')}}" class="output1-logo mx-4 animate__bounceIn">
                        <img src="{{asset('assets/images/logomvt.png')}}" class="output1-logo mx-4 animate__bounceIn">
                    </div>
                </div>
            </div>
    </div>

    <div id="option2">
        <div class="output-header mb-2">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12" style="text-align: center">
                        <div class="row d-flex justify-content-between align-items-center mx-4">
                            <div><img src="{{asset('assets/images/logonuestroterreno-negro.png')}}" style="width: 250px" class="output2-logo mx-4"></div>
                            <div>
                                <h1 class="my-2 app-text-bold"><span id="lottery_type_text"></span> - <span id="winner_type_text"></span></h1>
                                <h1 id="group_text"></h1>
                            </div>
                            <div><img src="{{asset('assets/images/logomvt-negro.png')}}" class="output2-logo mx-4"></div>
                        </div>
                        {{-- <hr style="background-color:white"> --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="congratulations">
            <div class="d-flex justify-content-center align-items-center">
                <div class="row my-5">
                    <div class="card animate__zoomIn mx-2" id="winner-card">
                        <div class="card-body" style="font-size: 60px; text-align:center; font-weight:800">
                            🎉 ¡Felicitaciones! 🎉<br>
                          <p id="winner-name"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESULTADOS --}}
        <div id="results" style="height: 50vh">
            {{-- LISTADO DE TITULARES --}}
            <div class="container m-auto" id="headlines">
                <div class="row d-flex justify-content-center mt-2">
                     <div class="col-12 mt-5" style="text-align: center" id="next_lot">
                        <strong><p style="font-size: 4em" class="mb-0">PRÓXIMO LOTE</p></strong>
                        <strong><p style="font-size: 6em"><span id="next_lot_text"></span></p></strong>
                    </div>
                    <div class="col-12 mt-5" id="results_table_container">
                        <h2 class="app-text-bold last_winners_text mb-4" style="font-size: 3em; text-align:center"></h2>
                        <table class="table table-striped screenResultTable app-text-bold" style="font-size: 3em; text-align:center" >
                            <thead>
                                <tr>
                                    <th scope="col" style="font-size: .8em">LOTE</th>
                                    <th scope="col" style="font-size: .8em">NRO</th>
                                    <th scope="col" style="font-size: .8em">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- LISTADO DE SUPLENTES --}}
            <div class="container m-auto" id="alternates">
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-12 mt-5">
                        <h2 style="font-size: 3em; text-align:center" class="app-text-bold last_winners_text mb-4"></h2>
                        <table class="table table-striped screenResultTable app-text-bold" style="font-size:3em; text-align:center">
                            <thead>
                                <tr>
                                    <th scope="col" style="font-size: .8em">NRO ORDEN</th>
                                    <th scope="col" style="font-size: .8em">NRO</th>
                                    <th scope="col" style="font-size: .8em">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROXIMO LOTE --}}
        <div class="container" id="next_lot_always">
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-12 mt-5">
                    <div class="col-12 mt-5" style="text-align: center" id="next_lot">
                        <strong><p style="font-size: 4em" class="mb-0">PRÓXIMO LOTE</p></strong>
                        <strong><p style="font-size: 6em"><span id="next_lot_always_text"></span></p></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-script')

<script src="{{asset('/js/confetti.js')}}"></script>

<script>
    $( document ).ready(function() {
        $('#option1').show();
        $('#option2').hide();
    });

    window.laravelEchoPort = '{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="//{{request()->getHost()}}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>

    window.Echo.channel('placa-general-channel')
    .listen('.MessageEvent', (data)=>{
        showOption1();
    });

    window.Echo.channel('ultimos-5-channel')
    .listen('.MessageEvent', (data)=>{

        console.log(data);
        $('#option1').hide();
        if(data.is_new==true){
            runConfetti();
            $('#results').hide();
            $('#option2').show();
            $('#next_lot_always').hide();
            $('#congratulations').fadeIn(500);
            $('#winner-name').text(`${data.results[0][0].last_name}, ${data.results[0][0].first_name}`)
            setTimeout(() => {
                $('#congratulations').fadeOut(500);
                $('#results').show();
                runTable();
            },10000);
        }else{
            $('#congratulations').hide();
            $('#next_lot_always').hide();
            $('#option2').show();
            runTable();
        }

        function runTable(){
            $('.output-header').removeClass('group1');
            $('.output-header').removeClass('group2');
            $('.output-header').removeClass('group3');
            $('.output-header').removeClass('group4');
            $('.output-header').addClass('group'+data.group);

            $('#results').show();

            if(data.winner_type=='headline'){
                $('#alternates').hide();
                $('#headlines').show();
            }else if(data.winner_type=='alternate'){
                $('#alternates').show();
                $('#headlines').hide();
            }

            ///////////////////////////////

            if(data.results[0].length==1){
                $('#results_table_container').show();
                $('.last_winners_text').text('Último ganador')
            }else if(data.results[0].length>0){
                $('.last_winners_text').text('Últimos '+data.results[0].length+' ganadores')
                $('#results_table_container').show();
            }else if(data.results[0].length==0){
                $('#results_table_container').hide();

                $('.last_winners_text').text('Sin resultados')
            }

            if (data.lottery_type=='general') {
                $('#lottery_type_text').text("SORTEO GENERAL");
            }else if(data.lottery_type=='cpd'){
                $('#lottery_type_text').text("SORTEO CPD");
            }

            if (data.winner_type=='headline') {
                $('#winner_type_text').text("TITULARES");
                $(".screenResultTable > tbody > tr").remove()
                $.each(data.results[0], function(key,value) {
                    var row = $("<tr class='py-0'><td>"+value.denomination+"</td><td>"+value.code+"</td><td>"+value.last_name+", "+value.first_name+"</td></tr>");
                    $(".screenResultTable > tbody").append(row);
                })
            }else{
                $('#winner_type_text').text("SUPLENTES");
                $(".screenResultTable > tbody > tr").remove()
                $.each(data.results[0], function(key,value) {
                    var row = $("<tr class='py-0'><td>"+value.order_number+"</td><td>"+value.code+"</td><td>"+value.last_name+", "+value.first_name+"</td></tr>");
                    $(".screenResultTable > tbody").append(row);
                })
            }

            $('#group_text').text('GRUPO '+data.group)

            if(data.next_lot!=null){
                if(data.results[0].length==0) {
                    $('#next_lot').show();
                    $('#next_lot_text').text('LOTE '+data.next_lot.denomination)
                }else{
                    $('#next_lot').hide();
                }
            }else{
                $('#next_lot').hide();
                $('#results_table_container').find('.row').addClass('d-flex justify-content-center')
            }

            showOption2();
        }

    });

    window.Echo.channel('proximo-sorteo-channel')
    .listen('.MessageEvent', (data)=>{
        console.log("PROXIMO: ", data)
        $('#congratulations').hide();
        showOption2();
        $('#results').hide();
        $('.output-header').removeClass('group1');
        $('.output-header').removeClass('group2');
        $('.output-header').removeClass('group3');
        $('.output-header').removeClass('group4');
        $('.output-header').addClass('group'+data.message.group);
        if (data.message.lottery_type==='GENERAL') {
            $('#lottery_type_text').text("SORTEO GENERAL");
        }else if(data.message.lottery_type==='CPD'){
            $('#lottery_type_text').text("SORTEO CPD");
        }
        $('#winner_type_text').text("TITULARES");
        $('#group_text').text('GRUPO '+data.message.group)
        $('#next_lot_always').show();
        $('#next_lot_always_text').text(`LOTE ${data.message.denomination}`);

    });

    function showOption1(){
        $('#option1').fadeOut();
        $('#option2').fadeOut();
        $('#option1').fadeIn();
    }

    function showOption2(){
        $('#option1').fadeOut();
        $('#option2').fadeOut();
        $('#option2').fadeIn();
    }
</script>

@endsection
