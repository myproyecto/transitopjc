@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

				<h5 style="color: black">Agregar Nuevo Agente  <a href="policia/create"><button class="btn btn-success" style="color: black">Nuevo</button></a></h5>
				<h3 style="color: black">Listados de Policias de Transito</h3>
				@include('multas.policia.search')
			</div>
		</div>
		
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-body" style="background-color: #e5e7e9 ">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color: teal">
							<th style="color: #fff">Id</th>
							<th style="color: #fff">Nombre Apellidos</th>
							<th style="color: #fff">Tipo Doc.</th>
							<th style="color: #fff">Num. Doc.</th>
							<th style="color: #fff">Direccion</th>
							<th style="color: #fff">Telefono</th>
							<th style="color: #fff">Email</th>
							<th style="color: #fff">Opciones</th> 
						</thead>
               			@foreach ($personas as $per)
						<tr>
							<td>{{ $per->idpersona}}</td>
							<td>{{ $per->nombre}}</td>
							<td>{{ $per->tipo_documento}}</td>
							<td>{{ $per->num_documento}}</td>
							<td>{{ $per->direccion}}</td>
							<td>{{ $per->telefono}}</td>
							<td>{{ $per->email}}</td>
							<td>
								<a href="{{URL::action('PoliciaController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
                         		<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('multas.policia.modal')
						@endforeach
					</table>
				</div>
				{{$personas->render()}}
			</div>
		</div>
	</div>
</div>

@endsection