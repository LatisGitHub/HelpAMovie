@extends('web.layout')
@section('main')
    <div class="container mt-4 mb-4">
        <center>
            <div class="card" style="width: 26rem;">
                <img src="{{ asset($pelicula->imagen) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ strtoupper($pelicula->titulo) }}</h3>
                    <p style="font-weight: bold" class="card-text">{{ strtoupper($pelicula->sinopsis) }}</p>
                    <p>{{ $pelicula->titulo }}</p>
                    <h5 class="card-text" style="font-weight: bold">TORNEOS ASOCIADOS </h5>
                    <form action=" {{ route('payment') }}" method="post">
                        @csrf
                        <input type="number" name="amount">
                        <button type="submit">
                        pay with paypal
                        </button>
                        </form>
                    <ul>
                       
                        <ul>
                </div>
            </div>
        </center>
    </div>
@endsection
