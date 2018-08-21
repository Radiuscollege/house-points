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

    /*
    * Adds new profile to an added member from amo login.
    *
    */
    public static function addNew($user) {

      $currentHouse = \DB::table('profiles')
        ->select('house_id', \DB::raw('count(*) as total'))
        ->groupBy('house_id')
        ->orderBy('total')
        ->first()
        ->house_id;

      $profile = \App\Profile::where('studentnr', $user->id)->first();

      if ($profile === null)
      {
        $profile = \App\Profile::firstOrCreate([
          'studentnr'   => $user->id,
          'points'      => 0,
          'house_id'    => $currentHouse
        ]);

        $badge = \App\Badge::find(1);
        $profile->badges()->attach($badge);
      }

    }

    public function house() {
      return $this->belongsTo(House::class);
    }

    public function badges() {
      return $this->belongsToMany(Badge::class, 'badge_profile', 'profile_id', 'badge_id');
    }

    public function latestBadges() {
      return $this->badges()
        ->orderBy('created_at')
        ->take(3);
    }

    public function user() {
      return $this->hasOne(User::class, 'id', 'studentnr');
    }

    public function logs() {
      return $this->hasMany(Log::class, 'profile_id', 'studentnr');
    }
}