<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'title' , 'email' , 'phone' , 'address1' , 'address2' , 'content1' , 'content2' , 'content3' , 'content4'];

}
