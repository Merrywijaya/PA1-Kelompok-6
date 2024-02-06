@extends('layouts.master')
@section('title', 'Layanan')
@section('content')
    <div class="container">
        <h2 class="mt-5 mb-5">Buku Administrasi</h2>
        <p>
            Berikut adalah informasi-informasi yang ditampilkan untuk dapat dipahami syaratnya sesuai dengan jenis pelayanan yang masyarakat ingin ketahui.
        </p>
        <!-- Button Tambah Data -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('services.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <!-- Akhir Button Tambah Data -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered w-100">
                    <thead style="background-color: #229681;">
                        <tr>
                            <th>Jenis Layanan</th>
                            <th>Dokumen</th>
                            <th>Syarat</th>
                            <th>Biaya</th>
                            <th>Proses</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->document }}</td>
                                <td>{{ $item->condition }}</td>
                                <td>{{ $item->cost }}</td>
                                <td>{{ $item->process }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href={{ route('services.edit', $item->id) }} class="btn btn-warning">Edit</a>
                                        <a href="javascript:;"
                                            onclick="hapus('{{ route('services.destroy', $item->id) }}')"
                                            class="btn btn-danger">Hapus
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <p>Total : {{ $collection->count() }}</p>
        <div class="col-md-12" align="end">
            {{ $collection->links('components.pagination') }}
        </div>
    </div>


@endsection
