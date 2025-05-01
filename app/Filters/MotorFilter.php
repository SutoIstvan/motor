<?php

namespace App\Filters;

class MotorFilter extends QueryFilter{

    // public function brand_id($id = null){
    //     return $this->builder->when($id, function($query) use($id){
    //         $query->where('brand_id', $id);
    //     });
    // }

    // public function category_id($id = null){
    //     return $this->builder->when($id, function($query) use($id){
    //         $query->where('category_id', $id);
    //     });
    // }

    public function brand_id($ids = null)
    {
        $ids = is_array($ids) ? $ids : $this->paramToArray($ids);

        return $this->builder->when($ids, function ($query) use ($ids) {
            $query->whereIn('brand_id', $ids);
        });
    }

    public function category_id($ids = null)
    {
        $ids = is_array($ids) ? $ids : $this->paramToArray($ids);

        return $this->builder->when($ids, function ($query) use ($ids) {
            $query->whereIn('category_id', $ids);
        });
    }

    public function discount_price($id = null){
        return $this->builder->whereNotNull('discount_price');
    }

    public function performance($value = null){
        return $this->builder->where('performance', '<=', 35);
    }

    public function performance11($value = null){
        return $this->builder->where('performance', '<=', 11);
    }

    public function performancem($value = null){
        return $this->builder->where('performance', '<=', 3);
    }

    public function price_from($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('price', '>=', $value);
        });
    }

    public function price_to($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('price', '<=', $value);
        });
    }

    public function year_from($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('year', '>=', $value);
        });
    }

    public function year_to($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('year', '<=', $value);
        });
    }

    public function cm3_from($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('cylinders_cm3', '>=', $value);
        });
    }

    public function cm3_to($value = null)
    {
        return $this->builder->when($value, function($query) use($value) {
            $query->where('cylinders_cm3', '<=', $value);
        });
    }

}
