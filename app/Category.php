<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function Indicator()
	{
		return $this->belongsTo('App\Indicator')->first();
	}

	public function getCourse()
    {
        return $this->belongsToMany('App\Course','reports','course_id','category_id')->get();
    }
}
