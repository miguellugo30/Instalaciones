@extends('adminlte::page')

@section('title', 'Instalaciones')

@section('content')
    <div class="col-md-12" id="viewAsesores">
		<fieldset>
			<legend>Asesor</legend>
				@foreach( $tecnicos as $tecnico )
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label for="nombre_completo">Nombre Completo:</label>
						{{ $tecnico->nombre_completo }}
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						{{ $tecnico->telefono }}
					</div>
					<div class="form-group">
						<label for="email">Correo Electrónico:</label>
						{{ $tecnico->email }}
					</div>
				@endforeach
				<a class="btn btn-primary btn-sm" href="{{ route('tecnicos.index') }}" role="button">Regresar</a>
				<br>
				<br>
		</fieldset>
	</div>	
@stop