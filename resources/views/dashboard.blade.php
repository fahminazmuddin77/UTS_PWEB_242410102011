@extends('layouts.app')

@section('content')
<div class="container py-5">

  {{-- Hero Section --}}
  <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
    @if($username)
      <h2 class="fw-bold text-gradient mb-2">Selamat Datang, {{ ucfirst($username) }}</h2>
      <p class="text-muted fs-5">Senang melihatmu kembali di <strong>Restoran Joglo</strong></p>

      @if(!empty($email))
        <p class="text-muted">
          <i class="bi bi-envelope-fill me-1 text-warning"></i>
          <strong>Email Anda:</strong> {{ $email }}
        </p>
      @endif
    @else
      <h2 class="fw-bold text-gradient">Halo, Pengunjung!</h2>
      <p class="text-muted">Silakan login untuk menikmati fitur Restoran Joglo 🍴</p>
    @endif
  </div>

  {{-- Promo Card --}}
  <div class="card shadow-lg border-0 mb-5 promo-card" data-aos="zoom-in" data-aos-duration="900">
    <div class="card-body text-center p-5 bg-light rounded position-relative overflow-hidden">
      <div class="promo-overlay"></div>
      <h4 class="fw-semibold mb-3 text-dark position-relative">🔥 Promo Spesial Minggu Ini 🔥</h4>
      <p class="mb-4 position-relative text-dark">
        Nikmati <strong class="text-warning">diskon 20%</strong> untuk semua menu minuman setiap hari Minggu!  
        Yuk nikmati suasana khas <strong>Restoran Joglo</strong> bersama keluarga 
      </p>
      <a href="{{ route('promo') }}" class="btn btn-warning fw-semibold shadow-sm px-4 py-2">
  Lihat Promo Spesial
</a>
    </div>
  </div>

  {{-- Menu Favorit --}}
  <h4 class="text-center mb-4 fw-bold text-gradient" data-aos="fade-up">🍴 Menu Favorit Pelanggan</h4>

  <div class="row justify-content-center">
    @php
      $menus = [
        ['img' => 'assets/1.jpg', 'nama' => 'Nasi Goreng Spesial', 'harga' => 25000],
        ['img' => 'assets/2.jpg', 'nama' => 'Ayam Bakar Madu', 'harga' => 28000],
        ['img' => 'assets/3.jpeg', 'nama' => 'Es Teh Manis', 'harga' => 8000],
      ];
    @endphp

    @foreach ($menus as $index => $menu)
      <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 200 }}">
        <div class="card h-100 border-0 shadow-sm menu-card">
          <img src="{{ asset($menu['img']) }}" class="card-img-top menu-img" alt="{{ $menu['nama'] }}">
          <div class="card-body text-center">
            <h6 class="fw-bold text-dark">{{ $menu['nama'] }}</h6>
            <p class="text-muted mb-0">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- CTA Section --}}
  <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
    <p class="mb-3 text-muted">Ingin melihat semua menu dan mengelola daftar makanan?</p>
    <a href="{{ route('pengelolaan', ['username' => $username, 'email' => $email]) }}"
       class="btn btn-outline-dark px-4 fw-semibold hover-shadow">
       <i class="bi bi-journal-text me-1"></i> Lihat Semua Menu
    </a>
  </div>
</div>

{{-- AOS Animation Library --}}
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: true, // animasi hanya muncul sekali saat scroll
    duration: 900
  });
</script>

{{--  Custom Style --}}
<style>
  .text-gradient {
    background: linear-gradient(90deg, #8b4513, #d4a017);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .promo-card {
    border-radius: 18px;
    overflow: hidden;
    background: #fff8e6;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .promo-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  }

  .promo-overlay {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at top right, rgba(255, 200, 80, 0.3), transparent);
    pointer-events: none;
  }

  .menu-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    background-color: #fffaf4;
  }
  .menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }
  .menu-img {
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  .hover-shadow:hover {
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
    transition: all 0.3s ease;
  }
</style>
@endsection
