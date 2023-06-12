@extends('web.layout')


@section('main')
    <div class="container justify-content-center" style="margin-bottom: 20%">
        <h1 style="text-decoration: underline" class="mt-5">Your movies</h1>
        <h4>Here's a list of your movies, choose wisely.
        </h4>
        <div style="margin: 0 auto; width: 40%; text-align: left;">
            <form action='/usuarios/{{ $usuario->id }}/registrar' enctype='multipart/form-data' method='POST'>
                @csrf
                <div class='row mt-4'>
                    <div class='col-12'>
                        <div class="mb-3 p-2">
                            @php
                                $peliculasId = $usuario
                                    ->peliculas()
                                    ->pluck('id')
                                    ->toArray();
                            @endphp
                            <select class="form-select" name="pelicula">
                                @foreach ($peliculas as $pelicula)
                                    @php
                                        $registrado = false;
                                        foreach ($pelicula->usuarios as $usuarioRegistrado) {
                                            if ($usuarioRegistrado->id === $usuario->id) {
                                                $registrado = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if (!$registrado)
                                        <option value="{{ $pelicula->id }}">{{ strtoupper($pelicula->titulo) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button style="background-color: #8f8c4e;color:white;" class="btn mx-auto" type='submit' name='enviar'
                    texto='' value='registrar'>Register</button>
            </form>
        </div>

    </div>
@endsection
