<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AsesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $insta = DB::table('datos_instalacion')
                    ->select(   'datos_instalacion.id_instalacion', 
                                'datos_instalacion.fecha_ingreso', 
                                'datos_instalacion.fecha_entrega', 
                                'datos_cliente.nombre_completo AS cliente', 
                                'datos_vehiculo.marca', 
                                'datos_vehiculo.modelo', 
                                'users.name as asesor', 
                                'datos_equipo.modelo_equipo',
                                'datos_instalacion.estatus')
                    ->join( 'users',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'users.id' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->whereIn('datos_instalacion.estatus', [1, 2])
                    ->where('datos_instalacion.datos_asesor_id_asesor', Auth::id() )
                    ->get();

        return view( 'asesores.index', compact('insta') );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
