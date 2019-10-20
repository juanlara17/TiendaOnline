@if (Auth::check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" v-pre>
            <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>
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
<li class="nav-item ">
    <div class="dropdown ">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('home') }}">Iniciar sesion</a>
        </div>
    </div>
</li>
@endif

