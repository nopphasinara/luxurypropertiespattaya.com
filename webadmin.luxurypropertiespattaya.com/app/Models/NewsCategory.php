<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use App\Admin\Traits\ModelTree;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use ModelTree, AdminBuilder;
    
    protected $table = 'news_categories';
    
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
