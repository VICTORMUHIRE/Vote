<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "etat",
        "date_ouverture",
        "poste_id",
        "superviseur_id",
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
