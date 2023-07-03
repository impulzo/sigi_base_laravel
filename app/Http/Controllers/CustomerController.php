<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CustomerController extends VoyagerBaseController
{
      public function store(Request $request)
      {
            $request->merge([
                  'full_name' => $request->first_name . ' ' . $request->last_name
            ]);
            return parent::store($request);
      }

      public function update(Request $request, $id)
      {
            $request->merge([
                  'full_name' => $request->first_name . ' ' . $request->last_name
            ]);
            return parent::update($request, $id);
      }

      public function store_modal(Request $request)
      {
            $data = [];
            DB::beginTransaction();
            try {
                  Customer::create([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'full_name' => $request->first_name . ' ' . $request->last_name,
                        'gender' => $request->gender,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'rfc' => $request->rfc,
                        'reason' => $request->reason,
                        'regime' => $request->regime,
                        'cfdi_use' => $request->cfdi_use,
                        'postal_code' => $request->postal_code,
                        'email'  => $request->email
                  ]);
                  DB::commit();
                  $data =  [
                        'message'    => "Cliente registrado con éxito",
                        'alert-type' => 'success',
                  ];
            } catch (\Exception $ex) {
                  DB::rollBack();
                  $data =  [
                        'message'    => $ex->getMessage(),
                        'alert-type' => 'error',
                  ];
            } finally {
                  return back()->with($data);
            }
      }
}
