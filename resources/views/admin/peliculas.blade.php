@extends('web.layout')


@section('main')
    <link rel="stylesheet" href="{{ asset('css2/peliculas.css') }}">
    <div class="container">
        <div class="form-container mt-3" style="margin-left: 25%">
            <form method="POST" action='/pelicula/buscarPelicula' enctype="multipart/form-data">
                @csrf
                <label for="plataforma" style="font-weight: bold">PELICULA</label>
                <input type="text" name="pelicula">
                <button class="btn btn-dark" type="submit">BUSCAR</button>
            </form>
        </div>
        <h1 class="text-dark mt-5" style="text-align: center"> PELICULAS </h1>
        <a href="/peliculas/nuevo/nuevo"><button class="btn btn-secondary mb-5">Nueva peli</button></a>
        <div class="row mb-5">
            @foreach ($peliculas as $pelicula)
                <div class="movie-card d-inline-block">
                    <div class="container2">
                        <div class="cover" style="background: url({{ $pelicula->imagen }});">
                            <div class="columntag">
                                <div class="tag1">Adventure</div>
                                <div class="tag2">Fantasy</div>
                                <div class="tag3">Drama</div>
                            </div>
                            <div class="menu">
                                <div class="title">{{ $pelicula->titulo }}</div>
                                <div class="rating">
                                    IMDb <span class="fa fa-star"></span><span> 9.5/10</span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <div class="cast">
                                <h2>Cast:</h2>
                                @php
                                    $usuarios = $pelicula->usuarios()->get();
                                @endphp
                                @foreach ($usuarios as $usuario)
                                    <a href="#" data-tooltip="{{ $usuario->name }}" data-placement="top">
                                        <img src="{{ $usuario->imagen }}" alt="avatar1" class="rounded" width="50px" height="50px" />
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="text">
                            {{$pelicula->sinopsis}}
                        </div>
                        <div class="guide">
                            <a href="#">Episode Guide<br> 68 episodes</a>
                            <a class="btn btn-dark mt-3" href="/peliculas/{{ $pelicula->id }}">DETALLE</a>
                            <a class="btn btn-dark mt-3" href="/peliculas/{{ $pelicula->id }}">INVIERTE</a>
                        </div>
                        <form action="{{ route('payment') }}" method="post">
                            @csrf
                            <input type="number" name="amount">
                            <button type="submit">
                                pay with paypal
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $peliculas->links() }}
        </div>
    </div>
@endsection
