@extends('layouts.app')

@section('content')
<div id="output"></div>
    <div id="option1">
            <div class="d-flex justify-content-center align-items-center flex-column vh-100">
                <div class="row">
                    <img src="{{asset('assets/images/logo_nuestroterreno.png')}}" class="output1-logo mx-4 animate__bounceIn">
                    <img src="{{asset('assets/images/logomvt.png')}}" class="output1-logo mx-4 animate__bounceIn">
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
                    <div class="card animate__zoomIn" id="winner-card">
                        <div class="card-body">
                          <h1 class="app-text-bold" id="winner-name"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="results">
            <div class="container" id="headlines">
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-5" style="text-align: center" id="next_lot_sidebar_container">
                        <h2 class="app-text-bold">Próximo sorteo</h2>
                        <p style="font-size: 2em"><span id="next_lot_text"></span></p>
                        <img src="" class="rounded border float-end" width="100%" id="next_lot_img">
                    </div>
                    <div class="col-md-7" id="results_table_container">
                        <div class="row">
                            <h2 class="app-text-bold last_winners_text"></h2>
                            <table class="table table-striped screenResultTable app-text-bold" style="font-size:1.5em">
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

                            <table class="table table-striped screenResultTable app-text-bold" style="font-size:1.5em">
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

        if(data.is_new==true){
            runConfetti();
            $('#option2').show();
            $('#results').hide();
            $('#congratulations').fadeIn(500);
            $('#winner-name').text(`🎉 ¡Felicitaciones ${data.results[0][0].last_name} ${data.results[0][0].mothers_last_name}, ${data.results[0][0].first_name}! 🎉`)
            setTimeout(function() {
                $('#congratulations').fadeOut(500);
                $('#results').show();
            },10000);
            runTable();
        }else{
            $('#congratulations').hide();
            $('#option2').show();
            runTable();
        }

        function runTable(){
            $('.output-header').removeClass('group1');
            $('.output-header').removeClass('group2');
            $('.output-header').removeClass('group3');
            $('.output-header').addClass('group'+data.group);

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
                $(".screenResultTable > tbody > tr").remove()
                $.each(data.results[0], function(key,value) {
                    var row = $("<tr><td>"+value.lot_number+"/"+value.denomination+"</td><td>"+value.code+"</td><td>"+value.last_name+" "+value.mothers_last_name+", "+value.first_name+"</td></tr>");
                    $(".screenResultTable > tbody").append(row);
                })
            }else{
                $('#winner_type_text').text("SUPLENTES");
                $(".screenResultTable > tbody > tr").remove()
                $.each(data.results[0], function(key,value) {
                    var row = $("<tr><td>"+value.order_number+"</td><td>"+value.code+"</td><td>"+value.last_name+" "+value.mothers_last_name+", "+value.first_name+"</td></tr>");
                    $(".screenResultTable > tbody").append(row);
                })
            }

            $('#group_text').text('GRUPO '+data.group)

            if(data.next_lot!=null){
                $('#next_lot_sidebar_container').show();
                $('#results_table_container').removeClass('col-md-8').addClass('col-md-7');
                var next_lot_image;
                $('#next_lot_text').text('LOTE '+data.next_lot.lot_number+' - '+data.next_lot.denomination)
                if(data.next_lot.image=='noimage'){
                    next_lot_image = 'noimage.png';
                }else{  
                    next_lot_image = data.next_lot.image
                }
                var path = `{{asset('assets/images/lots/${next_lot_image}')}}`
                $('#next_lot_img').attr('src', path)
            }else{
                $('#next_lot_sidebar_container').hide();
                $('#results_table_container').removeClass('col-md-7').addClass('col-md-8');
                $('#results_table_container').find('.row').addClass('d-flex justify-content-center')
            }

            showOption2();
        }

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
