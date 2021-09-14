<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'bidang_id',
        'kategori',
    ];
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    
    }
    public function stakeholder()
    {
        return $this->hasMany(Stakeholder::class);
    }

}
