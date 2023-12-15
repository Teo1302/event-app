<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveniment extends Model
{
    use HasFactory;
    protected $table = 'evenimente';
    public $fillable = ['id','titlu', 'descriere','data','ora','locatie'];
}
