@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Usuarios
				@can('Crear usuarios')
					<a href="{{ route('usuarios.create') }}" type="button" class="btn btn-primary btn-sm" style="float: right;margin-right: 5px;">
						<i class="fas fa-user-plus"></i>
						Nuevo usuario
					</a>
				@endcan
			</legend>
			<table id="tableInstalaciones" class="display table table-bordered table-condensed" style="width:100%">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo Electronico</th>
						<th>Rol</th>
						<th>Permisos</th>
						<th>Fecha de creacion</th>
						<th>Fecha de actalizacion</th>
						<th>Ver</th>
						@can('Editar usuarios')
							<th>Editar</th>
						@endcan
						@can('Eliminar usuarios')
							<th>Eliminar</th>
						@endcan
					</tr>
				</thead>
				<tbody>
					@foreach( $users as $user )
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if(!empty($user->getRoleNames()))
        							@foreach($user->getRoleNames() as $v)
           								<label class="badge badge-success">{{ $v }}</label>
        							@endforeach
      							@endif
							</td>
							<td>
								@if(!empty($user->getPermissionNames()))
        							@foreach($user->getPermissionNames() as $v)
           								<label class="badge badge-success">{{ $v }}</label>
        							@endforeach
      							@endif
							</td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->updated_at }}</td>
							<td style="text-align: center;">
								<a class="btn btn-success btn-sm" href="{{ route( 'usuarios.show', $user->id ) }}" role="button"><i class="fas fa-eye"></i></a>
							</td>
							@can('Editar usuarios')
								<td style="text-align: center;">
									<a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit', $user->id) }}" role="button"><i class="fas fa-edit"></i></a>
								</td>
							@endcan
							@can('Eliminar usuarios')
								<td style="text-align: center;">
								
								</td>
							@endcan
						</tr>
					@endforeach

				</tbody>
			</table>

		</fieldset>
	</div>	
@stop