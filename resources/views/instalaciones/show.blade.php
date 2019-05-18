@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
   
<fieldset>
	<legend>Instalacion</legend>
    @foreach( $insta as $inst )
	   <form method="POST" action="{{ route('instalaciones.update', $inst->id_instalacion) }}">
		    {{ csrf_field() }}
            <div class="col-md-6">        
                <fieldset>
                    <legend>Datos Cliente</legend>
            		<div class="form-group">
                        <label for="nombre_completo">Nombre Completo:</label>
            			{{  $inst->cliente }}
            		</div>
            		<div class="form-group">
                        <label for="nombre_completo">Telefono:</label>
                        {{  $inst->telefono_cliente }}
            		</div>
            		<div class="form-group">
            			<label for="nombre_completo">Correo Electronico:</label>
                        {{  $inst->email_cliente }}
            		</div>
                </fieldset>
            </div>
            <div class="col-md-6">        
                <fieldset>
                    <legend>Datos Asesor</legend>
                    <div class="form-group">
                        <label for="nombre_completo">Asesor:</label>
                        {{  $inst->asesor }}
                    </div>
                    <div class="form-group">
                        <label for="nombre_completo">Fecha Ingreso:</label>
                        {{  $inst->fecha_ingreso }}
                    </div>
                    <div class="form-group">
                        <label for="nombre_completo">Fecha Entrega:</label>
                        {{  $inst->fecha_entrega }}
                    </div>
                </fieldset>
            </div>       
            <div class="col-md-6">        
                <fieldset>
                    <legend>Datos Equipo</legend>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Modelo:</label>
                            {{  $inst->modelo_equipo }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Núm. de serie ECU:</label>
                            {{  $inst->no_serie_ecu }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Reductor:</label>
                            {{  $inst->reductor }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Núm. de serie reductor:</label>
                            {{  $inst->no_serie_reductor }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Marca tanque:</label>
                            {{  $inst->marca_tanque }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Tipo de tanque:</label>
                            {{  $inst->tipo_tanque }}
                        </div>  
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Capacidad:</label>
                            {{  $inst->capacidad }}
                        </div> 
                    </div> 
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Núm. de serie tanque:</label>
                            {{  $inst->serie_tanque }}
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label for="nombre_completo">Fecha de fabricacion:</label>
                            {{  $inst->fecha_fabricacion }}
                    </div>  
                </fieldset>
            </div>
            <div class="col-md-6">        
                <fieldset>
                    <legend>Datos Vehiculo</legend>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Marca:</label>
                            {{  $inst->marca }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;"> 
                        <div class="form-group">
                            <label for="nombre_completo">Modelo:</label>
                            {{  $inst->modelo }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Año:</label>
                            {{  $inst->anio }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;"> 
                        <div class="form-group">
                            <label for="nombre_completo">Placas:</label>
                            {{  $inst->placas }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Número de serie:</label>
                            {{  $inst->num_serie }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;"> 
                        <div class="form-group">
                            <label for="nombre_completo">Tag:</label>
                            {{  $inst->tag }}
                        </div>
                    </div>
                </fieldset>
            </div>
        @endforeach
        <div class="col-md-12">
		    <a class="btn btn-primary btn-sm" href="{{ route('instalaciones.index') }}" role="button">Regresar</a>
        </div>
		<br>
		<br>
	</form>

</fieldset>

@stop