<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo-probi.svg') }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-translate"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{!! route('change-language', 'es') !!}">
                            <img src="{{ asset('images/flags/uy.svg') }}" width="20"/> ES</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{!! route('change-language', 'pt') !!}">
                            <img src="{{ asset('images/flags/br.svg') }}" width="20"/> PT-BR</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('students') }}">{{ trans('sentences.staudants_page') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">{{ trans('sentences.jobs_page') }}</a></li>
                <x-web.nav-login></x-web.nav-login>
            </ul>
        </div>
    </div>
</nav>
