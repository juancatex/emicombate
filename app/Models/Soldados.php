<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldados extends Model
{
    use HasFactory;
    protected $fillable = ['nomcompleto', 'nom','am','ap','foto'];
    protected $primaryKey = 'idsol';
}
