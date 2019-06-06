@extends("theme.$theme.layout")

@section('titulo')
    Crear Permiso
@endsection
@section('contenido')
<section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Permisos</h3>
            </div> 
            <form class="form-horizontal">
              <div class="box-body">
                 Aqui va el formulario
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
            </form>
        </div>
      </div>
    </div>
@endsection