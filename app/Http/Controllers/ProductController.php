<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ProductController extends VoyagerBaseController
{
    public function store_modal(Request $request)
      {
            $data = [];
            DB::beginTransaction();
            try {
                  Product::create([
                        'name' => $request->name,
                        'description' => $request->description,
                        'price' => $request->price,
                        'product_code' => $request->product_code,
                        'unit_code' => $request->unit_code
                  ]);
                  DB::commit();
                  $data =  [
                        'message'    => "Producto registrado con éxito",
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
