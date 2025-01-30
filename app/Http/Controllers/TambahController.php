<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TambahController extends Controller
{
    public function create()
    {
        return view('pages.tambah');
    }

    // app/Http/Controllers/TambahController.php
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'number' => 'required|integer',
            'type' => 'required|string|in:capres,gubernur,ketua_organisasi',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('candidates', 'public');
        }

        Candidate::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'number' => $request->number,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Paslon berhasil ditambahkan!');
    }
}
