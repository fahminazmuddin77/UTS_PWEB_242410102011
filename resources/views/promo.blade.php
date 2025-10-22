@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- Judul Halaman --}}
    <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="800">
        <h2 class="fw-bold text-gradient">Promo Spesial Minggu Ini</h2>
        <p class="text-muted mb-0">Nikmati <strong>diskon 20%</strong> untuk semua menu <strong>minuman</strong> setiap hari Minggu!</p>
        <p class="small text-secondary mt-1">Promo hanya berlaku tiap hari Minggu, yuk segarkan hari Anda di <strong>Restoran Joglo</strong></p>
        <hr class="w-25 mx-auto mt-3" style="border: 2px solid #ffcc00;">
    </div>

    {{-- Daftar Menu Promo --}}
    <div class="row justify-content-center">
        @foreach ($promoMenus as $menu)
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
                <div class="card shadow-lg border-0 h-100 promo-card">
                    {{-- Gambar Otomatis Berdasarkan Nama --}}
                    @php
                        $imagePath = '';
                        if (str_contains(strtolower($menu['nama']), 'teh')) {
                            $imagePath = 'assets/3.jpeg';
                        } elseif (str_contains(strtolower($menu['nama']), 'kopi')) {
                            $imagePath = 'assets/6.jpg';
                        } elseif (str_contains(strtolower($menu['nama']), 'wedang')) {
                            $imagePath = 'assets/12.jpeg';
                        } else {
                            $imagePath = 'assets/default.jpg';
                        }
                    @endphp

                    <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $menu['nama'] }}" style="height: 220px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">

                    <div class="card-body text-center">
                        <h5 class="fw-bold text-dark">{{ $menu['nama'] }}</h5>
                        <p class="text-muted mb-2">{{ $menu['kategori'] }}</p>
                        <p class="mb-0">
                            <span class="text-decoration-line-through text-secondary">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</span><br>
                            <span class="fw-bold text-success fs-5">Rp {{ number_format($menu['harga_diskon'], 0, ',', '.') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Tombol Kembali --}}
    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="600">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-warning px-4 fw-semibold hover-shadow">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
        </a>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 900
  });
</script>


<style>
  .text-gradient {
    background: linear-gradient(90deg, #8b4513, #d4a017);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .promo-card {
    border-radius: 12px;
    background-color: #fff8e6;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .promo-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }

  .hover-shadow:hover {
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
    transition: all 0.3s ease;
  }
</style>
@endsection
