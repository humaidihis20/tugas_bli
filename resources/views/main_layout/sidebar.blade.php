@section('sidebar')
<div class="sidebar-brand">
  <a href="{{ url('dashboard') }}"><img src="{{ asset('images/BGR.png') }}" alt="" width="150" height="45"></a> 
  </a>
</div>

<div class="sidebar-brand sidebar-brand-sm">
  <a href="{{ url('dashboard') }}"><img src="{{ asset('images/BGR.png') }}" alt="" width="60" height="30"></a> 
  </a>
</div>

<ul class="sidebar-menu">
  <hr />
  <li class="menu-header">Master Data</li>
  <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
  </li>
  @if(auth()->user()->role == 'adminstock') 
    <li class="{{ Request::routeIs('items') ? 'active' : '' }}">
      <a href="{{ route('items') }}" class="nav-link"><i class="fas fa-list"></i><span>Data Item</span></a>
    </li>
    <li class="{{ Request::routeIs('uoms') ? 'active' : '' }}">
      <a href="{{ route('uoms') }}" class="nav-link"><i class="fas fa-database"></i><span>Data UoM(Unit Of Material)</span></a>
    </li>
  @elseif(auth()->user()->role == 'superadmin')
    <li class="{{ Request::routeIs('items') ? 'active' : '' }}">
      <a href="{{ route('items') }}" class="nav-link"><i class="fas fa-list"></i><span>Data Item</span></a>
    </li>
    <li class="{{ Request::routeIs('users') ? 'active' : '' }}">
      <a href="{{ route('users') }}" class="nav-link"><i class="fas fa-users"></i><span>Data User</span></a>
    </li>
    <li class="{{ Request::routeIs('price') ? 'active' : '' }}">
      <a href="{{ route('price') }}" class="nav-link"><i class="fas fa-money-bill"></i><span>Data Harga</span></a>
    </li>
    <li class="{{ Request::routeIs('payments') ? 'active' : '' }}">
      <a href="{{ route('payments') }}" class="nav-link"><i class="fas fa-file-archive"></i><span>Data Pembayaran</span></a>
    </li>
    <li class="{{ Request::routeIs('uoms') ? 'active' : '' }}">
      <a href="{{ route('uoms') }}" class="nav-link"><i class="fas fa-database"></i><span>Data UoM(Unit Of Material)</span></a>
    </li>
    <li class="menu-header">Order</li>
    <li class="{{ Request::routeIs('purchase') ? 'active' : '' }}">
      <a href="{{ route('purchase') }}" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Order</span></a>
    </li>
    <li class="{{ Request::routeIs('sale') ? 'active' : '' }}">
      <a href="{{ route('sale') }}" class="nav-link"><i class="fas fa-cart-arrow-down"></i><span>Penjualan</span></a>
    </li>
  @elseif(auth()->user()->role == 'kasir') 
    <li class="menu-header">Order</li>
    <li class="{{ Request::routeIs('purchase') ? 'active' : '' }}">
      <a href="{{ route('purchase') }}" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Order</span></a>
    </li>
  @endif
</ul>
@endsection