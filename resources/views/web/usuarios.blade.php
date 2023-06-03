@extends('web.layout')


@section('main')
    <div class="container">
        <div class="form-container mt-3" style="margin-left: 25%">
            <form method="POST" action='/juego/buscarPlataforma' enctype="multipart/form-data">
                @csrf
                <label for="plataforma" style="font-weight: bold">PLATAFORMA</label>
                <select name="plataforma" class="block mt-1 w-full">
                    <option value="pc">PC</option>
                    <option value="xbox">XBOX</option>
                    <option value="ps4">PS4</option>
                    <option value="ps5">PS5</option>
                </select>
                <button class="btn btn-dark" type="submit">BUSCAR</button>
            </form>
            <form method="POST" action='/juego/buscarJuego' enctype="multipart/form-data">
                @csrf
                <label for="plataforma" style="font-weight: bold">JUEGO</label>
                <input type="text" name="juego">
                <button class="btn btn-dark" type="submit">BUSCAR</button>
            </form>
        </div>
        <style>
            .form-container {
                display: flex;
                gap: 20px;
            }
        </style>
        <h1 class="text-dark mt-5" style="text-align: center"> USUARIOS </h1>
        <div class="row mb-5">
            @foreach ($usuarios as $usuario)
                <div class="card p-3 m-3" style="width: 25rem;">
                    <img class="card-img-top img-responsive" height="320px" src="{{ asset($usuario->avatar) }}" />
                    <a class="btn btn-dark mt-3" href="/usuarios/{{ $usuario->id }}">DETALLE</a>
                    <div class="card-body">
                        <h5 class="card-title">{{ strtoupper($usuario->name) }}</h5>
                        <p class="card-text">{{ $usuario->email }}</p>
                        <p class="card-text">{{ $usuario->genero }}</p>
                        <a href="usuarios/{{ $usuario->id }}/agregar"><button
                                class="btn btn-dark mb-3 text-light">AGREGAR</button></a>
                        <a href="/chatify/{{$usuario->id }}"><button
                                class="btn btn-dark mb-3 text-light">CHATEAR</button></a>
                    </div>
                </div>
            @endforeach
            {{ $usuarios->links() }}
        </div>

    </div>
@endsection
