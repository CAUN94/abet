<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function getReports()
    {
    	return $this->hasMany('App\Report')->get();
    }

    public function getCategory()
    {
        return $this->belongsToMany('App\Category','reports','course_id','category_id')
            ->get();
    }

    public function getCategoryStart()
    {
        return $this->belongsToMany('App\Category','reports','course_id','category_id')
        	->whereNull('MeasurementInstrument')
        	->get();
    }

    public function getCategoryProgress()
    {
        return $this->belongsToMany('App\Category','reports','course_id','category_id')
        	->whereNotNull('MeasurementInstrument')
        	->whereNull('ProfessorTeam')
        	->get();
    }

    public function getCategoryDone()
    {
        return $this->belongsToMany('App\Category','reports','course_id','category_id')
        	->whereNotNull('ProfessorTeam')
        	->get();
    }



}
