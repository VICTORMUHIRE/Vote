<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "alias",
        "faculte_id"
    ] ;
    public function faculte(){
        return $this->belongsTo(Faculte::class);
    }
}
