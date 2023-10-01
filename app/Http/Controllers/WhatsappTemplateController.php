<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class WhatsappTemplateController extends VoyagerBaseController
{
    public function store(Request $request)
    {
          $request->merge([
                'status' => 'Pendiente'
          ]);
          return parent::store($request);
    }
}
