<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class VoteResultController extends Controller
{
    public function index()
    {
        // Ambil kandidat dengan voting terbanyak dari masing-masing kategori
        $topCapres = Candidate::where('type', 'capres')
            ->withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->first();

        $topGubernur = Candidate::where('type', 'gubernur')
            ->withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->first();

        $topKetuaOrganisasi = Candidate::where('type', 'ketua_organisasi')
            ->withCount('votes')
            ->orderBy('votes_count', 'desc')
            ->first();

        return view('pages.voting', compact('topCapres', 'topGubernur', 'topKetuaOrganisasi'));
    }
}
