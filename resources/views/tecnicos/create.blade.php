@extends('adminlte::page')

@section('title', 'Instalaciones')

@section('content')
    <div class="col-md-12" id="viewAsesores">
		<fieldset>
			<legend>Nuevo Asesor</legend>
			<form method="POST" action="{{ route('tecnicos.store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="nombre_completo">Nombre Completo</label>
					<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" aria-describedby="emailHelp" placeholder="Nombre Completo">
				</div>
				<div class="form-group">
					<label for="telefono">Teléfono</label>
					<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
				</div>
				<div class="form-group">
					<label for="email">Correo Electrónico</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico">
				</div>
					<button type="submit" class="btn btn-primary saveAse">Guardar</button>
					<a class="btn btn-danger btn-sm" href="{{ route('tecnicos.index') }}" role="button">Cancelar</a>
					<br>
					<br>
			</form>
</fieldset>
	</div>	
@stop