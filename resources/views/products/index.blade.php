@extends('layouts.master')

@section('title', 'Manajemen Produk')

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
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="m-0 font-weight-bold h5">Data Produk</div>
                                    <div class="col text-right">
                                        <a href="{{ route('products.create') }}" class="btn btn-primary text-bold text-white">
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Produk
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-text">
                                @if (session('success'))
                                    <div class="card-title">
                                        <div class="alert alert-success alert-dimissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;<sup>&times;</sup></button>
                                            <script>
                                                setTimeout(function() {
                                                    $('.alert').alert('close');
                                                }, 15000);
                                            </script>
                                            {!! session('success') !!}
                                        </div>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="width: 10px; text-align: center">No</th>
                                                <th style="width: 100px; text-align: center">Foto</th>
                                                <th>Nama Produk</th>
                                                <th>Deskripsi</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Kategori</th>
                                                <th style="width: 100px; text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $row)
                                                <tr>
                                                    <td align="center">{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                                                    <td align="center">
                                                        @if ($row->image)
                                                            <img src="{{ asset('storage/products/' . $row->image) }}" height="60px" class="elevation-2" title="{{ $row->name }}" alt="{{ $row->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/dist/img/logo.png') }}" height="60px" class="elevation-2" title="{{ $row->name }}" alt="WebPro">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <sup><small>{{ $row->code }}</small></sup>
                                                        <big>{{ $row->name }}</big>
                                                    </td>
                                                    <td>{{ $row->description }}</td>
                                                    <td>{{ $row->stock }}</td>
                                                    <td>Rp{{ number_format($row->price) }}</td>
                                                    <td>{{ $row->category->name }}</td>
                                                    <td>
                                                        <form action="{{ route('products.destroy', $row->id) }}" onsubmit="return confirm('Yakin ingin menghapus data produk?')" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('products.edit', $row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
