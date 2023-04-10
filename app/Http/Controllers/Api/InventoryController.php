<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\MovementType;
use Exception;

class InventoryController extends Controller
{
    public function getMovements($type)
    {
        try {
            if ($type == 1) {
                $movements = MovementType::whereIn('type', ['E', 'S'])->get();
            } else {
                $movements = MovementType::where('type', '=', 'T')->get();
            }
            return response()->json([
                'data' => $movements,
                'status' => 200
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'data' => $ex->getMessage(),
                'status' => 500
            ]);
        }
    }

    public function getOffices()
    {
        try {
            $offices = Office::get();
            return response()->json([
                'data' => $offices,
                'status' => 200
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'data' => $ex->getMessage(),
                'status' => 500
            ]);
        }
    }
}
