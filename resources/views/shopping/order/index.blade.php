@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Order - BGI')
@section('content')
<section class="section">
  <div class="section-header dashboard">
      <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
  </div>
  
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
  </div>
  @endif

  <div class="section-body"></div>

  {{-- items --}}
  <div class="row">
      <div class="col-12">
        <div class="card table-dashboard">
          <div class="card-header">
            <h4 class="title-table-dashboard">Order</h4>
          </div>
          <div class="card-body">
              <div class="float-left">
                  <a href="{{ route('purchase.create') }}" class="btn btn-success mb-3">Tambah Data</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Item</th>
                    <th>SKU</th>
                    <th>Invoice</th>
                    <th>Harga Item</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->nama_item_id }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->invoice }}</td>
                    <td>Rp. {{ number_format((float)$item->harga_item, 0, '', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp. {{ number_format((float)$item->total, 0, '', '.') }}</td>
                    <td>Rp. {{ number_format((float)$item->subtotal, 0, '', '.') }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection