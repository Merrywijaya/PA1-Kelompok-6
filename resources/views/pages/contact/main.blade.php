@extends('layouts.master')
@section('title', 'Peraturan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        Hubungi Kami
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="message">Pesan</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Masukkan pesan"></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2 text-center">
                                <button class="btn profile-button" type="submit" name="submit"
                                    value="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
