<div class="panel-header mb-2 p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center align-items-center ">
                <div class="d-flex justify-content-center align-items-center flex-column my-4">
                    <span class="app-userimage"><img src="{{asset('assets/images/userdefault.png')}}" alt=""></span>
                    <h4>Juan Perez</h4>
                    <a href="{{route('logout')}}" class="text-white">Cerrar sesión</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="app-logo">
                        <img src="{{asset('assets/images/logomvt-blanco.png')}}">
                    </div>
                    <div id="clock">
                        <div id="time">
                            <h1><span id="hours">00</span>:<span id="minutes">00</span> <span style="font-size: .7em" id="phase">AM</span></h1>
                            <span>{{\Carbon\Carbon::now()->format('l jS \\of F') }}</span>
                        </div>
                    </div>
                </div>
                <h2 class="panel-title">{{$pagename}}</h2>
            </div>
        </div>
    </div>
</div>

{{-- @section('js-script')
<script>
    function clock() {
    var hours = document.getElementById("hours");
    var minutes = document.getElementById("minutes");
    var seconds = document.getElementById("seconds");
    var phase = document.getElementById("phase");

    var h = new Date().getHours();
    var m = new Date().getMinutes();
    var s = new Date().getSeconds();
    var am = "AM";

    if (h > 12) {
        h = h - 12;
        var am = "PM";
    }

    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;

    hours.innerHTML = h;
    minutes.innerHTML = m;
    seconds.innerHTML = s;
    phase.innerHTML = am;
}

var interval = setInterval(clock, 1000);
</script>
@endsection --}}