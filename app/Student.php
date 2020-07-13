<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
        'report_id','last_name','first_name','score'
    ];

    public function Course()
    {
    	return $this->belongsTo('App\Course')->first();
    }
}
