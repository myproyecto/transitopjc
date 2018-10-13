@extends ('layouts.admin')
@section ('Contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Infracciones: {{ $falla->nombre}}</h3>
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


			{!!Form::model($falla,['method'=>'PATCH','route'=>['falla.update',$falla->idfalla],'files'=>'true'])!!}
            {{Form::token()}}
<div class="panel panel-primary">
    <div class="panel-body" style="background-color:  #e5e7e9">
        <div class="row">
    	    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    		    <div class="form-group">

    			    <label for="nombre">Nombre</label>
    			    <input type="text" name="nombre" required value="{{$falla->nombre}}" class="form-control">
    		    </div>
    	    </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" value="{{$falla->descripcion}}" class="form-control" placeholder="Descripcion...">
                </div>
            </div>
    	</div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                    @if(($falla->imagen)!="")
                        <img src="{{asset('imagenes/fallas/'.$falla->imagen)}}" height="100px" width="100px">
                    @endif
                </div>
            </div>

        </div>
        
        <div class="row">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
</div>
            

			{!!Form::close()!!}		
@endsection