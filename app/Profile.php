<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentnr','id', 'points', 'house_id', 'created_at', 'updated_at'
    ];

    protected $hidden = ['pivot'];

    public function house() {
      return $this->belongsTo(House::class);
    }

    public function badges() {
      return $this->belongsToMany(Badge::class, 'badge_profile', 'profile_id', 'badge_id');
    }

    public function user() {
      return $this->hasOne(User::class, 'id', 'studentnr');
    }
}