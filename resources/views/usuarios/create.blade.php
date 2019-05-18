@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-md-12" id="viewInstalaciones">
		<fieldset>
			
			<legend>
				Nuevo usuario
			</legend>
			 <form action="{{ route('usuarios.store') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" 
                           placeholder="Nombre Completo">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" 
                           placeholder="Correo Eletronico">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="Contraseña">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirmar contraseña">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
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
                                    <input type="checkbox" id="permisos[]" name="permisos[]" value="{{$permiso->id}}">
                                        {{$permiso->name}}
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