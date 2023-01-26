@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Data Penjualan - BGI')
@section('content')
<section class="section">
  <div class="section-header dashboard">
      <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
  </div>

  <div class="section-body"></div>

  {{-- items --}}
  <div class="row">
      <div class="col-12">
        <div class="card table-dashboard">
          <div class="card-header">
            <h4 class="title-table-dashboard">Data Penjualan</h4>
          </div>

          <div class="card-body" style="margin-left: -20px">
            <div class="card-header-action mr-auto ml-4 position-relative" style="top: 20px">
              <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-plus"></i></a>
            </div>
            <div class="collapse mr-auto ml-1" id="mycard-collapse">
              <div class="row mt-4 ml-2">
                <div class="col-sm-4">
                  <form action="{{ route('search-date-sale') }}" method="post">
                    @csrf
                  <div class="form-group">
                    <label>Date Range :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control daterange" name="search">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-search-plus"></i> Search</button>
                  </form>
                </div>
              </div>         
            </div>
        </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama Item</th>
                    <th>Qty</th>
                    <th>UoM</th>
                    <th>Harga Sebelum Pajak</th>
                    <th>Harga Setelah Pajak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sale as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->nama_item_id }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price->nama_uom }}</td>
                    <td>Rp. {{ number_format((float)$item->price->harga_sebelum_pajak, 0, '', '.') }}</td>
                    <td>Rp. {{ number_format((float)$item->price->harga_sesudah_pajak, 0, '', '.') }}</td> 
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