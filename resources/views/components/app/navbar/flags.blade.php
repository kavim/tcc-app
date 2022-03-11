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
