@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Nueva Venta</h3>
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
	

			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group" >
                    <label for="cliente">Seleccionar Cliente</label>
                    <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">            
                        @foreach($personas as $persona)
                        <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label >Seleccionar Comprobante</label>
                    <select name="tipo_comprobante" class="form-control">
                        <option value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                        <option value="Ticket">Ticket</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="serie_comprobante">Serie Comprobante</label>
                    <input type="text" name="serie_comprobante" value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie de Comprobante...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="num_comprobante">Numero Comprobante</label>
                    <input type="text" name="num_comprobante" value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero de Comprobante...">               
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="panel panel-primary">
        <div class="panel-body" style="background-color:  #B3B6B7">
            <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                <div class="form-group" style="color: black">
                    <label>Seleccionar Articulo</label>
                    <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo"  data-live-search="true"> 
                        @foreach($articulos as $articulo)
                        <option value="{{$articulo->idarticulo}}_{{$articulo->stock}}_{{$articulo->precio_promedio}}">{{$articulo->articulo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-2 col-lg-2 col-md-2 col-xs-12">
                <div class="form-group">
                    <label for="cantidad" style="color: black">Cantidad</label>
                    <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
                </div>
            </div>
            <div class="col-sm-2 col-lg-2 col-md-2 col-xs-12">
                <div class="form-group" style="color: black">
                    <label for="stock">Stock</label>
                    <input type="number" disabled name="pstock" id="pstock" class="form-control" placeholder="Stock...">
                </div>
            </div>
                
            <div class="col-sm-2 col-lg-2 col-md-2 col-xs-12">
                <div class="form-group" style="color: black">
                    <label for="precio_venta">Precio Venta</label>
                    <input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control" placeholder="Precio venta...">
                </div>
            </div>
            <div class="col-sm-2 col-lg-2 col-md-2 col-xs-12">
                <div class="form-group" style="color: black">
                    <label for="descuento">Descuento </label>
                    <input type="number" name="pdescuento" id="pdescuento" class="form-control" placeholder="Descuento...">
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
                            <th style="color: #fff">Articulo</th>
                            <th style="color: #fff">Cantidad</th>
                            <th style="color: #fff">Precio Venta</th>
                            <th style="color: #fff">Descuento %</th>
                            <th style="color: #fff">Subtotal</th>
                        </thead>
                        <tfoot>
                                
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="color: black"><h3>Total General></h3> </th>
                            <th style="color: black"><h3 id="total">GS/. 0.00</h3><input type="hidden" name="total_venta" id="total_venta"></th>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
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
    $("#pidarticulo").change(mostrarValores);

    function mostrarValores ()
    {
        datosArticulo=document.getElementById('pidarticulo').value.split('_');
        $("#pprecio_venta").val(datosArticulo[2]);
        $("#pstock").val(datosArticulo[1]);
    }

    function agregar ()
    {
        datosArticulo=document.getElementById('pidarticulo').value.split('_');

        idarticulo=datosArticulo[0];
        articulo=$("#pidarticulo option:selected").text();
        cantidad=$("#pcantidad").val();
        descuento=$("#pdescuento").val();
        precio_venta=$("#pprecio_venta").val();
        stock=parseInt($("#pstock").val());
        

        if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
        {
            if (stock>=cantidad) 
            {
                subtotal[cont]=(cantidad*precio_venta-descuento);
                total=total+subtotal[cont];


                var fila='<tr class="select" id="fila"'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar ('+cont+');">X</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_venta[]" value="'+precio_venta+'"></td><td><input type="number" name="descuento[]" value="'+descuento+'"></td><td>'+subtotal[cont]+'</td></tr>';  
                cont++;

                limpiar();
                $("#total").html("GS/. " + total);
                $("#total_venta").val(total);
                evaluar();
                $("#detalles").append(fila);

            }
            else
            {
                alert("Atencion! La cantidad supera el Stock");

            }
            
        }
        else
        {
            alert("Error al agregar. Verifica que los campos obligatorios no esten vacios");
        }
        

    }

    function limpiar (){
        $("#pcantidad").val("");
        $("#pdescuento").val("");
        $("#pstock").val("");
        $("#pprecio_venta").val("");
    }

    function evaluar()
    {
        if (total>0){

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
        $("#total_venta").val(total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>
@endpush
@endsection