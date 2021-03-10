<div class="panel-header mb-2 p-1">
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center align-items-center ">
                <div class="d-flex justify-content-center align-items-center flex-column my-4">
                    @if(auth()->user())
                    <span class="app-userimage"><img src="{{asset('assets/images/userdefault.png')}}" alt=""></span>
                    <h4>{{auth()->user()->getFullName()}}</h4>
                    <a class="text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </div>
            </div>
            <div class="col-md-10">
                <div class="d-flex justify-content-end align-items-center my-2">
                    <div class="app-logo">
                        <img src="{{asset('assets/images/logomvt-blanco.png')}}">
                    </div>
                </div>
                <h2 class="panel-title">{{$pagename}}</h2>
            </div>
        </div>
    </div>
</div>
