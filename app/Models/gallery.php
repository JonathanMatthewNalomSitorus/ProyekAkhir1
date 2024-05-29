<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public $table = 'gallery'; 
    protected $primaryKey = 'id_gallery';
    protected $fillable = ['judul', 'deskripsi','foto'];
    use HasFactory;
}
