@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Data Pembayaran - BGI')
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
            <h4 class="title-table-dashboard">Data Pembayaran</h4>
          </div>
          <div class="card-body">
              {{-- <div class="float-left">
                  <a href="{{ route('purchase.create') }}" class="btn btn-success mb-3">Tambah Data</a>
              </div> --}}
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>tanggal</th>
                    <th>Nama Item</th>
                    <th>Invoice</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Subtotal</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pembayaran</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($payment as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->purchase->tanggal)) }}</td>
                    <td>{{ $item->purchase->nama_item_id }}</td>
                    <td>{{ $item->purchase->invoice }}</td>
                    <td>{{ $item->purchase->quantity }}</td>
                    <td>Rp. {{ number_format((float)$item->purchase->total, 0, '', '.') }}</td>
                    <td>Rp. {{ number_format((float)$item->purchase->subtotal, 0, '', '.') }}</td>
                    <td>{{ $item->metode_pembayaran }}</td>
                     @if ($item->status_pembayaran == 'Lunas')                     
                    <td><button class="btn btn-success" style="cursor: auto">Lunas</button></td>
                    @else
                    <td><button class="btn btn-warning" style="cursor: auto">Belum Lunas</button></td>                    
                    @endif       
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