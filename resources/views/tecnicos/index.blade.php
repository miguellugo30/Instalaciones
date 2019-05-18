@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewAsesores">
	<fieldset>
		
		<legend>
			Asesor
			@can('Crear Asesores')
				<a class="btn btn-primary btn-sm" href="{{ route('tecnicos.create') }}" style="float: right;" role="button">
					<i class="fas fa-user-plus"></i>
					Nuevo Asesor
				</a>
			@endcan
		</legend>
		<table id="tableAsesores" class="display table table-bordered table-condensed" style="width:100%">
			<thead>
				<tr >
					<th>Nombre Completo</th>
					<th>Teléfono</th>
					<th>Correo Electronico</th>
					<th>Ver</th>
					@can('Editar asesores')
						<th>Editar</th>
					@endcan
					@can('Eliminar Asesores')
						<th>Eliminar</th>
					@endcan
				</tr>
			</thead>
			<tbody>
				
				@foreach( $tecnicos as $tecnico )
					<tr>
						<td>{{ $tecnico->nombre_completo }}</td>
						<td>{{ $tecnico->telefono }}</td>
						<td>{{ $tecnico->email }}</td>
						<td style="text-align: center;">
							<a class="btn btn-success btn-sm" href="{{ route( 'tecnicos.show', $tecnico->id_asesor ) }}" role="button"><i class="fas fa-eye"></i></a>
						</td>
						@can('Editar asesores')
							<td style="text-align: center;">
								<a class="btn btn-warning btn-sm" href="{{ route('tecnicos.edit', $tecnico->id_asesor) }}" role="button"><i class="fas fa-edit"></i></a>
							</td>
						@endcan
						@can('Eliminar Asesores')
							<td style="text-align: center;">
								<form id="delete-asesor" action="{{ route('tecnicos.destroy', $tecnico->id_asesor) }}" method="POST" >
	                            	<input name="_method" type="hidden" value="DELETE">
	                                {{ csrf_field() }}
	                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
	                            </form>
							</td>
						@endcan
					</tr>
				@endforeach
			</tbody>
		</table>

	</fieldset>
</div>	
@stop