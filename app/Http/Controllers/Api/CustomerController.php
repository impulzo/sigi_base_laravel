<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function validate_user($email)
    {
        $user = User::where('email', $email)->first();
        return response()->json([
            'data' => isset($user),
            'status' => 200
        ]);
    }

    public function list(){
        $customers = Customer::get(['id','full_name','rfc','address','reason','regime','cfdi_use','postal_code','email']);
        return response()->json([
            'data' => $customers,
            'status' => 200
        ]);
    }
}
