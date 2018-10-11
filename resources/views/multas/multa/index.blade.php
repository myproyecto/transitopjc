@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary">
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h5 style="color: black">Agregar Nueva Multa  <a href="multa/create"><button class="btn btn-success">Nuevo</button></a></h5>
					<h3 style="color: black">Listas de Multas</h3>
					@include('fallas.falla.search')
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="background-color: teal">
					<th style="color: #fff">Fecha/Hora</th>
					<th style="color: #fff">Policia</th>
					<th style="color: #fff">Conductor</th>
					<th style="color: #fff">Comprobante</th>
					<th style="color: #fff">I.V.A.</th>
					<th style="color: #fff">Total</th>
					<th style="color: #fff">Estado</th>
					<th style="color: #fff">Opciones</th>
				</thead>
               @foreach ($multas as $mul)
				<tr>
					<td>{{ $mul->fecha_hora}}</td>
					<td>{{ $mul->nombre}}</td>
					<td>{{ $mul->nombre}}</td>
					<td>{{ $mul->tipo_comprobante.'-'.$mul->num_comprobante}}</td>
					<td>{{ $mul->impuesto}}</td>
					<td>{{ $mul->total}}</td>
					<td>{{ $mul->estado}}</td>
					<td>
						<a href="{{URL::action('MultasController@show',$mul->idmulta)}}"><button class="btn btn-primary">Detalle</button></a>
                         <a href="" data-target="#modal-delete-{{$mul->idmulta}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('fallas.falla.modal')
				@endforeach
			</table>
		</div>
		{{$multas->render()}}
	</div>
</div>

@endsection