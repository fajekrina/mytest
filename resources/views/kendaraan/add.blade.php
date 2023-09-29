@extends('layouts.main')
@section('title', 'Kendaraan - MyTest')
@section('kendaraan', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('kendaraan.index') }}">Kendaraan</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('kendaraan.create') }}">Tambah Data</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Kendaraan</h4>
                            <div class="basic-form">
                                <form action="{{ route('kendaraan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Merk</label>
                                            <input type="text" name="merk" id="merk"
                                                class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk') }}" placeholder="Merk">
                                            @error('merk')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jenis</label>
                                            <input type="text" name="jenis" id="jenis"
                                                class="form-control @error('jenis') is-invalid @enderror" value="{{ old('jenis') }}"
                                                placeholder="Jenis">
                                            @error('jenis')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama">
                                            @error('nama')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nopol</label>
                                            <input type="text" name="nopol" id="nopol"
                                                class="form-control @error('nopol') is-invalid @enderror" value="{{ old('nopol') }}"
                                                placeholder="Nomor Polisi">
                                            @error('nopol')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
