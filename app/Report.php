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

    public function Mastery($border, $percentage ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = ($border[1]*$percentage[0]/100) + ($border[1]*$percentage[1]/100) + ($border[1]*$percentage[2]/100);
        $max_score = ($border[1]*$percentage[0]/100) + ($border[1]*$percentage[1]/100) + ($border[1]*$percentage[2]/100) + ($border[1]*$percentage[3]/100);
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$total)];
    }

    public function Proficient($border, $percentage ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = ($border[1]*$percentage[0]/100) + ($border[1]*$percentage[1]/100);
        $max_score = ($border[1]*$percentage[0]/100) + ($border[1]*$percentage[1]/100) + ($border[1]*$percentage[2]/100);
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$total)];
    }

    public function Development($border, $percentage ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = ($border[1]*$percentage[0]/100);
        $max_score = ($border[1]*$percentage[0]/100) + ($border[1]*$percentage[1]/100);
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$total)];
    }

    public function Beginner($border, $percentage ,$total)
    {
        if($total == 0)
            return 0;
        $min_score = ($border[0]*$percentage[0]/100);
        $max_score = ($border[1]*$percentage[0]/100);
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$total)];
    }
}
