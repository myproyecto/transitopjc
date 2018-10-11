@extends ('layouts.admin')
@section ('Contenido')
	 
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <p>{{$venta->nombre}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label >Tipo Comprobante</label>
                <p>{{$venta->tipo_comprobante}}</p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="serie_comprobante">Serie Comprobante</label>
                <p>{{$venta->serie_comprobante}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <p>{{$venta->num_comprobante}}</p>            
            </div>
        </div>

        <div class="row">
            <div class="panel panel-primary">
                <div class="body">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                        <div class="table-responsive">

                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">


                                <thead style="background-color: teal">
                                    <th style="color: #fff">Articulo</th>
                                    <th style="color: #fff">Cantidad</th>
                                    <th style="color: #fff">Descuento</th>
                                    <th style="color: #fff">Precio Venta</th>
                                    <th style="color: #fff">Subtotal</th>
                                </thead>
                                <tfoot>
                                    
                                    <th></th>
                                    <th></th>

                                    <th></th>
                                    <th><h3>Total ></h3></th>
                                    <th><h3 id="total">{{$venta->total_venta }}</h3></th>
                                </tfoot>
                                <tbody>
                                    @foreach($detalles as $det)
                                    <tr>
                                        <td>{{$det->articulo}}</td>
                                        <td>{{$det->cantidad}}</td>
                                        <td>{{$det->descuento}}</td>
                                        <td>{{$det->precio_venta}}</td>
                                        <td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>	

@endsection