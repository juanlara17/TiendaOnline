@if (Auth::check())
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('logout') }}">Finalizar Sesion</a></li>
        </ul>
    </li>
@else
<li class="nav-item ">
    <div class="dropdown ">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Iniciar sesion</a>
        </div>
    </div>
</li>
@endif

