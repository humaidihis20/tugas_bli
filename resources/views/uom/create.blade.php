@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Create UoM - BGI')
@section('content')
@extends('main_layout.app')
@extends('main_layout.navbar')
@extends('main_layout.sidebar')
@extends('main_layout.footer')
@extends('main_layout.script')
@section('title', 'Forms Price Item - BGI')
@section('content')
<section class="section">
    <div class="section-header dashboard">
        <h1 class="title-dashboard">BGR Logistik Indonesia</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('uoms') }}">UoM</a></div>
            <div class="breadcrumb-item">Forms UoM</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="title-table-dashboard">Forms UoM</h4>
                    </div>
                    <form action="{{ route('uoms.store') }}" method="POST">
                        @csrf                                
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label for="nama_uom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">UoM</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('nama_uom') is-invalid @enderror" placeholder="UoM (Unit Of Material)" name="nama_uom" id="nama_uom" autocomplete="off" value="{{ old('nama_uom') }}">
                                    @error('nama_uom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="deskripsi_uom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control @error('deskripsi_uom') is-invalid @enderror" placeholder="Desrkipsi" name="deskripsi_uom" id="deskripsi_uom" autocomplete="off" value="{{ old('deskripsi_uom') }}">
                                    @error('deskripsi_uom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input class="btn btn-primary" type="submit" value="Simpan">
                                <a href="{{ route('uoms') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-warning" type="reset">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@endsection