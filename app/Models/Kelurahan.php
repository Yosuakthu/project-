<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kelurahan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'kabupaten_id',
        'pulau_id',
        'kecamatan_id',
        'kelurahan',
        'jenis',
    ];

    public function pulau()
    {
        return $this->belongsTo(Pulau::class);
    }
    
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
   
  
}
