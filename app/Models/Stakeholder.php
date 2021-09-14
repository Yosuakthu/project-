<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'bidang_id',
        'kategori_id',
        'stakholder',
        'jenis'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    
    }
}
