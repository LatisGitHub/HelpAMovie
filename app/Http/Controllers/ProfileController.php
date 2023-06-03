<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    public function index()
    {   
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.usuarios', ['usuarios' => User::paginate(4)]);
            } else {
                return view('web.usuarios', ['usuarios' => User::paginate(6)]);
            }
        }
        if (isEmpty(Auth::user())) {
            return view('web.usuarios', ['usuarios' => User::paginate(6)]);
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(User $user)
    {
        if (isset(Auth::user()->rol)) {
            if (Auth::user()->rol == 'admin') {
                return view('admin.usuarioDetalle', ['user' => $user]);
            } else {
                return view('web.usuarioDetalle', ['user' => $user]);
            }
        }
    }

    public function buscarUsuario(Request $request)
    {
        $users = DB::table('users')
            ->where('name', 'like', '%'. $request->input('usuario') . '%')->paginate(6);

        if (Auth::user()->rol == "admin") {
            return view('admin.usuarios', ['usuarios' => $users]);
        } else {
            return view('web.usuarios', ['usuarios' => $users]);
        }
        if (isEmpty(Auth::user())) {
            return view('web.usuarios', ['usuarios' => $users]);
        }
    }

}
