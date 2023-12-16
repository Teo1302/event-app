<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;
    protected $table = 'speakeri';
    public $fillable = ['id','nume', 'prenume','prezentare','telefon','email','eveniment_id'];
    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class, 'eveniment_id');
    }
}
