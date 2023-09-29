@extends('layouts.main')
@section('title', 'Trans Titip - MyTest')
@section('titip', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('titip.index') }}">Kendaraan</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('titip.edit', $titip->id_titip) }}">Edit Data</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Titip</h4>
                            <div class="basic-form">
                                <form action="{{ route('titip.update', $titip->id_titip) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Kendaraan</label>
                                            <select class="form-control @error('id_kendaraan') is-invalid @enderror"
                                                id="id_kendaraan" name="id_kendaraan">
                                                @foreach ($kendaraan as $item)
                                                    <option value="{{ $item->id_kendaraan }}" @if($item->id_kendaraan === $titip->id_kendaraan) selected @endif>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_kendaraan')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Harga Sewa</label>
                                            <input type="number" name="harga_sewa" id="harga_sewa"
                                                class="form-control @error('harga_sewa') is-invalid @enderror" value="{{ $titip->harga_sewa }}"
                                                placeholder="Harga Sewa">
                                            @error('harga_sewa')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Titip</label>
                                            <input type="date" name="tgl_titip" id="tgl_titip"
                                                class="form-control @error('tgl_titip') is-invalid @enderror" value="{{ $titip->tgl_titip }}" placeholder="Tanggal Titip">
                                            @error('tgl_titip')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Berakhir</label>
                                            <input type="date" name="tgl_berakhir" id="tgl_berakhir"
                                                class="form-control @error('tgl_berakhir') is-invalid @enderror" value="{{ $titip->tgl_berakhir }}"
                                                placeholder="Tanggal Berakhir">
                                            @error('tgl_berakhir')
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
