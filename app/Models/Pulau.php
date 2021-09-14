<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pulau extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'kabupaten_id',
        'pulau',
        'luas',
        'aktif',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class)->withTrashed();
    }
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
}
