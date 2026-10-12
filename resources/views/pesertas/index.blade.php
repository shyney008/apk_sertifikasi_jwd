@extends('layouts.admin')

@section('title', 'Data Peserta')

@section('page-title', 'Data Peserta Sertifikasi')

@section('content')

<div class="card">

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    ">

        <div>
            <h2>Data Peserta Sertifikasi</h2>
            <p>Daftar peserta sertifikasi yang terdaftar.</p>
        </div>

        <a href="{{ route('pesertas.create') }}"
           style="
                background: #222;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                border-radius: 6px;
           ">
            + Tambah Peserta
        </a>

    </div>


    {{-- Form Search --}}
    <form action="{{ route('pesertas.index') }}" method="GET"
          style="
              display: flex;
              gap: 10px;
              margin-bottom: 20px;
          ">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama, NIK, atau email..."
            style="
                flex: 1;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 6px;
            "
        >

        <button type="submit"
                style="
                    padding: 10px 18px;
                    background: #222;
                    color: white;
                    border: none;
                    border-radius: 6px;
                    cursor: pointer;
                ">
            Cari
        </button>

    </form>


    {{-- Tabel Peserta --}}
    <table width="100%" cellpadding="10" cellspacing="0" border="1">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Skema Sertifikasi</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($pesertas as $peserta)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $peserta->nama }}</td>

                    <td>{{ $peserta->nik }}</td>

                    <td>{{ $peserta->email }}</td>

                    <td>{{ $peserta->no_hp }}</td>

                    <td>
                        {{ $peserta->skema->nama_skema ?? '-' }}
                    </td>

                    <td>
                        {{ $peserta->tanggal_daftar }}
                    </td>

                    <td>

                        <a href="{{ route('pesertas.show', $peserta->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('pesertas.edit', $peserta->id) }}">
                            Edit
                        </a>

                        |

                        <form
                            action="{{ route('pesertas.destroy', $peserta->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus peserta ini?')"
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" style="text-align: center;">
                        Belum ada data peserta.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection