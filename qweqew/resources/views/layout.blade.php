<!doctype html>
<html lang="ru" style=" height: 100%;">
    <head>
        <title>layout</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <body style=" height: 100%;">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Статьи</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/articles/create">Статьи</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/articles">создать статью</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/about">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contacts">Контакты</a>
                            </li>
                        </ul>
                        <a href="/auth/signup" class="btn btn-outline-success me-3">SignUp</a>
      <a href="/auth/login" class="btn btn-outline-success">SignIn</a>
      <a href="/auth/logout" class="btn btn-outline-success">Logout</a>
  </div>
                </div>
            </nav>
        </header>
        <main>
            <h1 class="text-center">Этот контент просматривается на всех страничках</h1>
            <div style="margin-right:50px; margin-left:50px;">
                @yield('content')
            </div>
        </main>
        <footer style=" position: sticky; top: 100vh;">
        <div class="nav justify-content-end">
                <p class="nav-link disabled" aria-disabled="true"></p>
            </div>
        </footer >
           
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>