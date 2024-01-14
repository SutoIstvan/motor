<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Category;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ,
                            'price' ,
                            'discount_price' ,
                            'description' ,
                            'short_description',
                            'cylinders',
                            'cylinders_cm3',
                            'year',
                            'km',
                            'performance',
                            'condition',
                            'top',
                            'driver_license',
                            'main_image',
                            'video',
                            'images_id',
                            'category_id',
                            'brand_id',
                        ];

    // public function images()
    // {
    //     return $this->belongsToMany(Images::class);
    // }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
