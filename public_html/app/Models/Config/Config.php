<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Config extends Model
{
    protected $table = 'admin_config';
    protected $fillable = [];
    
    public static function byId($id)
    {
      return Config::where('id', $id)->first();
    }
    
    public static function byName($name)
    {
      return Config::where('name', $name)->first();
    }
}
