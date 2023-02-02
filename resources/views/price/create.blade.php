@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Forms Price Item - BGI')
@section('content')
<section class="section">
    <div class="section-header dashboard">
        <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('price') }}">Price</a></div>
            <div class="breadcrumb-item">Forms Price</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="title-table-dashboard">Forms Price</h4>
                    </div>
                    <form action="{{ route('price.store') }}" method="POST">
                        @csrf                                
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Barang/Item</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control select2 @error('nama_item_id') is-invalid @enderror" id="nama_item_id" name="nama_item_id" value="{{ old('nama_item_id') }}" onchange="tampilkan_items()">
                                    <option selected disabled>Pilih Barang/Item</option>
                                    @foreach ($items as $item)
                                        <option id="{{ $item->id }}" value="{{ $item->nama_item }}">{{ $item->nama_item }} </option>
                                    @endforeach
                                  </select>
                                    @error('nama_item_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                          
                            </div>
                            <div class="form-group row mb-4">
                                <label for="harga_sebelum_pajak" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Sebelum Pajak</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control @error('harga_sebelum_pajak') is-invalid @enderror" placeholder="Harga Sebelum Pajak" name="harga_sebelum_pajak" id="harga_sebelum_pajak" autocomplete="off" value="{{ old('harga_sebelum_pajak') }}">
                                    @error('harga_sebelum_pajak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="harga_sesudah_pajak" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Sesudah Pajak</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control @error('harga_sesudah_pajak') is-invalid @enderror" placeholder="Jenis Item" name="harga_sesudah_pajak" id="harga_sesudah_pajak" autocomplete="off" value="{{ old('harga_sesudah_pajak') }}">
                                    @error('harga_sesudah_pajak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input class="btn btn-primary" type="submit" value="Simpan">
                                <a href="{{ route('price') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-warning" type="reset">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection