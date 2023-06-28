{{-- Single customer modal --}}
<div class="modal modal-info fade" tabindex="-1" id="bulk_customer_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="voyager-params"></i>
                    Registrar nuevo cliente
                </h4>
            </div>
            <div class="modal-footer text-left">
                <form action="{{route('customers.store_modal')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Nombre (s)</label>
                        <input required type="text" class="form-control" name="first_name" placeholder="Nombre (s)" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Apellidos</label>
                        <input required type="text" class="form-control" name="last_name" placeholder="Apellidos" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Género</label>
                        <select class="form-control select2" name="gender" required>
                            <option value="hombre" selected="selected">Hombre</option>
                            <option value="mujer">Mujer</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Num. Teléfono</label>
                        <input required type="number" min="0" class="form-control" name="phone" step="any" placeholder="Num. Teléfono" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Correo electrónico</label>
                        <input required type="email" class="form-control" name="email" placeholder="Correo electrónico" />
                    </div>
                    <div class="form-group  col-md-6 ">
                        <label class="control-label" for="name">Domicilio fiscal</label>
                        <input required type="text" class="form-control" name="address" placeholder="Domicilio fiscal" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Rfc</label>
                        <input required type="text" class="form-control" name="rfc" placeholder="Rfc" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Nombre o Rázon social (sin régimen capital)</label>
                        <input required type="text" class="form-control" name="reason" placeholder="Nombre o Rázon social (sin régimen capital)" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Código postal</label>
                        <input required type="number" min="0" class="form-control" name="postal_code" step="any" placeholder="Código postal" />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Régimen fiscal</label>
                        <select class="form-control select2" name="regime" id="regime" required>
                            <option value selected>Ninguno</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label" for="name">Uso de CFDI</label>
                        <select class="form-control select2" name="cfdi_use" id="cfdi_use" required>
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
