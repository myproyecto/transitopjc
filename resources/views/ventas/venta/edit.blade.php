@extends ('layouts.admin')
@section ('Contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{ $persona->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($persona,['method'=>'PATCH','route'=>['proveedor.update',$persona->idpersona]])!!}
            {{Form::token()}}
    <div class="row">
    	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    		<div class="form-group">
    			<label for="nombre">Nombre</label>
    			<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control">
    		</div>
    	</div>
    	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    		<div class="form-group">
    			<label for="direccion">Direccion</label>
    			<input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control">
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    		<div class="form-group">
    			<label >Tipo Doc.</label>
    			<select name="tipo_documento" class="form-control">
    				@if($persona->tipo_documento=='RUC')
    					<option value="CI">CI</option>
    					<option value="RUC" selected>RUC</option>
    					<option value="RG">RG</option>
    				@elseif($persona->tipo_documento=='CI')
    					<option value="CI"selected>CI</option>
    					<option value="RUC">RUC</option>
    					<option value="RG">RG</option>
    				@else
    					<option value="CI">CI</option>
    					<option value="RUC">RUC</option>
    					<option value="RG" selected>RG</option>
    				@endif
    			</select>
    		</div>
    	</div>
    	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    		<div class="form-group">
    			<label for="num_documento">Numero Doc.</label>
    			<input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control">   			
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    		<div class="form-group">
    			<label for="telefono">Telefono</label>
    			<input type="text" name="telefono" value="{{$persona->telefono}}" class="form-control">
    		</div>
    	</div>
    	<div>
    		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    			<div class="form-group">
    				<label for="email">Email</label>
    				<input type="text" name="email" value="{{$persona->email}}" class="form-control">
    			</div>
    		</div>
    	</div>
    	
    </div>

    <div class="row">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>
            

			{!!Form::close()!!}		
@endsection