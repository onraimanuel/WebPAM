@extends('layouts.app')

@section('content')

    <div class="container">

        <form 
        action="{{ route('item-menu-kantin.update', $item->id) }}"
        method="POST"
        enctype="multipart/form-data">
    
            @csrf

            <div class="form-group row mb-3">
                <label for="nama" class="col-md-3 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-md-9">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $item->nama }}" required autocomplete="nama">

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="deskripsi" class="col-md-3 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                <div class="col-md-9">
                    <textarea id="deskripsi" type="text" rows="7" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" autocomplete="deskripsi"
                    >{{ $item->deskripsi }}</textarea>
                </div>
            </div>
            
            <div class="form-group row mb-3">
                <label for="harga" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                <div class="col-md-9">
                    <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $item->harga }}" required autocomplete="harga">

                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="stok" class="col-md-3 col-form-label text-md-right">{{ __('Stok') }}</label>

                <div class="col-md-9">
                    <input id="stok" type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ $item->stok }}" required autocomplete="stok">

                    @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-3">
                <label for="gambar" class="col-md-3 col-form-label text-md-right">{{ __('Gambar') }}</label>

                <div class="col-md-3">
                    <img src="{{ asset($item->gambar) }}" alt="Gambar {{ $item->nama }}" width="100%">
                </div>

                <div class="col-md-6">
                    <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" value="{{ old('gambar') }}" autocomplete="gambar">

                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="_method" value="PUT">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>

        </form>

    </div>

@endsection
