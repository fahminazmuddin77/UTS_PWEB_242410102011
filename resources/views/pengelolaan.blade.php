@extends('layouts.app')

@section('content')
<div class="container py-5">

  {{-- Judul Halaman --}}
  <div class="text-center mb-5">
    <h2 class="fw-bold text-dark">🍽️ Daftar Menu Restoran Joglo</h2>
    <p class="text-muted">Nikmati berbagai pilihan makanan dan minuman terbaik dari kami!</p>
    <hr class="w-25 mx-auto" style="border: 2px solid #ffcc00;">
  </div>

  {{-- Grid Menu --}}
  <div class="row justify-content-center">
    @foreach ($menus as $menu)
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="card menu-card shadow-sm border-0 h-100">
          
          {{-- Gambar Menu --}}
          @php
            $imageMap = [
              'Nasi Goreng Spesial' => 'assets/1.jpg',
              'Ayam Bakar Madu' => 'assets/2.jpg',
              'Es Teh Manis' => 'assets/3.jpeg',
              'Kopi Hitam' => 'assets/6.jpg',
              'Pisang Goreng Keju' => 'assets/7.jpeg',
              'Gudeg Joglo' => 'assets/8.jpeg',
              'Sate Lilit Jawa' => 'assets/10.jpeg',
              'Wedang Uwuh' => 'assets/12.jpeg',
              'Tempe Mendoan' => 'assets/11.jpeg',
              'Lumpia Jogja' => 'assets/9.jpeg',
            ];

            $descMap = [
              'Nasi Goreng Spesial' => 'Nasi goreng khas Joglo dengan bumbu rahasia dan topping ayam suwir serta telur.',
              'Ayam Bakar Madu' => 'Ayam bakar empuk dengan balutan madu manis gurih yang menggoda selera.',
              'Es Teh Manis' => 'Minuman klasik yang menyegarkan, sempurna untuk teman makan siangmu.',
              'Kopi Hitam' => 'Racikan kopi hitam pekat khas Nusantara untuk penikmat rasa sejati.',
              'Pisang Goreng Keju' => 'Pisang goreng renyah bertabur keju dan gula halus.',
              'Gudeg Joglo' => 'Gudeg manis khas Jogja disajikan dengan krecek dan telur bacem.',
              'Sate Lilit Jawa' => 'Sate daging cincang dengan rempah khas dan aroma daun sereh.',
              'Wedang Uwuh' => 'Minuman herbal hangat dari rempah tradisional Joglo.',
              'Tempe Mendoan' => 'Tempe tipis digoreng setengah matang dengan sambal kecap pedas.',
              'Lumpia Jogja' => 'Lumpia isi rebung, ayam, dan telur dengan rasa gurih khas Jogja.',
            ];

            $imagePath = $imageMap[$menu['nama']] ?? 'assets/default.jpg';
            $descText = $descMap[$menu['nama']] ?? 'Deskripsi belum tersedia untuk menu ini.';
          @endphp

          <img src="{{ asset($imagePath) }}" class="card-img-top menu-img" alt="{{ $menu['nama'] }}">

          {{-- Isi Card --}}
          <div class="card-body text-center">
            <h5 class="fw-bold text-dark mb-1">{{ $menu['nama'] }}</h5>
            <p class="text-muted mb-2">{{ $menu['kategori'] }}</p>
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 d-block mb-3">
              Rp {{ number_format($menu['harga'], 0, ',', '.') }}
            </span>

            {{-- Tombol Detail --}}
            <button class="btn btn-outline-warning btn-sm fw-semibold me-2"
                    data-bs-toggle="modal"
                    data-bs-target="#menuModal{{ $loop->index }}">
              Lihat Detail
            </button>

            {{-- Tombol Pesan --}}
            <button class="btn btn-success btn-sm fw-semibold"
                    onclick="pesanMenu('{{ $menu['nama'] }}')">
              Pesan Sekarang
            </button>
          </div>
        </div>
      </div>

      {{-- Modal Detail Menu --}}
      <div class="modal fade" id="menuModal{{ $loop->index }}" tabindex="-1" aria-labelledby="menuModalLabel{{ $loop->index }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-warning text-dark">
              <h5 class="modal-title fw-bold" id="menuModalLabel{{ $loop->index }}">{{ $menu['nama'] }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
              <img src="{{ asset($imagePath) }}" alt="{{ $menu['nama'] }}" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;">
              <p class="text-muted mb-3">{{ $menu['kategori'] }}</p>
              <p class="fw-semibold">{{ $descText }}</p>
              <p class="fw-bold text-dark fs-5 mb-0">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</p>
            </div>
          </div>
        </div>
      </div>

    @endforeach
  </div>
</div>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Script Pesan --}}
<script>
  function pesanMenu(namaMenu) {
    Swal.fire({
      title: 'Pesanan Dikirim!',
      text: `Pesanan "${namaMenu}" berhasil dikirim ke kasir`,
      icon: 'success',
      confirmButtonText: 'Oke',
      confirmButtonColor: '#ffcc00',
      background: '#fffaf2',
    });
  }
</script>

{{-- Custom Style --}}
<style>
  .menu-card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
    background-color: #fffaf2;
  }

  .menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }

  .menu-img {
    height: 220px;
    object-fit: cover;
  }

  h2.fw-bold {
    color: #4e2b09;
  }

  .badge.bg-warning {
    font-size: 0.95rem;
    border-radius: 8px;
    background-color: #ffcc00 !important;
  }

  .btn-outline-warning {
    border-color: #ffcc00;
    color: #6c4600;
  }

  .btn-outline-warning:hover {
    background-color: #ffcc00;
    color: #000;
  }

  .modal-content {
    border-radius: 15px;
  }

  .modal-header {
    border-bottom: none;
  }

  .btn-success {
    background-color: #2ecc71;
    border: none;
  }

  .btn-success:hover {
    background-color: #27ae60;
  }
</style>
@endsection
