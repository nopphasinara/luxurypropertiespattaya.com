<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function byUsername($username = '')
    {
      if (!$username) return;

      return User::where('username', $username)->first();
    }

    public function scopeListings()
    {
      $listing_ids = AffiliateListing::where('user_id', $this->id)->get()->pluck('listing_id');

      if (!$listing_ids) return;

      return Listing::whereIn('id', $listing_ids)->get();
    }
}
