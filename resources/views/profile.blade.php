@extends('layouts.app')

@section('content')
<div class="profile-wrapper">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 450px; width: 100%;">
    <div class="card-body text-center p-4">

      {{-- Foto Profil --}}
      <img src="{{ asset('assets/5.jpg') }}" alt="Profile Avatar"
           class="rounded-circle border border-warning mb-3"
           width="90" height="90">

      {{-- Judul --}}
      <h4 class="fw-bold text-dark mb-3">Profil Pengguna</h4>

      @if($username)
        <div class="text-start px-4">
          <p class="fw-semibold mb-1">
            <i class="bi bi-person-circle me-2 text-warning"></i> Nama Pengguna:
          </p>
          <p class="text-muted">{{ ucfirst($username) }}</p>

          <p class="fw-semibold mb-1">
            <i class="bi bi-envelope-fill me-2 text-warning"></i> Email:
          </p>
          <p class="text-muted">{{ $email }}</p>

          <p class="fw-semibold mb-1">
            <i class="bi bi-check-circle-fill me-2 text-success"></i> Status:
          </p>
          <p class="text-muted">Aktif</p>
        </div>

        {{-- Tombol Logout --}}
        <div class="d-grid mt-4">
          <button class="btn btn-danger fw-semibold"
                  data-bs-toggle="modal"
                  data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </div>
      @else
        <p class="text-muted">Belum login, silakan kembali ke halaman login.</p>
      @endif

    </div>
  </div>
</div>

{{-- Style agar footer selalu di bawah dan tampilan rapi --}}
<style>
  html, body {
    height: 100%;
  }

  .profile-wrapper {
    min-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fdfaf6;
  }

  .card {
    background-color: #fffaf2;
  }

  h4.fw-bold {
    color: #4e2b09;
  }

  .btn-danger {
    background-color: #d9534f;
    border: none;
  }

  .btn-danger:hover {
    background-color: #c9302c;
  }
</style>
@endsection
