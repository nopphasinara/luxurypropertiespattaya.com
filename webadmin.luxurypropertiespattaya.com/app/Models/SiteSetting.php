<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'admin_config';
    protected $fillable = [];
    protected $perPage = 10;
}
