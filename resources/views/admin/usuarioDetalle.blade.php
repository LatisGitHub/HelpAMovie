@extends('admin.layout')
@section('main')
    <div class="container mt-4 mb-4">
        <center>
            <div class="card" style="width: 26rem;">
                <h1>admin</h1>
                <img src="{{ asset($user->imagen) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ strtoupper($user->nombre) }}</h3>
                    <p style="font-weight: bold" class="card-text">{{ strtoupper($user->email) }}</p>
                    
                    <h5 class="card-text" style="font-weight: bold">TORNEOS ASOCIADOS </h5>
                    <ul>
                       
                        <ul>
                </div>
            </div>
        </center>
    </div>
@endsection
