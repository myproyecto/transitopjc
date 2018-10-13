@extends ('layouts.admin')
@section ('Contenido')
    <div class="panel panel-primary" >
        <div class="panel-body" style="background-color:    #212f3d ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                    <h3 style="color: #fff">Nueva Infracion</h3>
                    
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
	 

			{!!Form::open(array('url'=>'fallas/falla','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
    <div class="panel panel-primary">
        <div class="panel-body" style="background-color:  #e5e7e9">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="nombre">Nombre Infraccion</label>
                        <input type="text" name="nombre"  value="{{old('nombre')}}" class="form-control" placeholder="Nombre..." required autofocus>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="form-group">
                        <label for="nombre">Descripción</label>
                        <input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción..." required autofocus>
                    </div>
                </div>            
        
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="btn btn-block" >
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </div>
            
    
			{!!Form::close()!!}		 
@endsection