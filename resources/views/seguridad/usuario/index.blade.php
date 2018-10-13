@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary" >
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<h5 style="color: black">Agregar Nuevos Usuarios  <a href="usuario/create"><button class="btn btn-success" style="color: black">Nuevo</button></a></h5>
					<h3 style="color: black">Listados de Usuarios</h3>
					@include('seguridad.usuario.search')
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
							<th style="color: #fff">Nombre Usuario</th>
							<th style="color: #fff">Email</th>
							<th style="color: #fff">Opciones</th>
						</thead>
               			@foreach ($usuarios as $usu)
						<tr>
							<td>{{ $usu->id}}</td>
							<td>{{ $usu->name}}</td>
							<td>{{ $usu->username}}</td>
							<td>{{ $usu->email}}</td>
							<td>
								<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
                         		<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('seguridad.usuario.modal')
						@endforeach
					</table>
				</div>
				{{$usuarios->render()}}
			</div>
		</div>
	</div>
</div>



@endsection