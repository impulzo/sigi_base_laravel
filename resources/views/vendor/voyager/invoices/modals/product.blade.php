{{-- Single product modal --}}
<div class="modal modal-info fade" tabindex="-1" id="bulk_product_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="voyager-params"></i>
                    Registrar nuevo producto
                </h4>
            </div>
            <div class="modal-footer text-left">
                <form action="{{ route('products.store_modal') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Nombre</label>
                        <input required type="text" class="form-control" name="name" placeholder="Nombre" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Descripción</label>
                        <textarea required class="form-control" name="description" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Precio</label>
                        <input type="number" class="form-control" name="price" type="number" required step="any"
                            placeholder="Precio">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Código del producto o servicio (SAT)</label>
                        <select class="form-control select2" name="product_code" id="product_code" required>
                            <option value selected>Ninguno</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Unidad del producto o servicio (SAT)</label>
                        <select class="form-control select2" name="unit_code" id="unit_code" required>
                            <option value selected>Ninguno</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success pull-right confirm" value="Guardar">
                        <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

