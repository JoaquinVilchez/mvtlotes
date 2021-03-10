@if(session('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success_message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error_message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('info_message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session('info_message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('alert_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('alert_message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif