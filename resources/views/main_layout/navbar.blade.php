@section('navbar')
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  
  <ul class="navbar-nav navbar-right">
  <li class="dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{ url('images/user.png') }}" width="30" class="rounded-circle mr-1">
      {{-- <img alt="image" src="{{ url('storage/', auth()->user()->images) }}" width="30" class="rounded-circle mr-1"> --}}
      {{-- <div class="d-sm-none d-lg-inline-block">Hi, BGR</div> --}}
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
    </a>
    <form class="ml-auto" action="{{ route("logout") }}" method="post">
      @csrf
      <div class="dropdown-menu dropdown-menu-right dropdownButtonLogout">
        <button type="submit" class="dropdown-item has-icon text-danger font-weight-600 "><i class="fas fa-sign-out-alt mt-2"></i>Logout</button>
      </div>
    </form>
    </li>
  </ul>
</nav>
@endsection