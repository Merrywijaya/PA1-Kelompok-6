@extends('layouts.master')
@section('title', 'Buku Agenda')
@section('content')
    <div class="container">
        <h2 class="mt-5 mb-5">Buku Agenda</h2>
        <p>
            Buku agenda merupakan buku yang digunakan untuk mencatat semua surat surat keluar masuk dalam waktu satu tahun atau periode
            tertentu dalam kelurahan sangkar ni huta.
            Dengan adanya buku agenda untuk melakukan penomoran dalam pembuatan surat akan menjadi lebih mudah karena dengan adanya buku agenda,
            surat surat sebelumnya dan dapat memudahkan pencarian berkas-berkas tertentu karena detail dari setiap surat masuk maupun surat keluar
            dapat di indetifikasikan dengan mudah dan tetulis secara berurutan.
        </p>
        <!-- Button Tambah Data -->
        @if (Auth::user()->role == 'admin')
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('agendas.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        @endif

        <!-- Akhir Button Tambah Data -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered w-100">
                    <thead style="background-color: #229681;">
                        <tr>
                            <th>Tanggal Terima</th>
                            <th>Nomor Agenda</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Pengiriman Surat</th>
                            <th>Isi Ringkasan</th>
                            <th>Dari</th>
                            <th>Kepada</th>
                            <th>Keterangan</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <td>{{ $item->date_of_agenda }}</td>
                                <td>{{ $item->number_of_agenda }}</td>
                                <td>{{ $item->number_of_letter }}</td>
                                <td>{{ $item->date_of_letter }}</td>
                                <td>{{ $item->summary }}</td>
                                <td>{{ $item->from }}</td>
                                <td>{{ $item->to }}</td>
                                <td>{{ $item->description }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href={{ route('agendas.edit', $item->id) }} class="btn btn-warning">Edit</a>
                                        <a href="javascript:;"
                                            onclick="hapus('{{ route('agendas.destroy', $item->id) }}')"
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
