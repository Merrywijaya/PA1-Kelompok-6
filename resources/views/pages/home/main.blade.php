@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div
        style="background-image: url('img/background.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 60vh;">
        <p class="jdl">Sistem Digital Administrasi Kelurahan Sangkar Ni Huta</p>
        <div class="row justify-content-center">
            @guest
                <div class="col-6 text-center">
                    <a class="btn btn-success me-5" href="login">Login</a>
                    <a href="login" class="btn btn-warning">Daftar</a>
                </div>
            @endguest
        </div>
    </div>


    <section id="About" style="padding-top: 2rem;">
        <div class="container" >
          <div class="row text-center">
            <div class="col">
              <h2 style="color: Black;">Sekilas Tentang Sangkar Ni Huta</h2>
            </div>
          </div>
          <div class="row justify-content-center fs-5 text-center" style="padding-top: 1rem">
            <div class="col-4">
              <p style="color: Black;">Sangkar Nihuta adalah salah satu kelurahan di Kecamatan Balige, Kabupaten Toba, Provinsi Sumatra Utara, Indonesia yang terletak di Jl.Tarutung, kode post 22312. Kelurahan Sangkar Nihuta memiliki luas 0,93 km² dan dengan jumlah kepadatan 3.363,44 jiwa/km². 
                Kelurahan Sangkar Nihuta ini dipimpin oleh lurah yaitu Masta Napitupulu.
              </p>
            </div>
            <div class="col-4">
              <p style="color: Black;">
                Mayoritas penduduk Kelurahan Sangkar Nihuta adalah suku Toba dan sebagian besar penduduk Kelurahan Sangkar Nihuta memeluk agama Kristen . 
                Namun di Kelurahan Sangkar Nihuta ini tidak terdapat sarana ibadah.
              </p>
            </div>
         
          </div>
        </div>
      </section> <br> <br> <br>
    <section id="Fitur" style="padding-top: 2rem;">
        <div class="container" >
          <div class="row text-center">
            <div class="col">
              <h2 style="color: Black; padding-bottom:50px;">Fitur Lengkap dan Mudah Digunakan</h2>
            </div>
          </div>
          <div class="row justify-content-between fs-5" style="padding-top: 1rem">
            <div class="col-6">
              <p style="color: Black;">
                Web ini merupakan platform tata kelola desa yang menawarkan sejumlah layanan seperti sistem informasi pembanugnan desa, administrasi kependudukan 
                pelayanan publik, anggaran, dan berbagai layanan lainnya.

                <ul>
                    <li>Mudah Digunakan</li>
                    <li>Terintegrasi antara Android dan Website</li>
                    <li>Dapat berjalan secara online</li>
                </ul>
             </p>
            </div>
            <div class="col-4">
              <p style="color: Black;"><img src="img/img.png" alt="" width="500px"></p>
            </div>
          </div>
        </div>
      </section>



@endsection
