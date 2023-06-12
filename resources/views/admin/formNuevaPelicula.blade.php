@extends('web.layout')

@section('main')
    <x-guest-layout>
        <form action='/peliculas/crear' enctype='multipart/form-data' method='POST'>
            @csrf
            <div>
                <x-input-label for="titulo" :value="__('TITLE')" />
                <input type="text" class="block mt-1 w-full" name="titulo">
            </div>
            <div>
                <x-input-label for="sinopsis" :value="__('PLOT')" />
                <input type="text" class="block mt-1 w-full" name="sinopsis">
            </div>
            <div>
                <x-input-label for="genero" :value="__('GENRE')" />
                <select name="genero" class="block mt-1 w-full">
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="ScienceFiction">Science Fiction</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Romance">Romance</option>
                </select>
            </div>
            <div>
                <x-input-label for="minutos" :value="__('DURATION(MINUTES)')" />
                <input type="number" class="block mt-1 w-full" name="minutos">
            </div>
            <div>
                <x-input-label for="fechaLimite" :value="__('LIMIT DATE')" />
                <input type="date" class="block mt-1 w-full" name="fechaLimite">
            </div>
            <div>
                <x-input-label for="objetivo" :value="__('TARGET MONEY')" />
                <input type="number" class="block mt-1 w-full" name="objetivo">
            </div>
            <div>
                <x-input-label for="imagen" :value="__('IMAGE')" />
                <input type='file' class="block mt-1 w-full" name='imagen' value='' />
            </div>
            <input style="border: 1px solid black; border-radius: 10px" class="mt-3 p-2" type='submit' name='enviar'
                texto='' value='CREATE' />
        </form>
    </x-guest-layout>
@endsection
