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

    public function Mastery()
    {
        if($this->Students() == 0)
            return 0;
        $diff = $this->MaxScore - $this->MinScore;
        $min_score = $diff*$this->pb/100 + $diff*$this->pd/100 + $diff*$this->pp/100 + $this->MinScore;
        $max_score = $diff*$this->pb/100 + $diff*$this->pd/100 + $diff*$this->pp/100 + $diff*$this->pm/100 + $this->MinScore;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$this->Students())];
    }

    public function Proficient()
    {
        if($this->Students() == 0)
            return 0;
        $diff = $this->MaxScore - $this->MinScore;
        $min_score = $diff*$this->pb/100 + $diff*$this->pd/100 + $this->MinScore;
        $max_score = $diff*$this->pb/100 + $diff*$this->pd/100 + $diff*$this->pp/100 + $this->MinScore;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$this->Students())];
    }

    public function Development()
    {
        if($this->Students() == 0)
            return 0;
        $diff = $this->MaxScore - $this->MinScore;
        $min_score = $diff*$this->pb/100 + $this->MinScore;
        $max_score = $diff*$this->pb/100 + $diff*$this->pd/100 + $this->MinScore;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$this->Students())];
    }

    public function Beginner()
    {
        if($this->Students() == 0)
            return 0;
        $diff = $this->MaxScore - $this->MinScore;
        $min_score = $this->MinScore;
        $max_score = $diff*$this->pb/100 + $this->MinScore;
        $count = $this->hasMany('App\Student')->whereBetween('score', [$min_score, $max_score])->count();
        return [$count,round($count*100/$this->Students())];
    }
}
