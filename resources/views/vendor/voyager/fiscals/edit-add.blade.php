@php
    $edit = !is_null($dataTypeContent->getKey());
    $add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <form action="{{ route('voyager.fiscals.update',1) }}" method="post" enctype="multipart/form-data">
            {{ method_field("PUT") }}
            @csrf
            <div class="row">
                <div class="form-group form-wizard col-md-6">
                    <label for="rfc" class="control-label">RFC: </label>
                    <input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC"
                        value="{{ $dataTypeContent->rfc }}" required />
                </div>
                <div class="form-group form-wizard col-md-6">
                    <label for="name" class="control-label">Nombre o Rázon social (sin régimen capital):
                    </label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre"
                        value="{{ $dataTypeContent->name }}" required />
                </div>
                <div class="form-group form-wizard col-md-6">
                    <label for="fiscal_regime" class="control-label" id="label-regime">Régimen fiscal: </label>
                    <select name="fiscal_regime" class="form-control select2" id="fiscal_regime" required>
                    </select>
                </div>
                <div class="form-group form-wizard col-md-6">
                    <label for="private_key_password" class="control-label">Contraseña de llave privada:
                    </label>
                    <input type="password" id="private_key_password" name="private_key_password" class="form-control">
                    @if ($dataTypeContent->private_key_password != '')
                        <span>*Dejar vacío si no se actualiza el contraseña de la llave privada*</span>
                    @endif
                </div>
                <div class="form-group form-wizard col-md-6">
                    <label for="certificate_file" class="control-label">Certificado: </label>
                    @if ($dataTypeContent->certificate != '')
                        <input type="file" id="certificate_file" name="certificate_file" accept=".cert" />
                    @else
                        <input type="file" id="certificate_file" name="certificate_file" accept=".cert" required />
                    @endif
                </div>
                <div class="form-group form-wizard col-md-6">
                    <label for="private_key_file" class="control-label">Llave privada: </label>
                    @if ($dataTypeContent->private_key != '')
                        <input type="file" id="private_key_file" name="private_key_file" accept=".key" />
                    @else
                        <input type="file" id="private_key_file" name="private_key_file" accept=".key" required />
                    @endif
                </div>
                <div class="form-group form-wizard col-md-12">
                    <input type="submit" class="btn btn-success" value="GUARDAR" />
                </div>
            </div>
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function() {
            var options = "";
            $.ajax({
                type: "GET",
                url: "{{ url('/') }}/invoice/regimens",
                dataType: "json",
                success: function(response) {
                    var options = '<option value >Ninguno</option>';
                    if (response.status == 200) {
                        response.data.forEach(x => {
                            if ("{{ $dataTypeContent->fiscal_regime }}" == x.Value) {
                                options += '<option value="' + x.Value + '" selected >' + x
                                    .Name + '</option>';
                            } else {
                                options += '<option value="' + x.Value + '">' + x.Name +
                                    '</option>';
                            }
                        });
                    }
                    $('#fiscal_regime').html(options);
                }
            });
        });
    </script>
@stop
