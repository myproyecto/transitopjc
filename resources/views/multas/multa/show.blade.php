@extends ('layouts.admin')
@section ('Contenido')
	 
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="Policia">Policia</label>
                <p>{{$multa->nombre}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="Conductor">Conductor</label>
                <p>{{$multa->nombre}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="datos_vehiculo">Datos Vehiculo</label>
                <p>{{$multa->datos_vehiculo}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label >Tipo Comprobante</label>
                <p>{{$multa->tipo_comprobante}}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <p>{{$ingreso->num_comprobante}}</p>            
            </div>
        </div>

        <div class="row">
            <div class="panel panel-primary">
                <div class="body">
                    <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                        <div class="table-responsive">

                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">


                                <thead style="background-color: teal">
                                    <th style="color: #fff">Infracciones</th>
                                    <th style="color: #fff">Valor Multa</th>
                                    <th style="color: #fff">Subtotal</th>
                                </thead>
                                <tfoot>

                                    <th></th>
                                    <th><h3>Total ></h3></th>
                                    <th><h3 id="total">{{$multa->total}}</h3></th>
                                </tfoot>
                                <tbody>
                                    @foreach($detalles as $det)
                                    <tr>
                                        <td>{{$det->falla}}</td>
                                        <td>{{$det->valor_falla}}</td>
                                        <td>{{$det->1*$det->valor_falla}}</td>
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