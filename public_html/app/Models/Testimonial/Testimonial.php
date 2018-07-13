<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $fillable = [];
    protected $perPage = 10;
    
    public function scopeFeatured($query)
    {
      return $query->where('featured', 1);
    }
    
    public function scopeVisible($query)
    {
      return $query->where('web_visible', 1)->orderBy('id', 'desc');
    }
    
    public function scopeVisibleNoOrder($query)
    {
      return $query->where('web_visible', 1);
    }
}
