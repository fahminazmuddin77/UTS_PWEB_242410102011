@extends('layouts.app')

@section('content')
<div class="login-page">
  <div class="card login-card shadow-lg p-4">

    {{-- Logo & Judul --}}
    <div class="text-center mb-4">
      <img src="assets/4.png" alt="Logo Restoran Joglo" width="70" height="70"
           class="rounded-circle border border-warning mb-2">
      <h4 class="fw-bold text-dark">Login Restoran Joglo</h4>
      <p class="text-muted small mb-0">Masukkan data akun Anda untuk masuk</p>
    </div>

    {{-- Form Login --}}
    <form action="{{ route('login.process') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" class="form-control" id="username" name="username"
               placeholder="Masukkan nama pengguna" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" class="form-control" id="email" name="email"
               placeholder="contoh@email.com" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" class="form-control" id="password" name="password"
               placeholder="Masukkan password" required>
      </div>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-warning fw-semibold">Masuk</button>
      </div>
    </form>

    {{-- Error message --}}
    @if (session('error'))
      <div class="alert alert-danger mt-3 text-center" role="alert">
        {{ session('error') }}
      </div>
    @endif

    <div class="text-center mt-4">
      <p class="text-muted small mb-0">
        Belum punya akun? <span class="text-dark fw-semibold">Hubungi admin restoran: RestoJoglo@gmail.com.</span>
      </p>
    </div>

  </div>
</div>

{{-- Custom Fullscreen Background --}}
<style>
  body {
    margin: 0;
    padding: 0;
  }

  .login-page {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #5e2a0b 20%, #8b4513 60%, #d1a35a 100%);
    background-attachment: fixed;
    background-size: cover;
    overflow: hidden;
  }

  .login-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: url("https://www.transparenttextures.com/patterns/wood-pattern.png");
    opacity: 0.12;
    z-index: 0;
  }

  .login-card {
    position: relative;
    z-index: 2;
    width: 420px;
    border-radius: 15px;
    background: #fffdf8;
    border: 1px solid rgba(139, 69, 19, 0.3);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
  }

  .btn-warning {
    background: linear-gradient(90deg, #ffcc00, #ffb700);
    border: none;
    transition: 0.3s ease;
  }

  .btn-warning:hover {
    background: linear-gradient(90deg, #ffb700, #ffcc00);
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(255, 193, 7, 0.5);
  }

  label {
    color: #4e2b09;
  }
</style>
@endsection
