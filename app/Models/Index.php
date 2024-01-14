<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;

    protected $fillable = [ 'title',
                            'description',
                            'service_title',
                            'service1',
                            'service2',
                            'service3',
                            'service4',
                            'feedback_title',
                            'feedback1_name',
                            'feedback1',
                            'feedback2_name',
                            'feedback2',
                            'feedback3_name',
                            'feedback3',
                            'feedback4_name',
                            'feedback4',
                            'about_title',
                            'about1',
                            'about2',
    ];

}
