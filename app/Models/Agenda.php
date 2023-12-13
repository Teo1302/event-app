<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    public $fillable = ['id','titlu', 'descriere','ora_inceput','ora_final','eveniment_id'];
}
