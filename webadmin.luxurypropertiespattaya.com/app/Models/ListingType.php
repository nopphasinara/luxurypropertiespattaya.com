<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use App\Admin\Traits\ModelTree;

use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    use ModelTree, AdminBuilder;
    
    protected $table = 'listing_types';

    // protected $casts = [
    //     'extra' => 'json',
    // ];
    
    public function __construct()
    {
      $this->titleColumn = 'name';
      $this->orderColumn = 'order';
    }

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}
