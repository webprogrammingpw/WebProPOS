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
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0 font-weight-bold">Edit Data Produk</h5>
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="card-title">
                                        <div class="alert alert-danger alert-dimissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;<sup>&times;</sup>
                                                <script>
                                                    setTimeout(function() {
                                                        $(".alert").alert('close');
                                                    }, 50000);
                                                </script>
                                            </button>
                                            {!! session('error') !!}
                                        </div>
                                    </div>
                                @endif

                                <form role="form" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Kode Produk</label>
                                        <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" placeholder="Kode Produk" value="{{ old('code', $product->code) }}" maxlength="10">
                                        @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Produk</label>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Nama Produk" value="{{ old('name', $product->name) }}">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi Produk</label>
                                        <textarea name="description" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" cols="5" rows="5" placeholder="Deskripsi Produk">{{ old('description', $product->description) }}</textarea>
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Stok Produk</label>
                                        <input type="number" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" placeholder="Stok Produk" value="{{ old('stock', $product->stock) }}">
                                        @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga Produk</label>
                                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="Harga Produk" value="{{ old('price', $product->price) }}" autofocus>
                                        @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                        <br>
                                        @if ($product->image != null)
                                            <img src="{{ asset('storage/products/' . $product->image) }}" height="225px" class="elevation-2" title="{{ $product->name }}" alt="{{ $product->name }}">
                                        @else
                                            Tidak Ada Gambar
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ganti Gambar Produk</label>
                                        <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="url" value="{{ URL::previous() }}">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
