```blade
@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Detail Skema</h2>

    <div class="card">
        <div class="card-body">

            <div class="mb-3">
                <strong>Kode Skema</strong>
                <p>{{ $skema->kode_skema }}</p>
            </div>

            <div class="mb-3">
                <strong>Nama Skema</strong>
                <p>{{ $skema->nama_skema }}</p>
            </div>

            <div class="mb-3">
                <strong>Deskripsi</strong>
                <p>{{ $skema->deskripsi ?: '-' }}</p>
            </div>

            <a href="{{ route('skemas.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('skemas.edit', $skema->id) }}" class="btn btn-primary">
                Edit
            </a>

        </div>
    </div>
</div>
@endsection
```
