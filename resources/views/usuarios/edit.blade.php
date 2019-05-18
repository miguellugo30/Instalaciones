@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Editar usuario
			</legend>
			 <form action="{{ route('usuarios.update', $user->id) }}" method="post">
                {!! csrf_field() !!}
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group has-feedback ">
                    <input type="text" name="name" class="form-control" placeholder="Nombre Completo" value="{{ $user->name }}">
                </div>
                <div class="form-group has-feedback ">
                    <input type="email" name="email" class="form-control" placeholder="Correo Eletronico" value="{{ $user->email }}">
                </div>
                <div class="form-group has-feedback ">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
                <div class="form-group has-feedback ">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña">
                 
                </div>
                <div class="form-group">
                    {{ Form::select('rol', $roles, null, ['class' => 'form-control input-sm'] ) }}

                </div>
                <div class="form-group">
                    <h4>Permisos</h4>
                    @foreach($permisos as $permiso)
                        <div class="col-md-3">                        
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="permisos[]" name="permisos[]" value="{{$permiso->id}}" @if (  $permissionNames->contains( $permiso->name ) ) checked="checked" @endif>
                                        {{ ucfirst( $permiso->name ) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger btn-sm" href="{{ route('usuarios.index') }}" role="button">Cancelar</a>
                </div>
            </form>

		</fieldset>
	</div>	
@stop