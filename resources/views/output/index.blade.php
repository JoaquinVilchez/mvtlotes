@extends('layouts.app')

@section('content')
<div id="output">
</div>
    <div id="option1">
            <div class="d-flex justify-content-center align-items-center flex-column vh-100">
                <div class="row">
                    <img src="{{asset('assets/images/logomvt.png')}}" class="output1-logo mx-4 animate__bounceIn">
                    <img src="{{asset('assets/images/logomvt.png')}}" class="output1-logo mx-4 animate__bounceIn">
                </div>
            </div>
    </div>
    
    <div id="option2">
        <div class="output-header mb-2 p-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="d-flex justify-content-between align-items-center my-4">
                            <img src="{{asset('assets/images/logomvt-blanco.png')}}" class="output2-logo">
                            <h2 class="panel-title">Sorteo general</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-items-center">
                        <img src="{{asset('assets/images/plano.png')}}" class="img-fluid output2-plan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="d-flex align-self-center">
                            <div class="">
                                <h3 style="font-size: 3em" class="app-text-bold my-0">Grupo 1</h3>
                                <h1 style="font-size: 4em" class="app-text-bold my-0">LOTE 15</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="option3">
        <div class="output-header mb-2 p-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="d-flex justify-content-between align-items-center my-4">
                            <img src="{{asset('assets/images/logomvt-blanco.png')}}" class="output2-logo">
                            <h2 class="panel-title">Resultado lote 15</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row my-4">
                <div class="col-md-8 offset-md-2">
                    <div class="card my-4">
                        <div class="card-body output3-card-winner">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="option4">
        <div class="output-header mb-2 pt-4">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12" style="text-align: center">
                        <div class="row d-flex justify-content-center">
                            <img src="{{asset('assets/images/logomvt-blanco.png')}}" class="output2-logo mx-4">
                            <img src="{{asset('assets/images/logomvt-blanco.png')}}" class="output2-logo mx-4">
                        </div>
                        <hr style="background-color:white">
                        <h2 class="my-2 app-text-bold"><span id="lottery_type_text"></span> - <span id="winner_type_text"></span></h2>
                        <h2 id="group_text"></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="headlines">
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-md-5" style="text-align: center" id="next_lot_container">
                    <h2 class="app-text-bold">Próximo sorteo</h2>
                    <p style="font-size: 2em"><span id="next_lot_text"></span></p>
                    <img src="" class="rounded border float-end" width="100%" id="next_lot_img">
                </div>
                <div class="col-md-7" id="results_table_container">
                    <div class="row">
                        <h2 class="app-text-bold last_winners_text"></h2>
                        <table class="table table-striped screenResultTable" style="font-size:1.5em">
                            <thead>
                                <tr>
                                <th scope="col">LOTE</th>
                                <th scope="col">NÚMERO</th>
                                <th scope="col">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="alternates">
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-md-8 offset-md-2s">
                    <div class="row">
                        <h2 class="app-text-bold last_winners_text"></h2>

                        <table class="table table-striped screenResultTable" style="font-size:1.5em">
                            <thead>
                                <tr>
                                <th scope="col">NRO ORDEN</th>
                                <th scope="col">NÚMERO</th>
                                <th scope="col">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')

<script>
    $( document ).ready(function() {
        $('#option1').show();
        $('#option2').hide();
        $('#option3').hide();
        $('#option4').hide();
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

    window.Echo.channel('proximo-sorteo-channel')
    .listen('.MessageEvent', (data)=>{
        console.log(data);
        showOption2();
    });

    window.Echo.channel('ultimos-5-channel')
    .listen('.MessageEvent', (data)=>{
        console.log(data)

        if(data.winner_type=='headline'){
            $('#alternates').hide();
            $('#headlines').show();
        }else if(data.winner_type=='alternate'){
            $('#alternates').show();
            $('#headlines').hide();
            $('#alternates').find('.row').addClass('d-flex justify-content-center')
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
        }else{
            $('#winner_type_text').text("SUPLENTES");
        }

        $('#group_text').text('GRUPO '+data.group)

        if(data.next_lot!=null){
            $('#next_lot_container').show();
            $('#results_table_container').removeClass('col-md-8').addClass('col-md-7');
            var next_lot_image;
            $('#next_lot_text').text('LOTE '+data.next_lot.lot_number+' - '+data.next_lot.denomination)
            if(data.next_lot.image=='noimage'){
                next_lot_image = 'noimage.png';
            }else{  
                next_lot_image = data.next_lot.image
            }
            var path = `{{asset('assets/images/plans/${next_lot_image}')}}`
            $('#next_lot_img').attr('src', path)
        }else{
            $('#next_lot_container').hide();
            $('#results_table_container').removeClass('col-md-7').addClass('col-md-8');
            $('#results_table_container').find('.row').addClass('d-flex justify-content-center')
        }

        $(".screenResultTable > tbody > tr").remove()
        $.each(data.results[0], function(key,value) {
            var row = $("<tr><td>"+value.lot_number+"/"+value.denomination+"</td><td>"+value.code+"</td><td>"+value.last_name+" "+value.mothers_last_name+", "+value.first_name+"</td></tr>");
            $(".screenResultTable > tbody").append(row);
        })
        showOption4();
    });

    function showOption1(){
        $('#option1').fadeOut();
        $('#option2').fadeOut();
        $('#option3').fadeOut();
        $('#option4').fadeOut();

        $('#option1').fadeIn();
    }

    function showOption2(){
        $('#option1').fadeOut();
        $('#option2').fadeOut();
        $('#option3').fadeOut();
        $('#option4').fadeOut();

        $('#option2').fadeIn();
    }

    function showOption4(){
        $('#option1').fadeOut();
        $('#option2').fadeOut();
        $('#option3').fadeOut();
        $('#option4').fadeOut();

        $('#option4').fadeIn();
    }
</script>

@endsection
