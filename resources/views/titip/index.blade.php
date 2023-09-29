@extends('layouts.main')
@section('title', 'Trans Titip - MyTest')

@section('css_custom')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('titip.index') }}">Trans Titip</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Trans Titip</h4>
                            <a href="{{ route('titip.create') }}" type="button" class="btn mb-1 btn-primary">Tambah
                                Data</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kendaraan</th>
                                            <th>Harga Sewa</th>
                                            <th>Tanggal Titip</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($titip as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kendaraan->nama }}</td>
                                                <td>Rp{{ number_format($item->harga_sewa) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tgl_titip)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    @if ($item->tgl_berakhir != null)
                                                        {{ \Carbon\Carbon::parse($item->tgl_berakhir)->format('d/m/Y') }}
                                                    @endif
                                                </td>

                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span><a href="{{ route('titip.show', $item->id_titip) }}"
                                                                class="btn btn-info"><i class="fa fa-eye"></i></a></span>
                                                        <span><a href="{{ route('titip.edit', $item->id_titip) }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa fa-pencil"></i></a></span>
                                                        <form action="{{ route('titip.destroy', $item->id_titip) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <span><button onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger d-block" type="submit"><i
                                                                        class="fa fa-trash"></i></button></span>
                                                    </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection

@section('js_custom')
    <script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
