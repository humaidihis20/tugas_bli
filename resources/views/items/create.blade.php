@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Forms Item Material - BGI')
@section('content')
<section class="section">
    <div class="section-header dashboard">
        <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('items') }}">Item Material</a></div>
            <div class="breadcrumb-item">Forms Item Material</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="title-table-dashboard">Forms Item Material</h4>
                    </div>
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf                                
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori UoM</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control select2 @error('uom_id') is-invalid @enderror" id="uom_id" name="uom_id" value="{{ old('uom_id') }}" onchange="tampilkan_uom()">
                                    <option selected disabled>Pilih Kategori UoM</option>
                                    @foreach ($uom_s as $item)
                                        <option value="{{ $item->id }}" id="{{ $item->nama_uom }}">{{ $item->nama_uom }} </option>
                                    @endforeach
                                  </select>
                                    @error('uom_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                          
                            </div>
                            <div class="form-group row mb-4">
                                <label for="nama_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Item</label>
                                <div class="col-sm-12 col-md-7">
                                    <input class="form-control" type="hidden" value="{{ $kode_item }}"  name="kode_item" id="kode_item">
                                    <input type="text" class="form-control @error('nama_item') is-invalid @enderror" placeholder="Nama Item" name="nama_item" autocomplete="off" value="{{ old('nama_item') }}">
                                    @error('nama_item')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="jenis_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Item</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('jenis_item') is-invalid @enderror" placeholder="Jenis Item" name="jenis_item" autocomplete="off" value="{{ old('jenis_item') }}">
                                    @error('jenis_item')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="quantity" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock</label>
                                <div class="col-sm-12 col-md-2">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Stock" name="quantity" id="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="harga_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Item</label>
                                <div class="col-sm-12 col-md-2">
                                <input type="number" class="form-control @error('harga_item') is-invalid @enderror" placeholder="Harga Item" name="harga_item" id="harga_item" value="{{ old('harga_item') }}">
                                @error('harga_item')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                             
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input class="btn btn-primary" type="submit" value="Simpan">
                                <a href="{{ route('items') }}" class="btn btn-danger">Kembali</a>
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