<?php

namespace App\Http\Controllers;

use App\Models\ItemMenuKantin;
use App\Models\TransaksiMenuKantin;
use Illuminate\Http\Request;

class TransaksiMenuKantinControllerApi extends Controller
{
    public function daftar(Request $request)
    {
        $transaksiMenuKantin = TransaksiMenuKantin::where('noKTP_customer', $request->input('noKTP_customer'))->get();
        // $itemMenuKantin = ItemMenuKantin::find($transaksiMenuKantin->id_menu_kantin);
        // $namaBarang = $itemMenuKantin->nama;
        // $totalHarga = $itemMenuKantin->harga * $transaksiMenuKantin->jumlah;

        foreach($transaksiMenuKantin as $t) {
            $itemMenuKantin = ItemMenuKantin::find($t->id_menu_kantin);
            $t->namaBarang = $itemMenuKantin->nama;
            $t->totalHarga = $itemMenuKantin->harga * $t->jumlah;
        }

        if($transaksiMenuKantin) {
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil mengambil data transaksi menu kantin',
                'transaksiMenuKantin' => $transaksiMenuKantin,
            ]);
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'noKTP_customer' => 'required',
            'id_menu_kantin' => 'required',
            'jumlah' => 'required|int',
        ]);

        $id = $request->input('id_menu_kantin');
        $itemMenuKantin = ItemMenuKantin::find($id);

        $itemMenuKantin->stok = $itemMenuKantin->stok - $request->input('jumlah');
        $itemMenuKantin->save();

        $transaksiMenuKantin = TransaksiMenuKantin::create([
            'noKTP_customer' => $request->input('noKTP_customer'),
            'id_menu_kantin' => $request->input('id_menu_kantin'),
            'jumlah' => $request->input('jumlah'),
        ]);
 
        if($transaksiMenuKantin) {
            $message = 'Berhasil memesan menu ' . $itemMenuKantin->nama . ' sebanyak ' . $request->input('jumlah') . ' item';
            return response()->json([
                'success' => 1,
                'message' => $message,
            ]);
        }
        else{
            return response()->json([
                'success' => 0,
                'message' => 'Gagal memesan menu',
            ]);
        }
    }
}
