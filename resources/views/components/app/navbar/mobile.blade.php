<nav class="navbar navbar-dark bg-primary d-lg-none p-3 shadow-sm">
    <a href="{{route('home')}}" class="navbar-brand p-0 m-0">
        <img src="{{asset('images/logo123.png')}}" alt="logo" width="100">
    </a>
    <li class="nav-item dropdown d-flex align-content-center ">
        <div class="btn-group">
            <button class="btn btn-white dropdown-toggle text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-translate"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{!! route('change-language', 'es') !!}">
                    <img src="{{ asset('images/flags/uy.svg') }}" width="25"/> ES-UY</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{!! route('change-language', 'pt') !!}">
                    <img src="{{ asset('images/flags/br.svg') }}" width="25"/> PT-BR</a>
                </li>
            </ul>
          </div>
        <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <span class="navbar-toggler-icon"></span>
        </button>
    </li>
    <div class="offcanvas offcanvas-end text-white bg-primary" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <a href="{{route('home')}}" class="navbar-brand p-0 m-0">
                <img src="{{asset('images/logo123.png')}}" alt="logo" width="100">
            </a>
            <button type="button" style="font-size:1.5rem" class="btn text-white" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-circle-fill"></i></button>
        </div>
        <div class="offcanvas-body text-white bg-primary">
            <div class="collapse navbar-collapse bg-white collapse show" id="menuNavbarCollapse">
                <ul class="navbar-nav text-left ul-mobile text-white bg-primary" style="font-size:1.5rem">
                    <x-app.navbar.links></x-app.navbar.links>
                    <x-app.navbar.login-btn></x-app.navbar.login-btn>
                </ul>
            </div>
        </div>
    </div>
</nav>
