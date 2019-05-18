<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   	 public function headings(): array
    {
        return [
            'ID Registro',
            'Fecha ingreso',
            'Fecha entrega',
            'Marca',
            'Modelo',
            'Año',
            'Placas',
            'Serie Vehiculo',
            'Nombre cliente',
            'Asesor',
            'Modelo equipo',
            'No. serie de ecu',
            'Reductor',
            'No. serie de reductor',
            'Tanque',
            'Marca',
            'Capacidad',
            'Serie tanque',
            'Fecha fabricacion',
            'Tag',
            'Telefono',
        ];
    }


    public function collection()
    {
         $insta = DB::table('datos_instalacion')
                    ->select(    
                            'datos_instalacion.id_instalacion', 
                            'datos_instalacion.fecha_ingreso', 
                            'datos_instalacion.fecha_entrega', 
                            'datos_vehiculo.marca', 
                            'datos_vehiculo.modelo', 
                            'datos_vehiculo.anio', 
                            'datos_vehiculo.placas', 
                            'datos_vehiculo.num_serie', 
                            'datos_cliente.nombre_completo AS cliente', 
                            'datos_asesor.nombre_completo as asesor', 
                            'datos_equipo.modelo_equipo',
                            'datos_equipo.no_serie_ecu',
                            'datos_equipo.reductor',
                            'datos_equipo.no_serie_reductor',
                            'datos_equipo.marca_tanque',
                            'datos_equipo.tipo_tanque',
                            'datos_equipo.capacidad',
                            'datos_equipo.serie_tanque',
                            'datos_equipo.fecha_fabricacion',
                            'datos_vehiculo.tag',
                            'datos_cliente.telefono'
                            )
                    ->join( 'datos_asesor',   'datos_instalacion.datos_asesor_id_asesor',     '=', 'datos_asesor.id_asesor' )
                    ->join( 'datos_cliente',  'datos_instalacion.datos_cliente_id_cliente',   '=', 'datos_cliente.id_cliente' )
                    ->join( 'datos_vehiculo', 'datos_instalacion.datos_vehiculo_id_vehiculo', '=', 'datos_vehiculo.id_vehiculo' )
                    ->join( 'datos_equipo',   'datos_instalacion.datos_equipo_id_equipo',     '=', 'datos_equipo.id_equipo' )
                    ->get();
        //return User::all();
        return $insta;
    }
}
	