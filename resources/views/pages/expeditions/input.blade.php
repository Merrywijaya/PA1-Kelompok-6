@extends('layouts.master')
@section('title', 'Ekspedisi')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        @if (!$data->id)
                            Tambah Ekspedisi
                        @else
                            Edit Ekspedisi
                        @endif
                    </div>

                    <div class="card-body">
                        @if (!$data->id)
                            <form action="{{ route('expeditions.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                        placeholder="Masukkan tanggal">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number">Nomor Surat</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        name="number" placeholder="Masukkan nomor surat">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="subject">Perihal</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        name="subject" placeholder="Masukkan perihal">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="from">Nama Pengirim</label>
                                    <input type="text" class="form-control @error('from') is-invalid @enderror" name="from"
                                        placeholder="Masukkan nama pengirim">
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="to">Nama Penerima</label>
                                    <input type="text" class="form-control @error('to') is-invalid @enderror" name="to"
                                        placeholder="Masukkan nama penerima">
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                                        placeholder="Masukkan keterangan"></textarea>
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
                                    <a href="{{ route('expeditions.index') }}" class="btn btn-danger profile-button">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('expeditions.update', $data->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                        value="{{ $data->date }}">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number">Nomor Surat</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        name="number" value="{{ $data->number }}">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="subject">Perihal</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        name="subject" value="{{ $data->subject }}">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="from">Nama Pengirim</label>
                                    <input type="text" class="form-control @error('from') is-invalid @enderror" name="from"
                                        value="{{ $data->from }}">
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="to">Nama Penerima</label>
                                    <input type="text" class="form-control @error('to') is-invalid @enderror" name="to"
                                        value="{{ $data->to }}">
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                                        value="{{ $data->description }}">{{ $data->description }}</textarea>
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
                                    <a href="{{ route('expeditions.index') }}" class="btn btn-danger profile-button">
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
