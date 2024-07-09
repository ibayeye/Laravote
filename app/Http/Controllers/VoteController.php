<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Peserta;
use App\Models\Vote;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'nullable|string',
        ]);

        // Simpan data ke tabel Riwayat
        Riwayat::create([
            'candidate_id' => $request->candidate_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        // Simpan data ke tabel Peserta
        Peserta::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        
        Vote::create([
            'candidate_id' => $request->candidate_id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('paslon')
                         ->with('success', 'Vote berhasil!');
    }

    
}
