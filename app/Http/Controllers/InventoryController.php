<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryHistory;
use App\Models\MovementType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class InventoryController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $data = [];
        $flag = true;
        DB::beginTransaction();
        try {
            $json = json_decode($request->json);
            $movement = MovementType::find($request->movement_types_id);
            // foreach ($json as $item) {
            //     $product = Inventory::find($item->id);
            //     if ($movement->type == "E") {
            //         $product->stock += $item->quantity;
            //     } else if ($movement->type == "S") {
            //         if ($item->quantity <= $product->stock) {
            //             $product->stock -= $item->quantity;
            //         } else {
            //             $flag = false;
            //             $data =  [
            //                 'message'    => "La cantidad de salida supera la cantidad actual del producto " .
            //                                  $product->product->name . " en la sucursal " .
            //                                  $product->sucursal->name,
            //                 'alert-type' => 'error',
            //             ];
            //             break;
            //         }
            //     } else if ($movement->type == "T") {
            //         if($product->office_id == $item->office_id){
            //             $flag = false;
            //             $data =  [
            //                 'message'    => "La sucursal de traspaso debe ser diferente a la sucursal origen del producto " .
            //                                  $product->product->name . " en la sucursal " . $product->sucursal->name,
            //                 'alert-type' => 'error',
            //             ];
            //             break;
            //         }else if ($item->quantity <= $product->stock) {
            //             $product->stock -= $item->quantity;
            //             $product_transfer = Inventory::where('product_id', '=', $product->product_id)
            //                  ->where('office_id', '=', $item->office_id)->first();
            //             $product_transfer->stock += $item->quantity;
            //             $product_transfer->update();
            //         } else {
            //             $flag = false;
            //             $data =  [
            //                 'message'    => "La cantidad de salida supera la cantidad actual del producto " .
            //                                  $product->product->name . " en la sucursal " . $product->sucursal->name,
            //                 'alert-type' => 'error',
            //             ];
            //             break;
            //         }
            //     }
            //     if ($flag) {
            //         $product->update();
            //         InventoryHistory::create([
            //             'movement_types_id' => $request->movement_types_id,
            //             'notes' => $item->note,
            //             'quantity' => $item->quantity,
            //             'movement_date' => $request->movement_date,
            //             'inventory_id' => $item->id,
            //             'office_transfer_id' => isset($item->office_id) ? $item->office_id : null,
            //             'user_id' => Auth::user()->id,
            //         ]);
            //     }
            // }
            // if ($flag) {
            //     DB::commit();
            //     $data =  [
            //         'message'    => "Inventario actualizado",
            //         'alert-type' => 'success',
            //     ];
            // }
        } catch (Exception $ex) {
            DB::rollBack();
            $data = [
                'message'    => "No fue posible registrar los movimientos de inventario",
                'alert-type' => 'error',
            ];
        } finally {
            return redirect()->route("voyager.inventories.index")->with($data);
        }
    }
}
