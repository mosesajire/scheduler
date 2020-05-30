<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['description', 'start_time', 'end_time', 'status'];

     // Establish relationship between user model and activity model
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
