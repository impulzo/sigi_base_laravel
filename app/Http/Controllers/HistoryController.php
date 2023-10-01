<?php

namespace App\Http\Controllers;

use App\Models\InventoryHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    
    public function historyByInventory(Request $request, $id)
    {
        $data = InventoryHistory::where('inventory_id', '=', $id)->get();
        foreach ($data as $item) {
            $item->sucursal;
            $item->movement;
            $item->user;
        }
        return view('vendor.voyager.inventories.history', compact('data'));
    }
}
