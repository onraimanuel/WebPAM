<?php

namespace App\Http\Controllers;

use App\Models\ItemMenuKantin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ItemMenuKantinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = ItemMenuKantin::orderBy('id', 'ASC')->paginate(10);
        return view('itemmenukantin.index')->with('item', $item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemmenukantin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|int',
            'stok' => 'required|int',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:20000',
        ]);

        $file = $request->file('gambar');
        $extension = $request->file('gambar')->guessExtension();
        $fileName = trim($request->input('nama')) . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
        $fileDestination = 'uploaded/item-menu-kantin';

        $file->move($fileDestination, $fileName);

        $itemMenuKantin = ItemMenuKantin::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'gambar' => $fileDestination . '/' . $fileName,
            'noKTPAdmin' => Auth::user()->noKTP,
        ]);

        if($itemMenuKantin) {
            // return view('itemmenukantin.create')->with('success', 'Berhasil menambahkan data');
            return redirect('/item-menu-kantin')->with('success', 'Berhasil mengedit item menu kantin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ItemMenuKantin::find($id);
        return view('itemmenukantin.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|int',
            'stok' => 'required|int',
        ]);

        if($request->file('gambar')) {
            $file = $request->file('gambar');
            $extension = $request->file('gambar')->guessExtension();
            $fileName = trim($request->input('nama')) . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            $fileDestination = 'uploaded/item-menu-kantin';

            $file->move($fileDestination, $fileName);
        }

        $itemMenuKantin = ItemMenuKantin::find($id);
        $itemMenuKantin->nama = $request->input('nama');
        $itemMenuKantin->deskripsi = $request->input('deskripsi');
        $itemMenuKantin->harga = $request->input('harga');
        $itemMenuKantin->stok = $request->input('stok');
        if($request->file('gambar')) {
            unlink($itemMenuKantin->gambar);
            $itemMenuKantin->gambar = $fileDestination . '/' . $fileName;
        }
        
        if($itemMenuKantin->save()){
            return redirect('/item-menu-kantin')->with('success', 'Berhasil mengedit item menu kantin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemMenuKantin = ItemMenuKantin::find($id);
        
        if($itemMenuKantin->delete()) {
            return redirect('/item-menu-kantin')->with('success', 'Berhasil menghapus item menu kantin');
        }
    }
}
