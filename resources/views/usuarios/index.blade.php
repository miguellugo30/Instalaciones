@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Usuarios
				<a href="{{ route('usuarios.create') }}" type="button" class="btn btn-primary btn-sm" style="float: right;margin-right: 5px;">
					<i class="fas fa-user-plus"></i>
					Nuevo usuario
				</a>
			</legend>
			<table id="tableInstalaciones" class="display table table-bordered table-condensed" style="width:100%">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo Electronico</th>
						<th>Permisos</th>
						<th>Fecha de creacion</th>
						<th>Fecha de actalizacion</th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $users as $user )
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td></td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->updated_at }}</td>
							<td style="text-align: center;">
								<a class="btn btn-success btn-sm" href="{{ route( 'usuarios.show', $user->id ) }}" role="button"><i class="fas fa-eye"></i></a>
							</td>
							<td style="text-align: center;">
								<a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit', $user->id) }}" role="button"><i class="fas fa-edit"></i></a>
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