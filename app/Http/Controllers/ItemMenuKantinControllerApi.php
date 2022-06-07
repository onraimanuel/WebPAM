<?php

namespace App\Http\Controllers;

use App\Models\ItemMenuKantin;
use Illuminate\Http\Request;

class ItemMenuKantinControllerApi extends Controller
{
    public function index() 
    {
        $itemMenuKantin = ItemMenuKantin::all();
        return response()->json([
            'success' => 1,
            'message' => 'Berhasil men-fetch data menu kantin',
            'itemMenuKantin' =>$itemMenuKantin,
        ]);
    }
}
