<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $fillable = ['id','titlu', 'descriere','ora_inceput','ora_final','eveniment_id'];
    protected $table = 'agenda';
    public function eveniment()
    {
        return $this->belongsTo(Eveniment::class, 'eveniment_id');
    }
}
