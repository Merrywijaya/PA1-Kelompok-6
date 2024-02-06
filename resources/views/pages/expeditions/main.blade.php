@extends('layouts.master')
@section('title', 'Buku Ekspedisi')
@section('content')
    <div class="container">
        <h2 class="mt-5 mb-5">Buku Ekspedisi</h2>
        <p>
            Buku Ekspedisi adalah "Buku Pengantar Surat" yang digunakan untuk mencatat daftar pengiriman surat kepada pihak lain sehingga 
            lebih rapi dan digunakan sebagai bukti bahwa surat sudah dikirim atau diterima dalam Kelurahan Sangkat Ni Huta.
            <ol type="1">
                <li>Untuk menjamin keselamatan surat surat yang dikirimkan ke alamat yang dituju.</li>
                <li>Untuk tanda bukti bagi pengantar surat bahwa surat itu benar-benar disampaikan kepada yang bersangkutan.</li>
                <li>Tertib administrasi.</li>
            </ol>   
        </p>
        <!-- Button Tambah Data -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('expeditions.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <!-- Akhir Button Tambah Data -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered w-100">
                    <thead style="background-color: #229681;">
                        <tr>
                            <th>Tanggal Pengiriman Surat</th>
                            <th>Nomor Surat </th>
                            <th>Perihal</th>
                            <th>Nama Pengirim</th>
                            <th>Nama Penerima</th>
                            <th>Keterangan</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->from }}</td>
                                <td>{{ $item->to }}</td>
                                <td>{{ $item->description }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href={{ route('expeditions.edit', $item->id) }} class="btn btn-warning">Edit</a>
                                        <a href="javascript:;"
                                            onclick="hapus('{{ route('expeditions.destroy', $item->id) }}')"
                                            class="btn btn-danger">Hapus</a>
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
