<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }

        return "{$this->name} {$this->last_name}";
    }

    public function getReports()
    {
        return $this->hasMany('App\Report')->get();
    }

    public function getCategory()
    {
        return $this->belongsToMany('App\Category','reports','user_id','category_id')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getNotStartedReports()
    {
        return $this->hasMany('App\Report')
            ->whereNull('MeasurementInstrument')
            ->whereNull('AssessmentMethodDetail')
            ->whereNull('MaxScore')
            ->whereNull('MinScore')
            ->groupBy('course_id')
            ->get();
    }

    public function getStartedReports()
    {
        return $this->hasMany('App\Report')
        ->whereNotNull('MeasurementInstrument')
        ->whereNotNull('AssessmentMethodDetail')
        ->whereNotNull('MaxScore')
        ->whereNotNull('MinScore')
        ->whereNull('ProfessorTeam')
        ->whereNull('Result')
        ->whereNull('PurposeMeasure')
        ->whereNull('Results')
        ->whereNull('ImproceScores')
        ->whereNull('Expected')
        ->whereNull('Proposal')
        ->groupBy('course_id')
        ->get();
    }

    public function getFinishReports()
    {
        return $this->hasMany('App\Report')
        ->whereNotNull('MeasurementInstrument')
        ->whereNotNull('AssessmentMethodDetail')
        ->whereNotNull('MaxScore')
        ->whereNotNull('MinScore')
        ->whereNotNull('ProfessorTeam')
        ->whereNotNull('Result')
        ->whereNotNull('PurposeMeasure')
        ->whereNotNull('Results')
        ->whereNotNull('ImproceScores')
        ->whereNotNull('Expected')
        ->whereNotNull('Proposal')
        ->groupBy('course_id')
        ->get();
    }

    public function name() {
        return $this->first_name." ".$this->last_name;
    }

}
