@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary" >
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<h5 style="color: black">Agregar Nuevas Infracciones  <a href="falla/create"><button class="btn btn-success" style="color: black">Nuevo</button></a></h5>
					<h3 style="color: black">Listados de Infracciones</h3>
					@include('fallas.falla.search')
			</div>
		</div>

	</div>
	
</div>

<div class="panel panel-primary">
	<div class="panel-body" style="background-image:  #e5e7e9 ">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: teal">
							<th style="color: #fff">Id</th>
							<th style="color: #fff">Nombre</th>
							<th style="color: #fff">Descripción</th>
							<th style="color: #fff">Imagen</th>
							<th style="color: #fff">Estado</th>
							<th style="color: #fff">Opciones</th>
						</thead>
               			@foreach ($fallas as $fa)
						<tr>
							<td>{{ $fa->idfalla}}</td>
							<td>{{ $fa->nombre}}</td>
							<td>{{ $fa->descripcion}}</td>
							<td>

								<img src="{{asset('imagenes/fallas/'.$fa->imagen)}}" alt="{{ $fa->nombre}}" height="40px" width="70px" class="img-thumbnail">
							</td>
							<td>{{ $fa->estado}}</td>

							<td>
								<a href="{{URL::action('FallaController@edit',$fa->idfalla)}}"><button class="btn btn-info">Editar</button></a>
                         		<a href="" data-target="#modal-delete-{{$fa->idfalla}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('fallas.falla.modal')
						@endforeach
					</table>
				</div>
				{{$fallas->render()}}
			</div>
		</div>
	</div>
</div>



@endsection