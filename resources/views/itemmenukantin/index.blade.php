@extends('layouts.app')

@section('content')
    
    <div class="container">

        <h1>Produk</h1>

        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('item-menu-kantin.create') }}">
                <button class="btn btn-success" style="width: 100%">Tambah</button>
                </a>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-1">
                <b>ID</b>
            </div>
            <div class="col-md-1">
                <b>Gambar</b>
            </div>
            <div class="col-md-2">
                <b>Nama</b>
            </div>
            <div class="col-md-3">
                <b>Deskripsi</b>
            </div>
            <div class="col-md-1">
                <b>Harga</b>
            </div>
            <div class="col-md-1">
                <b>Stok</b>
            </div>
            <div class="col-md-2">
                <b>Aksi</b>
            </div><?php $nomor = 1?>
        </div>

        @if(count($item) > 0)
            @foreach ($item->chunk(10) as $chunk)
                @foreach ($chunk as $produk)
                    
                <div class="row mb-3">
                    <div class="col-md-1">
                        {{$nomor++}}
                    </div>
                    <div class="col-md-1">
                        <img src="{{ asset($produk->gambar) }}" alt="Gambar {{ $produk->nama }}" width="100%">
                    </div>
                    <div class="col-md-2">
                        {{ $produk->nama }}
                    </div>
                    <div class="col-md-3">
                        {{ $produk->deskripsi }}
                    </div>
                    <div class="col-md-1">
                        {{ $produk->harga }}
                    </div>
                    <div class="col-md-1">
                        {{ $produk->stok }}
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('item-menu-kantin.edit', $produk->id) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <form action="{{ route('item-menu-kantin.destroy', $produk->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                        </a>
                    </div>
                </div>

                @endforeach
            @endforeach
            {{ $item->links() }}
        @endif

    </div>

@endsection