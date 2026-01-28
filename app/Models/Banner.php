<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_path', 'link_url', 'is_active', 'start_date', 'end_date'];
    
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    // public static function getActiveBanner()
    // {
    //     $today = now()->toDateString();
        
    //     return self::where('is_active', true)
    //         ->where(function ($query) use ($today) {
    //             $query->whereNull('start_date')
    //                 ->orWhere('start_date', '<=', $today);
    //         })
    //         ->where(function ($query) use ($today) {
    //             $query->whereNull('end_date')
    //                 ->orWhere('end_date', '>=', $today);
    //         })
    //         ->first();
    // }
}
