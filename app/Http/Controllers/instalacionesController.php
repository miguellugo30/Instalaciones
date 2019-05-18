<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class instalacionesController extends Controller
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
                                'datos_asesor.nombre_completo as asesor', 
                                'datos_equipo.modelo_equipo')
                    ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->get();

        return view( 'instalaciones.index', compact('insta') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asesores =  DB::table('datos_asesor')->get();
        return view( 'instalaciones.create', compact('asesores') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idCliente = DB::table('datos_cliente')
                    ->insertGetId([
                                    'nombre_completo' => $request->input("nombre_completo"),
                                    'telefono'        => $request->input("telefono"),
                                    'email'           => $request->input("email")
                                ]);

        $idVehiculo = DB::table('datos_vehiculo')
                        ->insertGetId([
                                        'marca'     => $request->input("marca"),
                                        'modelo'    => $request->input("modelo"),
                                        'anio'      => $request->input("anio"),
                                        'placas'    => $request->input("placas"),
                                        'num_serie' => $request->input("num_serie"),
                                        'tag'       => $request->input("tag")
                                    ]);

        $idEquipo = DB::table('datos_equipo')
                    ->insertGetId([
                                    'modelo_equipo'     => $request->input("modelo_equipo"),
                                    'no_serie_ecu'      => $request->input("num_serie_ecu"),
                                    'reductor'          => $request->input("reductor"),
                                    'no_serie_reductor' => $request->input("num_serie_reductor"),
                                    'marca_tanque'      => $request->input("marca_tanque"),
                                    'tipo_tanque'       => $request->input("tipo_tanque"),
                                    'capacidad'         => $request->input("capacidad"),
                                    'serie_tanque'      => $request->input("num_serie_tanque"),
                                    'fecha_fabricacion' => $request->input("fecha_fabricacion")
                                ]);

        $now = date('Y-m-d H:i:s');

        DB::table('datos_instalacion')->insert(
            [
             'fecha_ingreso'              => $request->input("fecha_ingreso"),
             'fecha_entrega'              => $request->input("fecha_entrega"),
             'estatus'                    => "1",
             'datos_asesor_id_asesor'     => $request->input("asesor"),
             'datos_equipo_id_equipo'     => $idEquipo,
             'datos_vehiculo_id_vehiculo' => $idVehiculo,
             'datos_cliente_id_cliente'   => $idCliente,
            ]
        );

        $insta = DB::table('datos_instalacion')
                    ->select(   'datos_instalacion.id_instalacion', 
                                'datos_instalacion.fecha_ingreso', 
                                'datos_instalacion.fecha_entrega', 
                                'datos_cliente.nombre_completo AS cliente', 
                                'datos_vehiculo.marca', 
                                'datos_vehiculo.modelo', 
                                'datos_asesor.nombre_completo as asesor', 
                                'datos_equipo.modelo_equipo')
                    ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->get();

        return view( 'instalaciones.index', compact('insta') );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insta = DB::table('datos_instalacion')
                    ->select(   
                                'datos_instalacion.id_instalacion', 
                                'datos_cliente.nombre_completo AS cliente', 
                                'datos_cliente.telefono AS telefono_cliente', 
                                'datos_cliente.email AS email_cliente', 
                                'datos_asesor.nombre_completo as asesor', 
                                'datos_instalacion.fecha_ingreso', 
                                'datos_instalacion.fecha_entrega', 
                                'datos_equipo.modelo_equipo',
                                'datos_equipo.no_serie_ecu',
                                'datos_equipo.reductor',
                                'datos_equipo.no_serie_reductor' ,
                                'datos_equipo.marca_tanque',
                                'datos_equipo.tipo_tanque',
                                'datos_equipo.capacidad',
                                'datos_equipo.serie_tanque',
                                'datos_equipo.fecha_fabricacion',
                                'datos_vehiculo.marca', 
                                'datos_vehiculo.modelo',
                                'datos_vehiculo.anio',
                                'datos_vehiculo.placas',
                                'datos_vehiculo.num_serie',
                                'datos_vehiculo.tag'
                            )
                    ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->where( 'id_instalacion', $id )
                    ->get();

        return view( 'instalaciones.show', compact('insta') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $asesores = DB::table('datos_asesor')->pluck('nombre_completo', 'id_asesor');
        //$asesores =  DB::table('datos_asesor')->select('nombre_completo', 'id_asesor')->get();

        $insta = DB::table('datos_instalacion')
            ->select(   
                        'datos_instalacion.id_instalacion', 
                        'datos_instalacion.datos_asesor_id_asesor', 
                        'datos_instalacion.datos_cliente_id_cliente', 
                        'datos_instalacion.datos_vehiculo_id_vehiculo', 
                        'datos_instalacion.datos_equipo_id_equipo', 
                        'datos_instalacion.id_instalacion', 
                        'datos_cliente.nombre_completo AS cliente', 
                        'datos_cliente.telefono AS telefono_cliente', 
                        'datos_cliente.email AS email_cliente', 
                        'datos_asesor.nombre_completo as asesor', 
                        'datos_instalacion.fecha_ingreso', 
                        'datos_instalacion.fecha_entrega', 
                        'datos_equipo.modelo_equipo',
                        'datos_equipo.no_serie_ecu',
                        'datos_equipo.reductor',
                        'datos_equipo.no_serie_reductor' ,
                        'datos_equipo.marca_tanque',
                        'datos_equipo.tipo_tanque',
                        'datos_equipo.capacidad',
                        'datos_equipo.serie_tanque',
                        'datos_equipo.fecha_fabricacion',
                        'datos_vehiculo.marca', 
                        'datos_vehiculo.modelo',
                        'datos_vehiculo.anio',
                        'datos_vehiculo.placas',
                        'datos_vehiculo.num_serie',
                        'datos_vehiculo.tag'
                    )
            ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
            ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
            ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
            ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
            ->where( 'id_instalacion', $id )
            ->get();

        return view( 'instalaciones.edit', compact('insta', 'asesores') );
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
        
        DB::table('datos_cliente')
            ->where('id_cliente', $request->input("id_cliente"))
            ->update([
                'nombre_completo' => $request->input("nombre_completo"),
                'telefono'        => $request->input("telefono"),
                'email'           => $request->input("email")
            ]);

        DB::table('datos_vehiculo')
            ->where('id_vehiculo', $request->input("id_vehiculo"))
            ->update([
                        'marca'     => $request->input("marca"),
                        'modelo'    => $request->input("modelo"),
                        'anio'      => $request->input("anio"),
                        'placas'    => $request->input("placas"),
                        'num_serie' => $request->input("num_serie"),
                        'tag'       => $request->input("tag")
                    ]);

        DB::table('datos_equipo')
            ->where('id_equipo', $request->input("id_equipo"))
            ->update([
                        'modelo_equipo'     => $request->input("modelo_equipo"),
                        'no_serie_ecu'      => $request->input("num_serie_ecu"),
                        'reductor'          => $request->input("reductor"),
                        'no_serie_reductor' => $request->input("num_serie_reductor"),
                        'marca_tanque'      => $request->input("marca_tanque"),
                        'tipo_tanque'       => $request->input("tipo_tanque"),
                        'capacidad'         => $request->input("capacidad"),
                        'serie_tanque'      => $request->input("num_serie_tanque"),
                        'fecha_fabricacion' => $request->input("fecha_fabricacion")
                    ]);

        DB::table('datos_instalacion')
            ->where('id_instalacion', $id)
            ->update(
            [
             'fecha_ingreso'              => $request->input("fecha_ingreso"),
             'fecha_entrega'              => $request->input("fecha_entrega"),
             'datos_asesor_id_asesor'     => $request->input("asesor"),
            ]
        );

        $insta = DB::table('datos_instalacion')
                    ->select(   'datos_instalacion.id_instalacion', 
                                'datos_instalacion.fecha_ingreso', 
                                'datos_instalacion.fecha_entrega', 
                                'datos_cliente.nombre_completo AS cliente', 
                                'datos_vehiculo.marca', 
                                'datos_vehiculo.modelo', 
                                'datos_asesor.nombre_completo as asesor', 
                                'datos_equipo.modelo_equipo')
                    ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->get();

        return view( 'instalaciones.index', compact('insta') );

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
