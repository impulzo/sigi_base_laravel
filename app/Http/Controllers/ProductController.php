<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProductController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();
        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
        DB::beginTransaction();
        try {
            event(new BreadDataAdded($dataType, $data));
            //insert to inventory
            $offices = Office::get();
            foreach ($offices as $office) {
                $inventory = new Inventory();
                $inventory->create([
                    'product_id' => $data->id, 
                    'office_id' => $office->id
                ]);
            }

            if (!$request->has('_tagging')) {
                if (auth()->user()->can('browse', $data)) {
                    $redirect = redirect()->route("voyager.{$dataType->slug}.index");
                    DB::commit();
                } else {
                    $redirect = redirect()->back();
                    DB::rollBack();
                }
                return $redirect->with([
                    'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                    'alert-type' => 'success',
                ]);
            } else {
                return response()->json(['success' => true, 'data' => $data]);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with([
                'message'    => $ex->getMessage(),
                'alert-type' => 'error',
            ]);
        }
    }
}
