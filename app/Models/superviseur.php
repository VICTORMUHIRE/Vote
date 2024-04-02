<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superviseur extends Model
{
    use HasFactory;
    protected $fillable = [
            "name",
            "matricule",
            "email",
            "password"
        ] ;
        public function faculte(){
            return $this->belongsTo(Faculte::class);
        }
}
