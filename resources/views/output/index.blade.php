@extends('layouts.app')

@section('content')
<div id="output">
</div>
    <div id="option1">
            <div class="d-flex justify-content-center align-items-center flex-column vh-100">
                <h1 class="output-title">Sorteo general</h1>
                <span><img src="{{asset('assets/images/logomvt.png')}}" class="output1-logo"></span>
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
        <div class="output-header mb-2 p-1">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12" style="text-align: center">
                        <img src="{{asset('assets/images/logomvt-blanco.png')}}" class="output2-logo">
                        <hr style="background-color:white">
                        <h2 class="my-2 app-text-bold">Sorteo general</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6" style="text-align: center">
                    <h2 class="app-text-bold">Próximo sorteo</h2>
                    <p style="font-size: 2em">Grupo 1 - Lote 5</p>
                    <img src="{{asset('assets/images/plano.png')}}" class="rounded border float-end" width="65%">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h2 class="app-text-bold">Últimos 5 ganadores</h2>

                        <table class="table table-striped" style="font-size:1.5em">
                            <thead>
                                <tr>
                                <th scope="col">LOTE</th>
                                <th scope="col">NÚMERO</th>
                                <th scope="col">NOMBRE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>577</td>
                                    <td>RODRIGUEZ, LAURA</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>125</td>
                                    <td>PEREZ LOPEZ, JUAN</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>511</td>
                                    <td>CASTINO, ANA</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>172</td>
                                    <td>LANDASIO, JORGE</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>511</td>
                                    <td>MARTINEZ RODRIGUEZ, OSCAR ANTONIO</td>
                                </tr>
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
        $('#option1').hide();
        $('#option2').hide();
        $('#option3').hide();
        // $('#option4').fadeOut();
    });

    window.laravelEchoPort = '{{env("LARAVEL_ECHO_PORT")}}';
</script>
<script src="//{{request()->getHost()}}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>

    window.Echo.channel('placa-general-channel')
    .listen('.MessageEvent', (data)=>{
        showOption1();
        // $('#output').append('<div class="alert alert-danger"> PLACA PRINCIPAL: '+data.message+'</div>');
    });

    window.Echo.channel('proximo-sorteo-channel')
    .listen('.MessageEvent', (data)=>{
        console.log(data);
        showOption2();
    });
</script>

<script>
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
</script>

@endsection
