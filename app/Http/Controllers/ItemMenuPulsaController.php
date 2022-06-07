<?php

namespace App\Http\Controllers;
use App\Models\ItemMenuPulsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ItemMenuPulsaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = ItemMenuPulsa::orderBy('id', 'ASC')->paginate(10);
        return view('itemmenupulsa.index')->with('item', $item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itemmenupulsa.create');
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
        ]);

        $itemMenuKantin = ItemMenuPulsa::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'noKTPAdmin' => Auth::user()->noKTP,
        ]);

        if($itemMenuKantin) {
            // return view('itemmenukantin.create')->with('success', 'Berhasil menambahkan data');
            return redirect('/item-menu-pulsa')->with('success', 'Berhasil mengedit item menu pulsa');
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
        $item = ItemMenuPulsa::find($id);
        return view('itemmenupulsa.edit')->with('item', $item);
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

        $itemMenuKantin = ItemMenuPulsa::find($id);
        $itemMenuKantin->nama = $request->input('nama');
        $itemMenuKantin->deskripsi = $request->input('deskripsi');
        $itemMenuKantin->harga = $request->input('harga');
        $itemMenuKantin->stok = $request->input('stok');        
        if($itemMenuKantin->save()){
            return redirect('/item-menu-pulsa')->with('success', 'Berhasil mengedit item menu pulsa');
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
        $itemMenuKantin = ItemMenuPulsa::find($id);
        
        if($itemMenuKantin->delete()) {
            return redirect('/item-menu-pulsa')->with('success', 'Berhasil menghapus item menu pulsa');
        }
    }
}
