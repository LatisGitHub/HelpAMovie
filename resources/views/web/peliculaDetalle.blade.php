@extends('web.layout')
@section('main')
    <link rel="stylesheet" href="{{ asset('css2/unapeli.css') }}">

    <div class="container mt-4 mb-4">
        <div style="margin-bottom: 5%">
            <h1 style="text-decoration: underline">{{ $pelicula->titulo }}</h1>
            <h4>Unleash your investment, let this creation's wings unfold, as dreams bloom and beauty behold.
            </h4>
        </div>
        <div class="movie-card">
            <div class="movie-card__image">
                <img src="{{ asset($pelicula->imagen) }}" alt="Movie Poster"
                    style="width: 100%; height: auto; border-radius: 10px;">
            </div>

            <div class="movie-card__content">
                <h5 class="movie-card__title">{{ strtoupper($pelicula->titulo) }}</h5>
                <span class="minutes">{{ $pelicula->minutos }} min</span>
                <p class="type" style="color: black"><b>{{ $pelicula->genero }}</b></p>
                <p class="movie-card__plot"> {{ $pelicula->sinopsis }}</p>
                <p class="movie-card__target" style="color: black">Money target: {{ $pelicula->objetivo }}€</p>
                <p class="movie-card__amount" style="color: black">Amount reached: {{ $pelicula->cantidad }}€</p>
                <div class="movie-card__cast">
                    <h2 class="movie-card__cast-title">Cast</h2>
                    <div class="movie-card__cast-members">
                        @php
                            $usuarios = $pelicula->usuarios()->get();
                            if ($usuarios->isEmpty()) {
                                echo 'None';
                            }
                        @endphp
                        @foreach ($usuarios as $usuario)
                            <a href="/usuarios/{{ $usuario->id }}" data-tooltip="{{ $usuario->name }}"
                                data-placement="top">
                                <img src="{{ asset('storage/users-avatar/' . $usuario->avatar) }}" alt="Actor"
                                    class="movie-card__cast-member">
                            </a>
                        @endforeach
                    </div>
                </div>
                <p style="color: black;font-weight: bolder;margin-bottom: -1%">Donate Here</p>
                <form action="{{ route('payment') }}" method="post" class="movie-card__form">
                    @csrf
                    <div class="form-group d-flex align-items-center">
                        <input type="number" class="form-control movie-card__input me-2" id="amount" name="amount"
                            required style="width: 10%">
                        <button type="submit" class="btn btn-primary movie-card__button"
                            style="background-color: #8f8c4e; border-color: transparent;margin-top: -5px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-paypal" viewBox="0 0 16 16">
                                <path
                                    d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                            </svg>
                        </button>
                    </div>
                    <input type="hidden" name="pelicula" value="{{ $pelicula->id }}">
                    <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                </form>


            </div>
        </div>
    </div>
@endsection
