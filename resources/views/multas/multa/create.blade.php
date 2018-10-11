@extends ('layouts.admin')
@section ('Contenido')
	<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h3>Nueva Multa</h3>

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
        </div>
    </div>

            {!!Form::open(array('url'=>'multas/multa','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="color: #fff">
            <div class="form-group" >
                <label for="id">Policia</label>
                <select  disabled name="id" id="id" class="form-control">            
                    @foreach($personas as $persona)
                    <option value="{{$persona->id}}">{{$persona->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="color: #fff">
            <div class="form-group" >
                <label for="Conductor">Seleccionar Conductor</label>
                <select name="idconductor" id="idconductor" class="form-control selectpicker" data-live-search="true">            
                    @foreach($personal as $perso)
                    <option value="{{$perso->idpersona}}">{{$perso->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="color: #fff">
            <div class="form-group">
                <label for="datos_vehiculo">Datos Vehiculo</label>
                <input type="text" name="datos_vehiculo" value="{{old('datos_vehiculo')}}" class="form-control" placeholder="Datos Vehiculo...">               
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="color: #fff">
            <div class="form-group">
                <label >Seleccionar Comprobante</label>
                <select name="tipo_comprobante" class="form-control">
                    <option value="Boleta">Boleta</option>
                    <option value="Factura">Factura</option>
                    <option value="Ticket">Ticket</option>
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="color: #fff">
            <div class="form-group">
                <label for="num_comprobante">Numero Comprobante</label>
                <input type="text" name="num_comprobante" value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero de Comprobante...">               
            </div>
        </div>
    </div>
            
        </div>
        
    </div>

    <div class="row">
    	<div class="panel panel-primary">
            <div class="panel-body" style="background-color:  #B3B6B7">
                <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                    <div class="form-group" style="color: black">
                        <label>Seleccionar Infraccion</label>
                        <select name="pidfalla" class="form-control selectpicker" id="pidfalla"  data-live-search="true"> 
                            @foreach($fallas as $falla)
                            <option value="{{$falla->idfalla}}">{{$falla->falla}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
                    <div class="form-group" style="color: black">
                        <label for="valor_falla">Valor Infracción</label>
                        <input type="number" name="pvalor_falla" id="pvalor_falla" class="form-control" placeholder="valor Infracción...">
                    </div>
                </div>
                <div class="col-sm-2 col-lg-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                    <div class="table-responsive">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                            <thead style="background-color: teal">
                                <th style="color: #fff">Opciones</th>
                                <th style="color: #fff">Infracciones</th>
                                <th style="color: #fff">Valor Infracción</th>
                                <th style="color: #fff">Subtotal</th>
                            </thead>
                            <tfoot>
                                
                                <th></th>
                                <th></th>
                                <th style="color: black"><h3>Total General ></h3> </th>
                                <th style="color: black"><h3 id="total">GS/. 0.00</h3></th>
                            </tfoot>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        
            <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12" id="guardar">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token () }}"></input>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
			{!!Form::close()!!}	
@push('scripts')	 
<script>
    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });

    });
    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();

    function agregar ()
    {
        idfalla=$("#pidfalla").val();
        falla=$("#pidfalla option:selected").text();
        valor_falla=$("#pvalor_falla") .val();

        if (idfalla!="" && valor_falla!="")
        {

            subtotal[cont]=(1*valor_falla);
            total=total+subtotal[cont];

            var fila='<tr class="select" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar ('+cont+');">X</button></td><td><input type="hidden" name="idfalla[]" value="'+idfalla+'">'+falla+'</td><td><input type="number" name="valor_falla[]" value="'+valor_falla+'"></td><td>'+subtotal[cont]+'</td></tr>';  
            cont++;

            limpiar();
            $("#total").html("GS/. " + total);
            evaluar();
            $('#detalles').append(fila);
        }
        else
        {
            alert("Error al agregar. Verifica que los campos no esten vacios");

        }
    }
    function limpiar (){
        $("#pvalor_falla").val("");
        
    }

    function evaluar()
    {
        if (total>0)
        {
            $("#guardar").show();
        }
        else
        {
            $("#guardar").hide();
        }
    }
    function eliminar (index)
    {
        total=total-subtotal[index];
        $("#total") .html("GS/. " + total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>
@endpush
@endsection