@extends('admin.layout')

@section('main')
    <x-guest-layout>
        <form action='/peliculas/crear' enctype='multipart/form-data' method='POST'>
            @csrf
            <div>
                <x-input-label for="titulo" :value="__('TITULO')" />
                <input type="text" class="block mt-1 w-full" name="titulo">
            </div>
            <div>
                <x-input-label for="sinopsis" :value="__('SINOPSIS')" />
                <input type="text" class="block mt-1 w-full" name="sinopsis">
            </div>
            <div>
                <x-input-label for="genero" :value="__('GENERO')" />
                <select name="genero" class="block mt-1 w-full">
                    <option value="Accion">Accion</option>
                    <option value="Aventura">Aventura</option>
                    <option value="CienciaFiccion">Ciencia Ficcion</option>
                    <option value="Comedia">Comedia</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasia">Fantasia</option>
                </select>
            </div>
            <div>
                <x-input-label for="fechaLimite" :value="__('FECHA LIMITE')" />
                <input type="date" class="block mt-1 w-full" name="fechaLimite">
            </div>
            <div>
                <x-input-label for="objetivo" :value="__('OBJETIVO')" />
                <input type="number" class="block mt-1 w-full" name="objetivo">
            </div>
            <div>
                <x-input-label for="imagen" :value="__('IMAGEN')" />
                <input type='file' class="block mt-1 w-full" name='imagen' value='' />
            </div>
            <input style="border: 1px solid black; border-radius: 10px" class="mt-3 p-2" type='submit' name='enviar'
                texto='' value='CREAR' />
        </form>
    </x-guest-layout>
@endsection
