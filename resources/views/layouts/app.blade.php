<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Data Mahasiswa')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="app-shell">
            <aside class="sidebar">
                <div class="brand-wrap">
                    <div class="brand-mark">M</div>
                    <div>
                        <div class="brand-name">MAHASISWA</div>
                        <div class="brand-subtitle">Campus Admin</div>
                    </div>
                </div>

                <nav class="nav-menu" aria-label="Navigasi utama">
                    <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}">
                        Data Mahasiswa
                    </a>
                    <a href="{{ route('mahasiswa.index') }}#form-tambah" class="nav-link">
                        Tambah Mahasiswa
                    </a>
                </nav>
            </aside>

            <main class="main-panel">
                <header class="topbar">
                    <div>
                        <p class="eyebrow">Sistem Administrasi</p>
                        <h1>@yield('page-title', 'Data Mahasiswa')</h1>
                    </div>
                    <div class="topbar-badge">Aktif</div>
                </header>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </body>
</html>
