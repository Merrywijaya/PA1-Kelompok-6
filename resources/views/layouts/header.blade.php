<nav class="navbar navbar-expand-lg" style="background-color: #229681">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="45" style="float: left;" class="me-3">
            <p class="text-white pt-3">Kelurahan Sangkar NiHuta</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li
                    class="nav-item dropdown {{ request()->is('agendas.*') || request()->is('expeditions.*') || request()->is('rules.*') || request()->is('services.*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Administrasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #DAF8F2;">
                        <li>
                            <a class="dropdown-item text-success {{ request()->is('agendas.*') ? 'active' : '' }}"
                                href="{{ route('agendas.index') }}">
                                Buku Agenda
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-success {{ request()->is('expeditions.*') ? 'active' : '' }}"
                                href="{{ route('expeditions.index') }}">
                                Buku Ekspedisi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-success {{ request()->is('rules.*') ? 'active' : '' }}"
                                href="{{ route('rules.index') }}">
                                Buku Peraturan Desa
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-success {{ request()->is('services.*') ? 'active' : '' }}"
                                href="{{ route('services.index') }}">
                                Pelayanan Admnistrasi </a>
                        </li>
                    </ul>
                </li>
                @auth
                    @if (Auth::user()->role == 'user')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown" style="background-color: #229681">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Hi, {{ Auth::user()->username }}
                            <i class="fa fa-user-circle"></i>
                        </a>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #DAF8F2;">
                            <li><a class="dropdown-item text-success" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item text-success" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>

</nav>
<!-- Akhir Navbar -->
