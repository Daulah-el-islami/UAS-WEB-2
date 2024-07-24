@extends('products.layout')

@section('title', 'Data Produk')

@section('content')
<div class="container py-4">
<header class="pb-3 mb-4 border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="/images/logo.png" alt="BootstrapBrain Logo" width="200">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="mt-3 d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-secondary" href="/"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </nav>
</header>
</div>
    
<div class="card mt-5">
    <h2 class="card-header">Data Produk</h2>
    <div class="card-body">
        @session('success')
            <div class="alert alert-success" role="alert">{{ $value }}</div>
        @endsession
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Tambah Produk</a>
            <a class="btn btn-primary btn-sm" href="{{ route('products.pdf') }}"><i class="fa fa-file-pdf"></i> Cetak PDF</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Gambar</th>
                    <th style="width: 20%;">Nama Produk</th>
                    <th style="width: 40%;">Detail</th>
                    <th width="250px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><img src="/images/{{ $product->image }}" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fa fa-list"></i> Lihat</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-pen-to-square"></i> Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
</div>

<footer class="footer mt-auto py-3 bg-light fixed-bottom">
    <div class="container text-center">
    <img src="/images/logo.png" alt="BootstrapBrain Logo" width="200">
    </div>
</footer>


@endsection
