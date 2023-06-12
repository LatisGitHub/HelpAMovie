@extends('web.layout')


@section('main')
    <link rel="stylesheet" href="{{ asset('css2/peliculas.css') }}">

    <nav class="navbar navbar-expand-lg navbar-light "
        style="border-top: 1px solid rgb(209, 209, 209);border-bottom: 1px solid rgb(209, 209, 209)">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 66%">
                    <form class="d-flex" method="POST" action='/pelicula/buscarPelicula' enctype="multipart/form-data">
                        @csrf
                        @if (Auth::user()->rol != 'actor') 
                        <a href="/peliculas/nuevo/nuevo"><svg style="width: 130px; color:#bfba55"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                            </svg></a> 
                            @endif
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="pelicula">
                        <button class="btn btn-outline-secondary" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </form>
                </div>
                
              
        </div>
    </nav>
    <div class="container">
        <h1 style="text-decoration: underline" class="mt-5">Our Proyects</h1>
        <h4>Unlock a world of cinematic investment opportunities, where groundbreaking film projects await your financial
            contribution and creative vision.
        </h4>
        <div class="container center-div mt-5">
            <div class="row mb-5">
                @foreach ($peliculas as $pelicula)
                    <div class="card mb-3 grow-on-hover">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="fade-effect-left">
                                    <img src="{{ asset($pelicula->imagen) }}" class="img-fluid rounded-start"
                                        alt="...">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pelicula->titulo }}</h5>
                                    <span class="minutes">{{ $pelicula->minutos }} min</span>
                                    <p class="type">{{ $pelicula->genero }}</p>
                                    <p class="card-text">
                                        {{ $pelicula->sinopsis }}
                                    </p>
                                    <p class="card-text">
                                    </p>
                                    <a href="/peliculas/{{ $pelicula->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </a>
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                            <path
                                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $peliculas->links() }}
            </div>



        </div>

    </div>
    </div>
@endsection
