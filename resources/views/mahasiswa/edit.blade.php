@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')
@section('page-title', 'Edit Mahasiswa')

@section('content')
    <section class="card">
        <div class="section-header">
            <div>
                <p class="eyebrow">Perbarui</p>
                <h2>Ubah Data Mahasiswa</h2>
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="student-form">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="field">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="@error('nama') is-invalid @enderror" placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="@error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="no_hp">Nomor HP</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" class="@error('no_hp') is-invalid @enderror" placeholder="Contoh: 081234567890">
                    @error('no_hp')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="4" class="@error('alamat') is-invalid @enderror" placeholder="Masukkan alamat rumah / kos">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    @error('alamat')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </div>
        </form>
    </section>
@endsection
