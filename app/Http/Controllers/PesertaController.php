<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::with('skema');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $pesertas = $query->latest()->get();

        return view('pesertas.index', compact('pesertas'));
    }

    public function create()
    {
        $skemas = Skema::all();

        return view('pesertas.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|unique:pesertas,nik|max:20',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|max:20',
            'alamat' => 'required',
            'skema_id' => 'required|exists:skemas,id',
            'tanggal_daftar' => 'required|date',
        ]);

        Peserta::create($validated);

        return redirect()
            ->route('pesertas.index')
            ->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');

        return view('pesertas.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();

        return view('pesertas.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'nik' => 'required|max:20|unique:pesertas,nik,' . $peserta->id,
            'email' => 'required|email|max:255',
            'no_hp' => 'required|max:20',
            'alamat' => 'required',
            'skema_id' => 'required|exists:skemas,id',
            'tanggal_daftar' => 'required|date',
        ]);

        $peserta->update($validated);

        return redirect()
            ->route('pesertas.index')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()
            ->route('pesertas.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}