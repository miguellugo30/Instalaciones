@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Instalaciones
				@can('Crear instalaciones')
					<a href="{{ route('asesor.create') }}" type="button" class="btn btn-primary btn-sm" style="float: right;margin-right: 5px;">
						<i class="fas fa-user-plus"></i>
						Nueva Instalacion
					</a>
				@endcan
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
						@can('Editar instalaciones')
							<th>Editar</th>
						@endcan
						@can('Eliminar instalaciones')
							<th>Eliminar</th>
						@endcan
							<th>Confirmado</th>
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
							@can('Editar instalaciones')
								<td style="text-align: center;">
									@if( $inst->estatus == 1 )
									<a class="btn btn-warning btn-sm" href="{{ route('instalaciones.edit', $inst->id_instalacion) }}" role="button"><i class="fas fa-edit"></i></a>
									@endif
								</td>
							@endcan
							@can('Eliminar instalaciones')
								<td style="text-align: center;">	
									@if( $inst->estatus == 1 )
										<form id="delete-asesor" action="{{ route('instalaciones.destroy', $inst->id_instalacion) }}" method="POST" >
			                            	<input name="_method" type="hidden" value="DELETE">
		                                	{{ csrf_field() }}
		                                	<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
		                            	</form>
									@endif
								</td>
							@endcan
								<td style="text-align: center;">
									<a class="btn btn-warning btn-sm" href="{{ route('confirmarInsta', $inst->id_instalacion) }}" role="button"><i class="fas fa-edit"></i></a>
									@if( $inst->estatus == 1 )
										<i class="fas fa-times-circle fa-lg" style="color: red"></i>
									@elseif( $inst->estatus == 2 )
										<i class="fas fa-check-circle fa-lg" style="color: green"></i>
									@endif
								</td>
						</tr>
					@endforeach

				</tbody>
			</table>

		</fieldset>
	</div>	
@stop