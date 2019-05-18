@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewAsesores">
		<fieldset>
			<legend>Editar Asesor</legend>
				@foreach( $tecnicos as $tecnico )
			<form method="POST" action="{{ route('tecnicos.update', $tecnico->id_asesor) }}">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label for="nombre_completo">Nombre Completo</label>
						<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre Completo" value="{{ $tecnico->nombre_completo }}">
					</div>
					<div class="form-group">
						<label for="telefono">Télefono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{ $tecnico->telefono }}">
					</div>
					<div class="form-group">
						<label for="email">Correo Electronico</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico" value="{{ $tecnico->email }}">
					</div>
				@endforeach
				<button type="submit" class="btn btn-primary ">Guardar</button>
				<a class="btn btn-danger btn-sm" href="{{ route('tecnicos.index') }}" role="button">Cancelar</a>
				<br>
				<br>
			</form>
</fieldset>
	</div>	
@stop