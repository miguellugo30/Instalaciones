<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view( 'usuarios.index', compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles    = DB::table('roles')->pluck('name', 'id');
        $permisos = Permission::all();
        return view( 'usuarios.create', compact('roles', 'permisos') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $user = User::create([
                                'name'     => $request->input("name"),
                                'email'    => $request->input("email"),
                                'password' => Hash::make( $request->input("password") )
                            ]);

        $user->assignRole( Role::find( $request->input("rol") )->name );
        $permisos = $request->input("permisos");

        for ($i=0; $i < count( $permisos ); $i++) { 
            $user->givePermissionTo( Permission::find( $permisos[$i] )->name );
        }

        $users = User::all();
        return view( 'usuarios.index', compact('users') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = User::findOrFail( $id );
        $roles = DB::table('roles')->pluck('name', 'id');
        $permissionNames = $user->getPermissionNames();
        $permisos = Permission::all();

        return view( 'usuarios.show', compact('user', 'roles', 'permisos', 'permissionNames') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findOrFail( $id );
        $roles = DB::table('roles')->pluck('name', 'id');
        $permissionNames = $user->getPermissionNames();
        $permisos = Permission::all();

        return view( 'usuarios.edit', compact('user', 'roles', 'permisos', 'permissionNames') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        /**
         * Si el pass viene vacio no se actualiza el campo
         * si vine con datos se actualiza
         */
        if ( $request->input("password") != NULL ) {
            $user = User::where('id', $id)
                    ->update([
                        'name'     => $request->input("name"),
                        'email'    => $request->input("email"),
                        'password' => Hash::make( $request->input("password") )
                    ]);
        } else {
            $user = User::findOrFail( $id );
            $user->name  = $request->input("name");
            $user->email = $request->input("email");

            $user->save();
        }

        /**
         * Se valida si es el rol ya cuenta con este
         * Si no se remueve el  y se asigna en nuevo
         */
        
        $v = $user->hasRole( Role::find( $request->input("rol") )->name );

        if ( !$v ) {
            $rol = $user->getRoleNames(); // Obtengo su rol anterior
            $user->removeRole( $rol[0] ); // Le quito el rol anterior
            $user->assignRole( Role::find( $request->input("rol") )->name ); // Le asigno el nuevo rol
        } else {
            $user->assignRole( Role::find( $request->input("rol") )->name ); // Le asigno el rol
        }

        /**
         * Obtenemos todos los permisos y se los quitamos al usuario
         * Para despues asignarle los que seleccionaron al editarlo
         */
        $permissionNames = $user->getPermissionNames();

        for ($i=0; $i < count( $permissionNames ); $i++) { 
            $user->revokePermissionTo( $permissionNames[$i] );
        }

        $permisos = $request->input("permisos");

        for ($i=0; $i < count( $permisos ); $i++) { 
            $user->givePermissionTo( Permission::find( $permisos[$i] )->name );
        }

        $users = User::all();
        return view( 'usuarios.index', compact('users') );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user  = User::findOrFail( $id );
        $user->delete();
    }
}
