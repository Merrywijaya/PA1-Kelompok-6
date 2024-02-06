@extends('layouts.master')
@section('title', 'Agenda')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        @if (!$data->id)
                            Tambah Agenda
                        @else
                            Edit Agenda
                        @endif
                    </div>

                    <div class="card-body">
                        @if (!$data->id)
                            <form action="{{ route('agendas.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="date_of_agenda">Tanggal Terima</label>
                                    <input type="date_of_agenda"
                                        class="form-control @error('date_of_agenda') is-invalid @enderror"
                                        name="date_of_agenda" placeholder="Masukkan Tanggal Terima">
                                    @error('date_of_agenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number_of_agenda">Nomor Agenda</label>
                                    <input type="number"
                                        class="form-control @error('number_of_agenda') is-invalid @enderror"
                                        name="number_of_agenda" placeholder="Masukkan Nomor Agenda">
                                    @error('number_of_agenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number_of_letter">Nomor Surat</label>
                                    <input type="text" class="form-control @error('number_of_letter') is-invalid @enderror"
                                        name="number_of_letter" placeholder="Masukkan Nomor Surat">
                                    @error('number_of_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="date_of_letter">Tanggal Surat</label>
                                    <input type="date_of_letter"
                                        class="form-control @error('date_of_letter') is-invalid @enderror"
                                        name="date_of_letter" placeholder="Masukkan Tanggal Surat">
                                    @error('date_of_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="summary">Isi Ringkasan</label>
                                    <input type="text" class="form-control @error('summary') is-invalid @enderror"
                                        name="summary" placeholder="Masukkan Isi Ringkasan">
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="from">Dari</label>
                                    <input type="text" class="form-control @error('from') is-invalid @enderror" name="from"
                                        placeholder="Masukkan Dari">
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="to">Kepada</label>
                                    <input type="text" class="form-control @error('to') is-invalid @enderror" name="to"
                                        placeholder="Masukkan Kepada">
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        placeholder="Masukkan Keterangan"></textarea>
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
                                    <a href="{{ route('agendas.index') }}" class="btn btn-danger profile-button">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('agendas.update', $data->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="date_of_agenda">Tanggal Terima</label>
                                    <input type="date_of_agenda"
                                        class="form-control @error('date_of_agenda') is-invalid @enderror"
                                        name="date_of_agenda" placeholder="Masukkan Tanggal Terima"
                                        value="{{ $data->date_of_agenda }}">
                                    @error('date_of_agenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number_of_agenda">Nomor Agenda</label>
                                    <input type="number"
                                        class="form-control @error('number_of_agenda') is-invalid @enderror"
                                        name="number_of_agenda" placeholder="Masukkan Nomor Agenda"
                                        value="{{ $data->number_of_agenda }}">
                                    @error('number_of_agenda')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="number_of_letter">Nomor Surat</label>
                                    <input type="number"
                                        class="form-control @error('number_of_letter') is-invalid @enderror"
                                        name="number_of_letter" placeholder="Masukkan Nomor Surat"
                                        value="{{ $data->number_of_letter }}">
                                    @error('number_of_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="date_of_letter">Tanggal Surat</label>
                                    <input type="date_of_letter"
                                        class="form-control @error('date_of_letter') is-invalid @enderror"
                                        name="date_of_letter" placeholder="Masukkan Tanggal Surat"
                                        value="{{ $data->date_of_letter }}">
                                    @error('date_of_letter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="summary">Isi Ringkasan</label>
                                    <input type="text" class="form-control @error('summary') is-invalid @enderror"
                                        name="summary" placeholder="Masukkan Isi Ringkasan" value="{{ $data->summary }}">
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="from">Dari</label>
                                    <input type="text" class="form-control @error('from') is-invalid @enderror" name="from"
                                        placeholder="Masukkan Dari" value="{{ $data->from }}">
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="to">Kepada</label>
                                    <input type="text" class="form-control @error('to') is-invalid @enderror" name="to"
                                        placeholder="Masukkan Kepada" value="{{ $data->to }}">
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        placeholder="Masukkan Keterangan">{{ $data->description }}</textarea>
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
                                    <a href="{{ route('agendas.index') }}" class="btn btn-danger profile-button">
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
