@extends('admin.layout')


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
        <div class="mx-4 my-5">
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 15px; align-items: center;" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>TITLE</th>
                        <th></th>
                        <th>GENRE</th>
                        <th>LIMIT DATE</th>
                        <th>MONEY GOAL</th>
                        <th>TOTAL</th>
                        <th>MINUTES</th>
                        
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($peliculas as $pelicula)
                        <tr>
                            <td>
                                <p style="font-weight: bold">{{ strtoupper($pelicula->titulo) }}</p>
                            </td>
                            <td>
                                <img class="img-responsive" width="200px" src="{{ asset($pelicula->imagen) }}" />
                            </td>
                            <td>
                                <p><b>{{ strtoupper($pelicula->genero) }}</b></p>
                            </td>
                            <td>
                                <p>{{ $pelicula->fechaLimite }}</p>
                            </td>
                            <td>
                                <p><b>{{ strtoupper($pelicula->objetivo) }}</b></p>
                            </td>
                            <td>
                                <p><b>{{ strtoupper($pelicula->cantidad) }}</b></p>
                            </td>
                            <td>
                                <p>{{ $pelicula->minutos }}</p>
                            </td>
                            <td class="text-center">
                                <a href="/peliculas/{{ $pelicula->id }}" style="color: #bfba55;"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="text-danger" href="/peliculas/{{ $pelicula->id }}/borrar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
            {{ $peliculas->links() }}
        </div>

    </div>
    </div>
@endsection
