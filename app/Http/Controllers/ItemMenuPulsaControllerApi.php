<?php

namespace App\Http\Controllers;

use App\Models\ItemMenuPulsa;
use Illuminate\Http\Request;

class ItemMenuPulsaControllerApi extends Controller
{
    public function index() 
    {
        $itemMenuPulsa = ItemMenuPulsa::all();
        return response()->json([
            'success' => 1,
            'message' => 'Berhasil men-fetch data menu pulsa',
            'itemMenuPulsa' =>$itemMenuPulsa,
        ]);
    }
}
