@extends('layouts.master')

@section('title', 'Manajemen Kategori')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold">Manajemen Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=".">Beranda</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
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
                    <div class="col-lg-5">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0 font-weight-bold">Data Kategori</h5>
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                <div class="card-title">
                                    <div class="alert alert-danger alert-dimissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&nbsp;<sup>&times;</sup></button>
                                        {!! session('error') !!}
                                    </div>
                                </div>
                                @endif
                                <form role="form" action="{{ route('categories.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nama Kategori" value="{{ old('name') }}" autofocus>
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="description" cols="5" rows="5" placeholder="Deskripsi Kategori">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0 font-weight-bold">Tambah Kategori</h5>
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
                                    <table class="table table-hover table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th>Nama Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $category)
                                                <tr>
                                                    <td align="center">{{ $loop->iteration + $categories->firstItem() - 1 }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->description }}</td>
                                                    <td>
                                                        <form action="{{ route('categories.destroy', $category->id) }}" onsubmit="return confirm('Yakin ingin menghapus data kategori?')" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
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
                                        {{ $categories->links() }}
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
