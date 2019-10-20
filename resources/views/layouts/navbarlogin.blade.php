@if (Auth::check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" v-pre>
            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Finalizar Sesion') }}
            </a>
            <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                @csrf
            </form>
        </ul>
    </li>
@else
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" role="button" id="navbarDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <i class="fa fa-user"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('home') }}">{{ __('Iniciar sesion') }}</a>
    </div>
</li>
@endif

