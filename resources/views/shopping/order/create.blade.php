@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Create Order - BGI')
@section('content')
<section class="section">
    <div class="section-header dashboard">
        <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('purchase') }}">Order</a></div>
            <div class="breadcrumb-item">Forms Order</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="title-table-dashboard">Forms Order</h4>
                    </div>
                    <form action="{{ route('purchase.store') }}" method="POST">
                        @csrf                                
                        <input class="form-control" type="hidden" value="{{ $id }}"  name="invoice" id="invoice">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Barang/Item</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control select2 @error('nama_item_id') is-invalid @enderror" id="nama_item_id" name="nama_item_id" value="{{ old('nama_item_id') }}" onchange="tampilkan_purchase()">
                                    <option selected disabled>Pilih Barang/Item</option>
                                    @foreach ($items as $item)
                                    @if ($item->quantity == 0)                 
                                    <option value="{{ $item->nama_item }}" id="{{ $item->id }}" disabled>{{ $item->nama_item }} - <?php echo 'Stock Kosong' ?> </option>
                                    @elseif($item->nama_item > 0)
                                    <option value="{{ $item->nama_item }}" id="{{ $item->id }}">{{ $item->nama_item }} - <?php echo 'Tersedia' ?> </option>
                                    @endif
                                    @endforeach
                                  </select>
                                    @error('nama_item_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                          
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Item</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control select2 @error('id_quantity') is-invalid @enderror" id="id_quantity" name="id_quantity" value="{{ old('id_quantity') }}">
                                    <option selected disabled>Pilih Stock - Item</option>
                                    @foreach ( App\Models\Items::get() as $item )

                                        @if ($item->quantity == 0)
                                        <option value="{{ $item->id }}" disabled>{{ $item->nama_item }} -
                                            @if ($item->quantity != 0)  
                                                {{ $item->quantity }}
                                            @elseif($item->quantity == 0)
                                                <?php echo 'Stock Kosong' ?>
                                            @endif </option>
                                        @elseif($item->quantity > 0)
                                            <option value="{{ $item->id }}">{{ $item->nama_item }} -
                                            @if ($item->quantity != 0)  
                                                {{ $item->quantity }}
                                            @elseif($item->quantity == 0)
                                                <?php echo 'Stock Kosong' ?>
                                            @endif </option>
                                        @endif

                                    @endforeach
                                  </select>
                                    @error('id_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>                                          
                            </div>

                            <div class="form-group row mb-4 floating-addon">
                                <div class="input-group mb-2">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                  <div class="input-group col-sm-12 col-md-7">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text ml-3">
                                        <i class="far far-fw fa-calendar-alt"></i>
                                      </div>
                                    </div>
                                    <input type="text" class="form-control datepicker @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Search..." autocomplete="off" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                        <div class="invalid-feedback"> {{$message}}</div>
                                    @enderror
                                  </div>
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-4">
                                <label for="id_quantity" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sisa Stock</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('id_quantity') is-invalid @enderror" placeholder="Sisa Stock" name="id_quantity" autocomplete="off" id="id_quantity" value="{{ old('id_quantity') }}" readonly>
                                    @error('id_quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group row mb-4">
                                <label for="harga_item" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Item</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('harga_item') is-invalid @enderror" placeholder="Harga Item" name="harga_item" id="harga_item" value="{{ old('harga_item') }}" readonly>
                                @error('harga_item')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="sku" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SKU</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" placeholder="SKU" name="sku" autocomplete="off" value="{{ old('sku') }}">
                                    @error('sku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="quantity" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity" name="quantity" id="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="total" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control @error('total') is-invalid @enderror" placeholder="Total" name="total" autocomplete="off" value="{{ old('total') }}">
                                    @error('total')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label for="subtotal" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtotal</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control @error('subtotal') is-invalid @enderror" placeholder="Subtotal" name="subtotal" id="subtotal" value="{{ old('subtotal') }}">
                                @error('subtotal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input class="btn btn-primary" type="submit" value="Simpan">
                                <a href="{{ route('purchase') }}" class="btn btn-danger">Kembali</a>
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