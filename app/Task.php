<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lane_id', 'description', 'complete'
    ];

    /**
     * Get the lane this task belongs to.
     */
    public function lane() {
        return $this->belongsTo('App\Lane');
    }
}
