@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('page-title', 'Data Mahasiswa')

@section('content')
    <section class="stats-grid">
        <div class="stat-card">
            <span class="stat-label">Total Mahasiswa</span>
            <strong>{{ $totalMahasiswa }}</strong>
        </div>
        <div class="stat-card">
            <span class="stat-label">Hasil Pencarian</span>
            <strong>{{ $mahasiswa->count() }}</strong>
        </div>
    </section>

    <section class="card" id="form-tambah">
        <div class="section-header">
            <div>
                <p class="eyebrow">Formulir</p>
                <h2>Tambah Mahasiswa Baru</h2>
            </div>
        </div>

        <form action="{{ route('mahasiswa.store') }}" method="POST" class="student-form">
            @csrf

            <div class="form-row">
                <div class="field">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" name="nama" value="{{ old('nama') }}" class="@error('nama') is-invalid @enderror" placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="no_hp">Nomor HP</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" class="@error('no_hp') is-invalid @enderror" placeholder="Contoh: 081234567890">
                    @error('no_hp')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" class="@error('alamat') is-invalid @enderror" placeholder="Masukkan alamat rumah / kos">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </section>

    <section class="card">
        <div class="section-header table-header">
            <div>
                <p class="eyebrow">Daftar</p>
                <h2>Mahasiswa</h2>
            </div>

            <form action="{{ route('mahasiswa.index') }}" method="GET" class="search-form">
                <input type="search" name="search" value="{{ $search }}" placeholder="Cari nama atau nomor HP">
                <button type="submit" class="btn btn-secondary">Cari</button>
                @if ($search !== '')
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-ghost">Reset</a>
                @endif
            </form>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_hp }}</td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('mahasiswa.edit', $item) }}" class="btn btn-secondary btn-small">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-small">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state">Tidak ada data mahasiswa yang sesuai dengan pencarian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
