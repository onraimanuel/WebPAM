@extends('layouts.app')

@section('content')

    <div class="container">

        <h2 class="mb-3">Tambah Item Menu Kantin</h2>

        <form 
            action="{{ route('item-menu-kantin.store') }}" 
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="row mb-3">
                <label for="nama" class="col-md-3 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-md-9">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">

                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="deskripsi" class="col-md-3 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                <div class="col-md-9">
                    <textarea id="deskripsi" type="text" rows="7"
                        class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                        value="{{ old('deskripsi') }}" autocomplete="deskripsi"
                    >{{ old('deskripsi') }}</textarea>

                </div>
            </div>

            <div class="row mb-3">
                <label for="harga" class="col-md-3 col-form-label text-md-right">{{ __('Harga') }}</label>

                <div class="col-md-9">
                    <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga">

                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="stok" class="col-md-3 col-form-label text-md-right">{{ __('Stok') }}</label>

                <div class="col-md-9">
                    <input id="stok" type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" required autocomplete="stok">

                    @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="gambar"
                    class="col-md-3 col-form-label text-md-left">{{ __('Upload Gambar') }}</label>

                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" value="{{ old('gambar') }}" autocomplete="gambar">
                            
                        <label class="custom-file-label" for="gambar" id="gambar">Pilih file</label>
                    </div>

                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Kirim</button>
            </div>
        
        </form>

    </div>

@endsection