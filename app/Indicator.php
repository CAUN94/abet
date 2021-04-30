<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
	public function getCategory()
    {
        return $this->hasMany('App\Category')->groupBy('name')->orderBy('name')->get();
    }

    public function getCourse()
    {
        return $this->belongsToMany('App\Course', 'course_indicator')->get();
    }

    public function Reports()
    {
        return $this->hasManyThrough(
            Category::class,
            Indicator::class,
            'id',
            'indicator_id',
            'category_id',
            'id'
        );
    }

}
