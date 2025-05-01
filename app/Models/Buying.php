<?php

namespace App\Models;
use App\Models\Images;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buying extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ,
        'gyartmany' ,
        'tel' ,
        'email' ,
        'tipus',
        'km',
        'allapot',
        'ev',
        'ar',
        'link',
        'leiras',
        'okmany',
        'rendszam',
        'other',
        'images_id',
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
