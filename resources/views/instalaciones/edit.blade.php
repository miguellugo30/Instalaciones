@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
   
<fieldset>
	<legend>Editar Instalacion</legend>
	@foreach( $insta as $inst )
		<form method="POST" action="{{ route('instalaciones.update', $inst->id_instalacion) }}">
			<input name="_method"     type="hidden" value="PUT">
			<input name="id_asesor"   type="hidden" value="{{ $inst->datos_asesor_id_asesor }}">
			<input name="id_cliente"  type="hidden" value="{{ $inst->datos_cliente_id_cliente }}">
			<input name="id_vehiculo" type="hidden" value="{{ $inst->datos_vehiculo_id_vehiculo }}">
			<input name="id_equipo"   type="hidden" value="{{ $inst->datos_equipo_id_equipo }}">
			

			{{ csrf_field() }}
	        <div class="col-md-6">        
	            <fieldset>
	                <legend>Datos Cliente</legend>
	        		<div class="form-group">
	        			<input type="text" class="form-control input-sm" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo" value="{{ $inst->cliente }}">
	        		</div>
	        		<div class="form-group">
	        			<input type="text" class="form-control input-sm solo-numero" id="telefono" name="telefono" placeholder="Telefono" maxlength="10" value="{{ $inst->telefono_cliente }}">
	        		</div>
	        		<div class="form-group">
	        			<input type="text" class="form-control input-sm" id="email" name="email" placeholder="Correo Electronico" value="{{ $inst->email_cliente }}">
	        		</div>
	            </fieldset>
	        </div>
	        <div class="col-md-6">        
	            <fieldset>
	                <legend>Datos Asesor</legend>
	                <div class="form-group">
	                    {{ Form::select('asesor', $asesores, $inst->datos_asesor_id_asesor, ['class' => 'form-control input-sm'] ) }}
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_entrega" name="fecha_entrega" placeholder="Fecha Ingreso" value="{{ $inst->fecha_ingreso }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha Entrega" value="{{ $inst->fecha_entrega }}">
	                </div>
	            </fieldset>
	        </div>       
	        <div class="col-md-6">        
	            <fieldset>
	                <legend>Datos Equipo</legend>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm" id="modelo_equipo" name="modelo_equipo" placeholder="Modelo" value="{{ $inst->modelo_equipo }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm solo-numero" id="num_serie_ecu" name="num_serie_ecu" placeholder="Núm. de serie ECU" value="{{ $inst->no_serie_ecu }}">
	                </div>
	                <div class="col-md-6" style="padding-left: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm" id="reductor" name="reductor" placeholder="reductor" value="{{ $inst->reductor }}">
	                    </div>
	                </div>
	                <div class="col-md-6" style="padding-right: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm solo-numero" id="num_serie_reductor" name="num_serie_reductor" placeholder="Núm. de serie reductor" value="{{ $inst->no_serie_reductor }}">
	                    </div>
	                </div>
	                <div class="col-md-6" style="padding-left: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm" id="marca_tanque" name="marca_tanque" placeholder="Marca tanque" value="{{ $inst->marca_tanque }}">
	                    </div>
	                </div>
	                <div class="col-md-6" style="padding-right: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm" id="tipo_tanque" name="tipo_tanque" placeholder="Tipo de tanque" value="{{ $inst->tipo_tanque }}">
	                    </div>  
	                </div>
	                <div class="col-md-6" style="padding-left: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm" id="capacidad" name="capacidad" placeholder="Capacidad" value="{{ $inst->capacidad }}">
	                    </div> 
	                </div> 
	                <div class="col-md-6" style="padding-right: 0px;">                
	                    <div class="form-group">
	                        <input type="text" class="form-control input-sm" id="num_serie_tanque" name="num_serie_tanque" placeholder="Núm. de serie tanque" value="{{ $inst->serie_tanque }}">
	                    </div> 
	                </div> 
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm solo-fecha" id="fecha_fabricacion" name="fecha_fabricacion" placeholder="Fecha de fabricacion" value="{{ $inst->fecha_fabricacion }}">
	                </div>  
	            </fieldset>
	        </div>
	
	        <div class="col-md-6">        
	            <fieldset>
	                <legend>Datos Vehiculo</legend>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm" id="marca" name="marca" placeholder="Marca" value="{{ $inst->marca }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm" id="modelo" name="modelo" placeholder="Modelo" value="{{ $inst->modelo }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm solo-fecha" id="anio" name="anio" placeholder="Año" value="{{ $inst->anio }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm" id="placas" name="placas" placeholder="Placas" value="{{ $inst->placas }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm" id="num_serie" name="num_serie" placeholder="Número de serie" value="{{ $inst->num_serie }}">
	                </div>
	                <div class="form-group">
	                    <input type="text" class="form-control input-sm " id="tag" name="tag" placeholder="Tag" value="{{ $inst->tag }}">
	                </div>
	            </fieldset>
	        </div>
	    @endforeach
		<button type="submit" class="btn btn-primary saveInst">Guardar</button>
		<a class="btn btn-danger btn-sm" href="{{ route('instalaciones.index') }}" role="button">Cancelar</a>
		<br>
		<br>
	</form>

</fieldset>

@stop