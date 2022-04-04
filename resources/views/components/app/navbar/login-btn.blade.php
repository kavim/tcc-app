@guest
    <a class="btn btn-login" href="{{ route('login') }}">LOG IN</a>
@else
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-circle"></i>
            {{ \Illuminate\Support\Str::limit(Auth::user()->getFirstName(), 30, $end = '...') }}
        </a>
        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
            <li>
                @if(auth()->user()->user_type_id == 1)
                    <a class="dropdown-item" href="{!! route('admin.index') !!}">
                        {{ trans('sentences.profile') }}
                    </a>
                @endif
                @if(auth()->user()->user_type_id == 3)
                    <a class="dropdown-item" href="{!! route('company.index') !!}">
                        {{ trans('sentences.profile') }}
                    </a>
                @endif
                @if(auth()->user()->user_type_id == 4)
                    <a class="dropdown-item" href="{!! route('app.dashboard') !!}">
                        {{ trans('sentences.profile') }}
                    </a>
                @endif
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
@endguest
