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
        $response = array('status' => 200);
        try {
            if ($type == 1) { //ENTRADAS Y SALIDAS
                $movements = MovementType::whereIn('type', ['E', 'S'])->get();
            } else { //SOLO TRASPASOS
                $movements = MovementType::where('type', '=', 'T')->get();
            }
            $response['data'] = $movements;
        } catch (Exception $ex) {
            $response['status'] = 500;
            $response['message'] = 'Ocurrió el siguiente error: '.$ex->getMessage();
        }
        return $response;
    }

    public function getOffices()
    {
        $response = array('status' => 200);
        try {
            $offices = Office::get();
            $response['data'] = $offices;
        } catch (Exception $ex) {
            $response['status'] = 500;
            $response['message'] = 'Ocurrió el error siguiente: '.$ex->getMessage();
        }
        return $response;
    }
}
