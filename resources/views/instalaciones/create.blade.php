@extends('adminlte::page')

@section('title', 'Instalaciones')

@section('content')
   
<fieldset>
	<legend>Nueva Instalación</legend>
	<form method="POST" action="{{ route('instalaciones.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
		{{ csrf_field() }}
        <div class="col-md-6">        
            <fieldset>
                <legend>Datos Cliente</legend>
        		<div class="form-group">
        			<input type="text" class="form-control input-sm" id="nombre_completo" name="nombre_completo" aria-describedby="emailHelp" placeholder="Nombre Completo">
        		</div>
        		<div class="form-group">
        			<input type="text" class="form-control input-sm solo-numero" id="telefono" name="telefono" placeholder="Telefono" maxlength="10">
        		</div>
        		<div class="form-group">
        			<input type="text" class="form-control input-sm" id="email" name="email" placeholder="Correo Electronico">
        		</div>
            </fieldset>
        </div>
        <div class="col-md-6">        
            <fieldset>
                <legend>Datos Asesor</legend>
                <div class="form-group">
                    <select name="asesor" id="asesor" class="form-control input-sm">
                        <option value="">Selecciona un asesor</option>
                        @foreach( $users as $user )
                            <?php $rol = $user->getRoleNames(); ?>
                            @if( $rol[0] == 'Asesor'  )
                                <option value="{{ $user->id }}">{{ $user->name }}</option>

                            @endif
                        @endforeach
                       
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_entrega" name="fecha_entrega" placeholder="Fecha Ingreso">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha Entrega">
                </div>
            </fieldset>
        </div>       
        <div class="col-md-6">        
            <fieldset>
                <legend>
                    Datos Equipo
                    <button class="btn btn-primary btn-xs newReductor" style="float: right;margin-right: 5px;"><i class="fas fa-plus"></i> Reductor</button>
                    <button class="btn btn-danger  btn-xs deleteReductor" style="float: right;margin-right: 5px; display: none;"><i class="fas fa-minus"></i> Reductor</button>
                    <button class="btn btn-primary btn-xs newTanque" style="float: right;margin-right: 5px;"><i class="fas fa-plus"></i> Tanque</button>
                    <button class="btn btn-danger  btn-xs deleteTanque" style="float: right;margin-right: 5px; display: none;"><i class="fas fa-minus"></i> Tanque</button>
                </legend>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="modelo_equipo" name="modelo_equipo" placeholder="Modelo">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-numero" id="num_serie_ecu" name="num_serie_ecu" placeholder="Núm. de serie ECU">
                </div>
                
                <div class="col-md-6" style="padding-left: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="reductor" name="reductor" placeholder="reductor">
                    </div>
                </div>
                <div class="col-md-6" style="padding: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm solo-numero" id="num_serie_reductor" name="num_serie_reductor" placeholder="Núm. de serie reductor">
                    </div>
                </div>

                <div class="col-md-12 nuevoReductor" style="padding: 0px;"></div>

                <div class="col-md-6" style="padding-left: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="marca_tanque" name="marca_tanque" placeholder="Marca tanque">
                    </div>
                </div>
                <div class="col-md-6" style="padding: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="tipo_tanque" name="tipo_tanque" placeholder="Tipo de tanque">
                    </div>  
                </div>
                <div class="col-md-6" style="padding-left: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="capacidad" name="capacidad" placeholder="Capacidad">
                    </div> 
                </div> 
                <div class="col-md-6" style="padding: 0px;">                
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" id="num_serie_tanque" name="num_serie_tanque" placeholder="Núm. de serie tanque">
                    </div> 
                </div> 
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_fabricacion" name="fecha_fabricacion" placeholder="Fecha de fabricacion">
                </div>  

                <div class="col-md-12 nuevoTanque" style="padding: 0px;"></div>
                
            </fieldset>
        </div>
        <div class="col-md-6">        
            <fieldset>
                <legend>Datos Vehiculo</legend>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="marca" name="marca" placeholder="Marca">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="modelo" name="modelo" placeholder="Modelo">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-fecha" id="anio" name="anio" placeholder="Año">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm solo-placas" id="placas" name="placas" placeholder="Placas">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm" id="num_serie" name="num_serie" placeholder="Número de serie">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control input-sm " id="tag" name="tag" placeholder="Tag">
                </div>
                 <div class="form-group">
                    <label for="testigoFoto">Testigo fotográfico:</label>
                    <input type="file" id="testigoFoto" name="testigoFoto" >
                </div>
            </fieldset>
        </div>
        <div class="col-md-12" style="text-align: center;">
			<button type="submit" class="btn btn-primary saveInst">Guardar</button>
			<a class="btn btn-danger btn-sm" href="{{ route('instalaciones.index') }}" role="button">Cancelar</a>
			<br>
			<br>
        </div>
    </form>

</fieldset>

@stop