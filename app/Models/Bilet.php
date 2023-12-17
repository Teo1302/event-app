<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilet extends Model
{
    use HasFactory;
    protected $table = 'bilete';
    public $fillable = ['id','tip_bilet', 'pret','cantitate','eveniment_id'];
    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class, 'eveniment_id');
    }
}
