@extends ('layouts.admin')
@section ('Contenido')
<div class="panel panel-primary">
    <div class="panel-body" style="background-color:    #212f3d ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3 style="color: #fff">Nuevo Policia</h3>
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

			{!!Form::open(array('url'=>'multas/policia','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
<div class="panel panel-primary">
    <div class="panel-body" style="background-color:  #e5e7e9">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre..." required autofocus>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion..." required autofocus>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label >Tipo Doc.</label>
                    <select name="tipo_documento" class="form-control">

                        <option value="Reg_conducir">Reg. Conducir</option>
                        <option value="CI">CI</option>
                        <option value="Id_policial">ID. Policial</option>
                    
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="num_documento">Numero Doc.</label>
                    <input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Numero de Doc..." required autofocus>               
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Telefono..." required autofocus>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
                </div>
            </div>
        </div>
        

        <div class=" btn btn-block">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
    
			{!!Form::close()!!}		 
@endsection