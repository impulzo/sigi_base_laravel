@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @can('delete', app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        <a class="btn btn-info" id="bulk_inventory_btn"><i class="voyager-params"></i> <span>Movimiento</span></a>
        <a class="btn btn-warning" id="bulk_transfer_btn"><i class="voyager-external"></i> <span>Traspaso</span></a>
        @can('edit', app($dataType->model_name))
            @if(!empty($dataType->order_column) && !empty($dataType->order_display_column))
                <a href="{{ route('voyager.'.$dataType->slug.'.order') }}" class="btn btn-primary btn-add-new">
                    <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
                </a>
            @endif
        @endcan
        @can('delete', app($dataType->model_name))
            @if($usesSoftDeletes)
                <input type="checkbox" @if ($showSoftDeleted) checked @endif id="show_soft_deletes" data-toggle="toggle" data-on="{{ __('voyager::bread.soft_deletes_off') }}" data-off="{{ __('voyager::bread.soft_deletes_on') }}">
            @endif
        @endcan
        @foreach($actions as $action)
            @if (method_exists($action, 'massAction'))
                @include('voyager::bread.partials.actions', ['action' => $action, 'data' => null])
            @endif
        @endforeach
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if ($isServerSide)
                            <form method="get" class="form-search">
                                <div id="search-input">
                                    <div class="col-2">
                                        <select id="search_key" name="key">
                                            @foreach($searchNames as $key => $name)
                                                <option value="{{ $key }}" @if($search->key == $key || (empty($search->key) && $key == $defaultSearchKey)) selected @endif>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select id="filter" name="filter">
                                            <option value="contains" @if($search->filter == "contains") selected @endif>{{ __('voyager::generic.contains') }}</option>
                                            <option value="equals" @if($search->filter == "equals") selected @endif>=</option>
                                        </select>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="s" value="{{ $search->value }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @if (Request::has('sort_order') && Request::has('order_by'))
                                    <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                    <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                                @endif
                            </form>
                        @endif
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="dt-not-orderable">
                                            <input type="checkbox" class="select_all">
                                        </th>
                                        @foreach($dataType->browseRows as $row)
                                        <th>
                                            @if ($isServerSide && in_array($row->field, $sortableColumns))
                                                <a href="{{ $row->sortByUrl($orderBy, $sortOrder) }}">
                                            @endif
                                            {{ $row->getTranslatedAttribute('display_name') }}
                                            @if ($isServerSide)
                                                @if ($row->isCurrentSortField($orderBy))
                                                    @if ($sortOrder == 'asc')
                                                        <i class="voyager-angle-up pull-right"></i>
                                                    @else
                                                        <i class="voyager-angle-down pull-right"></i>
                                                    @endif
                                                @endif
                                                </a>
                                            @endif
                                        </th>
                                        @endforeach
                                        <th class="actions text-right dt-not-orderable">{{ __('voyager::generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="row_id" id="checkbox_{{ $data->getKey() }}" value="{{ $data->getKey() }}">
                                        </td>
                                        @foreach($dataType->browseRows as $row)
                                            @php
                                            if ($data->{$row->field.'_browse'}) {
                                                $data->{$row->field} = $data->{$row->field.'_browse'};
                                            }
                                            @endphp
                                            <td>
                                                @if (isset($row->details->view_browse))
                                                    @include($row->details->view_browse, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $data->{$row->field}, 'view' => 'browse', 'options' => $row->details])
                                                @elseif (isset($row->details->view))
                                                    @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $data->{$row->field}, 'action' => 'browse', 'view' => 'browse', 'options' => $row->details])
                                                @elseif($row->type == 'image')
                                                    <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                                @elseif($row->type == 'relationship')
                                                    @include('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details])
                                                @elseif($row->type == 'select_multiple')
                                                    @if(property_exists($row->details, 'relationship'))

                                                        @foreach($data->{$row->field} as $item)
                                                            {{ $item->{$row->field} }}
                                                        @endforeach

                                                    @elseif(property_exists($row->details, 'options'))
                                                        @if (!empty(json_decode($data->{$row->field})))
                                                            @foreach(json_decode($data->{$row->field}) as $item)
                                                                @if (@$row->details->options->{$item})
                                                                    {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ __('voyager::generic.none') }}
                                                        @endif
                                                    @endif

                                                    @elseif($row->type == 'multiple_checkbox' && property_exists($row->details, 'options'))
                                                        @if (@count(json_decode($data->{$row->field}, true)) > 0)
                                                            @foreach(json_decode($data->{$row->field}) as $item)
                                                                @if (@$row->details->options->{$item})
                                                                    {{ $row->details->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            {{ __('voyager::generic.none') }}
                                                        @endif

                                                @elseif(($row->type == 'select_dropdown' || $row->type == 'radio_btn') && property_exists($row->details, 'options'))

                                                    {!! $row->details->options->{$data->{$row->field}} ?? '' !!}

                                                @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                    @if ( property_exists($row->details, 'format') && !is_null($data->{$row->field}) )
                                                        {{ \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format) }}
                                                    @else
                                                        {{ $data->{$row->field} }}
                                                    @endif
                                                @elseif($row->type == 'checkbox')
                                                    @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                                        @if($data->{$row->field})
                                                            <span class="label label-info">{{ $row->details->on }}</span>
                                                        @else
                                                            <span class="label label-primary">{{ $row->details->off }}</span>
                                                        @endif
                                                    @else
                                                    {{ $data->{$row->field} }}
                                                    @endif
                                                @elseif($row->type == 'color')
                                                    <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                                @elseif($row->type == 'text')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div>{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'text_area')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div>{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'file' && !empty($data->{$row->field}) )
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    @if(json_decode($data->{$row->field}) !== null)
                                                        @foreach(json_decode($data->{$row->field}) as $file)
                                                            <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                                                {{ $file->original_name ?: '' }}
                                                            </a>
                                                            <br/>
                                                        @endforeach
                                                    @else
                                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}" target="_blank">
                                                            {{ __('voyager::generic.download') }}
                                                        </a>
                                                    @endif
                                                @elseif($row->type == 'rich_text_box')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div>{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                                @elseif($row->type == 'coordinates')
                                                    @include('voyager::partials.coordinates-static-image')
                                                @elseif($row->type == 'multiple_images')
                                                    @php $images = json_decode($data->{$row->field}); @endphp
                                                    @if($images)
                                                        @php $images = array_slice($images, 0, 3); @endphp
                                                        @foreach($images as $image)
                                                            <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                        @endforeach
                                                    @endif
                                                @elseif($row->type == 'media_picker')
                                                    @php
                                                        if (is_array($data->{$row->field})) {
                                                            $files = $data->{$row->field};
                                                        } else {
                                                            $files = json_decode($data->{$row->field});
                                                        }
                                                    @endphp
                                                    @if ($files)
                                                        @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                            @foreach (array_slice($files, 0, 3) as $file)
                                                            <img src="@if( !filter_var($file, FILTER_VALIDATE_URL)){{ Voyager::image( $file ) }}@else{{ $file }}@endif" style="width:50px">
                                                            @endforeach
                                                        @else
                                                            <ul>
                                                            @foreach (array_slice($files, 0, 3) as $file)
                                                                <li>{{ $file }}</li>
                                                            @endforeach
                                                            </ul>
                                                        @endif
                                                        @if (count($files) > 3)
                                                            {{ __('voyager::media.files_more', ['count' => (count($files) - 3)]) }}
                                                        @endif
                                                    @elseif (is_array($files) && count($files) == 0)
                                                        {{ trans_choice('voyager::media.files', 0) }}
                                                    @elseif ($data->{$row->field} != '')
                                                        @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                            <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:50px">
                                                        @else
                                                            {{ $data->{$row->field} }}
                                                        @endif
                                                    @else
                                                        {{ trans_choice('voyager::media.files', 0) }}
                                                    @endif
                                                @else
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <span>{{ $data->{$row->field} }}</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="no-sort no-click bread-actions">
                                            @foreach($actions as $action)
                                                @if (!method_exists($action, 'massAction'))
                                                    @include('voyager::bread.partials.actions', ['action' => $action])
                                                @endif
                                            @endforeach  
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'showSoftDeleted' => $showSoftDeleted,
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- Movement modal --}}
    <div class="modal modal-success fade" tabindex="-1" id="bulk_inventory_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="voyager-params"></i> ¿Está seguro de realizar este movimiento en <span id="bulk_inventory_count"></span> <span id="bulk_inventory_display_name"></span>?
                    </h4>
                </div>
                <form action="{{ route('voyager.inventories.store') }}" id="bulk_inventory_form" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="bulk_inventory_modal_body">
                        <input type="hidden" id="bulk_inventory_input" value="">
                        <input type="hidden" name="json" id="json" value="">
                        <div class="form-group">
                            <label for="movement_types_id" class="control-label">Movimiento</label>
                            <select class="form-control select2" name="movement_types_id" id="movement_types_id" required>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="movement_date" class="control-label">Fecha </label>
                            <input type="date" class="form-control" name="movement_date" id="movement_date" value="" required />
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Producto</th>
                                    <th>Sucursal</th>
                                    <th>Cantidad</th>
                                    <th>Notas</th>
                                </thead>
                                <tbody id="movements">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right inventory-confirm"
                                    value="Confirmar movimiento en {{ strtolower($dataType->getTranslatedAttribute('display_name_plural')) }}">
                        
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                            {{ __('voyager::generic.cancel') }}
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{-- Transfer modal --}}
    <div class="modal modal-warning fade" tabindex="-1" id="bulk_transfer_modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        <i class="voyager-params"></i> ¿Está seguro de realizar el traspaso entre sucursales en <span id="bulk_transfer_count"></span> <span id="bulk_transfer_display_name"></span>?
                    </h4>
                </div>
                <form action="{{ route('voyager.inventories.store') }}" id="bulk_transfer_form" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="bulk_transfer_modal_body">
                        <input type="hidden" id="bulk_transfer_input" value="">
                        <input type="hidden" name="json" id="json_transfer" value="">
                        <div class="form-group">
                            <label for="movement_types_id_transfer" class="control-label">Movimiento</label>
                            <select class="form-control select2" name="movement_types_id" id="movement_types_id_transfer" style="width: 100%" required>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="movement_date_transfer" class="control-label">Fecha </label>
                            <input type="date" class="form-control" name="movement_date" id="movement_date_transfer" value="" required />
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <th style="width: 17%">Producto</th>
                                    <th style="width: 17%">Sucursal</th>
                                    <th style="width: 17%">Cantidad</th>
                                    <th style="width: 27%">Notas</th>
                                    <th style="width: 22%">Traspasar a</th>
                                </thead>
                                <tbody id="movements_transfer">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <input type="submit" class="btn btn-success pull-right transfer-confirm"
                                    value="Confirmar movimiento en {{ strtolower($dataType->getTranslatedAttribute('display_name_plural')) }}">
                        
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                            {{ __('voyager::generic.cancel') }}
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['targets' => 'dt-not-orderable', 'searchable' =>  false, 'orderable' => false],
                        ],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
    {{-- script for modal inventory --}}
    <script>
        
        // Bulk delete selectors
        var $bulkInventoryBtn = $('#bulk_inventory_btn');
        var $bulkInventoryModal = $('#bulk_inventory_modal');
        var $bulkInventoryCount = $('#bulk_inventory_count');
        var $bulkInventoryDisplayName = $('#bulk_inventory_display_name');
        var $bulkInventoryInput = $('#bulk_inventory_input');
        // Reposition modal to prevent z-index issues
        $bulkInventoryModal.appendTo('body');
        // Bulk delete listener
        $bulkInventoryBtn.click(function () {
            var ids = [];
            var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
            var count = $checkedBoxes.length;
            if (count) {
                // Reset input value
                $bulkInventoryInput.val('');
                // Deletion info
                var displayName = count > 1 ? '{{ $dataType->getTranslatedAttribute('display_name_plural') }}' : '{{ $dataType->getTranslatedAttribute('display_name_singular') }}';
                displayName = displayName.toLowerCase();
                $bulkInventoryCount.html(count);
                $bulkInventoryDisplayName.html(displayName);
                // Gather IDs
                var tds = "";
                $.each($checkedBoxes, function () {
                    var id = $(this).attr('id');
                    var parent = document.getElementById(id).parentNode.parentNode;
                    var childs = parent.getElementsByTagName('td');
                    tds += '<tr><td>'+childs[1].innerText+'</td><td>'+childs[3].innerText+'</td><td><input type="number" name="quantity" class="form-control" min="1" placeholder="Cantidad" required></td><td><textarea class="form-control" name="note" maxlength="250" rows="2" title="máximo 250 caracteres" placeholder="Notas" required ></textarea></td></tr>';
                    var value = $(this).val();
                    ids.push(value);
                });
                $('#movements').html(tds);
                // Set input value
                $bulkInventoryInput.val(ids);
                // Show modal
                $bulkInventoryModal.modal('show');
            } else {
                // No row selected
                toastr.warning('Debe seleccionar al menos un registro antes de usar el movimiento masivo.');
            }
        });
        $.ajax({
            url:"/api/v1/inventories/movements/1",
            type: 'GET',
            dataType:'json',
            success:function(response){
                if(response.status == 200){
                    var options = "";
                    response.data.forEach(element => {
                        options += '<option value="'+element.id+'">'+element.name+'</option>'
                    });
                    $('#movement_types_id').html(options);
                }
            },
            error: function(err){
                
            }
        });

        function submitForm(event){
            var flag = true;
            event.preventDefault();
            var form = document.getElementById('bulk_inventory_form');
            var quantities = form.elements.quantity;
            var notes = form.elements.note;
            var ids = $('#bulk_inventory_input').val().split(',');
            var json = [];
            if(ids.length > 1){
                for (let index = 0; index < ids.length; index++) {
                    json.push({
                        id: ids[index],
                        quantity: quantities[index].value,
                        note: notes[index].value,
                    });
                }
            }else{
                json.push({
                    id: ids[0],
                    quantity: quantities.value,
                    note: notes.value,
                });
            }
            
            $('#json').val(JSON.stringify(json));
            this.submit();
        }
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("bulk_inventory_form").addEventListener('submit', submitForm);
        });
    </script>
    {{-- script for modal inventory transfer --}}
    <script>
        // Bulk delete selectors
        var $bulkTransferBtn = $('#bulk_transfer_btn');
        var $bulkTransferModal = $('#bulk_transfer_modal');
        var $bulkTransferCount = $('#bulk_transfer_count');
        var $bulkTransferDisplayName = $('#bulk_transfer_display_name');
        var $bulkTransferInput = $('#bulk_transfer_input');
        // Reposition modal to prevent z-index issues
        $bulkTransferModal.appendTo('body');
        //sucursals
        let offices;
        $.ajax({
            url:"/api/v1/inventories/offices",
            type: 'GET',
            dataType:'json',
            success:function(response){
                if(response.status == 200){
                    offices = "";
                    response.data.forEach(element => {
                        offices += '<option value="'+element.id+'">'+element.name+'</option>'
                    });
                }
            },
            error: function(err){
                
            }
        });
        // Bulk delete listener
        $bulkTransferBtn.click(function () {
            var ids = [];
            var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
            var count = $checkedBoxes.length;
            if (count) {
                // Reset input value
                $bulkTransferInput.val('');
                // Deletion info
                var displayName = count > 1 ? '{{ $dataType->getTranslatedAttribute('display_name_plural') }}' : '{{ $dataType->getTranslatedAttribute('display_name_singular') }}';
                displayName = displayName.toLowerCase();
                $bulkTransferCount.html(count);
                $bulkTransferDisplayName.html(displayName);
                // Gather IDs
                var tds = "";
                $.each($checkedBoxes, function () {
                    var id = $(this).attr('id');
                    var parent = document.getElementById(id).parentNode.parentNode;
                    var childs = parent.getElementsByTagName('td');
                    tds += '<tr><td>'+childs[1].innerText+'</td><td>'+childs[3].innerText+'</td><td><input type="number" name="quantity" class="form-control" min="1" placeholder="Cantidad" required></td><td><textarea class="form-control" name="note" maxlength="250" rows="2" title="máximo 250 caracteres" placeholder="Notas" required ></textarea></td><td><select class="form-control select2" name="office_id" style="width: 100% !important" required>'+offices+'</select></td></tr>';
                    var value = $(this).val();
                    ids.push(value);
                });
                $('#movements_transfer').html(tds);
                $('.select2').select2();
                // Set input value
                $bulkTransferInput.val(ids);
                // Show modal
                $bulkTransferModal.modal('show');
            } else {
                // No row selected
                toastr.warning('Debe seleccionar al menos un registro antes de usar el movimiento masivo.');
            }
        });
        $.ajax({
            url:"/api/v1/inventories/movements/2",
            type: 'GET',
            dataType:'json',
            success:function(response){
                if(response.status == 200){
                    var options = "";
                    response.data.forEach(element => {
                        options += '<option value="'+element.id+'">'+element.name+'</option>'
                    });
                    $('#movement_types_id_transfer').html(options);
                }
            },
            error: function(err){
                
            }
        });

        function submitFormTransfer(event){
            var flag = true;
            event.preventDefault();
            var form = document.getElementById('bulk_transfer_form');
            var quantities = form.elements.quantity;
            var notes = form.elements.note;
            var notes = form.elements.note;
            var list_offices = form.elements.office_id;
            var ids = $('#bulk_transfer_input').val().split(',');
            var json = [];
            if(ids.length > 1){
                for (let index = 0; index < ids.length; index++) {
                    json.push({
                        id: ids[index],
                        quantity: quantities[index].value,
                        note: notes[index].value,
                        office_id: list_offices[index].value
                    });
                }
            }else{
                json.push({
                    id: ids[0],
                    quantity: quantities.value,
                    note: notes.value,
                    office_id: list_offices.value
                });
            }
            
            $('#json_transfer').val(JSON.stringify(json));
            this.submit();
        }
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("bulk_transfer_form").addEventListener('submit', submitFormTransfer);
        });
        </script>    
@stop
