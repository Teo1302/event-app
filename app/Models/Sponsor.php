<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $table = 'sponsori';
    public $fillable = ['id','nume', 'descriere','contact','adresa','eveniment_id'];
    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class, 'eveniment_id');
    }
}
