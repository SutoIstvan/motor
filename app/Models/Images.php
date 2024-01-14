<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Motor;

class Images extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function motors()
    {
        return $this->belongsToMany(Motor::class);
    }
}
