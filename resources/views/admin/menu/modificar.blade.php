@extends("theme.$theme.layout")
@section('titulo')
    Sistema Menu
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
                        <h3 class="box-title">Editar Menus</h3>
                        <div class="box-tools pull-right">
                            <a href="{{route('menu')}}" class="btn btn-block btn-info btn-sm">
                                <i class="fa fa-fw fa-reply-all"></i>Volver al Menu
                            </a> 
                        </div>
                    </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered table-striped" id="tabla-data">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Url</th>
                            <th>Icono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->nombre}}</td>
                                <td>{{$menu->url}}</td>
                                <td>{{$menu->icono}}</td>
                                <td>                                    
                                    <a href="{{route('editar_menu',['id'=>$menu->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </a>
                                    <form action="{{route('eliminar_menu',['id'=>$menu->id])}}" class="d-inline form-eliminar" method="POST">
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
@endsection