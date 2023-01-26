@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Data Harga - BGI')
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
            <h4 class="title-table-dashboard">Data Harga</h4>
          </div>
          <div class="card-body">
              <div class="float-left">
                  <a href="{{ route('price.create') }}" class="btn btn-success mb-3">Tambah Data</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Item</th>
                    <th>Harga Sebelum Pajak</th>
                    <th>Harga Sebelum Pajak</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($price as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_item_id }}</td>
                    <td>Rp. <div class="mata_uang" style="display:inline-table;">{{ $item->harga_sebelum_pajak }}</div></td>
                    <td>Rp. <div class="mata_uang" style="display:inline-table;">{{ $item->harga_sesudah_pajak }}</div></td>
                    {{-- <td>Rp. {{ number_format((float)$item->harga_sebelum_pajak, 0, '', '.') }}</div></td>
                    <td>Rp. {{ number_format((float)$item->harga_sesudah_pajak, 0, '', '.') }}</div></td> --}}
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