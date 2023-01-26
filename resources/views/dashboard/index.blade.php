@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Dashboard')
@section('content')
{{-- <script>
  @if(Session::has('success'))
    iziToast.success({
      message: ("{{ session('success') }}"),
      progressBar: true,
      position: 'topCenter',
    });
  @endif
</script> --}}
<section class="section">
    <div class="section-header dashboard">
      <h1 class="title-dashboard">Dashboard BGR Logistik Indonesia</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Items</h4>
              </div>
              <div class="card-body">
                {{ $items }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pembelian</h4>
              </div>
              <div class="card-body">
                {{ $orders }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-file-invoice"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pembayaran</h4>
              </div>
              <div class="card-body">
                {{ $payments }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>User</h4>
              </div>
              <div class="card-body">
                {{ $users }}
              </div>
            </div>
          </div>
        </div>                  
      </div>
    </div>

    {{-- dashboard --}}
    {{-- <div class="row">
      <div class="col-12">
        <div class="card table-dashboard">
          <div class="card-header">
            <h4 class="title-table-dashboard">Order History</h4>
          </div>
          <div class="card-body" style="margin-left: -20px">
            <div class="card-header-action mr-auto ml-4 position-relative" style="top: 20px">
              <a data-collapse="#mycard-collapse" class="btn btn-icon btn-success" href="#"><i class="fas fa-plus"></i></a>
            </div>
            <div class="collapse mr-auto ml-1" id="mycard-collapse">
              <div class="row mt-4 ml-2">
                <div class="col-sm-4">
                  <form action="" method="post">
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
              <table class="table table-striped table-hover text-center" id="table-1">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No.Pesanan</th>
                    <th>Tanggal</th>
                    <th>Tanda Terima</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($historyOrders as $items)                    
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $items->orders->name }}</td>
                    <td>{{ $items->order_number }}</td>
                    <td>{{ date('d-m-y', strtotime($items->published_at))}}</td>
                    <td><a href="{{ url('transaction') }}" class="btn btn-outline-secondary">Lihat</a></td>
                    @if ($items->payment_status == 'lunas')                     
                    <td><div class="btn btn-success" style="cursor: auto">Lunas</div></td>
                    @else
                    <td><div class="btn btn-warning" style="cursor: auto">Belum Lunas</div></td>                    
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
</section>
@endsection