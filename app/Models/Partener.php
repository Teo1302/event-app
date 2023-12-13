<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    use HasFactory;
    public $fillable = ['id','nume', 'contact','email','descriere','eveniment_id'];
}
