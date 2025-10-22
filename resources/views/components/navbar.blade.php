<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top custom-navbar">
  <div class="container">

    
    <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('dashboard', ['username' => $username]) }}">
      <img src="{{ asset('assets/4.png') }}" alt="Logo" width="55" height="55" class="me-3 rounded-circle border border-light shadow-sm">
      <span class="brand-text">Restoran Joglo</span>
    </a>

    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">

        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('dashboard*') ? 'active-link' : '' }}"
             href="{{ route('dashboard', ['username' => $username]) }}">
            <i class="bi bi-house-door-fill me-1"></i> Dashboard
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('pengelolaan*') ? 'active-link' : '' }}"
             href="{{ route('pengelolaan', ['username' => $username]) }}">
            <i class="bi bi-list-ul me-1"></i> Pengelolaan
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link {{ request()->is('profile*') ? 'active-link' : '' }}"
             href="{{ route('profile', ['username' => $username]) }}">
            <i class="bi bi-person-circle me-1"></i> Profile
          </a>
        </li>

        
        <li class="nav-item mx-2">
          <a class="nav-link logout-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </a>
        </li>

        
        @if(!empty($username))
        <li class="nav-item ms-3 d-none d-lg-block">
          <div class="user-card d-flex align-items-center px-3 py-2 shadow-lg">
            <div class="avatar-wrapper me-2">
              <div class="avatar-circle d-flex justify-content-center align-items-center">
                <i class="bi bi-person-fill text-white fs-5"></i>
              </div>
            </div>
            <div>
              <span class="fw-bold text-light">{{ ucfirst($username) }}</span>
              <p class="text-gold small mb-0" style="line-height: 1;">Customer</p>
            </div>
          </div>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>


<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-gold text-dark">
        <h5 class="modal-title fw-bold" id="logoutModalLabel">Konfirmasi Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <p class="fw-semibold fs-6">Apakah Anda yakin ingin keluar dari akun ini?</p>
        <div class="d-flex justify-content-center gap-3 mt-3">
          <a href="{{ route('logout') }}" class="btn btn-danger fw-semibold px-4">Ya, Logout</a>
          <button type="button" class="btn btn-secondary fw-semibold px-4" data-bs-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Custom Styles --}}
<style>
  
  .custom-navbar {
    background: linear-gradient(90deg, #4e2b09, #7b3f00);
    padding: 1rem 0;
  }

  .navbar-brand img {
    width: 55px;
    height: 55px;
    transition: transform 0.3s ease;
  }

  .navbar-brand img:hover {
    transform: scale(1.05);
  }

  .navbar-brand .brand-text {
    font-family: 'Poppins', sans-serif;
    font-size: 1.5rem;
    color: #ffd700;
    letter-spacing: 0.6px;
    transition: 0.3s;
  }

  .navbar-brand:hover .brand-text {
    color: #fff3cd !important;
  }

  .nav-link {
    color: #f8f9fa;
    font-weight: 500;
    transition: 0.25s ease-in-out;
    border-bottom: 2px solid transparent;
    font-size: 1.05rem;
    padding: 0.6rem 0.5rem;
  }

  .nav-link:hover {
    color: #ffd700 !important;
    border-bottom: 2px solid #ffd700;
    transform: translateY(-2px);
  }

  .active-link {
    color: #ffd700 !important;
    font-weight: 600;
    border-bottom: 2px solid #ffd700;
  }

  .logout-link {
    color: #ffb3b3 !important;
  }

  .logout-link:hover {
    color: #ff4d4d !important;
  }

  .bg-gold {
    background-color: #ffd700 !important;
  }

  .badge.bg-gold {
    font-weight: 600;
    border-radius: 8px;
  }

  
  .user-card {
    background: linear-gradient(135deg, #3b2500, #654321);
    border-radius: 50px;
    border: 1px solid #ffcc33;
    transition: all 0.35s ease;
    cursor: pointer;
    position: relative;
  }

  .user-card:hover {
    background: linear-gradient(135deg, #533100, #8b5a00);
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 20px rgba(255, 204, 0, 0.3);
  }

  .avatar-circle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: radial-gradient(circle, #ffcc00, #b8860b);
    border: 2px solid #fff3cd;
    box-shadow: 0 0 10px rgba(255, 204, 0, 0.6);
    animation: pulseGlow 2s infinite ease-in-out;
  }

  .text-gold {
    color: #ffd700;
  }

  @keyframes pulseGlow {
    0% { box-shadow: 0 0 5px rgba(255, 204, 0, 0.3); }
    50% { box-shadow: 0 0 15px rgba(255, 204, 0, 0.6); }
    100% { box-shadow: 0 0 5px rgba(255, 204, 0, 0.3); }
  }
</style>
