<div class="box-body">
  <div class="row">
    <div class="col-lg-6">
      <label for="nombre" class="col-lg-6 control-label requerido">Nombre de Insumo</label>
      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
        value="{{old('nombre',$data->nombre ?? '')}}" required>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Tipo de Insumo</label>
        <select class="form-control">
          <option>Ingrediente</option>
          <option>Producto</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Unidad de Medida</label>
      <select class="form-control">
        @foreach ($unidades as $item)
          <option>{{$item->descripcion}}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>