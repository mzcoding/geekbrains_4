<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">Наш блог</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Меню
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">Новости</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="">Личный кабинет</a>
                </li>
            </ul>
        </div>
    </div>
</nav>