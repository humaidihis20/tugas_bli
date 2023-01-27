@extends('main_layout.layout_login')
@section('title', 'Register - BGI')

@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <div class="card card-primary">
              <div class="card-header"><h4>Registrasi</h4></div>

              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

              <div class="card-body">
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                  
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        </div>
                        <div class="form-group col-6">
                        <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                  
                    <div class="form-group">
                      <label>Level</label>
                      <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                          <input type="radio" name="role" value="adminstock" class="selectgroup-input">
                          <span class="selectgroup-button">Admin Stock</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="role" value="kasir" class="selectgroup-input">
                          <span class="selectgroup-button">Kasir</span>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Registrasi
                    </button>
                    <a href="{{ route('login') }} " class="btn btn-success btn-lg btn-block">Back to Login</a>
                    </div>
                </form>
              </div>
            </div>
            {{-- <div class="simple-footer">
              Copyright &copy; IMP Studio <?= date('Y') ?>
            </div> --}}
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

