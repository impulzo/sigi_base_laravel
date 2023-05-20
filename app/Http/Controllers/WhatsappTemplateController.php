<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class WhatsappTemplateController extends VoyagerBaseController
{
      public function store(Request $request)
      {
            $slug = $this->getSlug($request);

            $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
            $request['status'] = 'Pendiente';
            // Check permission
            $this->authorize('add', app($dataType->model_name));

            // Validate fields with ajax
            $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                  $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                  $redirect = redirect()->back();
            }

            return $redirect->with([
                  'message'    => __('voyager::generic.successfully_added_new')." {$dataType->getTranslatedAttribute('display_name_singular')}",
                  'alert-type' => 'success',
            ]);
            } else {
            return response()->json(['success' => true, 'data' => $data]);
            }
      }
}