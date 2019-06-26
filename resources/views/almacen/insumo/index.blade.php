@extends("theme.$theme.layout")
@section('titulo')
    Sistema Rol
@endsection

@section('styles')
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section('scriptsPlugins')
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestion de Insumos
        <small>Restaturant Luiggis</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Insumos Registrados</h3>
              <div class="pull-right">
                  <a href="{{route('crear_insumo')}}" class="btn btn-block btn-primary btn-sm">
                      nuevo Insumo
                  </a> 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Unidad Medida</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Pollo</td>
                  <td>Ingrediente</td>
                  <td>Kg.</td>
                </tr>
                <tr>
                  <td>Queso</td>
                  <td>Ingrediente</td>
                  <td>Kg.</td>
                </tr>
                <tr>
                  <td>Coca Cola 2Lt</td>
                  <td>Gaseosa</td>
                  <td>Un</td>
                </tr>
                <tr>
                  <td>Jamon</td>
                  <td>Ingrediente</td>
                  <td>Kg.</td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->



@endsection