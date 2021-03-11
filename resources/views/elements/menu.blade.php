<nav>
    <a href="{{route('output.index')}}" target="_blank" class="btn btn-light panel-menu-button">
        <div class="flex-column justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-cast" style="font-size:25px"></i>
            Salida
        </div>
    </a>
    <a href="{{route('screen.index')}}" class="btn btn-light panel-menu-button active">
        <div class="flex-column justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-tv" style="font-size:25px"></i>
            Pantalla
        </div>
    </a>
    <a href="{{route('lottery.create')}}" class="btn btn-light panel-menu-button">
        <div class="d-flex justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-plus-circle" style="font-size:25px"></i>
            Sorteos
        </div>
    </a>
    <a href="{{route('lottery.show')}}" class="btn btn-light panel-menu-button">
        <div class="d-flex justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-trophy" style="font-size:25px"></i>
            Resultados
        </div>
    </a>
    <a href="{{route('person.index')}}" class="btn btn-light panel-menu-button">
        <div class="d-flex justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-people" style="font-size:25px"></i>
            Personas
        </div>
    </a>
    <a href="{{route('lot.index')}}" class="btn btn-light panel-menu-button">
        <div class="d-flex justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-border-outer" style="font-size:25px"></i>
            Lotes
        </div>
    </a>
    <a href="{{route('user.index')}}" class="btn btn-light panel-menu-button">
        <div class="d-flex justify-content-center align-items-center flex-column" style="font-size: 15px">
            <i class="bi bi-person-circle" style="font-size:25px"></i>
            Mi perfil
        </div>
    </a>
</nav>