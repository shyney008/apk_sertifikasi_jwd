@extends('layouts.admin')

@section('title', 'Tambah Peserta')

@section('page-title', 'Tambah Data Peserta')

@section('content')

<div class="card">

    <h2>Tambah Data Peserta</h2>
    <p>Silakan isi data peserta sertifikasi.</p>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div style="
            background: #ffe5e5;
            color: #b00000;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        ">
            <strong>Terjadi kesalahan:</strong>

            <ul style="margin-bottom: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('pesertas.store') }}" method="POST">

        @csrf

        {{-- Nama --}}
        <div style="margin-bottom: 15px;">
            <label>Nama Lengkap</label>

            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama lengkap"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >
        </div>


        {{-- NIK --}}
        <div style="margin-bottom: 15px;">
            <label>NIK</label>

            <input
                type="text"
                name="nik"
                value="{{ old('nik') }}"
                placeholder="Masukkan NIK"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >
        </div>


        {{-- Email --}}
        <div style="margin-bottom: 15px;">
            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >
        </div>


        {{-- No HP --}}
        <div style="margin-bottom: 15px;">
            <label>No. HP</label>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                placeholder="Masukkan nomor HP"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >
        </div>


        {{-- Alamat --}}
        <div style="margin-bottom: 15px;">
            <label>Alamat</label>

            <textarea
                name="alamat"
                rows="4"
                placeholder="Masukkan alamat lengkap"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >{{ old('alamat') }}</textarea>
        </div>


        {{-- Skema --}}
        <div style="margin-bottom: 15px;">
            <label>Skema Sertifikasi</label>

            <select
                name="skema_id"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                "
            >

                <option value="">-- Pilih Skema Sertifikasi --</option>

                @foreach ($skemas as $skema)

                    <option
                        value="{{ $skema->id }}"
                        {{ old('skema_id') == $skema->id ? 'selected' : '' }}
                    >
                        {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                    </option>

                @endforeach

            </select>
        </div>


        {{-- Tanggal Daftar --}}
        <div style="margin-bottom: 20px;">
            <label>Tanggal Daftar</label>

            <input
                type="date"
                name="tanggal_daftar"
                value="{{ old('tanggal_daftar') }}"
                style="
                    width: 100%;
                    padding: 10px;
                    margin-top: 5px;
                    box-sizing: border-box;
                "
            >
        </div>


        {{-- Tombol --}}
        <div>

            <a
                href="{{ route('pesertas.index') }}"
                style="
                    display: inline-block;
                    padding: 10px 15px;
                    background: #ccc;
                    color: #222;
                    text-decoration: none;
                    border-radius: 6px;
                "
            >
                Kembali
            </a>

            <button
                type="submit"
                style="
                    padding: 10px 15px;
                    background: #222;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                "
            >
                Simpan Peserta
            </button>

        </div>

    </form>

</div>

@endsection