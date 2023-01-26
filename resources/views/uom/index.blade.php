@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'UOM - BGI')
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
            <h4 class="title-table-dashboard">UOM</h4>
          </div>
          <div class="card-body">
              <div class="float-left">
                  <a href="{{ route('uoms.create') }}" class="btn btn-success mb-3">Tambah Data</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped" id="table-2">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama UoM</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($uom as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_uom }}
                    <td>{{ $item->deskripsi_uom }}
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