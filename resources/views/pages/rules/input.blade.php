@extends('layouts.master')
@section('title', 'Peraturan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        @if (!$data->id)
                            Tambah Peraturan
                        @else
                            Edit Peraturan
                        @endif
                    </div>
                    <div class="card-body">
                        @if (!$data->id)
                            <form action="{{ route('rules.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Jenis Peraturan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Masukkan jenis peraturan">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number">Nomor Peraturan</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        name="number" placeholder="Masukkan nomor peraturan">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="date">Tanggal Peraturan</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" placeholder="Masukkan tanggal peraturan">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Tentang</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        placeholder="Masukkan tentang peraturan"></textarea>
                                    @error('description')
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
                                    <a href="{{ route('rules.index') }}" class="btn btn-danger profile-button">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('rules.update', $data->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name">Jenis Peraturan</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $data->name }}" placeholder="Masukkan jenis peraturan">
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
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" value="{{ $data->date }}"
                                        placeholder="Masukkan tanggal peraturan">
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
                                    <a href="{{ route('rules.index') }}" class="btn btn-danger profile-button">
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
