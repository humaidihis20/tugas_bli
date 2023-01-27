@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Dashboard')
@section('content')
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
</section>
@endsection