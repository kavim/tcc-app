@guest
    <a class="btn btn-login" href="log-in.html">LOG IN</a>
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
            {{ \Illuminate\Support\Str::limit(Auth::user()->getFirstName(), 30, $end = '...') }}
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
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="bi bi-person-circle"></i>
        {{ \Illuminate\Support\Str::limit(Auth::user()->getFirstName(), 30, $end = '...') }}
    </a>

    <div class="dropdown-menu dropdown mr-md-2" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('app.dashboard') }}">
            {{ trans('sentences.profile') }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@endguest
