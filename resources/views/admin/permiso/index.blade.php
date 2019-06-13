@extends("theme.$theme.layout")
@section('titulo')
    Sistema Permiso
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
<div class="row">
  <div class="col-lg-12">  
    @include('includes.mensaje')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Permisos</h3>
            <div class="box-tools pull-right">
                    <a href="{{route('crear_permiso')}}" class="btn btn-block btn-success btn-sm">
                        <i class="fa fa-fw fa-plus-circle"></i>Nuevo permiso
                    </a> 
            </div>
        </div> 
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-bordered table-striped" id="tabla-data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->id}}</td>
                            <td>{{$permiso->nombre}}</td>
                            <td>{{$permiso->slug}}</td>
                            <td>                                    
                                <a href="{{route('editar_permiso',['id'=>$permiso->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <form action="{{route('eliminar_permiso',['id'=>$permiso->id])}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
@endsection