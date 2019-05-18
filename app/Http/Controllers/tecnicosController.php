<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class tecnicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tecnicos =  DB::table('datos_asesor')->where('estatus', '1')->get();
        
        return view('tecnicos.index', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('datos_asesor')->insert(
            [
             'nombre_completo' => $request->input("nombre_completo"),
             'telefono'        => $request->input("telefono"),
             'email'           => $request->input("email")
            ]
        );
        
        $tecnicos =  DB::table('datos_asesor')->get();
        
        return view('tecnicos.index', compact('tecnicos'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnicos =  DB::table('datos_asesor')->where('id_asesor', $id)->get();
        
        return view('tecnicos.show', compact('tecnicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tecnicos =  DB::table('datos_asesor')->where('id_asesor', $id)->get();
        
        return view('tecnicos.edit', compact('tecnicos'));
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
        DB::table('datos_asesor')
            ->where('id_asesor', $id)
            ->update([
                        'nombre_completo' => $request->input("nombre_completo"),
                        'telefono'        => $request->input("telefono"),
                        'email'           => $request->input("email")
                    ]);


        $tecnicos =  DB::table('datos_asesor')->get();
        
        return view('tecnicos.index', compact('tecnicos')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('datos_asesor')
            ->where('id_asesor', $id)
            ->update([
                        'estatus' => '0'
                    ]);

        $tecnicos =  DB::table('datos_asesor')->get();

        return redirect()->route('tecnicos.index', compact('tecnicos') );

    }
}
