@guest
    <span class="nav-item">
        <a class="btn-outline-sm" href="/login">{{ trans('forms.login') }}</a>
    </span>
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" v-pre>
           <i class="bi bi-person-circle"></i>
            {{ \Illuminate\Support\Str::limit(Auth::user()->getFirstName(), 30, $end='...') }}
        </a>

        <div class="dropdown-menu dropdown mr-md-2" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('regular.dashboard')}}">
                {{ trans('sentences.profile') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
