<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/" style="padding: 0"><img src="{{ asset('images/logo.png') }}" width="150" alt="" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-right">
            <div class="collapse navbar-collapse nabvar-right" id="navbarColor02">
                <form class="form-inline my-2 my-lg-0 ">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar....">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/cart/show"><i class="fa fa-shopping-cart"></i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactenos</a>
                    </li>
                    @include('navbarlogin')
                </ul>
            </div>
        </div>
    </div>
</nav>
