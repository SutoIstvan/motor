<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felvasarlas extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'title' , 'content1' , 'content2' , 'content3'];

}
