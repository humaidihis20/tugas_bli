@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Edit Forms Item - BGI')
@section('content')
<section class="section">
    <div class="section-header dashboard">
      <div class="section-header-back">
        <a href="{{ route('items') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
      </div>
        <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('items')}}">Item</a></div>
          <div class="breadcrumb-item">Edit Item</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="title-table-dashboard">Forms Edit Item</h4>
                    </div>

                    <form action="{{ route('items.update', $edit_items->id) }}" method="POST">
                        @csrf           
                        @method('PUT')                     
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori UoM</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control select2 @error('uom_id') is-invalid @enderror" id="uom_id" name="uom_id" value="{{ $edit_items->uom_id }}" onchange="tampilkan_uom()">
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
                                    <input class="form-control" type="hidden" value="{{ $edit_items->kode_item }}"  name="kode_item" id="kode_item">
                                    <input type="text" class="form-control @error('nama_item') is-invalid @enderror" placeholder="Nama Item" name="nama_item" autocomplete="off" value="{{ $edit_items->nama_item }}">
                                    @error('nama_item')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="jenis_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Item</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('jenis_item') is-invalid @enderror" placeholder="Jenis Item" name="jenis_item" autocomplete="off" value="{{ $edit_items->jenis_item }}">
                                    @error('jenis_item')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="quantity" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock</label>
                                <div class="col-sm-12 col-md-2">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Stock" name="quantity" id="quantity" value="{{ $edit_items->quantity }}">
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="harga_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Item</label>
                                <div class="col-sm-12 col-md-2">
                                <input type="number" class="form-control @error('harga_item') is-invalid @enderror" placeholder="Harga Item" name="harga_item" id="harga_item" value="{{ $edit_items->harga_item }}">
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
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  document.getElementById('uom_id').value = '{{ $edit_items->uom_id }}';
</script>
@endsection