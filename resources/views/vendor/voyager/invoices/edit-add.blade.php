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
    <a class="btn btn-info" id="bulk_customer_btn"><i class="voyager-person"></i> <span>Nuevo cliente</span></a>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div id="r-invoices" data-csrf="{{ csrf_token() }}" data-ip="{{env('INVOICE_IMPULZO_IP')}}" data-url="{{url('/')}}" >

        </div>
    </div>
    @include('vendor.voyager.invoices.modals.customer')
@stop

@section('javascript')
    <script src="{{ mix('js/pages/Invoices.js') }}"></script>
    <script>
        $('document').ready(function() {
            //API INVOICE
            const regime = '{{ $dataTypeContent->regime }}';
            $.ajax({
                type: "GET",
                url: "{{ env('INVOICE_IMPULZO_IP') }}/api/v1/catalogs/fiscal_regimens",
                dataType: "json",
                success: function(response) {
                    let flag = false;
                    var options = '';
                    if (response.length > 0) {
                        response.forEach(x => {
                            if (regime == x.Value) {
                                options += '<option value="' + x.Value + '" selected>' + x
                                    .Name + '</option>';
                                flag = true;
                            } else {
                                options += '<option value="' + x.Value + '">' + x.Name +
                                    '</option>'
                            }
                        });
                        if (!flag) {
                            options += '<option value selected>Ninguno</option>';
                        }
                    }
                    $('#regime').html(options);
                }
            });
            const cfdi_use = "{{ $dataTypeContent->cfdi_use }}";
            $.ajax({
                type: "GET",
                url: "{{ env('INVOICE_IMPULZO_IP') }}/api/v1/catalogs/cfdi_uses?keyword=HERD9305118V8",
                dataType: "json",
                success: function(response) {
                    let flag = false;
                    var options = '';
                    if (response.length > 0) {
                        response.forEach(x => {
                            if (cfdi_use == x.Value) {
                                options += '<option value="' + x.Value + '" selected>' + x
                                    .Name + '</option>';
                                flag = true;
                            } else {
                                options += '<option value="' + x.Value + '">' + x.Name +
                                    '</option>'
                            }
                        });
                        if (!flag) {
                            options += '<option value selected>Ninguno</option>';
                        }
                    }
                    $('#cfdi_use').html(options);
                }
            });
        });
        //open modal
        $('#bulk_customer_btn').click(function() {
            $('#bulk_customer_modal').modal('show');
        });
    </script>
@stop
