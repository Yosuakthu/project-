<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kabupaten extends Model
{
    use HasApiTokens, HasFactory, Notifiable; 
    use SoftDeletes;
    protected $fillable = [
        'kabupaten',
        'aktif',
    ];

    public function pulau()
    {
        return $this->hasMany(Pulau::class);
    }
   

}
