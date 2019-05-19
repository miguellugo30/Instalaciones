@extends('adminlte::page')

@section('title', 'Instalaciones')

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
						<th>Correo Electrónico</th>
						<th>Rol</th>
						<th>Permisos</th>
						<th>Fecha de creación</th>
						<th>Fecha de actualización</th>
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
							@can('Editar usuarios')
								<td style="text-align: center;">
									<a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit', $user->id) }}" role="button"><i class="fas fa-edit"></i></a>
								</td>
							@endcan
							@can('Eliminar usuarios')
								<td style="text-align: center;">
									<form id="delete-asesor" action="{{ route('usuarios.destroy', $user->id) }}" method="POST" >
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