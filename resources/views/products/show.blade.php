@extends('products.layout')

@section('title', 'Lihat Produk')
   
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Lihat Produk</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Produk:</strong> <br/>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Detail:</strong> <br/>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar:</strong><br/>
                <img src="/images/{{ $product->image }}" width="500px">
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection