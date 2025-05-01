<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\Category;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motor extends Model implements CanVisit
{
    use HasFactory;
    use SoftDeletes;
    use HasVisits;

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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
