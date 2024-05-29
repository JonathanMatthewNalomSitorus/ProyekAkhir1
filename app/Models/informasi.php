<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    public $table = 'informasi'; 
    protected $primaryKey = 'id_informasi';
    protected $fillable = ['judul', 'isi', 'tanggal', 'foto'];
    use HasFactory;
}