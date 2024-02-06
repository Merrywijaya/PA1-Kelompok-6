@extends('layouts.master')
@section('title', 'Layanan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        @if (!$data->id)
                            Tambah Layanan
                        @else
                            Edit Layanan
                        @endif
                    </div>

                    <div class="card-body">
                        @if (!$data->id)
                            <form action="{{ route('services.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Jenis Layanan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Masukkan jenis layanan">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="document">Dokumen</label>
                                    <input type="text" class="form-control @error('document') is-invalid @enderror"
                                        name="document" placeholder="Masukkan dokumen">
                                    @error('document')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="condition">Syarat</label>
                                    <textarea class="form-control @error('condition') is-invalid @enderror" name="condition" placeholder="Masukkan syarat"></textarea>
                                    @error('condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="cost">Biaya</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror" name="cost"
                                        placeholder="Masukkan biaya">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="process">Proses</label>
                                    <input type="text" class="form-control @error('process') is-invalid @enderror"
                                        name="process" placeholder="Masukkan proses">
                                    @error('process')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button class="btn profile-button" type="submit" name="submit"
                                        style="background-color: #229681; color:white;">
                                        Simpan
                                    </button>
                                    <a href="{{ route('services.index') }}" class="btn btn-danger profile-button">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('services.update', $data->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Jenis Peraturan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $data->name }}" placeholder="Masukkan jenis peraturan">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number">Nomor Peraturan</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        name="number" value="{{ $data->number }}" placeholder="Masukkan nomor peraturan">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="date">Tanggal Peraturan</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ $data->date }}" placeholder="Masukkan tanggal peraturan">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Tentang</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ $data->description }}" placeholder="Masukkan tentang peraturan"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 text-center">
                                    <button class="btn profile-button" type="submit" name="submit"
                                        style="background-color: #229681; color:white;">
                                        Perbarui
                                    </button>
                                    <a href="{{ route('services.index') }}" class="btn btn-danger profile-button">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
