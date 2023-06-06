@extends('web.layout')


@section('main')

    <div class="container">
        <div class="form-container mt-3" style="margin-left: 25%">
            <form method="POST" action='/pelicula/buscarPelicula' enctype="multipart/form-data">
                @csrf
                <label for="plataforma" style="font-weight: bold">PELICULA</label>
                <input type="text" name="pelicula">
                <button class="btn btn-dark" type="submit">BUSCAR</button>
            </form>
        </div>
        <style>
            .form-container {
                display: flex;
                gap: 20px;
            }
        </style>
        <h1 class="text-dark mt-5" style="text-align: center"> PELICULAS </h1>
        <a href="/peliculas/nuevo/nuevo"><button class="btn btn-secondary mb-5">Nueva peli</button></a>
        <div class="row mb-5">
            @foreach ($peliculas as $pelicula)
            <div class="col-md-4">
                <div class="card p-3 m-3" style="width: 25rem;">
                    <img class="card-img-top img-responsive" height="320px" src="{{ asset($pelicula->imagen) }}" />
                    <a class="btn btn-dark mt-3" href="/peliculas/{{ $pelicula->id }}">DETALLE</a>
                    <a class="btn btn-dark mt-3" href="/peliculas/{{ $pelicula->id }}">INVIERTE</a>
        
                    <div class="card-body">
                        <h5 class="card-title">{{ strtoupper($pelicula->titulo) }}</h5>
                        <p class="card-text">{{ $pelicula->sinopsis }}</p>
                        <p class="card-text">{{ $pelicula->objetivo }}</p>
                        <p class="card-text">{{ $pelicula->cantidad }}</p>
                        <p class="card-text">{{ $pelicula->likes }}</p>
                        <p class="card-text">{{ $pelicula->dislikes }}</p>
                        <p style="font-weight: bold" class="card-text"><b>{{ strtoupper($pelicula->plataforma) }}</b></p>
                        <form action="{{ route('payment') }}" method="post">
                            @csrf
                            <input type="number" name="amount">
                            <button type="submit">
                                pay with paypal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $peliculas->links() }}

    </div>
@endsection
