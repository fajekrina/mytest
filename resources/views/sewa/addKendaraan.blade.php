@extends('layouts.main')
@section('title', 'Trans Sewa - MyTest')
@section('sewa', 'active')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('sewa.index') }}">Trans Sewa</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('sewa.create') }}">Tambah Data</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Sewa Kendaraan</h4>
                            <div class="basic-form">
                                <form id="sewaForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="tgl_awal"
                                                class="form-control @error('tgl_awal') is-invalid @enderror"
                                                value="{{ $data['tgl_awal'] }}" placeholder="Tanggal Sewa" readonly>
                                            @error('tgl_awal')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" name="tgl_akhir" id="tgl_akhir"
                                                class="form-control @error('tgl_akhir') is-invalid @enderror"
                                                value="{{ $data['tgl_akhir'] }}" placeholder="Tanggal Akhir" readonly>
                                            @error('tgl_akhir')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Kendaraan</label>
                                            <select class="form-control @error('id_titip') is-invalid @enderror"
                                                id="id_titip" name="id_titip">
                                                <option value=""> Pilih salah satu</option>
                                                @foreach ($kendaraan as $item)
                                                    <option value="{{ $item->id_titip }}">
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_titip')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" id="simpanButton" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#simpanButton").click(function () {
                // Ambil data dari formulir
                var formData = $("#sewaForm").serialize();
                console.log(formData);

                // Kirim permintaan POST ke server menggunakan AJAX
                $.ajax({
                    type: "POST",
                    url: "/sewa/store", // Ganti dengan URL endpoint yang sesuai
                    data: formData,
                    success: function (response) {
                        // Tangani respons dari server jika diperlukan
                        console.log(response);
                        // Misalnya, Anda dapat mengarahkan pengguna ke halaman lain setelah berhasil
                        window.location.href = "{{ route('sewa.index') }}";
                    },
                    error: function (error) {
                        // Tangani kesalahan jika ada
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
