@extends('adminlte::page')

@section('title', 'Instalaciones')

@section('content')
   
<fieldset>
	<legend>Instalación</legend>
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
                        <label for="nombre_completo">Teléfono:</label>
                        {{  $inst->telefono_cliente }}
            		</div>
            		<div class="form-group">
            			<label for="nombre_completo">Correo Electrónico:</label>
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
                    @foreach( $reductores as $reductor )
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Reductor:</label>
                            {{ $reductor->reductor }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Núm. de serie reductor:</label>
                            {{ $reductor->no_serie_reductor }}
                        </div>
                    </div>
                    @endforeach
                    @foreach( $tanques as $tanque )
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Marca tanque:</label>
                            {{ $tanque->marca_tanque }}
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Tipo de tanque:</label>
                            {{ $tanque->tipo_tanque }}
                        </div>  
                    </div>
                    <div class="col-md-6" style="padding-left: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Capacidad:</label>
                            {{ $tanque->capacidad }}
                        </div> 
                    </div> 
                    <div class="col-md-6" style="padding-right: 0px;">                
                        <div class="form-group">
                            <label for="nombre_completo">Núm. de serie tanque:</label>
                            {{ $tanque->serie_tanque }}
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label for="nombre_completo">Fecha de fabricación:</label>
                            {{ $tanque->fecha_fabricacion }}
                    </div>  
                    @endforeach
                </fieldset>
            </div>
            <div class="col-md-6">        
                <fieldset>
                    <legend>Datos Vehículo</legend>
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
                    <div class="col-md-6" style="padding-right: 0px;"> 
                        <div class="form-group">
                            <label for="nombre_completo">Testigo Fotográfico:</label>
                            <a href="{{  Storage::url($inst->nombre_img) }}" class="btn btn-primary active" target="blanck">
                                <i class="fas fa-file-image"></i>
                                Ver imagen
                            </a>
                            
                        </div>
                    </div>
                </fieldset>
            </div>
        @endforeach
        <div class="col-md-12" style="text-align: center;">
		    <a class="btn btn-primary btn-sm" href="{{ route('instalaciones.index') }}" role="button">Regresar</a>
            @can('Confirmar instalaciones')
                <a class="btn btn-primary btn-sm" href="{{ route('confirmarInsta', $inst->id_instalacion) }}" role="button">Confirmar información</a>
            @endcan
        </div>
		<br>
		<br>
	</form>

</fieldset>

@stop