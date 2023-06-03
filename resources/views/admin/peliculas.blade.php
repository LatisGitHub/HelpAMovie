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
                        <td class="text-center"> <a class="text-danger" href="/peliculas/{{ $pelicula->id }}/borrar"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg></a>
                        <form action=" {{ route('payment') }}" method="post">
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
