<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function Course()
    {
    	return $this->belongsTo('App\Course')->first();
    }

    public function Status()
    {
        if(isset($this->MeasurementInstrument) && isset($this->ProfessorTeam)){
            return 'success';
        }

        if(isset($this->MeasurementInstrument) && !isset($this->ProfessorTeam)){
            return 'danger';
        }

        if(!isset($this->MeasurementInstrument) && !isset($this->ProfessorTeam)){
            return 'danger';
        }
    }

    public static function CountAllReports() {
        return Report::all()->count();
    }

    public static function getcomplete() {
        return Report::whereNotNull('MeasurementInstrument')->whereNotNull('ProfessorTeam')->get()->count();
    }

    public static function getIncomplete() {
        return Report::whereNull('ProfessorTeam')->get()->count();
    }

    public function User()
    {
    	return $this->belongsTo('App\User')->first();
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
        if($total == 0)
            return 0;
        $min_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+($max-$min)*0.3+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Proficient($min, $max ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = (($max-$min)*0.2)+($max-$min)*0.3+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+($max-$min)*0.2+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Development($min, $max ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = (($max-$min)*0.2)+$min;
        $max_score = (($max-$min)*0.2)+($max-$min)*0.3+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score , $max_score])->count();
        return round($count*100/$total);
    }

    public function Beginner($min, $max ,$total)
    {
        if($total == 0)
            return 0;
        $max_score = (($max-$min)*0.2)+$min;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min, $max_score])->count();
        return round($count*100/$total);
    }
}
