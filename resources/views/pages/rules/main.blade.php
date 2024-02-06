@extends('layouts.master')
@section('title', 'Peraturan')
@section('content')
    <div class="container">
        <h2 class="mt-5 mb-5">Buku Peraturan</h2>
        <p>
            Peraturan Desa adalah peraturan perundang-undangan yang ditetapkan oleh Kepala Desa bersama Badan Permusyawaratan Desa. 
            Peraturan desa tidak boleh bertentangan dengan kepentingan umum dan/atau peraturan perundang-undangan yang lebih tinggi. 
            Jenis dan variasi peraturan desa yang dibuat dan diundangkan tergantung pada kebutuhan aparatur pemerintah desa. Untuk itu dapat kita lihat informasi dari Buku peraturan Desa berikut.
        </p>
        <!-- Button Tambah Data -->
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('rules.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        <!-- Akhir Button Tambah Data -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered w-100">
                    <thead style="background-color: #229681;">
                        <tr>
                            <th>No</th>
                            <th>Jenis Peraturan</th>
                            <th>Nomor Peraturan</th>
                            <th>Tanggal Peraturan</th>
                            <th>Tentang</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->description }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a href={{ route('rules.edit', $item->id) }} class="btn btn-warning">Edit</a>
                                        <a href="javascript:;" onclick="hapus('{{ route('rules.destroy', $item->id) }}')"
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
