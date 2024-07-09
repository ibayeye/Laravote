<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Riwayat::with('candidate')->get();

        // Update votes untuk setiap kandidat berdasarkan riwayat
        $voteCounts = Riwayat::select('candidate_id', DB::raw('count(*) as votes'))
                            ->groupBy('candidate_id')
                            ->orderByDesc('votes')
                            ->get();

        // Reset semua votes sebelum diupdate
        Candidate::query()->update(['votes' => 0]);

        // Update votes untuk setiap kandidat berdasarkan voteCounts
        foreach ($voteCounts as $voteCount) {
            Candidate::where('id', $voteCount->candidate_id)->update(['votes' => $voteCount->votes]);
        }

        // Ambil top candidate untuk presiden
        $topCandidatePresiden = Candidate::where('type', 'capres')->orderByDesc('votes')->first();

        // Ambil top candidate untuk gubernur
        $topCandidateGubernur = Candidate::where('type', 'gubernur')->orderByDesc('votes')->first();

        return view('pages.riwayat', compact('riwayats', 'topCandidatePresiden', 'topCandidateGubernur', 'voteCounts'));
    }
}
