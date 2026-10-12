@extends('layouts.admin')

@section('title', 'Detail Peserta')

@section('page-title', 'Detail Data Peserta')

@section('content')

<div class="card">

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    ">

        <div>
            <h2>Detail Peserta</h2>
            <p>Informasi lengkap peserta sertifikasi.</p>
        </div>

        <a
            href="{{ route('pesertas.index') }}"
            style="
                background: #ccc;
                color: #222;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 6px;
            "
        >
            Kembali
        </a>

    </div>


    <table width="100%" cellpadding="12" cellspacing="0" border="1">

        <tr>
            <th width="30%">Nama Lengkap</th>
            <td>{{ $peserta->nama }}</td>
        </tr>

        <tr>
            <th>NIK</th>
            <td>{{ $peserta->nik }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $peserta->email }}</td>
        </tr>

        <tr>
            <th>No. HP</th>
            <td>{{ $peserta->no_hp }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $peserta->alamat }}</td>
        </tr>

        <tr>
            <th>Kode Skema</th>
            <td>{{ $peserta->skema->kode_skema ?? '-' }}</td>
        </tr>

        <tr>
            <th>Skema Sertifikasi</th>
            <td>{{ $peserta->skema->nama_skema ?? '-' }}</td>
        </tr>

        <tr>
            <th>Tanggal Daftar</th>
            <td>{{ $peserta->tanggal_daftar }}</td>
        </tr>

        <tr>
            <th>Data Dibuat</th>
            <td>{{ $peserta->created_at->format('d-m-Y H:i') }}</td>
        </tr>

        <tr>
            <th>Terakhir Diperbarui</th>
            <td>{{ $peserta->updated_at->format('d-m-Y H:i') }}</td>
        </tr>

    </table>

</div>

@endsection