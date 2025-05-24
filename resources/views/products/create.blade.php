@extends('layouts.master')

@section('title', 'Edit Produk')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold">Manajemen Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=".">Beranda</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0 font-weight-bold">Data Produk</h5>
                            </div>
                            <div class="card-body">
                                <form role="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" placeholder="Kode Produk" value="{{ old('code') }}" maxlength="10" autofocus>
                                        @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Nama Produk" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" cols="5" rows="5" placeholder="Deskripsi Produk">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" placeholder="Stok Produk" value="{{ old('stock') }}" autofocus>
                                        @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="Harga Produk" value="{{ old('price') }}" autofocus>
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Produk</label>
                                        <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-default float-right">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
