@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Instalaciones
				<a href="{{ route('excel.index') }}" type="button" class="btn btn-primary btn-sm" style="float: right;">
					<i class="fas fa-file-excel"></i>
					Exportar
				</a>
				<a href="{{ route('instalaciones.create') }}" type="button" class="btn btn-primary btn-sm" style="float: right;margin-right: 5px;">
					<i class="fas fa-user-plus"></i>
					Nueva Instalacion
				</a>
			</legend>
			<table id="tableInstalaciones" class="display table table-bordered table-condensed" style="width:100%">
				<thead>
					<tr>
						<th>Fecha ingreso</th>
						<th>Fecha entrega</th>
						<th>Nombre cliente</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Asesor</th>
						<th>Modelo equipo</th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $insta as $inst )
						<tr>
							<td>{{ $inst->fecha_ingreso }}</td>
							<td>{{ $inst->fecha_entrega }}</td>
							<td>{{ $inst->cliente }}</td>
							<td>{{ $inst->marca }}</td>
							<td>{{ $inst->modelo }}</td>
							<td>{{ $inst->asesor }}</td>
							<td>{{ $inst->modelo_equipo }}</td>
							<td style="text-align: center;">
								<a class="btn btn-success btn-sm" href="{{ route( 'instalaciones.show', $inst->id_instalacion ) }}" role="button"><i class="fas fa-eye"></i></a>
							</td>
							<td style="text-align: center;">
								<a class="btn btn-warning btn-sm" href="{{ route('instalaciones.edit', $inst->id_instalacion) }}" role="button"><i class="fas fa-edit"></i></a>
							</td>
							<td style="text-align: center;">
								
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>

		</fieldset>
	</div>	
@stop