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
                            <h4 class="card-title">Tambah Data Sewa</h4>
                            <div class="basic-form">
                                <form action="{{ url('sewa/findKendaraan') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" id="tgl_awal"
                                                class="form-control @error('tgl_awal') is-invalid @enderror"
                                                value="{{ old('tgl_awal') }}" placeholder="Tanggal Sewa">
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
                                                value="{{ old('tgl_akhir') }}" placeholder="Tanggal Akhir">
                                            @error('tgl_akhir')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Lanjut</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js_custom')
<script type="text/javascript">
    $("#tgl_awal").change(function(){
        var tgl_awal=$("#tgl_awal").val();
        $.ajax({
            type:"get",
            url:"findKendaraan",
            data:"tgl_awal="+tgl_awal,
            success:function(data){
                $('#id_titip').append('<option value=""></option>');
                for(var i=0;i<data.length;i++){
                $('#id_titip').append('<option value="'+data[i].id_titip+'">'+data[i].nama+'</option>');
                } 
            }
        });
    });
</script>    
@endsection