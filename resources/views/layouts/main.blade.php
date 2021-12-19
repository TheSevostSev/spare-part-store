<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <title>Sklad</title>
</head>
<body>
  <div class="page">
    <header>
      <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <img src="https://png.pngtree.com/png-vector/20191022/ourlarge/pngtree-wrench-and-screwdriver-vector-illustration-with-simple-design-isolated-on-white-png-image_1846024.jpg" class="image is-64x64">
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="/">
            Главная
            </a>

            <a class="navbar-item" href="/search">
              Поиск
            </a>
            @cannot('add')
              <a class="navbar-item" href="/contacts">
                Контакты
              </a>
            @endcan
            @can('add')
              <a class="navbar-item" href="/createpart">
                Создать
              </a>
            @endcan
          </div>
          @if(auth()->user()===null)
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="buttons">
                  <a class="button is-primary"  href="{{ route('register') }}">
                    <strong>Sign up</strong>
                  </a>
                  <a class="button is-light" href="{{ route('login') }}">
                    Log in
                  </a>
                </div>
              </div>
            </div>
          @else
            <div class="navbar-end">
              <div class="navbar-item">
                <div class="buttons">
                  <form action=" {{ route('logout') }} " method="post">
                  @csrf
                    <button class="button is-danger">
                      Log out
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @endif
        </div>
      </nav>
    </header>
      @yield('content')
      <!--
        <footer class="footer has-background-black">
        <div class="has-text-centered">
          <h1 class="subtitle is-align-self-center has-text-white">
            ТМ используется на основании лицензии правообладателя AresLTD. © Интернет-магазин «Ares™» 2001–2021. 🧞	
          </h1>
        </div>
      </footer>
      -->
  </div>
</body>
</html>
