<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class PaslonController extends Controller
{
    // app/Http/Controllers/CandidateController.php
    public function index()
    {
        $capresCandidates = Candidate::where('type', 'capres')->get();
        $gubernurCandidates = Candidate::where('type', 'gubernur')->get();
        $ketuaOrganisasiCandidates = Candidate::where('type', 'ketua_organisasi')->get();

        return view('pages.paslon', compact('capresCandidates', 'gubernurCandidates', 'ketuaOrganisasiCandidates'));
    }
}
