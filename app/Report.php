<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function Course()
    {
    	return $this->belongsTo('App\Course')->first();
    }

    public function User()
    {
    	return $this->belongsTo('App\User')->get();
    }

    public function Category()
    {
    	return $this->belongsTo('App\Category')->first();
    }

    public function Students()
    {
        return $this->hasMany('App\Student')->count();
    }

    public function Mastery($min, $max ,$total)
    {
        $min_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+($max-$min)*0.3+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Proficient($min, $max ,$total)
    {
        $min_score = (($max-$min)*0.2)+($max-$min)*0.3+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Development($min, $max ,$total)
    {
        $min_score = (($max-$min)*0.2)+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Beginner($min, $max ,$total)
    {
        $max_score = (($max-$min)*0.2)+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min, $max_score])->count();
        return round($count*100/$total);
    }
}
