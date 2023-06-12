@extends('web.layout')


@section('main')
    <div class="container justify-content-center" style="margin-bottom: 20%">
        <h1 style="text-align: center" class="mt-5 text-primary"> REGISTRAR USUARIO EN PELICULA</h1>
        <div style="margin-left: 40%;">
            <form action='/usuarios/{{$usuario->id}}/registrar' enctype='multipart/form-data' method='POST'>
                @csrf
                <div class='row'>
                    <div class='col-3'>
                        <div class="mb-3 p-2">
                            <label for="grupo" class="form-label" style="text-align: center"><b>PELICULAS
                                    DISPONIBLES</b></label>
                            @php
                                $peliculasId = $usuario
                                    ->peliculas()
                                    ->pluck('id')
                                    ->toArray();
                            @endphp
                            <select class="form-select" name="pelicula">
                                @foreach ($peliculas as $pelicula)
                                    <option value="{{ $pelicula->id }}">{{ strtoupper($pelicula->titulo) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-warning mx-4" type='submit' name='enviar' texto='' value='registrar'>
                    REGISTRAR </button>

            </form>
        </div>
    </div>
@endsection
