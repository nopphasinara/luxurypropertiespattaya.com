<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pages extends Model
{
    protected $table = 'pages';
    protected $fillable = [];
    
    public static function byId($id)
    {
      return Pages::where('id', $id)->first();
    }
    
    public static function bySlug($slug)
    {
      return Pages::where('slug', $slug)->visible()->first();
    }
    
    public static function scopeVisible($query) {
      return $query->where('web_visible', 1);
    }
}
