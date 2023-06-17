<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\{Controller};
use App\Http\Requests\UserUpdateRules;
use App\Models\User;
use Generator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Edición de los datos del usuario
     *
     * Show the form for editing the specified resource.
     **/
    public function edit(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        //
        if (!empty(Auth::user()->id)) {
            $log = Auth::user()->id;
        }

        if (!empty($log)) {
            $user = User::select("*")
                ->where("id", "=", $log)
                ->get();
        }

        return view('profile.Perfil.edit', compact(var_name: 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRules $request): RedirectResponse
    {
        //

        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return back()->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Asignacion de roles a los usuarios
     *
     * Display a listing of the resource.
     **/
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        //
        $users = User::paginate(10);

        return view('profile.Perfil.index', compact('users'));
    }

    /**
     * Mostrar vista para asignar una serie de roles a un determinado usuario.
     */
    public function assignRoles(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        //
        $roles = Role::all();

        return view('profile.Perfil.assignRoles', compact('user','roles'));
    }

    /**
     * Funcion para almacenar los roles
     */
    public function storeRoles(Request $reques, User $user)
    {
        $user->roles()->sync($reques->roles);

        return redirect()->route('profile.perfil.index')->with('message','Roles asignados exitosamente')->with('type','store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //
        $user->delete();

        return redirect()->route('profile.perfil.index')->with('message','Usuario eliminado exitosamente')->with('type','destroy');
    }
}
