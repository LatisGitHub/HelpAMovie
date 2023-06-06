<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help a movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css2/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css2/custom.css') }}">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light p-1 fixed-top" style="font-size: 20px;background-color: white;">
        <div class="container-fluid mt-3">
            <a class="navbar-brand" href="/inicio"
                style="margin-left: 10%;font-size: 25px;font-weight: bold; color: #bfba5;">HELP A
                MOVIE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ps-3" style="margin-left: 40%" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link me-4" href="/inicio" style="color: #bfba55">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="/peliculas">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="/usuarios">Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="/chatify">Contacts</a>
                    </li>
                    @auth
                        <a id="login-register-button" class="nav-link me-4" href="/profile" style="font-weight: 10px">Profile</a>
                    @else
                        <li style="list-style: none">
                            <a id="login-register-button" href="{{ route('login') }}" id="login-register-button">Login</a>
                            @if (Route::has('register'))
                                <a id="login-register-button" href="{{ route('register') }}">Register</a>
                            @endif
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

    @yield('main')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1 col-sm-6">
                    <h3>Help a movie</h3>
                    <p>We're a film crowdfunding platform that discovers and supports talent in the industry. Our
                        platform connects filmmakers with passionate individuals to fund exceptional film projects,
                        empowering emerging talent to bring their artistic visions to life.</p>
                    <div class="footer-copyright">
                        <p>Creator: &copy; Latifa Er Rossafi</p>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-1 col-sm-6">
                    <h3>Talk to us</h3>
                    <p><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-globe-europe-africa" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM3.668 2.501l-.288.646a.847.847 0 0 0 1.479.815l.245-.368a.809.809 0 0 1 1.034-.275.809.809 0 0 0 .724 0l.261-.13a1 1 0 0 1 .775-.05l.984.34c.078.028.16.044.243.054.784.093.855.377.694.801-.155.41-.616.617-1.035.487l-.01-.003C8.274 4.663 7.748 4.5 6 4.5 4.8 4.5 3.5 5.62 3.5 7c0 1.96.826 2.166 1.696 2.382.46.115.935.233 1.304.618.449.467.393 1.181.339 1.877C6.755 12.96 6.674 14 8.5 14c1.75 0 3-3.5 3-4.5 0-.262.208-.468.444-.7.396-.392.87-.86.556-1.8-.097-.291-.396-.568-.641-.756-.174-.133-.207-.396-.052-.551a.333.333 0 0 1 .42-.042l1.085.724c.11.072.255.058.348-.035.15-.15.415-.083.489.117.16.43.445 1.05.849 1.357L15 8A7 7 0 1 1 3.668 2.501Z" />
                        </svg></i> Cuevas del Almanzora, Almería, Spain</p>
                    <p><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg></i> 643 893 781</p>
                    <p><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z" />
                        </svg></i> helpamovie@gmail.com</p>
                </div>

                <div class="clearfix col-md-12 col-sm-12">
                    <hr>
                </div>

                <div class="col-md-12 col-sm-12">
                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                        <li><a href="#" class="fa fa-dribbble"></a></li>
                        <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>


    <script src="{{ asset('js2/jquery.js') }}"></script>
    <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js2/particles.min.js') }}"></script>
    <script src="{{ asset('js2/app.js') }}"></script>
    <script src="{{ asset('js2/jquery.parallax.js') }}"></script>
    <script src="{{ asset('js2/smoothscroll.js') }}"></script>
    <script src="{{ asset('js2/custom.js') }}"></script>
</body>

</html>
