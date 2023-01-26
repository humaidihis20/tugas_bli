@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Item Material - BGI')
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
            <h4 class="title-table-dashboard">Item Material</h4>
          </div>
          <div class="card-body">
              <div class="float-left">
                  <a href="{{ route('items.create') }}" class="btn btn-success mb-3">Tambah Data</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Jenis Item</th>
                    <th>Stock</th>
                    <th>UoM</th>
                    <th>Harga Barang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_item }}</td>
                    <td>{{ $item->nama_item }}
                      <div class="table-links">
                        <a href="javascript:void(0)" id="deleteitems" class="text-danger deleteitems" data-id="{{ url('items-delete/'.$item->id) }}" data-toggle="tooltip"><i class="fas fa-trash-alt"></i> Hapus</a>
                      </div>
                    </td>
                    <td>{{ $item->jenis_item }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->uom->nama_uom }}</td>
                    <td>Rp. {{ number_format((float)$item->harga_item, 0, '', '.') }}</td>
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