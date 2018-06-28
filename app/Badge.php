<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['pivot'];

    public function profiles() {
      return $this->belongsToMany(Profile::class, 'badge_profile', 'badge_id', 'profile_id');
    }
}