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
            <div class="row my-0">
                <div class="col-md-2 px-0 offset-md-2">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">LOTE</p>
                            <p class="app-text-black my-0">15</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row my-0">
                <div class="col-md-2 px-0 offset-md-2">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">LOTE</p>
                            <p class="app-text-black my-0">14</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row my-0">
                <div class="col-md-2 px-0 offset-md-2">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">LOTE</p>
                            <p class="app-text-black my-0">13</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row my-0">
                <div class="col-md-2 px-0 offset-md-2">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">LOTE</p>
                            <p class="app-text-black my-0">12</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-0">
                <div class="col-md-2 px-0 offset-md-2">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">LOTE</p>
                            <p class="app-text-black my-0">11</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="card my-1 mx-1">
                        <div class="card-body output4-card-winner py-1">
                            <p class="app-text-black my-0">1234</p>
                            <p class="app-text-black my-0">PEREZ RODRIGUEZ, Juan Ignacio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')

<script>
    $( document ).ready(function() {
        showOption1();
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