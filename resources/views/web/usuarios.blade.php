@extends('web.layout')


@section('main')
    <link rel="stylesheet" href="{{ asset('css2/usuarios.css') }}">
    <nav class="navbar navbar-expand-lg navbar-light "
        style="border-top: 1px solid rgb(209, 209, 209);border-bottom: 1px solid rgb(209, 209, 209)">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 73%">
                <form class="d-flex" method="POST" action='/usuario/buscarUsuario' enctype="multipart/form-data">
                    @csrf
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="usuario">
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
        <h1 style="text-decoration: underline" class="mt-5">Our Cast</h1>
        <h4>Discover a pool of talented and motivated actors ready to embark on new projects and bring characters to life.
        </h4>
        <div class="container center-div mt-5">
            <div class="row d-flex justify-content-center align-items-center mb-5">
                @foreach ($usuarios as $usuario)
                    @if ($usuario->rol != 'admin')
                        <figure class="snip1515 hover-effect">
                            <div class="profile-image">
                                @if($usuario->avatar == 'avatar.png')
                                <img src="https://www.linkpicture.com/q/defecto.png" height="250px"
                                width="300px" />
                                @else 
                                <img src="{{ asset('storage/users-avatar/' . $usuario->avatar) }}" height="250px"
                                width="300px" />
                                @endif
                            </div>
                            <figcaption>
                                <h3>{{ $usuario->name }}</h3>
                                <h4 style="font-weight: bold">{{ ucfirst($usuario->rol) }}</h4>
                                <p>{{ $usuario->descripcion }}</p>
                                <div class="icons">
                                    @php
                                        $usuarioActual = Auth::user();
                                        if ($usuarioActual->rol == 'admin' || $usuarioActual->rol == 'producer') {
                                            echo '<a href="usuarios/' .
                                                $usuario->id .
                                                '/agregar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                                <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                                            </svg>
                                            </a>';
                                        }
                                    @endphp
                                    <a href="/chatify/{{ $usuario->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-quote" viewBox="0 0 16 16">
                                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                            <path d="M7.066 6.76A1.665 1.665 0 0 0 4 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 7.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 0 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z" />
                                        </svg>
                                    </a>
                                    <a href="/usuarios/{{ $usuario->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                    </a>
                                </div>
                                
                            </figcaption>
                        </figure>
                    @endif
                @endforeach
                <div class="custom-pagination">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
