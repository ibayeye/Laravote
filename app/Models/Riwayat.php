<?php
// app/Models/Riwayat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'nama',
        'alamat',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
