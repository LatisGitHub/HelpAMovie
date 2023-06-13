@extends('admin.layout')
@section('main')
    <link rel="stylesheet" href="{{ asset('css2/unapeli.css') }}">





    <div class="container mb-5">
        <div style="margin-bottom: 5%">
            <h1 style="text-decoration: underline">{{ $user->name }}</h1>
            <h4>This is our cast of actors and producers, a wealth of talent awaits its discovery.
            </h4>
        </div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="card" style="max-width: 30rem;">
                <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" class="card-img-top image-fade"
                    alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ strtoupper($user->name) }}</h5>
                    <p class="card-text" style="font-weight: bolder">{{ $user->rol }} | {{ $user->genero }}</p>
                    <p class="card-text">Contact: {{ $user->email }}</p>
                    <div class="movie-card__cast text-center">
                        <h2 class="movie-card__cast-title">Movies</h2>
                        <div class="movie-card__cast-members d-flex justify-content-center">
                            @php
                                $peliculas = $user->peliculas()->get();
                                if ($peliculas->isEmpty()) {
                                    echo 'None';
                                }
                            @endphp

                            @foreach ($peliculas as $pelicula)
                                <a href="/peliculas/{{ $pelicula->id }}" data-tooltip="{{ $pelicula->titulo }}"
                                    data-placement="top">
                                    <img src="{{ asset( $pelicula->imagen) }}" alt="Película"
                                        class="image-fade movie-card__cast-member">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
