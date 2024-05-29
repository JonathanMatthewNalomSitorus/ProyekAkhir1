<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    public $table = 'data_sekolah';
    protected $primaryKey = 'id_datasekolah';
    protected $fillable = ['judul', 'isi', 'tanggal', 'foto'];
    use HasFactory;
}
