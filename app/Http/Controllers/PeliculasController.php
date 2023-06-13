<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = pelicula::where('fechaLimite', '>', now())->paginate(6);
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.peliculas', ['peliculas' => $peliculas]);
            } else {
                return view('web.peliculas', ['peliculas' => $peliculas]);

            }
        } else {
            return view('web.peliculas', ['peliculas' => $peliculas]);
        }

    }

    public function inicio()
    {
        return view('web.inicio');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.formNuevaPelicula');
            } else {
                return view('web.formNuevaPelicula');
            }
        } else {
            return view('web.formNuevaPelicula');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input('titulo');
        $pelicula->sinopsis = $request->input('sinopsis');
        $pelicula->genero = $request->input('genero');
        $pelicula->minutos = $request->input('minutos');
        $pelicula->fechaLimite = $request->input('fechaLimite');
        $pelicula->objetivo = $request->input('objetivo');
        

        $path = $request->file('imagen')->store('public');
        // /public/nombreimagengenerado.jpg
        //Cambiamos public por storage en la BBDD para que se pueda ver la imagen en la web
        $pelicula->imagen =  str_replace('public', 'storage', $path);
        $pelicula->cantidad = '0';
       
        $pelicula->user_id = Auth::user()->id;


        $pelicula->save();

        return redirect('peliculas');
    }

    public function agregar(User $usuario)
    {
        //Sacar todas los peliculas del director logueado
        $peliculas = Pelicula::where('user_id', Auth::user()->id)->get();

        // var_dump($usuario);
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.formPeliculas', ['peliculas' => $peliculas, 'usuario' => $usuario]);
            } else {
                return view('web.formPeliculas', ['peliculas' => $peliculas, 'usuario' => $usuario]);
            }
        }
    }

    public function buscarPelicula(Request $request)
    {
        $peliculas = DB::table('peliculas')
            ->where('titulo', 'like', '%' . $request->input('pelicula') . '%')->paginate(6);

        if (Auth::user()->rol == "admin") {
            return view('admin.peliculas', ['peliculas' => $peliculas]);
        } else {
            return view('web.peliculas', ['peliculas' => $peliculas]);
        }
        if (isEmpty(Auth::user())) {
            return view('web.peliculas', ['peliculas' => $peliculas]);
        }
    }

    public function registrar(User $usuario, Request $request)
    {
        $pelicula_id = $request->pelicula;
        //var_dump($pelicula_id);
        $pelicula = Pelicula::where('id', $pelicula_id)->get();
        //$pelicula->usuarios()->attach($usuario->id, ['created_at' => Carbon::now()]);
        $usuario->peliculas()->attach($pelicula_id, ['created_at' => Carbon::now()]);
        return redirect('/peliculas');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.peliculaDetalle', ['pelicula' => $pelicula]);
            } else {
                return view('web.peliculaDetalle', ['pelicula' => $pelicula]);
            }
        }
    }

    public function invertir(Request $request)
    {
        $pelicula = $request->pelicula;
        $usuario = $request->usuario;
        $cantidad = $request->amount;
        $pelicula->usuarios()->attach($usuario, $cantidad, ['created_at' => Carbon::now()]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect('/peliculas');
    }
}
